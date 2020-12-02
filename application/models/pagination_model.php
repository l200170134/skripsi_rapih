<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pagination_model extends CI_Model
{
    // Halaman daily
    public function getDaily($nip, $tanggal, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE (nip = $nip AND status != 'Approve') OR (nip = $nip AND tgl = '$tanggal' ) ORDER BY tgl ASC LIMIT $offset,$limit ")->result_array();
    }

    public function getDailyRows($nip, $tanggal)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE (nip = $nip AND status != 'Approve') OR (nip = $nip AND tgl = '$tanggal' ) ORDER BY tgl ASC")->num_rows();
    }

    // Halaman report daily
    public function getReportDaily($nip, $tanggal, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC LIMIT $offset,$limit")->result_array();
    }
    public function getReportRows($nip, $tanggal)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC")->num_rows();
    }

    // Halaman monitoring daily activity
    public function getMonitoringDaily($nip, $tanggal, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE (nip = $nip AND status != 'Approve') OR (nip = $nip AND tgl = '$tanggal' ) ORDER BY tgl ASC LIMIT $offset,$limit ")->result_array();
    }

    public function getMonitoringRows($nip, $tanggal)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE (nip = $nip AND status != 'Approve') OR (nip = $nip AND tgl = '$tanggal' ) ORDER BY tgl ASC")->num_rows();
    }

    // Halaman monitoring report daily
    public function getMonitoringReport($nip, $tanggal, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC LIMIT $offset,$limit")->result_array();
    }
    public function getMonReportRows($nip, $tanggal)
    {
        return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC")->num_rows();
    }
}
