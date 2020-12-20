<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
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
        $data['judul'] = 'Jurnal';
        $id_divisi = $this->session->userdata('divisi');
        $username =  $this->session->userdata('username');

        // PAGIANTION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Jurnal/index';
        $config['total_rows'] = $this->page->getEmployesRows($id_divisi, $username);
        $config['per_page'] = 5;
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
        $data['start'] = 0 + $start;
        $data['karyawan'] = $this->page->getEmployes($id_divisi, $username, $config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_jurnal');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function jurnal_list($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurnal'] = $this->leader_model->jurnal_tampil()->result();
        $data['judul'] = 'Jurnal';
        $data['nip'] = $nip;
        $data['jurnal'] = $this->db->query("SELECT * FROM tb_ldr_jurnal WHERE nip = $nip ORDER BY tgl DESC")->result_array();
        $this->session->set_userdata('nip_jurnal', $nip);
        // PAGINATION
        $this->load->model('Pagination_model', 'pages');
        // config
        $config['base_url'] = base_url() . 'Jurnal/jurnal_list/' . $nip . '/';
        $config['total_rows'] = $this->pages->getJurnalRows($nip);
        $config['per_page'] = 5;
        $config['first_url']        = '0';
        $config['uri_segment']      = '4';
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
        // inisiasi pagination
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_jurnal', $data['start']);
        $data['jurnal'] = $this->pages->getJurnal($nip, $config['per_page'], $data['start']);
        // END PAGIANTION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_jurnal_list', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function jurnal_form($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Jurnal';
        $data['nip'] = $nip;

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_jurnal_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function jurnal_proses_tambah($nipp)
    {
        // $this->session->set_userdata('nip_jurnal', $nipp);
        $nip        = $nipp;
        $aktivitas  = htmlspecialchars($this->input->post('aktivitas'));
        $tgl        = htmlspecialchars($this->input->post('tgl'));
        $jam        = htmlspecialchars($this->input->post('jam'));

        $data = array(
            'nip'       => $nip,
            'aktivitas' => $aktivitas,
            'jam'       => $jam,
            'tgl'       => $tgl,
        );

        $this->leader_model->jurnal_input($data, 'tb_ldr_jurnal');
        $this->session->set_flashdata(
            'tambahJurnal',
            '<div class="alert alert-success alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Jurnal Berhasil Ditambahkan !</center>
        </div>'
        );
        redirect('Jurnal/jurnal_list/' . $nipp);
    }
    public function jurnal_proses_hapus($id)
    {
        $nip = $this->session->userdata('nip_jurnal');
        $link = $this->session->userdata('link_jurnal');
        $where = array('id' => $id);
        $this->karyawan_model->daily_hapus($where, 'tb_ldr_jurnal');
        $this->session->set_flashdata(
            'hapusjurnal',
            '<div class="alert alert-warning alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Jurnal Berhasil Dihapus !</center>
        </div>'
        );
        redirect('Jurnal/jurnal_list/' . $nip . '/' . $link);
    }
}
