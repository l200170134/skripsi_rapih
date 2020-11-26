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

    public function hrd_input($data,$table)
	{
		$this->db->insert($table,$data);
    }
}
