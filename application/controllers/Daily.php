<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily extends CI_Controller
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
        // $data['daily'] = $this->leader_model->daily_tampil()->result();
        $data['judul'] = 'Daily Activity';
        $nip = $this->session->userdata('nip');
        $data['daily'] = $this->db->get_where('tb_ldr_daily', ['nip' => $nip, 'status !=' => 'Approve'])->result_array();
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Daily Activity';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_report($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Daily Activity';
        $nip = $this->session->userdata('nip');
        $data['daily'] = $this->db->get_where('tb_ldr_daily', ['nip' => $nip, 'status' => 'Approve'])->result_array();
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_proses_tambah()
    {
        $nip        = $this->input->post('nip');
        $tgl        = $this->input->post('tgl');
        $aktivitas  = $this->input->post('aktivitas');
        $hasil      = $this->input->post('hasil');
        $catatan    = $this->input->post('catatan');
        $status     = $this->input->post('status');
        $urgensi    = $this->input->post('urgensi');

        $data = array(
            'nip'       => $nip,
            'tgl'       => $tgl,
            'aktivitas' => $aktivitas,
            'hasil'     => $hasil,
            'catatan'   => $catatan,
            'status'    => $status,
            'urgensi'    => $urgensi,
        );


        $this->leader_model->daily_input($data, 'tb_ldr_daily');
        redirect('Daily');
    }

    public function daily_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->leader_model->daily_hapus($where, 'tb_ldr_daily');
        redirect("Daily");
    }

    public function daily_update($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['daily'] = $this->leader_model->daily_update($where, 'tb_ldr_daily')->result();
        $data['judul'] = 'Daily Activity';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_update', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily_proses_update()
    {
        $id = $this->input->post('id');
        $catatan    = $this->input->post('catatan');
        $hasil      = $this->input->post('hasil');


        $data = array(
            'catatan'   => $catatan,
            'hasil'     => $hasil,
        );

        $where = array(
            'id' => $id
        );
        $this->leader_model->daily_update_proses($where, $data, 'tb_ldr_daily');
        redirect('Daily');
    }
}
