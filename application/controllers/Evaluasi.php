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
        $data['list_user'] = $this->db->get_where('user', ['id_divisi' => $id_divisi])->result_array();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_kpivalue_list');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function index_karyawan()
    {
        $nip = $this->session->userdata('nip');
        $data['judul'] = "Evaluasi";
        $data['user'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
       
        $data['value'] = $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY id_nilai ASC")->result_array();
        


    
        //$data['kpi_value'] = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();

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
    $id_kpi               = $this->input->post('id_kpi');

    $data=array(
        'pertanyaan'        => $pertanyaan,
        'id_divisi'         => $id_divisi,
        'id_kpi'          => $id_kpi,
        );

    $this->hrd_model->input($data, 'tb_kpi');
    redirect('Evaluasi/kpi/' . $id);
    }

    public function kpi_hapus_proses($id_pertanyaan)
    {
        $id_divisi = $this->session->userdata('id_divisi');
        $where = array('id_pertanyaan' => $id_pertanyaan);
        $this->hrd_model->delate($where, 'tb_kpi');
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
    $id_kpi               = $this->input->post('id_kpi');

    $data = array(
        'pertanyaan'        => $pertanyaan,
        'id_divisi'         => $id_divisi,
        'id_kpi'          => $id_kpi,
        );

    $where = array(
        'id_pertanyaan'        => $id_pertanyaan
    );    

    $this->hrd_model->update_proses($where, $data, 'tb_kpi');
    redirect('Evaluasi/kpi/' . $id_divisi);
    }

    public function kpivalue($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        //$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Kinerja";
        $data['user'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
        //$data['value'] = $this->db->get_where('tb_kpi_value', ['nip' => $nip])->result_array();

        //$data['bulan'] = $this->db->query("SELECT DISTINCT bulan, tahun FROM tb_kpi_value WHERE nip = '$nip'")->result_array();
        //AVG(value) AS rata
        //$data['bulan'] = $this->db->query("SELECT DISTINCT bulan, tahun FROM tb_kpi_value WHERE nip = '$nip'")->result_array();
        $data['value'] = $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY id_nilai ASC")->result_array();
        


    
        //$data['kpi_value'] = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();

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
        $data['user'] = $this->db->get_where('user', ['nip' => $nip])->row_array();
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
        foreach($kpi_data as $kpi){
        $nip            = $this->input->post('nip');
        $id_divisi      = $this->input->post('id_divisi');
        $bulan          = $this->input->post('bulan');
        $tahun          = $this->input->post('tahun');
        $value         = $this->input->post($kpi['id_pertanyaan']);

        $data = array (
            'nip'           => $nip,
            'id_divisi'     => $id_divisi,
            'bulan'         => $bulan,
            'tahun'         => $tahun,
            'value'        => $value,

        );

        $this->hrd_model->input($data, 'tb_kpi_value');
        }
        $get = $this->db->get_where('user', ['id_divisi' => $id_divisi])->row_array();

        redirect('Evaluasi/kpivalue/' . $get['nip']);
    }
    
    public function kpivalue_hapus_proses($nip, $bulan, $tahun)
    {
        //$where = array('id_pertanyaan' => $id_pertanyaan);
        //$this->hrd_model->delate($where, 'tb_kpi');

        $this->db->query("DELETE FROM tb_kpi_value WHERE nip='$nip' AND bulan = '$bulan' AND tahun = '$tahun' ");
        redirect('Evaluasi/kpivalue/' . $nip);
    }
}
