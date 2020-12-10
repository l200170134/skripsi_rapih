<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['judul'] = 'Dashboard';
        $nip = $this->session->userdata('nip');
        $id_divisi = $this->session->userdata('divisi');

        // Karyawan
        $date = date('Y-m-d');
        $data['select'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE nip = '$nip' AND tgl = '$date' ")->num_rows();
        $data['kpi'] = $this->db->query("SELECT AVG(value) FROM tb_kpi_value as rata WHERE nip = '$nip'")->row_array();
        $data['approve'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE  nip = '$nip' AND status ='Pending'")->num_rows();

        //Leader
        $data['karyawan'] = $this->db->query(" SELECT * FROM user WHERE id_divisi = '$id_divisi'")->num_rows();
        $data['pending'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE id_divisi = '$id_divisi' AND nip !='nip' AND status ='Pending'")->num_rows();
        $data['belum'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE  nip = '$nip' AND hasil !='Selesai'")->num_rows();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_dashboard', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
        $this->load->view('_partials/js_hrd');
        $this->load->view('_partials/js_karyawan');
    }
}
