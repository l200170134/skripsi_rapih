<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
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
        $data['judul'] = "Evaluasi";

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Evaluasi/index';
        $config['total_rows'] = $this->page->getEvaluasiRows();
        $config['per_page'] = 6;
        // inisiasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['evaluasi'] = $this->page->getEvaluasi($config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_evaluasi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
