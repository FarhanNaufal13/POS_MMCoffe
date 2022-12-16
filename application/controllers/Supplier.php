<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_m');
		check_not_login();
	}

	public function index()
	{
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template','supplier/supplier_data', $data);
	}

	public function tambah()
	{
		$supplier = new stdClass();
		$supplier -> supplier_id = null;
		$supplier -> name = null;
		$supplier -> phone = null;
		$supplier -> address = null;
		$supplier -> description = null;
		$data = array(
			'page' => 'tambah',
			'row' => $supplier
		);
		$this->template->load('template','supplier/supplier_form', $data);
	}

	public function ubah($id){
		$query = $this->supplier_m->get($id);
		if($query->num_rows() > 0){
			$supplier = $query->row();
			$data = array(
				'page' => 'ubah',
				'row' => $supplier
			);
			$this->template->load('template','supplier/supplier_form', $data);
		}else{
			?>
			<script type="text/javascript">
				alert('Data Tidak Ditemukan');
				window.location="<?= site_url('supplier'); ?>";
			</script>
			<?php
		}
	}

	public function proses(){
		$post = $this->input->post(null,TRUE);
		if(isset($_POST['tambah'])){
			$this->supplier_m->tambah($post);
		} else if(isset($_POST['ubah'])){
			$this->supplier_m->ubah($post);
		}
		if($this->db->affected_rows() > 0){
			?>
			<script type="text/javascript">
				alert('Data Berhasil Disimpan');
			</script>
			<?php
		}
		?>
		<script type="text/javascript">
			window.location="<?= site_url('supplier'); ?>";
		</script>
		<?php
	}


	public function hapus($id){
		$this->supplier_m->hapus($id);
		$error = $this->db->error();
		if($error['code'] != 0 ){
			?>
			<script type="text/javascript">
				alert('Data Tidak Bisa Dihapus');
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Data Berhasil Dihapus');
			</script>
			<?php
		}
		?>
		<script type="text/javascript">
			window.location="<?= site_url('supplier'); ?>";
		</script>
		<?php
	}
}
