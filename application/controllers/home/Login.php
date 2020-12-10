<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('home/login');
        } else {
            // Dijalankan ketika form validationnya berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true)); //untuk mencegah XSS
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            // usernya ditemukan
            if ($user['password'] == $password) { //cek apakah passwordnya sama
                if ($user['role_id'] == 1) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'nip' => $user['nip'],
                        'divisi' => $user['id_divisi']
                    ];

                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else if ($user['role_id'] == 2) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'nip' => $user['nip'],
                        'divisi' => $user['id_divisi']
                    ];

                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else if ($user['role_id'] == 3) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'nip' => $user['nip'],
                        'divisi' => $user['id_divisi']
                    ];

                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else if ($user['role_id'] == 4) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'nip' => $user['nip'],
                        'divisi' => $user['id_divisi']
                    ];

                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tak termasuk level manapun!</div>');
                    redirect('home/Login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                redirect('home/Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan!</div>');
            redirect('home/Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('divisi');
        $this->session->unset_userdata('link');
        $this->session->unset_userdata('link_kar');
        $this->session->unset_userdata('nip_status');
        $this->session->unset_userdata('link_status');
        $this->session->unset_userdata('nip_gaji');
        $this->session->unset_userdata('link_gaji');
        $this->session->unset_userdata('link_jurnal');
        $this->session->unset_userdata('nip_jurnal');
        $this->session->unset_userdata('link_kinerja');
        $this->session->unset_userdata('link_mon');
        $this->session->unset_userdata('link_mon');
        $this->session->unset_userdata('id_daily');

        $this->session->set_flashdata('message', '<div class="alert alert-warning text-white" role="alert">Anda telah logout!</div>');
        redirect('home/Login');
    }

    public function blocked()
    {
        $this->load->view('home/blocked');
    }
}
