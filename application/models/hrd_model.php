<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hrd_model extends CI_Model
{
    public function hrd_view_divisi()
    {
        return $this->db->get('tb_divisi');
    }

    public function hrd_view_user()
    {
        return $this->db->get('user');
    }

    public function hrd_view_role()
    {
        return $this->db->get('user_role');
    }

    public function input($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function input_status($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_proses($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delate($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getRincianGaji($id_gaji)
    {
        return $this->db->get_where('tb_strukturgaji', ['id_strukturGaji' => $id_gaji])->row_array();
    }

    public function update_gaji($nip, $tanggal_akhir, $tahun_awal)
    {
        $this->db->set('tahun_akhir', $tahun_awal);
        $this->db->set('bulan_akhir', $tanggal_akhir);
        $this->db->set('status', 1);
        $this->db->where('nip', $nip);
        $this->db->where('bulan_akhir', 0);
        $this->db->update('tb_strukturgaji');
    }
    public function updategaji_update($nip, $bulan_mulai, $tahun_awal)
    {
        // $this->db->set('bulan_akhir', $bulan_mulai);
        // $this->db->set('tahun_akhir', $tahun_awal);
        // $this->db->where('nip', $nip);
        // $this->db->where('status', 1);
        // $this->db->LIMIT(1);
        $this->db->query(" UPDATE tb_strukturgaji SET bulan_akhir='$bulan_mulai', tahun_akhir='$tahun_awal' WHERE nip='$nip' AND status=1 ORDER BY id_strukturGaji DESC LIMIT 1");

    }
}
