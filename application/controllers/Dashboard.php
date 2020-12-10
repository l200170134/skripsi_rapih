<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['judul'] = 'Dashboard';
        $nip = $this->session->userdata('nip');
        $id_divisi = $this->session->userdata('divisi');

        // Karyawan
        $date = date('Y-m-d');
        $data['select'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE nip = '$nip' AND tgl = '$date' ")->num_rows();
        $data['kpi'] = $this->db->query("SELECT AVG(value) FROM tb_kpi_value as rata WHERE nip = '$nip'")->row_array();
        $data['approve'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE  nip = '$nip' AND status ='Pending'")->num_rows();

        //Leader
        $data['karyawan'] = $this->db->query(" SELECT * FROM user WHERE id_divisi = '$id_divisi'")->num_rows();
        $data['pending'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE id_divisi = '$id_divisi' AND nip !='nip' AND status ='Pending'")->num_rows();
        $data['belum'] = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE  nip = '$nip' AND hasil !='Selesai'")->num_rows();

        //HRD
        $data['user_hrd'] = $this->db->query("SELECT * FROM user")->num_rows();
        $data['user_male'] = $this->db->query("SELECT * FROM user WHERE jk='Laki-Laki'")->num_rows();
        $data['user_female'] = $this->db->query("SELECT * FROM user WHERE jk='Perempuan'")->num_rows();

        //HRR Grafik
        //$divisi = $this->db->query("SELECT id_divisi FROM tb_divisi")->row_array();
        $data['divisi'] = $this->hrd_model->hrd_view_divisi()->result_array();
        
        // $divisi = $this->hrd_model->hrd_view_divisi()->result_array();
        // foreach ($divisi as $div):
        //     $get= $div['id_divisi'];
        //     echo 'Divisi: ';
        //     echo $get;
        // $get_id = $this->db->query("SELECT COUNT(*) as jumlah from user WHERE id_divisi='$get'")->result_array();
        // foreach ($get_id as $get):
        //     echo 'Jumlah: ';
        //     echo $get['jumlah'];
        // endforeach; 
        // endforeach;
        

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_dashboard', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
        $this->load->view('_partials/js_hrd');
        $this->load->view('_partials/js_karyawan');
    }
}
