<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_karyawan extends CI_Controller
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
        $data['judul'] = 'Data Karyawan';
        $data['divisi'] = $this->hrd_model->hrd_view_divisi()->result();

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_data_karyawan', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function detail_karyawan($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['id_divisi'] = $id_divisi;
        $this->session->unset_userdata('divisi_page');
        $this->session->set_userdata('divisi_page', $id_divisi);

        // PAGINATION
        $this->load->model('Pagination_model', 'pages');
        // config
        $config['base_url'] = base_url() . 'Data_karyawan/detail_karyawan/' . $id_divisi . '/';
        $config['total_rows'] = $this->pages->getKaryawanRows($id_divisi);;
        $config['per_page'] = 5;
        // inisiasi pagination
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data['start'] = 0 + $start;
        $this->session->set_userdata('link_kar', $data['start']);
        $data['divisi'] = $this->pages->getKaryawan($id_divisi, $config['per_page'], $data['start']);
        // END PAGIANTION

        $data['nama_divisi'] = $this->pages->getNamaDivisi($id_divisi);

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_data_karyawan_detail', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function tambah_data_karyawan($id_divisi)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $data['divisi'] = $this->hrd_model->hrd_view_divisi()->result();
        $data['role'] = $this->hrd_model->hrd_view_role()->result();
        $data['nama_divisi'] = $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->result_array();
        $data['id_divisi'] = $id_divisi;

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_karyawan_tambah', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function update_data_karyawan($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Karyawan';
        $where = array('nip' => $nip);
        $data['update'] = $this->hrd_model->update($where, 'user')->result();


        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar',  $data);
        $this->load->view('halaman/v_data_karyawan_update', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function detail_karyawan_update($nip)
    {
        $id_user        = $this->input->post('id_user');
        $nama           = $this->input->post('nama');
        $nip_new        = $this->input->post('nip');
        $id_divisi      = $this->input->post('id_divisi');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $role_id        = $this->input->post('role_id');
        $is_active      = $this->input->post('is_active');
        $email          = $this->input->post('email');

        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $tgl_lahir      = date('Y-m-d', strtotime($tgl_lahir));
        $no_hp          = $this->input->post('no_hp');
        $no_hp_kel      = $this->input->post('no_hp_kel');
        $bank           = $this->input->post('bank');
        $no_rek         = $this->input->post('no_rek');
        $npwp           = $this->input->post('npwp');
        $perusahaan     = $this->input->post('perusahaan');
        $office         = $this->input->post('office');
        $pernikahan     = $this->input->post('pernikahan');
        $alamat         = $this->input->post('alamat');
        $alamat_ktp     = $this->input->post('alamat_ktp');
        $jabatan        = $this->input->post('jabatan');
        $nik            = $this->input->post('nik');
        $jk             = $this->input->post('jk');
        $image          = $this->input->post('image');
        // $image          = $_FILES['image'];
        // if ($image =''){

        // }else{

        //     $config['upload_path']      = './assets/image';
        //     $config['allowed_types']    = 'jpg|png|jpeg';

        //     $this->load->library('upload',$config);
        //     if(!$this->upload->do_upload('image')){
        //         echo "Upload Gagal"; die();
        //     }else{
        //         $image=$this->upload->data('file_name');
        //     }

        // }



        $data = array(
            'nip'           => $nip_new,
            'username'      => $username,
            'password'      => $password,
            'role_id'       => $role_id,
            'is_active'     => $is_active,
            'nama'          => $nama,
            'id_divisi'     => $id_divisi,
            'image'         => $image,
            'email'         => $email,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'no_hp'         => $no_hp,
            'no_hp_kel'     => $no_hp_kel,
            'bank'          => $bank,
            'no_rek'        => $no_rek,
            'npwp'          => $npwp,
            'perusahaan'    => $perusahaan,
            'office'        => $office,
            'pernikahan'    => $pernikahan,
            'alamat'        => $alamat,
            'alamat_ktp'    => $alamat_ktp,
            'jabatan'       => $jabatan,
            'nik'           => $nik,
            'jk'            => $jk,

        );

        $where = array(
            'nip'        => $nip
        );

        $this->hrd_model->update_proses($where, $data, 'user');

        $link = $this->session->userdata('link_kar');
        redirect('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link);
    }

    public function detail_karyawan_tambah()
    {
        $nama       = $this->input->post('nama');
        $nip        = $this->input->post('nip');
        $id_divisi  = $this->input->post('id_divisi');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $role_id    = $this->input->post('role_id');
        $is_active  = $this->input->post('is_active');
        $email      = $this->input->post('email');

        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $tgl_lahir  = date('Y-m-d', strtotime($tgl_lahir));
        $no_hp      = $this->input->post('no_hp');
        $no_hp_kel  = $this->input->post('no_hp_kel');
        $bank       = $this->input->post('bank');
        $no_rek     = $this->input->post('no_rek');
        $npwp       = $this->input->post('npwp');
        $perusahaan = $this->input->post('perusahaan');
        $office     = $this->input->post('office');
        $pernikahan = $this->input->post('pernikahan');
        $alamat     = $this->input->post('alamat');
        $alamat_ktp = $this->input->post('alamat_ktp');
        $jabatan    = $this->input->post('jabatan');
        $image      = $this->input->post('image');
        $nik        = $this->input->post('nik');
        $jk         = $this->input->post('jk');
        $image          = $_FILES['image'];
        if ($image = '') {
        } else {
            $config['upload_path']      = './assets/image';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Gagal";
                die();
            } else {
                $image = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nip'           => $nip,
            'username'      => $username,
            'password'      => $password,
            'role_id'       => $role_id,
            'is_active'     => $is_active,
            'nama'          => $nama,
            'id_divisi'     => $id_divisi,
            'image'         => $image,
            'email'         => $email,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'no_hp'         => $no_hp,
            'no_hp_kel'     => $no_hp_kel,
            'bank'          => $bank,
            'no_rek'        => $no_rek,
            'npwp'          => $npwp,
            'perusahaan'    => $perusahaan,
            'office'        => $office,
            'pernikahan'    => $pernikahan,
            'alamat'        => $alamat,
            'alamat_ktp'    => $alamat_ktp,
            'jabatan'       => $jabatan,
            'nik'           => $nik,
            'jk'            => $jk,
        );

        $this->hrd_model->input($data, 'user');
        $id = $data['id_divisi'];
        redirect('Data_karyawan/detail_karyawan/' . $id);
    }
    public function hapus_data_karyawan($nip)
    {
        $id_divisi = $this->session->userdata('id_divisi');
        //var_dump($id_divisi);
        $where = array('nip' => $nip);
        $this->hrd_model->delate($where, 'user');
        redirect('Data_karyawan/detail_karyawan/' . $id_divisi);
    }
}
