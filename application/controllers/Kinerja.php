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
        $nip        = htmlspecialchars($this->input->post('nip'));
        $bulan      = htmlspecialchars($this->input->post('bulan'));
        $tahun      = htmlspecialchars($this->input->post('tahun'));
        $hrd_1      = htmlspecialchars($this->input->post('hrd_1'));
        $hrd_2      = htmlspecialchars($this->input->post('hrd_2'));
        $ma_1       = htmlspecialchars($this->input->post('ma_1'));
        $ma_2       = htmlspecialchars($this->input->post('ma_2'));
        $ma_3       = htmlspecialchars($this->input->post('ma_3'));
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
        $id         = htmlspecialchars($this->input->post('id'));
        $hrd_1      = htmlspecialchars($this->input->post('hrd_1'));
        $hrd_2      = htmlspecialchars($this->input->post('hrd_2'));
        $ma_1       = htmlspecialchars($this->input->post('ma_1'));
        $ma_2       = htmlspecialchars($this->input->post('ma_2'));
        $ma_3       = htmlspecialchars($this->input->post('ma_3'));
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
