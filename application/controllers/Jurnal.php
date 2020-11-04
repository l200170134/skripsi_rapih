<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
  public function jurnal()
  {
      // mengambil data dari database berdasarakan session yang sudah terbentuk
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
      $data['jurnal'] = $this->leader_model->jurnal_tampil()->result();
      $data['judul'] = 'Leader Jurnal';

      $this->load->view('_partials/header');
      $this->load->view('_partials/navbar');
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('halaman/v_jurnal', $data);
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
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('halaman/v_jurnal_form');
      $this->load->view('_partials/footer');
      $this->load->view('_partials/js');
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
      redirect('Jurnal/jurnal');
  }
  public function jurnal_proses_hapus($id)
  {
      $where = array('id' => $id);
      $this->karyawan_model->daily_hapus($where, 'tb_ldr_jurnal');
      redirect("Jurnal/jurnal");
  }
}
