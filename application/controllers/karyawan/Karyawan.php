<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
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
        $data['judul'] = "Karyawan Dashboard";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/dashboard_karyawan', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
        $this->load->view('_partials/js_karyawan');
    }
    public function data_pribadi()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Karyawan Data Pribadi";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/data_pribadi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['daily'] = $this->karyawan_model->daily_tampil()->result();
        $data['judul'] = "Karyawan Daily";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/daily', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function evaluasi()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Karyawan Evaluasi";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/evaluasi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function gaji()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Karyawan Gaji";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/gaji');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Karyawan Daily";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/daily_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily_report()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Karyawan Daily";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/daily_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily_update($id)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['daily'] = $this->karyawan_model->daily_update($where, 'tb_kyn_daily')->result();
        $data['judul'] = "Karyawan Daily";

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('karyawan/daily_update');
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
        $this->karyawan_model->daily_update_proses($where, $data, 'tb_kyn_daily');
        redirect('karyawan/Karyawan/daily');
    }

    public function daily_proses_tambah()
    {

        $nip        = $this->input->post('nip');
        $tgl        = $this->input->post('tgl');
        $aktivitas  = $this->input->post('aktivitas');
        $hasil      = $this->input->post('hasil');
        $catatan    = $this->input->post('catatan');
        $evaluasi   = $this->input->post('evaluasi');
        $status     = $this->input->post('status');
        $urgensi    = $this->input->post('urgensi');

        $data = array(
            'nip'       => $nip,
            'tgl'       => $tgl,
            'aktivitas' => $aktivitas,
            'hasil'     => $hasil,
            'catatan'   => $catatan,
            'evaluasi'  => $evaluasi,
            'status'    => $status,
            'urgensi'    => $urgensi,
        );

        $this->karyawan_model->daily_input($data, 'tb_kyn_daily');
        redirect('karyawan/Karyawan/daily');
    }

    public function daily_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->karyawan_model->daily_hapus($where, 'tb_kyn_daily');
        redirect("karyawan/Karyawan/daily");
    }
}
