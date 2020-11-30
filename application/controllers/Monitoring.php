<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
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
        $data['judul'] = 'Monitoring';
        $id_divisi = $this->session->userdata('divisi');
        $data['list_user'] = $this->db->get_where('user', ['id_divisi' => $id_divisi])->result_array();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_direksi($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Monitoring';
        $data['list_user'] = $this->db->get_where('user', ['id_divisi' => $id_divisi])->result_array();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_daily($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $tanggal = date('Y-m-d');
        $data['daily'] = $this->db->query("SELECT * FROM tb_ldr_daily WHERE (nip = $nip AND status != 'Approve') OR (nip = $nip AND tgl = '$tanggal' ) ORDER BY tgl ASC")->result_array();
        $daily = $this->session->userdata('id_daily');
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();
        $data['judul'] = 'Monitoring';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring_daily');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function monitoring_update($id)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $user['username'];
        $data['judul'] = 'Monitoring';
        $data['evaluasi'] = $this->db->get_where('tb_evaluasi', ['id_daily' => $id, 'penulis' => $user])->row_array();
        $data['daily'] = $this->db->get_where('tb_ldr_daily', ['id' => $id])->row_array();
        $data['id'] = $id;

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_proses_update($id)
    {
        $evaluasi   = $this->input->post('evaluasi');
        $nama       = $this->session->userdata('username');
        $status     = $this->input->post('status');
        $urgensi    = $this->input->post('urgensi');
        $active     = 1;

        // update tabel evaluasi
        $this->db->set('evaluasi', $evaluasi);
        $this->db->where('id_daily', $id);
        $this->db->where('penulis', $nama);
        $this->db->update('tb_evaluasi');

        // Update tabel daily
        $this->db->set('status', $status);
        $this->db->set('urgensi', $urgensi);
        $this->db->where('id', $id);
        $this->db->update('tb_ldr_daily');

        // mendapatkan nip pegawai
        $nipp = $this->db->get_where('tb_ldr_daily', ['id' => $id])->row_array();
        $nip = $nipp['nip'];
        redirect('Monitoring/monitoring_daily/' . $nip);
    }

    public function monitoring_tambah($id)
    {
        $id_daily   = $id;
        $evaluasi   = $this->input->post('evaluasi');
        $nama       = $this->session->userdata('username');
        $status     = $this->input->post('status');
        $urgensi    = $this->input->post('urgensi');
        $active     = 1;

        // Insert tabel evaluasi
        $isi_evaluasi = array(
            'id_daily'  => $id_daily,
            'evaluasi'  => $evaluasi,
            'penulis'   => $nama,
            'status'    => $active
        );
        $this->db->insert('tb_evaluasi', $isi_evaluasi);

        // Update tabel daily
        $this->db->set('status', $status);
        $this->db->set('urgensi', $urgensi);
        $this->db->where('id', $id_daily);
        $this->db->update('tb_ldr_daily');

        //bikin variable global id_daily 
        $this->session->set_userdata('id_daily', $id_daily);

        // mengambil nip dari tabel tb_ldr_daily
        $nipp = $this->db->get_where('tb_ldr_daily', ['id' => $id_daily])->row_array();
        $nip = $nipp['nip'];
        redirect('Monitoring/monitoring_daily/' . $nip);
    }

    public function monitoring_report($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Monitoring';
        $tanggal = date('Y-m-d');
        $data['daily'] = $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC")->result_array();
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
