<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        cek_login();
    }

    public function index()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Dashboard';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/dashboard_hrd', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
        $this->load->view('_partials/js_hrd');
    }

    public function data_pribadi()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Pribadi';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/data_pribadi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/daily_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_report()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/daily_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_update()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/daily_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/daily');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function data_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';
        $data['divisi'] = $this->hrd_model->divisi_tampil()->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/data_karyawan');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function detail_karyawan($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';
        $data['nama_divisi'] = $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->result_array();
        $data['divisi'] = $this->db->get_where('user', ['id_divisi' => $id_divisi])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('hrd/detail_karyawan', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function edit_gaji_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/edit_gaji_karyawan');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/gaji_karyawan');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Gaji';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/gaji');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function input_gaji_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/input_gaji_karyawan');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function tambah_data_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/tambah_data_karyawan');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/kinerja');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/kinerja_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja_update()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/kinerja_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function status_update()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan',  $data);
        $this->load->view('hrd/status_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function detail_karyawan_tambah()
    {
        $nama       = $this->input->post('nama');
        $nip        = $this->input->post('nip');
        $id_divisi     = $this->input->post('id_divisi');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $role_id    = $this->input->post('role_id');
        $is_active  = $this->input->post('is_active');
        $data = array(
            'nama'      => $nama,
            'nip'       => $nip,
            'id_divisi'    => $id_divisi,
            'username'    => $username,
            'password'    => $password,
            'role_id'    => $role_id,
            'is_active'    => $is_active,

        );

        $this->hrd_model->karyawan_input($data, 'user');
        $id = $data['id_divisi'];
        redirect('hrd/Hrd/detail_karyawan/'.$id);

    }
}
