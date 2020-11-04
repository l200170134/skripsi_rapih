<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja extends CI_Controller
{
  public function kinerja()
  {
      // mengambil data dari database berdasarakan session yang sudah terbentuk
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
      $data['judul'] = 'Leader Kinerja';
      $data['kinerja'] = $this->leader_model->kinerja_tampil()->result();

      $this->load->view('_partials/header');
      $this->load->view('_partials/navbar');
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('halaman/v_kinerja');
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
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('halaman/v_kinerja_update');
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
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('halaman/v_kinerja_form');
      $this->load->view('_partials/footer');
      $this->load->view('_partials/js');
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
      redirect('Kinerja/kinerja');
  }
  public function kinerja_proses_hapus($id)
  {
      $where = array('id' => $id);
      $this->leader_model->kinerja_hapus($where, 'tb_ldr_kinerja');
      redirect("Kinerja/kinerja");
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
      redirect('Kinerja/kinerja');
  }
  public function kinerja_search()
  {
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $keyword = $this->input->post('keyword');
      $data['kinerja'] = $this->leader_model->kinerja_keyword($keyword);
      $this->load->view('_partials/header');
      $this->load->view('_partials/navbar');
      $this->load->view('_partials/sidebar', $data);
      $this->load->view('leader/kinerja');
      $this->load->view('_partials/footer');
      $this->load->view('_partials/js');
  }

}
