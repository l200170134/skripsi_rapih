<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // cek_login();
    }
    public function index()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['divisi'] = $this->hrd_model->hrd_view_divisi()->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_karyawan', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function detail_karyawan($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nama_divisi'] = $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->result_array();
        $data['divisi'] = $this->db->get_where('user', ['id_divisi' => $id_divisi])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_data_karyawan_detail', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function tambah_data_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['divisi'] = $this->hrd_model->hrd_view_divisi()->result();
        $data['role'] = $this->hrd_model->hrd_view_role()->result();
        

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_karyawan_tambah', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function update_data_karyawan()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_karyawan_update');
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

        $this->hrd_model->hrd_input($data, 'user');
        $id = $data['id_divisi'];
        redirect('Data_karyawan/detail_karyawan/' . $id);
    }
}
