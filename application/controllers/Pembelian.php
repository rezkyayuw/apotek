<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Obat_m');
		$this->load->model('Pembelian_m');
		$this->load->library('Ion_auth');
		$this->load->library('pagination');
	}
	public function index($rowno=0){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$post = $this->input->post();
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$data['title'] = 'Daftar Pembelian';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/pembelian/main-v';
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['getpemasok'] = $this->Pembelian_m->getpemasok();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
		        // Search text
				$search_text = "";
				if($post == TRUE ){
					$search_text = $post;
					$this->session->set_userdata($post);
				}else{
					$post = array();
					if($this->session->userdata('string') != NULL){
						$post['string'] = $this->session->userdata('string');
					}
					if($this->session->userdata('nama_pemasok') != NULL){
						$post['nama_pemasok'] = $this->session->userdata('nama_pemasok');
					}
					$search_text = $post;
				}
		        // Row per page
				$rowperpage = 10;
		        // Row position
				if($rowno != 0){
					$rowno = ($rowno-1) * $rowperpage;
				}
		        // All records count
				$allcount = $this->Pembelian_m->getrecordCount($search_text);
		        // Get records
				$users_record = $this->Pembelian_m->getData($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/pembelian/index/';
				$config['use_page_numbers'] = TRUE;
				$config['total_rows'] = $allcount;
				$config['per_page'] = $rowperpage;
				$config['first_link']       = 'Pertama';
				$config['last_link']        = 'Terakhir';
				$config['next_link']        = 'Selanjutnya';
				$config['prev_link']        = 'Sebelumnya';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
		        // Initialize
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $users_record;
				$data['row'] = $rowno;
				$data['jmldata'] = $allcount;
				$data['search'] = $search_text;
				$data['post'] = $search_text;
		        // Load view
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	// untuk detail pembelian
	public function detail($noref,$rowno=0){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$post = $this->input->post();
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$detaildata = $this->Pembelian_m->detref($noref);
				$getpemasok = $this->Obat_m->getpemasok();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar Pembelian';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				$data['getpemasok'] = $getpemasok;
				$data['page'] = 'admin/pembelian/detail-pembelian-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
		                // Search text
				//kolom detail pembelian
				$search_text = "";
				if($post == TRUE ){
					$search_text = $post;
					$this->session->set_userdata($post);
				}else{
					$post = array();
					if($this->session->userdata('string') != NULL){
						$post['string'] = $this->session->userdata('string');
					}
					$search_text = $post;
				}
		                // Row per page
				$rowperpage = 10;
		                // Row position
				if($rowno != 0){
					$rowno = ($rowno-1) * $rowperpage;
				}
		                // All records count
				$allcount = $this->Obat_m->getrecordCount($search_text);
		                // Get records
				$users_record = $this->Obat_m->getData($rowno,$rowperpage,$search_text);
		                // Pagination Configuration
				$config['base_url'] = base_url().'index.php/pembelian/detail/'.$noref.'/';
				$config['use_page_numbers'] = TRUE;
				$config['total_rows'] = $allcount;
				$config['per_page'] = $rowperpage;
				$config['first_link']       = 'Pertama';
				$config['last_link']        = 'Terakhir';
				$config['next_link']        = 'Selanjutnya';
				$config['prev_link']        = 'Sebelumnya';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
		                // Initialize
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $users_record;
				$data['row'] = $rowno;
				$data['jmldata'] = $allcount;
				$data['search'] = $search_text;
				$data['post'] = $search_text;
				// bagian daftar obat yang di pilih
				$dftrobatdipilih = $this->Pembelian_m->dftrobatdipilih($detaildata->id_pembelian);
				$data['dftrobatdipilih'] = $dftrobatdipilih;
				$daftarobat = array();
				foreach ($dftrobatdipilih as $key) {
					$daftarobat[]= $key->id_obat;
				}
				// echo "<pre>";print_r($daftarobat);echo "</pre>";exit();
				$data['daftarobat']= $daftarobat;
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	// bagian cetak struk
	public function cetak($noref){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$detaildata = $this->Pembelian_m->detref($noref);
				$data['title'] = 'Daftar Pembelian';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['getpemasok'] = $this->Obat_m->detailpem($detaildata->nama_pemasok);
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				// $data['page'] = 'admin/pembelian/detail-pembelian-v';
				// echo "<pre>";print_r($data['getpemasok']);echo "</pre>";exit();
				$dftrobatdipilih = $this->Pembelian_m->dftrobatdipilih($detaildata->id_pembelian);
				$data['dftrobatdipilih'] = $dftrobatdipilih;
				$this->load->view('admin/pembelian/pembelian-cetak-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	public function getobat($idpembelian,$idobat){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$detobat = $this->Pembelian_m->detobat($idobat);
				$detpembelian = $this->Pembelian_m->detpembelian($idpembelian);
				$additional_data = array(
					'id_pembelian' => $idpembelian,
					'id_obat' => $idobat,
					'banyak'=>1,
					'grandtotal' => '0',
					'tgl_beli' => date('Y-m-d'),
				);
				$this->Pembelian_m->insmenupembelian($additional_data);
				$pesan = 'Obat '.$detobat->nama_obat.' berhasil ditambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian/detail/'.$detpembelian->ref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	public function tambah(){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$data['title'] = 'Tambah Pembelian';
				$data['perusahaan'] = $perusahaan;
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['users'] = $datauser;
				$data['page'] = 'admin/pembelian/tambah-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	// untuk membuat no referensi yang baru
	public function proses_tambah(){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$datauser = $this->ion_auth->user()->row();
				$jmlsaatini = $this->Pembelian_m->countpembelian();
				$jmlbaru = $jmlsaatini+1;
				$noref = 'B'.date('Ymh').$jmlbaru;
				// $id = $this->input->post('id_pemasok');
				$additional_data = array(
					'ref' => $noref,
					'tgl_beli' => date('Y-m-d'),
					'jam_beli' => date('his'),
					'id_user' => $datauser->id,
				);
				$this->Pembelian_m->insert($additional_data);
				$pesan = 'Pembelian '.$noref.' berhasil di buat';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian/detail/'.$noref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	public function proses_edit(){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$id = $this->input->post('id_pembelian');
				$additional_data = array(
					'ref' => $this->input->post('ref'),
					'nama_obat' => $this->input->post('nama_obat'),
					'harga_beli' => $this->input->post('harga_beli'),
					'banyak' => $this->input->post('banyak'),
					'subtotal' => $this->input->post('subtotal'),
					'nama_pemasok' => $this->input->post('nama_pemasok'),
					'tgl_beli' => $this->input->post('tgl_beli'),
					'grandtotal' => $this->input->post('grandtotal'),
					
				);
				$this->Pembelian_m->update($id,$additional_data);
				$pesan = 'Pembelian '.$this->input->post('nama_pembeli').' berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	public function proses_bayar(){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$id = $this->input->post('id_pembelian');
				$getpembelian = $this->Pembelian_m->detail($id);
				$additional_data = array(
					'grandtotal' => $this->input->post('grandtotal'),
					'id_status' => '1',
				);
				$this->Pembelian_m->update($id,$additional_data);
				$pesan = 'Pembelian '.$this->input->post('nama_pembeli').' berhasil di bayar';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian/detail/'.$getpembelian->ref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	//untuk menghapus daftar pembelian yang sudah dibuat
	public function delete($id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{
			$this->Pembelian_m->delete($id);
			$this->session->set_flashdata('message', 'Pembelian berhasil di hapus');
			redirect(base_url('index.php/pembelian'));
		}
	}

	// untuk mengupdate jumlah obat dan grandtotal
	public function upjmlobat($ref,$id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{

			if ($this->input->post('jmlobat')<0) {
				$this->session->set_flashdata('message', 'Stok tidak boleh minus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
				
			}
			if ($this->input->post('grandtotal')<0) {
				$this->session->set_flashdata('message', 'Grandtotal tidak boleh minus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
				
			}
			if ($this->input->post('lead_times')<0) {
				$this->session->set_flashdata('message', 'Lead time tidak boleh minus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
				
			}
			
			$detmenunota = $this->Pembelian_m->detmenunota($id);
			$detobat = $this->Pembelian_m->detobat($detmenunota->id_obat);
			// echo "<pre>";print_r($this->input->post());echo "</pre>";exit();
			//update jumlah stok dari table menu to pembelian 
			if ($this->input->post('id_status') == '1') {
				$upbanyak = array(
					'banyak' =>$this->input->post('jmlobat'),
					'grandtotal'=> $this->input->post('grandtotal'),
					'lead_times'=> $this->input->post('lead_times'),
					'id_status'=> $this->input->post('id_status'),
					'tgl_dtng'=> date('Y-m-d'),
				);
			}else{
				$upbanyak = array(
					'banyak' =>$this->input->post('jmlobat'),
					'grandtotal'=> $this->input->post('grandtotal'),
					'lead_times'=> $this->input->post('lead_times'),
					'id_status'=> $this->input->post('id_status'),
				);
			}
			// echo "<pre>";print_r($upbanyak);echo "</pre>";exit();
			$this->Pembelian_m->upmenupembelian($detmenunota->id_menu_to_pembelian,$upbanyak);
			if ($this->input->post('id_status') =='1') {
				// update stok dari menu obat
				$stoksaatini = $detobat->stok;
				$updtstok = array(
					'stok' =>$stoksaatini+$this->input->post('jmlobat'),
				);
				// echo "<pre>";print_r($updtstok);echo "</pre>";exit();
				$this->Obat_m->update($detobat->id_obat,$updtstok);
				$updata = array(
					'id_status' =>'1',
				);
				$this->Pembelian_m->updatero($detobat->id_obat,$updata);
			}
			$this->session->set_flashdata('message', 'Pembelian berhasil di tambahkan');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
		}
	}

	public function addnama($noref){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$id = $this->input->post('id_pembelian');
				$additional_data = array(
					'nama_pemasok' => $this->input->post('nama_pemasok'),
				);
				$this->Pembelian_m->update($id,$additional_data);
				$pesan = 'Pemasok pada pembelian '.$noref.' berhasil di tambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian/detail/'.$noref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	public function addverif($idref,$noref){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$id = $idref;
				$additional_data = array(
					'verifikasi' => 1,
				);
				$this->Pembelian_m->update($id,$additional_data);
				$pesan = 'Pemasok pada pembelian '.$noref.' berhasil di tambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pembelian/detail/'.$noref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	//untuk menghapus obat yang sudah ditambahkan kedaftar beli
	public function delobat($ref,$id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{
			$detmenunota = $this->Pembelian_m->detmenunota($id);
			$detobat = $this->Pembelian_m->detobat($detmenunota->id_obat);
			$this->Pembelian_m->deleteobat($id);
			$updtstok = array(
				'stok' =>$detobat->stok+$detmenunota->banyak,
			);
			// echo "<pre>";print_r($updtstok);echo "</pre>";exit();
			$this->Obat_m->update($detobat->id_obat,$updtstok);
			$this->session->set_flashdata('message', 'Pembelian berhasil di hapus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
		}
	}
	// untuk membuat no referensi yang baru
	public function addformreoderpoint($idobat,$jml){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$datauser = $this->ion_auth->user()->row();
				$jmlsaatini = $this->Pembelian_m->countpembelian();
				$jmlbaru = $jmlsaatini+1;
				$noref = 'B'.date('Ymh').$jmlbaru;
				$detobat = $this->Pembelian_m->detobat($idobat);
				$ceknota = $this->Pembelian_m->cekpembelian();
				if ($ceknota->verifikasi == 0) {
					$additional_data = array(
						'id_pembelian' => $ceknota->id_pembelian,
						'id_obat' => $idobat,
						'banyak'=>$jml,
						'grandtotal' => '0',
						'tgl_beli' => date('Y-m-d'),
					);
					$this->Pembelian_m->insmenupembelian($additional_data);
					$pesan = 'Obat '.$detobat->nama_obat.' berhasil di tambahkan ke Keranjang Pembelian Dengan No Ref '.$ceknota->ref;
					$this->session->set_flashdata('message', $pesan );
					// redirect(base_url('index.php/pembelian/detail/'.$ceknota->ref));
					redirect(base_url('index.php/dashboard'));
				}else{
					// $id = $this->input->post('id_pemasok');
					$additional_data = array(
						'ref' => $noref,
						'tgl_beli' => date('Y-m-d'),
						'jam_beli' => date('his'),
						'id_user' => $datauser->id,
						'nama_pemasok' => $detobat->nama_pemasok,
					);
					$this->Pembelian_m->insert($additional_data);
					// masukan Kode Obat
					$detpembelian = $this->Pembelian_m->detpembelianbyref($noref);
					$additional_data = array(
						'id_pembelian' => $detpembelian->id_pembelian,
						'id_obat' => $idobat,
						'banyak'=>$jml,
						'grandtotal' => '0',
						'tgl_beli' => date('Y-m-d'),
					);
					$this->Pembelian_m->insmenupembelian($additional_data);
					$pesan = 'Pembelian '.$noref.' berhasil di buat';
					$this->session->set_flashdata('message', $pesan );
					// redirect(base_url('index.php/pembelian/detail/'.$noref));
					redirect(base_url('index.php/dashboard'));
				}
					
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	public function cariobat($rowno=0){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$post = $this->input->post();
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$data['title'] = 'Cari Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/pembelian/cari-obat-v';
				$data['getkategori'] = $this->Obat_m->getkategori();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['getpemasok'] = $this->Pembelian_m->getpemasok();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
		        // Search text
				$search_text = "";
				if($post == TRUE ){
					$search_text = $post;
					$this->session->set_userdata($post);
				}else{
					$post = array();
					if($this->session->userdata('string') != NULL){
						$post['string'] = $this->session->userdata('string');
					}
					if($this->session->userdata('nama_pemasok') != NULL){
						$post['nama_pemasok'] = $this->session->userdata('nama_pemasok');
					}
					if($this->session->userdata('kategori') != NULL){
						$post['kategori'] = $this->session->userdata('kategori');
					}
					$search_text = $post;
				}
		        // Row per page
				$rowperpage = 10;
		        // Row position
				if($rowno != 0){
					$rowno = ($rowno-1) * $rowperpage;
				}
		        // All records count
				$allcount = $this->Pembelian_m->getrecordCountcariobat($search_text);
		        // Get records
				$users_record = $this->Pembelian_m->getDatacariobat($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/pembelian/cariobat/';
				$config['use_page_numbers'] = TRUE;
				$config['total_rows'] = $allcount;
				$config['per_page'] = $rowperpage;
				$config['first_link']       = 'Pertama';
				$config['last_link']        = 'Terakhir';
				$config['next_link']        = 'Selanjutnya';
				$config['prev_link']        = 'Sebelumnya';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
		        // Initialize
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $users_record;
				$data['row'] = $rowno;
				$data['jmldata'] = $allcount;
				$data['search'] = $search_text;
				$data['post'] = $search_text;
		        // Load view
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
}

