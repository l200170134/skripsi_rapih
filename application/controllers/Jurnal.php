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
        $id = $this->session->userdata('divisi');
        $username =  $this->session->userdata('username');
        $data['karyawan'] = $this->db->get_where('user', ['id_divisi' => $id, 'username !=' => $username])->result_array();

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
        $data['jurnal'] = $this->db->query("SELECT * FROM tb_ldr_jurnal WHERE nip = $nip ORDER BY tgl ASC")->result_array();

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
        $this->session->set_userdata('nip_jurnal', $nipp);
        $nip        = $nipp;
        $aktivitas  = $this->input->post('aktivitas');
        $tgl        = $this->input->post('tgl');
        $jam        = $this->input->post('jam');

        $data = array(
            'nip'       => $nip,
            'aktivitas' => $aktivitas,
            'jam'       => $jam,
            'tgl'       => $tgl,
        );

        $this->leader_model->jurnal_input($data, 'tb_ldr_jurnal');
        redirect('Jurnal/jurnal_list/' . $nipp);
    }
    public function jurnal_proses_hapus($id)
    {
        $nip = $this->session->userdata('nip_jurnal');
        $where = array('id' => $id);
        $this->karyawan_model->daily_hapus($where, 'tb_ldr_jurnal');
        redirect('Jurnal/jurnal_list/' . $nip);
        $nip = $this->session->unset_userdata('nip_jurnal');
    }
}
