<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pribadi extends CI_Controller
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
        $data['judul'] = 'Data Pribadi';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_pribadi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
