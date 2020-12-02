<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Leader_model extends CI_Model
{

	public function daily_tampil()
	{
		return $this->db->get('tb_ldr_daily');
	}

	public function daily_input($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function daily_hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function daily_update($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function daily_update_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function jurnal_tampil()
	{
		return $this->db->get('tb_ldr_jurnal');
	}
	public function jurnal_input($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function jurnal_hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function kinerja_input($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function kinerja_hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function kinerja_update($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function kinerja_update_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function kinerja_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tb_ldr_kinerja');
		$this->db->like('nama_karyawan', $keyword);
		$this->db->or_like('tahun', $keyword);
		$this->db->or_like('point', $keyword);
		return $this->db->get()->result();
	}
}
