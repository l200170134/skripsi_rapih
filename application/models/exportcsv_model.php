<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Exportcsv_model extends CI_Model
{
    public function exportReport($nip, $tanggal)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC")->result_array();
    }
}
