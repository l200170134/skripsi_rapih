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
        $nip = $this->session->userdata('nip');
        $data['karyawan'] = $this->db->get_where('user', ['nip' => $nip])->result_array();
        // $nip = $this->session->userdata('nip_status');
        $data['status_p'] = $this->db->order_by('id_status', 'desc')->get_where('tb_status_data', ['nip' => $nip], 1)->row_array();
        $data['status'] = $this->db->get_where('tb_status_data', ['nip' => $nip])->result_array();
        $data['back'] = 0;

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url'] = base_url() . 'Data_pribadi/index/';
        $config['total_rows'] = $this->page->getStatusRows($nip);
        $config['per_page'] = 4;
        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['attributes']       = array('class' => 'page-link');
        // inisiasi
        $this->pagination->initialize($config);
        // $start = $this->uri->segment(4);
        $data['start'] = $this->uri->segment(3);
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
    public function data_pribadi($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $sidebar = $this->session->userdata('sidebar_leader');
        if ($sidebar == 1) {
            $data['judul'] = 'Data_pribadi';
        } else {
            $data['judul'] = 'Data Karyawan';
        }
        $data['karyawan'] = $this->db->get_where('user', ['nip' => $nip])->result_array();
        $data['status_p'] = $this->db->get_where('tb_status_data', ['nip' => $nip, 'aktivasi' => 0], 1)->row_array();
        $this->session->set_userdata('nip_status', $nip);
        $data['back'] = 1;

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url']         = base_url() . 'Data_pribadi/data_pribadi/' . $nip . '/';
        $config['total_rows']       = $this->page->getStatusRows($nip);
        $config['per_page']         = 4;
        $config['first_url']        = '0';
        $config['uri_segment']      = '4';
        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['attributes']       = array('class' => 'page-link');
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

        $aktivasi       = 1;
        $this->db->query("UPDATE tb_status_data SET aktivasi = '$aktivasi'  WHERE nip = $nip");
        $this->hrd_model->input($data, 'tb_status_data');
        $this->session->set_flashdata(
            'tambahStatus',
            '<div class="alert alert-success alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Status Pegawai Berhasil Ditambahkan !</center>
        </div>'
        );
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
        // $nip            = $this->input->post('nip');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_mulai      = date('Y-m-d', strtotime($tgl_mulai));
        $tgl_akhir      = $this->input->post('tgl_akhir');
        $tgl_akhir      = date('Y-m-d', strtotime($tgl_akhir));

        $data = array(
            'id_status' => $id_status,
            // 'nip'       => $nip,
            'status'    => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
        );

        $where = array(
            'id_status'        => $id_status
        );

        $this->hrd_model->update_proses($where, $data, 'tb_status_data');
        $link = $this->session->userdata('link_status');
        $this->session->set_flashdata(
            'ubahStatus',
            '<div class="alert alert-info alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Status Pegawai Berhasil Diperbaharui !</center>
        </div>'
        );
        redirect('Data_pribadi/data_pribadi/' . $nip_get . '/' . $link);
    }
    public function status_karyawan_hapus($id_status)
    {
        $nip = $this->session->userdata('nip_status');
        $where = array('id_status' => $id_status);
        $this->hrd_model->delate($where, 'tb_status_data');
        $link = $this->session->userdata('link_status');
        $this->session->set_flashdata(
            'hapusStatus',
            '<div class="alert alert-warning alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Status Pegawai berhasil Dihapus !</center>
        </div>'
        );
        redirect('Data_pribadi/data_pribadi/' . $nip . '/' . $link);
    }
}
