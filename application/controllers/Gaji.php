<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
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
        $data['judul'] = 'Gaji';
        
        $nip = $this->session->userdata('nip_gaji');
        $data['gaji'] = $this->hrd_model->hrd_view_gaji($nip)->result();

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
        //$data['karyawan'] = $this->db->get_where('user', ['nip' => $nip])->row_array(); 
        $data['gaji'] = $this->hrd_model->hrd_view_gaji($nip)->result();
        $data['nip'] = $nip;
        $this->session->set_userdata('nip_gaji', $nip);
        

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
        redirect('Data_karyawan/detail_karyawan/' .$id_divisi);
    }

    public function gaji_update($id_gaji)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $where = array('id_gaji' => $id_gaji);
        $data['update'] = $this->hrd_model->update($where, 'tb_gaji')->row_array();
        //$data['gaji'] = $this->db->get_where('tb_gaji', ['nip' => $nip])->result_array();
        
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
        redirect('Gaji/gaji_view/' .$nip);
    }

    public function gaji_hapus_proses($id_gaji)
    {
        $nip = $this->session->userdata('nip_gaji');
        $this->session->unset_userdata('nip_gaji');
        //var_dump($id_divisi);
        $where = array('id_gaji' => $id_gaji);
        $this->hrd_model->delate($where, 'tb_gaji');
        redirect('Gaji/gaji_view/' . $nip);
    }
}
