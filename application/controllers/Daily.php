<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily extends CI_Controller
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
        $data['judul'] = 'Daily Activity';
        $nip = $this->session->userdata('nip');
        $tanggal = date('Y-m-d');
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Daily/index/' . $nip . '/';
        $config['total_rows'] = $this->page->getDailyRows($nip, $tanggal);
        $config['per_page'] = 5;
        // styleing
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        // Inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link', $data['start']);
        $data['daily'] = $this->page->getDaily($nip, $tanggal, $config['per_page'], $data['start']);

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
        $tanggal = date('Y-m-d');
        // $data['daily'] = $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC")->result_array();
        $data['evaluasi'] = $this->db->get('tb_evaluasi')->result_array();

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Daily/daily_report/' . $nip . '/';
        $config['total_rows'] = $this->page->getReportRows($nip, $tanggal);
        $config['per_page'] = 10;
        // styleing
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        // Inisiasi
        $this->pagination->initialize($config);
        // Cek apakah url segment sama dengan nilai nip yang dikirimkan
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link', $data['start']);
        $data['daily'] = $this->page->getReportDaily($nip, $tanggal, $config['per_page'], $data['start']);
        // END PAGINATION

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
        $id_divisi  = $this->session->userdata('divisi');
        $tgl        = $this->input->post('tgl');
        $aktivitas  = $this->input->post('aktivitas');
        $hasil      = $this->input->post('hasil');
        $catatan    = $this->input->post('catatan');
        $status     = $this->input->post('status');
        $urgensi    = $this->input->post('urgensi');

        $data = array(
            'nip'       => $nip,
            'id_divisi' => $id_divisi,
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
        $nip=$this->session->userdata('nip');
        $link=$this->session->userdata('link');
        redirect("Daily/index/" .$nip.'/'.$link);
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
        $role_id = $this->session->userdata('role_id');
        $id = $this->input->post('id');
        $catatan    = $this->input->post('catatan');
        $hasil      = $this->input->post('hasil');

        if ($role_id == 2 && $hasil == 'Selesai') {
            $status     = 'Approve';
            $urgensi    = 'Selesai';
            $data = array(
                'catatan'   => $catatan,
                'hasil'     => $hasil,
                'status'    => $status,
                'urgensi'   => $urgensi
            );
        } else {
            $data = array(
                'catatan'   => $catatan,
                'hasil'     => $hasil
            );
        }


        $where = array(
            'id' => $id
        );
        $nip = $this->session->userdata('nip');
        $link = $this->session->userdata('link');
        $this->session->unset_userdata('link');
        $this->leader_model->daily_update_proses($where, $data, 'tb_ldr_daily');
        redirect('Daily/index/' . $nip . '/' . $link);
    }
}
