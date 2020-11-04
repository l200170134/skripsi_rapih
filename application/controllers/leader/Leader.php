<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader extends CI_Controller
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
        $data['judul'] = 'Leader Dashboard';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/dashboard_leader', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/daily_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_report()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/daily_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['daily'] = $this->leader_model->daily_tampil()->result();
        $data['judul'] = 'Leader Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/daily');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function data()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Data';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/data');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function evaluasi()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Evaluasi';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/evaluasi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function gaji()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Gaji';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/gaji');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Kinerja';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/kinerja_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja_update($id)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Kinerja';
        $where = array('id' => $id);
        $data['kinerja'] = $this->leader_model->kinerja_update($where, 'tb_ldr_kinerja')->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/kinerja_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kinerja()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Kinerja';
        $data['kinerja'] = $this->leader_model->kinerja_tampil()->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/kinerja');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_daily()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Monitoring';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/monitoring_daily');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_report()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Monitoring';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/monitoring_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring_update()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Monitoring';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/monitoring_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function monitoring()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Monitoring';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/monitoring');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function jurnal()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurnal'] = $this->leader_model->jurnal_tampil()->result();
        $data['judul'] = 'Leader Jurnal';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/jurnal', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function jurnal_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Jurnal';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/jurnal_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function jurnal_update()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Leader Jurnal';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/jurnal_update');
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

        $this->leader_model->daily_input($data, 'tb_ldr_daily');
        redirect('leader/Leader/daily');
        redirect('leader/Leader/daily');
    }
    public function kinerja_proses_tambah()
    {
        $nip        = $this->input->post('nip');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');
        $hrd_1      = $this->input->post('hrd_1');
        $hrd_2      = $this->input->post('hrd_2');
        $ma_1       = $this->input->post('ma_1');
        $ma_2       = $this->input->post('ma_2');
        $ma_3       = $this->input->post('ma_3');
        $point      = ($hrd_1 + $hrd_2 + $ma_1 + $ma_2 + $ma_3) / 5;

        $data = array(
            'nip'       => $nip,
            'bulan'     => $bulan,
            'tahun'     => $tahun,
            'hrd_1'     => $hrd_1,
            'hrd_2'     => $hrd_2,
            'ma_1'      => $ma_1,
            'ma_2'      => $ma_2,
            'ma_3'      => $ma_3,
            'point'     => $point,

        );

        $this->leader_model->kinerja_input($data, 'tb_ldr_kinerja');
        redirect('leader/Leader/kinerja');
    }
    public function kinerja_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->leader_model->kinerja_hapus($where, 'tb_ldr_kinerja');
        redirect("leader/Leader/kinerja");
    }
    public function kinerja_proses_update()
    {
        $id         = $this->input->post('id');
        $hrd_1      = $this->input->post('hrd_1');
        $hrd_2      = $this->input->post('hrd_2');
        $ma_1       = $this->input->post('ma_1');
        $ma_2       = $this->input->post('ma_2');
        $ma_3       = $this->input->post('ma_3');
        $point      = ($hrd_1 + $hrd_2 + $ma_1 + $ma_2 + $ma_3) / 5;


        $data = array(
            'id'        => $id,
            'hrd_1'     => $hrd_1,
            'hrd_2'     => $hrd_2,
            'ma_1'      => $ma_1,
            'ma_2'      => $ma_2,
            'ma_3'      => $ma_3,
            'point'     => $point,
        );

        $where = array(
            'id' => $id
        );
        $this->leader_model->kinerja_update_proses($where, $data, 'tb_ldr_kinerja');
        redirect('leader/Leader/kinerja');
    }
    public function kinerja_search()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['kinerja'] = $this->leader_model->kinerja_keyword($keyword);
        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/kinerja');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->leader_model->daily_hapus($where, 'tb_ldr_daily');
        redirect("leader/Leader/daily");
    }
    public function daily_update($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['daily'] = $this->leader_model->daily_update($where, 'tb_ldr_daily')->result();
        $data['judul'] = 'Leader Daily';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar_karyawan', $data);
        $this->load->view('leader/daily_update', $data);
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
        redirect('leader/Leader/daily');
    }
    public function jurnal_proses_tambah()
    {
        $nip        = $this->input->post('nip');
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
        redirect('leader/Leader/jurnal');
    }
    public function jurnal_proses_hapus($id)
    {
        $where = array('id' => $id);
        $this->karyawan_model->daily_hapus($where, 'tb_ldr_jurnal');
        redirect("leader/Leader/jurnal");
    }
}
