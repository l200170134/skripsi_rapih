<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hrd_model extends CI_Model
{
    public function hrd_view_divisi()
    {
        return $this->db->get('tb_divisi');
    }

    public function hrd_view_role()
    {
        return $this->db->get('user_role');
    }

    public function input($data,$table)
	{
		$this->db->insert($table,$data);
    }

    public function input_status($data,$table)
    {
        $this->db->insert($table,$data);
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
}
