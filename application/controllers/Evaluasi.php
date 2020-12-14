<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
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
        $data['judul'] = "Kinerja";
        $id_divisi = $this->session->userdata('divisi');
        $nip = $this->session->userdata('nip');
        $data['list_user'] = $this->db->get_where('user', ['id_divisi' => $id_divisi, 'nip != ' => $nip])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue_list');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function index_direksi($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Data Karyawan";
        //$id_divisi = $this->session->userdata('divisi');
        $nip = $this->session->userdata('nip');
        $data['list_user'] = $this->db->get_where('user', ['id_divisi' => $id_divisi, 'nip != ' => $nip])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue_list');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    

    public function index_karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $nip = $this->session->userdata('nip');
        $data['judul'] = "Evaluasi";
        $data['user_data'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
        $data['back']   = 0;

        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url']         = base_url() . 'Evaluasi/index_karyawan/';
        $config['total_rows']       = $this->page->getKpiKarRows($nip);
        $config['per_page']         = 10;
        $config['first_url']        = '0';
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
        // inisiasi pagination
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_kpi_kar', $data['start']);
        $data['value'] = $this->page->getKpiKar($nip, $config['per_page'], $data['start']);
        // END PAGIANTION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kpi($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Data Karyawan";
        $data['divisi'] = $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->row_array();
        $data['kpi_data'] = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();
        $data['id_divisi'] = $id_divisi;

        // // PAGINATION
        // $this->load->model('Pagination_model', 'page');
        // // config
        // $config['base_url']         = base_url() . 'Evaluasi/kpi/' . $id_divisi . '/';
        // $config['total_rows']       = $this->page->getKpiRows($id_divisi);
        // $config['per_page']         = 5;
        // $config['first_url']        = '0';
        // $config['uri_segment']      = '4';
        // $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav>';
        // $config['first_link']       = 'First';
        // $config['first_tag_open']   = '<li class="page-item">';
        // $config['first_tag_close']  = '</li>';
        // $config['last_link']        = 'Last';
        // $config['last_tag_open']    = '<li class="page-item">';
        // $config['last_tag_close']   = '</li>';
        // $config['next_link']        = '&raquo';
        // $config['next_tag_open']    = '<li class="page-item">';
        // $config['next_tag_close']   = '</li>';
        // $config['prev_link']        = '&laquo';
        // $config['prev_tag_open']    = '<li class="page-item">';
        // $config['prev_tag_close']   = '</li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '</span></li>';
        // $config['num_tag_open']     = '<li class="page-item">';
        // $config['num_tag_close']    = '</li>';
        // $config['attributes']       = array('class' => 'page-link');
        // // inisiasi pagination
        // $this->pagination->initialize($config);
        // $start = $this->uri->segment(4);
        // $data['start'] = 0 + $start;
        // $this->session->set_userdata('link_kpi', $data['start']);
        // $data['kpi_data'] = $this->page->getKpi($id_divisi, $config['per_page'], $data['start']);
        // // END PAGIANTION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kpi_form($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Data Karyawan";
        $data['divisi'] = $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->row_array();
        $this->session->set_userdata('id_pertanyaan', $id_divisi);


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpi_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kpi_tambah_proses($id)
    {
        $pertanyaan             = $this->input->post('pertanyaan');
        $id_divisi              = $this->input->post('id_divisi');
        // $id_kpi                 = $this->input->post('id_kpi');

        $data = array(
            'pertanyaan'        => $pertanyaan,
            'id_divisi'         => $id_divisi
            // 'id_kpi'            => $id_kpi,
        );

        $this->hrd_model->input($data, 'tb_kpi');
        $this->session->set_flashdata(
            'tambahKpiDiv',
            '<div class="alert alert-success alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>KPI Pegawai Berhasil Ditambahkan !</center>
        </div>'
        );
        redirect('Evaluasi/kpi/' . $id);
    }

    public function kpi_hapus_proses($id_pertanyaan)
    {
        $id_divisi = $this->session->userdata('id_divisi');
        $where = array('id_pertanyaan' => $id_pertanyaan);
        $this->hrd_model->delate($where, 'tb_kpi');
        $this->session->set_flashdata(
            'hapusKpiDiv',
            '<div class="alert alert-warning alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>KPI Pegawai Berhasil Dihapus !</center>
        </div>'
        );
        redirect('Evaluasi/kpi/' . $id_divisi);
    }

    public function kpi_update($id_pertanyaan)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Data Karyawan";
        $data['kpi_update'] = $this->db->get_where('tb_kpi', ['id_pertanyaan' => $id_pertanyaan])->row_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpi_update');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kpi_update_proses()
    {
        $id_pertanyaan          = $this->input->post('id_pertanyaan');
        $pertanyaan             = $this->input->post('pertanyaan');
        $id_divisi              = $this->input->post('id_divisi');

        $data = array(
            'pertanyaan'        => $pertanyaan,
            'id_divisi'         => $id_divisi
        );

        $where = array(
            'id_pertanyaan'        => $id_pertanyaan
        );

        $this->hrd_model->update_proses($where, $data, 'tb_kpi');
        $this->session->set_flashdata(
            'ubahKpiDiv',
            '<div class="alert alert-info alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>KPI Pegawai Berhasil Diperbaharui !</center>
        </div>'
        );
        redirect('Evaluasi/kpi/' . $id_divisi);
    }

    public function kpivalue($nip)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $sidebar = $this->session->userdata('sidebar_leader');
        if($sidebar==1){
            $data['judul'] = "Kinerja";
        }else{
            $data['judul'] = "Data Karyawan";
        };
        
        $data['user_data'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
        $data['back']   = 1;



        // PAGINATION
        $this->load->model('Pagination_model', 'page');
        // config
        $config['base_url']         = base_url() . 'Evaluasi/kpivalue/' . $nip . '/';
        $config['total_rows']       = $this->page->getKpiRows($nip);
        $config['per_page']         = 5;
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
        // inisiasi pagination
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_kpi', $data['start']);
        $data['value'] = $this->page->getKpi($nip, $config['per_page'], $data['start']);
        // END PAGIANTION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function kpivalue_form($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Kinerja";
        $data['user_data'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
        //var_dump($data['user_data']);die;
        //$data['kpi_value'] = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function kpivalue_tambah_proses($id_divisi)
    {
        $kpi_data = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();
        foreach ($kpi_data as $kpi) {
            $nip            = $this->input->post('nip');
            $id_divisi      = $this->input->post('id_divisi');
            $bulan          = $this->input->post('bulan');
            $tahun          = $this->input->post('tahun');
            $value         = $this->input->post($kpi['id_pertanyaan']);

            $data = array(
                'nip'           => $nip,
                'id_divisi'     => $id_divisi,
                'bulan'         => $bulan,
                'tahun'         => $tahun,
                'value'         => $value,

            );

            $this->hrd_model->input($data, 'tb_kpi_value');
        }
        //$get = $this->db->get_where('user', ['id_divisi' => $id_divisi])->row_array();
        $this->session->set_flashdata(
            'tambahKpi',
            '<div class="alert alert-success alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Key Performance Index Berhasil Ditambahkan !</center>
        </div>'
        );
        redirect('Evaluasi/kpivalue/' . $nip);
    }

    public function kpivalue_hapus_proses($nip, $bulan, $tahun)
    {
        //$where = array('id_pertanyaan' => $id_pertanyaan);
        //$this->hrd_model->delate($where, 'tb_kpi');

        $this->db->query("DELETE FROM tb_kpi_value WHERE nip='$nip' AND bulan = '$bulan' AND tahun = '$tahun' ");
        $this->session->set_flashdata(
            'hapusKpi',
            '<div class="alert alert-warning alert-dismissible m-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Key Performance Index Berhasil Dihapus !</center>
        </div>'
        );
        redirect('Evaluasi/kpivalue/' . $nip);
    }
}
