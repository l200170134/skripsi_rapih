<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pribadi extends CI_Controller
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
        $data['judul'] = 'Data Pribadi';
        $data['karyawan'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->result_array();
        $nip = $this->session->userdata('nip_status');
        $data['status'] = $this->db->get_where('tb_status_data', ['nip' => $nip])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_pribadi', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function data_pribadi($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['karyawan'] = $this->db->get_where('user', ['nip' => $nip])->result_array();
        $this->session->set_userdata('nip_status', $nip);

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Data_pribadi/data_pribadi/' . $nip . '/';
        $config['total_rows'] = $this->page->getStatusRows($nip);
        $config['per_page'] = 4;
        // inisiasi
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_status', $data['start']);
        $data['status'] = $this->page->getStatus($nip, $config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_pribadi', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function status_karyawan_form($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['nip_karyawan'] = $this->db->get_where('user', ['nip' => $nip])->result_array();
        $data['nip'] = $nip;
        $data['status'] = $this->db->get_where('tb_status_data', ['nip' => $nip])->result_array();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_riwayat_form', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function status_karyawan_tambah($nip_get)
    {
        $nip            = $this->input->post('nip');
        $status         = $this->input->post('status');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_mulai      = date('Y-m-d', strtotime($tgl_mulai));
        $tgl_akhir      = $this->input->post('tgl_akhir');
        $tgl_akhir      = date('Y-m-d', strtotime($tgl_akhir));

        $data = array(
            'nip'        => $nip,
            'status'    => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
        );

        $this->hrd_model->input($data, 'tb_status_data');
        redirect('Data_pribadi/data_pribadi/' . $nip_get);
    }

    public function status_karyawan_update($id_status)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $where = array('id_status' => $id_status);
        $data['update'] = $this->hrd_model->update($where, 'tb_status_data')->result();
        $data['status'] = $this->db->get_where('tb_status_data', ['id_status' => $id_status])->row_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_riwayat_update', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function status_karyawan_update_proses($nip_get)
    {

        $id_status      = $this->input->post('id_status');

        $status         = $this->input->post('status');
        $nip            = $this->input->post('nip');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_mulai      = date('Y-m-d', strtotime($tgl_mulai));
        $tgl_akhir      = $this->input->post('tgl_akhir');
        $tgl_akhir      = date('Y-m-d', strtotime($tgl_akhir));

        echo $nip_get;
        $data = array(
            'id_status'        => $id_status,
            'nip'       => $nip,
            'status'    => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
        );

        $where = array(
            'id_status'        => $id_status
        );

        $this->hrd_model->update_proses($where, $data, 'tb_status_data');
        $link = $this->session->userdata('link_status');
        redirect('Data_pribadi/data_pribadi/' . $nip_get . '/' . $link);
    }
    public function status_karyawan_hapus($id_status)
    {
        $nip = $this->session->userdata('nip_status');
        $where = array('id_status' => $id_status);
        $this->hrd_model->delate($where, 'tb_status_data');
        $link = $this->session->userdata('link_status');
        redirect('Data_pribadi/data_pribadi/' . $nip . '/' . $link);
    }
}
