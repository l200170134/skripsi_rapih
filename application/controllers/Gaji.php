<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
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
        $data['judul'] = 'Gaji';
        $nip = $this->session->userdata('nip');
        $data['nip'] = $nip;
        $data['role_id'] = $this->session->userdata('role_id');
        $data['back'] = 0;
        $data['tampil'] = 0;

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Gaji/index/';
        $config['total_rows'] = $this->page->getGajiRows($nip);
        $config['per_page'] = 4;
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
        $data['start'] = $this->uri->segment(3);
        echo $data['start'];
        $data['gaji'] = $this->page->getGaji($nip, $config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji_view($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nip'] = $nip;
        $data['back'] = 1;
        $data['role_id'] = $this->session->userdata('role_id');
        $data['tampil'] = 1;
        $this->session->set_userdata('nip_gaji', $nip);

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url']         = base_url() . 'Gaji/gaji_view/' . $nip . '/';
        $config['total_rows']       = $this->page->getGajiRows($nip);
        $config['per_page']         = 6;
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
        // inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_gaji', $data['start']);
        $data['gaji'] = $this->page->getGaji($nip, $config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji_form($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nip_karyawan'] = $this->db->get_where('user', ['nip' => $nip])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji_tambah_proses()
    {
        $nip            = $this->input->post('nip');
        $gaji           = $this->input->post('gaji');
        $tgl_pembayaran = $this->input->post('tgl_pembayaran');
        $tgl_pembayaran = date('Y-m-d', strtotime($tgl_pembayaran));
        $bulan           = $this->input->post('bulan');
        $tahun           = $this->input->post('tahun');

        $data = array(
            'nip'               => $nip,
            'gaji'              => $gaji,
            'tgl_pembayaran'    => $tgl_pembayaran,
            'bulan'             => $bulan,
            'tahun'             => $tahun,
        );

        $id_divisi = $this->session->userdata('id_divisi');
        $this->hrd_model->input($data, 'tb_gaji');
        $link = $this->session->userdata('link_kar');
        $this->session->set_flashdata(
            'tambahGaji',
            '<div class="alert alert-success alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Gaji Pegawai Berhasil Ditambahkan !</center>
        </div>'
        );
        redirect('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link);
    }

    public function gaji_update($id_gaji)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $where = array('id_gaji' => $id_gaji);
        $data['update'] = $this->hrd_model->update($where, 'tb_gaji')->row_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji_update_proses()
    {
        $id_gaji        = $this->input->post('id_gaji');
        $nip            = $this->input->post('nip');
        $gaji           = $this->input->post('gaji');
        $tgl_pembayaran = $this->input->post('tgl_pembayaran');
        $tgl_pembayaran = date('Y-m-d', strtotime($tgl_pembayaran));
        $bulan           = $this->input->post('bulan');
        $tahun           = $this->input->post('tahun');

        $data = array(
            'id_gaji'           => $id_gaji,
            'nip'               => $nip,
            'gaji'              => $gaji,
            'tgl_pembayaran'    => $tgl_pembayaran,
            'bulan'             => $bulan,
            'tahun'             => $tahun,
        );

        $where = array(
            'id_gaji'               => $id_gaji
        );
        $this->hrd_model->update_proses($where, $data, 'tb_gaji');
        $this->session->set_flashdata(
            'ubahGaji',
            '<div class="alert alert-info alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Gaji Pegawai Berhasil Diperbaharui !</center>
        </div>'
        );
        redirect('Gaji/gaji_view/' . $nip);
    }

    public function gaji_hapus_proses($id_gaji)
    {
        $nip = $this->session->userdata('nip_gaji');
        $link = $this->session->userdata('link_gaji');
        $where = array('id_gaji' => $id_gaji);
        $this->hrd_model->delate($where, 'tb_gaji');
        $this->session->set_flashdata(
            'hapusGaji',
            '<div class="alert alert-warning alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Gaji Pegawai Berhasil Dihapus !</center>
        </div>'
        );
        redirect('Gaji/gaji_view/' . $nip . '/' . $link);
    }
    public function rinciangaji_form($nip)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nip'] = $nip;
        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_rinciangaji_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
        public function rinciangaji_update($nip)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nip'] = $nip;
        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_rinciangaji_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
