<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan_model extends CI_Model
{
	public function daily_tampil()
	{
		return $this->db->get('tb_kyn_daily');
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
}
