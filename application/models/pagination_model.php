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
    public function getReportDaily($nip, $tanggal, $limit, $offset, $tgl_awal, $tgl_akhir)
    {
        if ($tgl_awal && $tgl_akhir) {
            return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' AND tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl DESC LIMIT $offset,$limit")->result_array();
        } else {
            return $this->db->query("SELECT * FROM tb_ldr_daily WHERE nip = $nip AND status = 'Approve' AND tgl != '$tanggal' ORDER BY tgl DESC LIMIT $offset,$limit")->result_array();
        }
    }

    // Halaman monitoring Utama
    public function getMonitoringMembers($id_divisi, $username, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM user WHERE id_divisi = '$id_divisi' AND username != '$username' LIMIT $offset,$limit ")->result_array();
    }
    public function getMemberRows($id_divisi, $username)
    {
        return $this->db->get_where('user', ['id_divisi' => $id_divisi, 'username !=' => $username])->num_rows();
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


    // Halaman Evaluasi
    public function getEvaluasi($limit, $offset)
    {
        return;
    }
    public function getEvaluasiRows()
    {
        return;
    }

    // Halaman Kinerja
    public function getKinerja($limit, $offset)
    {
        return $this->db->get('tb_ldr_kinerja', $limit, $offset)->result_array();
    }
    public function getKinerjaRows()
    {
        return $this->db->get('tb_ldr_kinerja')->num_rows();
    }

    // Halaman utama Jurnal
    public function getEmployes($id_divisi, $username, $limit, $offset)
    {
        return $this->db->get_where('user', ['id_divisi' => $id_divisi, 'username !=' => $username], $limit, $offset)->result_array();
    }
    public function getEmployesRows($id_divisi, $username)
    {
        return $this->db->get_where('user', ['id_divisi' => $id_divisi, 'username !=' => $username])->num_rows();
    }

    // Halaman list jurnal karyawan
    public function getJurnal($nip, $limit, $offset)
    {
        return $this->db->query("SELECT * FROM tb_ldr_jurnal WHERE nip = $nip ORDER BY id DESC LIMIT $offset, $limit")->result_array();
    }
    public function getJurnalRows($nip)
    {
        return $this->db->query("SELECT * FROM tb_ldr_jurnal WHERE nip = $nip")->num_rows();
    }

    // Halaman Data list karyawan
    public function getKaryawanLeader($id_divisi, $nip_leader, $limit, $offset)
    {
        return $this->db->order_by('role_id', 'desc')->get_where('user', ['id_divisi' => $id_divisi], $limit, $offset)->result_array();
    }
    public function getKaryawanLeaderRows($id_divisi)
    {
        return $this->db->get_where('user', ['id_divisi' => $id_divisi])->num_rows();
    }
    // Halaman Data list karyawan
    public function getKaryawan($id_divisi, $limit, $offset)
    {
        return $this->db->order_by('role_id', 'desc')->get_where('user', ['id_divisi' => $id_divisi], $limit, $offset)->result_array();
    }
    public function getKaryawanRows($id_divisi)
    {
        return $this->db->get_where('user', ['id_divisi' => $id_divisi])->num_rows();
    }
    public function getNamaDivisi($id_divisi)
    {
        return $this->db->get_where('tb_divisi', ['id_divisi' => $id_divisi])->result_array();
    }

    // Halaman Gaji Karyawan
    public function getGaji($nip, $limit, $offset)
    {
        return $this->db->get_where('tb_gaji', ['nip' => $nip], $limit, $offset)->result_array();
    }
    public function getGajiRows($nip)
    {
        return $this->db->get_where('tb_gaji', ['nip' => $nip])->num_rows();
    }

    // Halaman Status Karyawan
    public function getStatus($nip, $limit, $offset)
    {
        return $this->db->order_by('id_status', 'DESC')->get_where('tb_status_data', ['nip' => $nip], $limit, $offset)->result_array();
    }
    public function getStatusRows($nip)
    {
        return $this->db->get_where('tb_status_data', ['nip' => $nip])->num_rows();
    }

    // halaman evaluasi
    public function getKpi($nip, $limit, $offset)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY tahun DESC,  bulan DESC LIMIT $offset, $limit")->result_array();
    }
    public function getKpiRows($nip)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun")->num_rows();
    }

    // halaman KPI Karyawan
    public function getKpiKar($nip, $limit, $offset)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY id_nilai DESC LIMIT $offset,$limit")->result_array();
    }
    public function getKpiKarRows($nip)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY id_nilai ASC")->num_rows();
    }

    // halaman KPI VALUE
    public function getKpiValue($nip, $limit, $offset)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY bulan, tahun ASC LIMIT $offset, $limit")->result_array();
    }
    public function getKpiValueRows($nip)
    {
        return $this->db->query("SELECT nip, bulan, tahun, AVG(value) as rata FROM tb_kpi_value WHERE nip = '$nip' GROUP BY nip, bulan, tahun ORDER BY bulan, tahun ASC")->num_rows();
    }
}
