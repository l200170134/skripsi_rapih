<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
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
        $data['judul'] = 'Monitoring';
        $id_divisi = $this->session->userdata('divisi');
        $username = $this->session->userdata('username');
        // PAGIANTION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Monitoring/index';
        $config['total_rows'] = $this->page->getMemberRows($id_divisi, $username);
        $config['per_page'] = 5;
        // inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $data['start'] = 0 + $start;
        $data['list_user'] = $this->page->getMonitoringMembers($id_divisi, $username, $config['per_page'], $data['start']);
        // END PAGINATION

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
        $data['judul'] = 'Data Karyawan';
        $username = $this->session->userdata('username');
        // PAGIANTION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Monitoring/monitoring_direksi/' . $id_divisi . '/';
        $config['total_rows'] = $this->page->getMemberRows($id_divisi, $username);
        $config['per_page'] = 5;
        // inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_dir', $data['start']);
        $data['list_user'] = $this->page->getMonitoringMembers($id_divisi, $username, $config['per_page'], $data['start']);
        // END PAGINATION


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
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 2) {
            $data['judul'] = 'Data Karyawan';
        } else {
            $data['judul'] = 'Monitoring';
        }

        // PAGINATION
        $this->load->model('Pagination_model', 'pages');
        // config
        $config['base_url'] = base_url() . 'Monitoring/monitoring_daily/' . $nip . '/';
        $config['total_rows'] = $this->pages->getMonitoringRows($nip, $tanggal);
        $config['per_page'] = 5;
        // inisiasi pagination
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_mon', $data['start']);
        $data['daily'] = $this->pages->getMonitoringDaily($nip, $tanggal, $config['per_page'], $data['start']);
        // END PAGIANTION


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
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 2) {
            $data['judul'] = 'Data Karyawan';
        } else {
            $data['judul'] = 'Monitoring';
        }

        $evaluasi = $this->db->get_where('tb_evaluasi', ['id_daily' => $id, 'penulis' => $user]);
        if ($evaluasi->num_rows() > 0) {
            $data['evaluasi'] = $this->db->get_where('tb_evaluasi', ['id_daily' => $id, 'penulis' => $user])->row_array();
        } else {
            $data['evaluasi'] = array('status' => 0, 'penulis' => 'null');
        }
        $data['daily'] = $this->db->get_where('tb_ldr_daily', ['id' => $id])->row_array();
        $data['id'] = $id;
        $data['role_id'] = $this->session->userdata('role_id');

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
        $link = $this->session->userdata('link_mon');
        $this->session->unset_userdata('link_mon');
        redirect('Monitoring/monitoring_daily/' . $nip . '/' . $link);
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
        $link = $this->session->userdata('link_mon');
        $this->session->unset_userdata('link_mon');
        redirect('Monitoring/monitoring_daily/' . $nip . '/' . $link);
    }

    public function monitoring_report($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nip'] = $nip;
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 2) {
            $data['judul'] = 'Data Karyawan';
        } else {
            $data['judul'] = 'Monitoring';
        }
        $tanggal = date('Y-m-d');
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // SEARCING
        if ($this->input->post('submit')) {
            $tgl_awal       = $this->input->post('tgl_awal');
            $tgl_akhir      = $this->input->post('tgl_akhir');
            $this->session->set_userdata('tgl_awal', $tgl_awal);
            $this->session->set_userdata('tgl_akhir', $tgl_akhir);
        } else if ($this->input->post('batal')) {
            $this->session->unset_userdata('tgl_awal');
            $this->session->unset_userdata('tgl_akhir');
            $tgl_awal       = '0000-01-01';
            $tgl_akhir      = '3000-01-01';
            redirect('Monitoring/monitoring_report/' . $nip . '/0');
        } else {
            $tgl_awal       = $this->session->userdata('tgl_awal');
            $tgl_akhir      = $this->session->userdata('tgl_akhir');
        }
        // config
        $config['base_url'] = base_url() . 'Monitoring/monitoring_report/' . $nip . '/';
        $config['per_page'] = 5;
        $this->db->select('*');
        $this->db->from('tb_ldr_daily');
        $this->db->where('nip', $nip);
        $this->db->where('status', 'Approve');
        $this->db->where('tgl !=', $tanggal);
        if ($this->input->post('submit')) {
            $this->db->where('tgl >=', $tgl_awal);
            $this->db->where('tgl <=', $tgl_akhir);
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $data['start']          = 0;
            redirect('Monitoring/monitoring_report/' . $nip . '/0');
        } else if ($this->session->userdata('tgl_awal') != null) {
            $this->db->where('tgl >=', $tgl_awal);
            $this->db->where('tgl <=', $tgl_akhir);
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $start                  = $this->uri->segment(4);
            $data['start']          = 0 + $start;
        } else {
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $start                  = $this->uri->segment(4);
            $data['start']          = 0 + $start;
        }
        // Inisiasi
        $this->pagination->initialize($config);
        $this->session->set_userdata('link', $data['start']);
        $data['daily']      = $this->page->getReportDaily($nip, $tanggal, $config['per_page'], $data['start'], $tgl_awal, $tgl_akhir);
        // END PAGIANTION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_monitoring_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
}
