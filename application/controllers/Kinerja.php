<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Kinerja';

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Kinerja/index';
        $config['total_rows'] = $this->page->getKinerjaRows();
        $config['per_page'] = 3;
        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        // inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $this->session->set_userdata('link_kinerja', $start);
        $data['start'] = 0 + $start;
        $data['kinerja'] = $this->page->getKinerja($config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kinerja');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kinerja_update($id)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Kinerja';
        $where = array('id' => $id);
        $data['kinerja'] = $this->leader_model->kinerja_update($where, 'tb_ldr_kinerja')->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kinerja_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kinerja_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Kinerja';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kinerja_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kinerja_proses_tambah()
    {
        $nip        = $this->input->post('nip');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $hrd_1      = $this->input->post('hrd_1');
        $hrd_2      = $this->input->post('hrd_2');
        $ma_1       = $this->input->post('ma_1');
        $ma_2       = $this->input->post('ma_2');
        $ma_3       = $this->input->post('ma_3');
        $point      = ($hrd_1 + $hrd_2 + $ma_1 + $ma_2 + $ma_3) / 5;

        $data = array(
            'nip'       => $nip,
            'bulan'     => $bulan,
            'tahun'     => $tahun,
            'hrd_1'     => $hrd_1,
            'hrd_2'     => $hrd_2,
            'ma_1'      => $ma_1,
            'ma_2'      => $ma_2,
            'ma_3'      => $ma_3,
            'point'     => $point,

        );

        $this->leader_model->kinerja_input($data, 'tb_ldr_kinerja');
        redirect('Kinerja');
    }
    public function kinerja_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->leader_model->kinerja_hapus($where, 'tb_ldr_kinerja');
        $link = $this->session->userdata('link_kinerja');
        redirect('Kinerja/index/' . $link);
    }
    public function kinerja_proses_update()
    {
        $id         = $this->input->post('id');
        $hrd_1      = $this->input->post('hrd_1');
        $hrd_2      = $this->input->post('hrd_2');
        $ma_1       = $this->input->post('ma_1');
        $ma_2       = $this->input->post('ma_2');
        $ma_3       = $this->input->post('ma_3');
        $point      = ($hrd_1 + $hrd_2 + $ma_1 + $ma_2 + $ma_3) / 5;


        $data = array(
            'id'        => $id,
            'hrd_1'     => $hrd_1,
            'hrd_2'     => $hrd_2,
            'ma_1'      => $ma_1,
            'ma_2'      => $ma_2,
            'ma_3'      => $ma_3,
            'point'     => $point,
        );

        $where = array(
            'id' => $id
        );
        $this->leader_model->kinerja_update_proses($where, $data, 'tb_ldr_kinerja');
        $link = $this->session->userdata('link_kinerja');
        redirect('Kinerja/index/' . $link);
    }
    public function kinerja_search()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['kinerja'] = $this->leader_model->kinerja_keyword($keyword);
        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('leader/kinerja');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
