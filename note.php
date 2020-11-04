#VIEWS DAN ADD
#Configuration
application -> config -> autoload.php
libraries -> array('database')
model -> array('m_mahasiswa')
helper -> array('url','form','table','etc')
database.php -> atur username, password, dan database (db: siakad, tb: tb_mahasiswa)

#Controller
controller -> new file -> mahasiswa.php
<?php 
class Mahasiswa/SesuaiNamaFile extends CI_Controller{
	public function index()
	{
		$data['mahasiswa'] = $this->m_mahasiswa/NamaModel->tampil_data/NamaFunction()-> result();
		$this->load->views('mahasiswa/SebagaiViews', $data)
	}
 ?>}

#Models
models -> new file -> m_mahasiswa.php
<?php 
class M_Mahasiswa extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('tb_mahasiswa');
	}

	public function tambah_aksi(){
		$nama 	= $this->input->post('nama');

		$data = array(
			'nama'			=> $nama,
		);

		$this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
		redirect('mahassiwa/index'); -> itu controller
	}
}
?>

#Views
#Table
views -> new file -> mahasiswa.php
<table>
	<tr>
		<th>Header</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($mahasiswa as $mhs); ?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $mhs->nama ?></td>
	</tr>
	<?php endforeach; ?>
</table>

#Form_Add
<form method="POST" action="<?php echo base_url(). 'mahasiswa/tambah_aksi'; ?>">
	<input type="text" name="nama">
	<button type="submit">Simpan</button>
	<button type="reset"></button>
</form>
