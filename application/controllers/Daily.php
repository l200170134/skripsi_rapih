<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul']      = 'Daily Activity';
        $nip                = $this->session->userdata('nip');
        $tanggal            = date('Y-m-d');
        $data['evaluasi']   = $this->db->get('tb_evaluasi')->result_array();

        // PAGINATION
        $this->load->model('Pagination_model', 'page');

        // config
        $config['base_url']         = base_url() . 'Daily/index/' . $nip . '/';
        $config['total_rows']       = $this->page->getDailyRows($nip, $tanggal);
        $config['per_page']         = 5;
        $config['first_url']        = '0';
        $config['uri_segment']      = '4';
        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['attributes']       = array('class' => 'page-link');
        // Inisiasi
        $this->pagination->initialize($config);
        $start  = $this->uri->segment(4);
        $data['start']      =  0 + $start;
        $this->session->set_userdata('link', $data['start']);
        $data['daily']      = $this->page->getDaily($nip, $tanggal, $config['per_page'], $data['start']);

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
        $this->session->unset_userdata('tgl_awal');
        $this->session->unset_userdata('tgl_akhir');
    }

    public function daily_form()
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul']      = 'Daily Activity';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_form');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_report($nip)
    {
        // mengambil data dari database berdasarakan session yang sudah terbentuk
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul']      = 'Daily Activity';
        $data['nip']        = $nip;
        $nip                = $this->session->userdata('nip');
        $tanggal            = date('Y-m-d');
        $data['evaluasi']   = $this->db->get('tb_evaluasi')->result_array();

        // PAGINATION & SEARCING
        $this->load->model('Pagination_model', 'page');
        // SEARCING
        if ($this->input->post('submit')) {
            $tgl_awal       = $this->input->post('tgl_awal');
            $tgl_akhir      = $this->input->post('tgl_akhir');
            $this->session->set_userdata('tgl_awal', $tgl_awal);
            $this->session->set_userdata('tgl_akhir', $tgl_akhir);
        } else if ($this->input->post('batal')) {
            $this->session->unset_userdata('tgl_awal');
            $this->session->unset_userdata('tgl_akhir');
            $tgl_awal       = '0000-01-01';
            $tgl_akhir      = '3000-01-01';
            redirect('Daily/daily_report/' . $nip . '/0');
        } else {
            $tgl_awal       = $this->session->userdata('tgl_awal');
            $tgl_akhir      = $this->session->userdata('tgl_akhir');
        }
        // PAGINATION
        // config
        $config['base_url']         = base_url() . 'Daily/daily_report/' . $nip . '/';
        $config['per_page']         = 10;
        $config['first_url']        = '0';
        $config['uri_segment']      = 4;
        $this->db->select('*');
        $this->db->from('tb_ldr_daily');
        $this->db->where('nip', $nip);
        $this->db->where('status', 'Approve');
        $this->db->where('tgl !=', $tanggal);
        if ($this->input->post('submit')) {
            $this->db->where('tgl >=', $tgl_awal);
            $this->db->where('tgl <=', $tgl_akhir);
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $data['start']          = 0;
            redirect('Daily/daily_report/' . $nip . '/0');
        } else if ($this->session->userdata('tgl_awal') != null) {
            $this->db->where('tgl >=', $tgl_awal);
            $this->db->where('tgl <=', $tgl_akhir);
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $start                  = $this->uri->segment(4);
            $data['start']          = 0 + $start;
        } else {
            $config['total_rows']   = $this->db->count_all_results();
            $data['results']        = $config['total_rows'];
            $start                  = $this->uri->segment(4);
            $data['start']          = 0 + $start;
        }

        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['attributes']       = array('class' => 'page-link');
        // Inisiasi
        $this->pagination->initialize($config);
        $this->session->set_userdata('link', $data['start']);
        $data['daily']      = $this->page->getReportDaily($nip, $tanggal, $config['per_page'], $data['start'], $tgl_awal, $tgl_akhir);
        // END PAGINATION

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_report');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function daily_proses_tambah()
    {
        $nip            = htmlspecialchars($this->input->post('nip'));
        $id_divisi      = htmlspecialchars($this->session->userdata('divisi'));
        $tgl            = htmlspecialchars($this->input->post('tgl'));
        $aktivitas      = htmlspecialchars($this->input->post('aktivitas'));
        $hasil          = htmlspecialchars($this->input->post('hasil'));
        $catatan        = htmlspecialchars($this->input->post('catatan'));
        $status         = htmlspecialchars($this->input->post('status'));
        $urgensi        = htmlspecialchars($this->input->post('urgensi'));

        $data = array(
            'nip'       => $nip,
            'id_divisi' => $id_divisi,
            'tgl'       => $tgl,
            'aktivitas' => $aktivitas,
            'hasil'     => $hasil,
            'catatan'   => $catatan,
            'status'    => $status,
            'urgensi'    => $urgensi,
        );


        $this->leader_model->daily_input($data, 'tb_ldr_daily');
        $this->session->set_flashdata(
            'tambahDaily',
            '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Data Berhasil Ditambahkan ! </center>
        </div>'
        );
        redirect('Daily');
    }

    public function daily_proses_hapus($id)
    {
        $where          = array('id' => $id);
        $this->leader_model->daily_hapus($where, 'tb_ldr_daily');
        $nip            = $this->session->userdata('nip');
        $link           = $this->session->userdata('link');
        $this->session->set_flashdata(
            'hapusDaily',
            '<div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center> Data Berhasil Dihapus !</center>
        </div>'
        );
        redirect("Daily/index/" . $nip . '/' . $link);
    }

    public function daily_update($id)
    {
        $data['user']   = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where          = array('id' => $id);
        $data['daily']  = $this->leader_model->daily_update($where, 'tb_ldr_daily')->result();
        $data['judul']  = 'Daily Activity';

        $this->load->view('_partials/header');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('halaman/v_daily_update', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }
    public function daily_proses_update()
    {
        $role_id        = $this->session->userdata('role_id');
        $id             = htmlspecialchars($this->input->post('id'));
        $catatan        = htmlspecialchars($this->input->post('catatan'));
        $hasil          = htmlspecialchars($this->input->post('hasil'));

        if ($role_id == 2 && $hasil == 'Selesai') {
            $status     = 'Approve';
            $urgensi    = 'Selesai';
            $data = array(
                'catatan'   => $catatan,
                'hasil'     => $hasil,
                'status'    => $status,
                'urgensi'   => $urgensi
            );
        } else {
            $data = array(
                'catatan'   => $catatan,
                'hasil'     => $hasil
            );
        }


        $where = array(
            'id' => $id
        );
        $nip            = $this->session->userdata('nip');
        $link           = $this->session->userdata('link');
        $this->session->unset_userdata('link');
        $this->leader_model->daily_update_proses($where, $data, 'tb_ldr_daily');
        $this->session->set_flashdata(
            'updateDaily',
            '<div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center>Data Berhasil Diperbaharui !</center>
        </div>'
        );
        redirect('Daily/index/' . $nip . '/' . $link);
    }

    public function export_csv($nip)
    {
        $this->load->model('exportcsv_model', 'export');
        $nip            = $nip;
        $tanggal        = date('Y-m-d');
        $nam = $this->db->get_where('user', ['nip' => $nip])->row_array();
        $nama = $nam['nama'];
        $id_div = $nam['id_divisi'];
        $div = $this->db->get_where('tb_divisi', ['id_divisi' => $id_div])->row_array();
        $divisi = $div['divisi'];
        $data['evaluasi']   = $this->db->get('tb_evaluasi')->result_array();
        $data['report'] = $this->export->exportReport($nip, $tanggal);
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        // Bikin object
        $object = new PHPExcel();
        // Tamahkan properties
        $object->getProperties()->setCreator("PT. Sinar Grafindo");
        $object->getProperties()->setLastModifiedBy("PT. Sinar Grafindo");
        $object->getProperties()->setTitle("Daily Report");

        // Mengatur posisi sheet
        // Memberi judul
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'TANGGAL');
        $object->getActiveSheet()->setCellValue('C1', 'AKTIVITAS');
        $object->getActiveSheet()->setCellValue('D1', 'CATATAN');
        $object->getActiveSheet()->setCellValue('E1', 'EVALUASI');

        $baris = 2;
        $no = 1;
        // Mengisi data
        foreach ($data['report'] as $rp) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $rp['tgl']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $rp['aktivitas']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $rp['catatan']);
            foreach ($data['evaluasi'] as $ev) {
                if ($rp['id'] == $ev['id_daily']) {
                    $object->getActiveSheet()->setCellValue('E' . $baris, $ev['evaluasi']);
                }
            }

            $baris++;
        }

        // Menentukan nama output file
        $filename = "Daily_Report-$nama-$divisi" . '.xlsx';
        $object->getActiveSheet()->setTitle("Daily Report");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('cache-Contro: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('PHP://output');

        exit;
    }
}
