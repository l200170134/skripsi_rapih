<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily extends CI_Controller
{
    public function index()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Hrd Gaji';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji');
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
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji_karyawan_input');
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
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_gaji_karyawan_edit');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
