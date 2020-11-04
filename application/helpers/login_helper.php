<?php
function cek_login()
{
    $ci = get_instance();
    // cek dia udah login atau belum
    if (!$ci->session->userdata('username')) {
        redirect('home/Login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        // mengambil url
        $a = $ci->uri->segment(1);
        $b = $ci->uri->segment(2);
        $c = $ci->uri->segment(3);
        $menu = $a . '/' . $b . '/' . $c;


        // mengambil id user_sidebar berdasrkan url menu
        $queryMenu = $ci->db->get_where('user_page', ['url_page' => $menu])->row_array();
        $id_page = $queryMenu['id_page'];

        $userAccess = $ci->db->get_where('user_access_page', ['role_id' => $role_id, 'id_page' => $id_page]);
        if ($userAccess->num_rows() < 1) {
            // redirect('home/Login/blocked');
        } else {
        }
    }
    // jika udah, cek role dia apakah boleh akses atau belum
}
