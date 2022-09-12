<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Obat_m');
		$this->load->model('Penjualan_m');
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
				$data['title'] = 'Daftar Penjualan';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/penjualan/main-v';
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
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
					$search_text = $post;
				}
		        // Row per page
				$rowperpage = 10;
		        // Row position
				if($rowno != 0){
					$rowno = ($rowno-1) * $rowperpage;
				}
		        // All records count
				$allcount = $this->Penjualan_m->getrecordCount($search_text);
		        // Get records
				$users_record = $this->Penjualan_m->getData($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/penjualan/index/';
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

	// untuk detail penjualan
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
				$detaildata = $this->Penjualan_m->detref($noref);
				$data['title'] = 'Daftar Penjualan';
				$data['perusahaan'] = $perusahaan;
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				$data['page'] = 'admin/penjualan/detail-penjualan-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
		                // Search text
				//kolom detail penjualan
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
				$config['base_url'] = base_url().'index.php/penjualan/detail/'.$noref.'/';
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
				$dftrobatdipilih = $this->Penjualan_m->dftrobatdipilih($detaildata->id_penjualan);
				$data['dftrobatdipilih'] = $dftrobatdipilih;
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
				$detaildata = $this->Penjualan_m->detref($noref);
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar Penjualan';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				// $data['page'] = 'admin/penjualan/detail-penjualan-v';
				$dftrobatdipilih = $this->Penjualan_m->dftrobatdipilih($detaildata->id_penjualan);
				$data['dftrobatdipilih'] = $dftrobatdipilih;
				$this->load->view('admin/penjualan/penjualan-cetak-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	public function getobat($idpenjualan,$idobat){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$detobat = $this->Penjualan_m->detobat($idobat);
				$detpenjualan = $this->Penjualan_m->detpenjualan($idpenjualan);
				$additional_data = array(
					'id_penjualan' => $idpenjualan,
					'id_obat' => $idobat,
					'banyak'=>1,
					'grandtotal' => $detobat->harga_jual*1,
					'tgl_beli' => date('Y-m-d'),
				);
				$this->Penjualan_m->insmenupenjualan($additional_data);
				$updtstok = array(
					'stok' =>$detobat->stok-1,
				);
				$this->Obat_m->update($idobat,$updtstok);
				$pesan = 'Obat '.$detobat->nama_obat.' berhasil ditambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/penjualan/detail/'.$detpenjualan->ref));
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
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Tambah Penjualan';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/penjualan/tambah-v';
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
				$jmlsaatini = $this->Penjualan_m->countpenjualan();
				$jmlbaru = $jmlsaatini+1;
				$noref = 'J'.date('Ymh').$jmlbaru;
				// $id = $this->input->post('id_pemasok');
				$additional_data = array(
					'ref' => $noref,
					'tgl_beli' => date('Y-m-d'),
					'jam_beli' => date('his'),
					'id_user' => $datauser->id,
				);
				$this->Penjualan_m->insert($additional_data);
				$pesan = 'Penjualan '.$noref.' berhasil di buat';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/penjualan/detail/'.$noref));
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

				$id = $this->input->post('id_penjualan');
				$additional_data = array(
					'ref' => $this->input->post('ref'),
					'nama_obat' => $this->input->post('nama_obat'),
					'harga_jual' => $this->input->post('harga_jual'),
					'banyak' => $this->input->post('banyak'),
					'subtotal' => $this->input->post('subtotal'),
					'nama_pembeli' => $this->input->post('nama_pembeli'),
					'tgl_beli' => $this->input->post('tgl_beli'),
					'grandtotal' => $this->input->post('grandtotal'),
				);
				$this->Penjualan_m->update($id,$additional_data);
				$pesan = 'Penjualan '.$this->input->post('nama_pembeli').' berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/penjualan'));
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
				$id = $this->input->post('id_penjualan');
				$getref = $this->Penjualan_m->detpenjualan($id);
				$additional_data = array(
					'grandtotal' => $this->input->post('grandtotal'),
					'id_status' => '1',
					'kembalian' => $this->input->post('dari_pembeli')-$this->input->post('grandtotal'),
				);
				$this->Penjualan_m->update($id,$additional_data);

				$getobat = $this->Penjualan_m->dftrobatdipilih($id);
				foreach ($getobat as $data) {
					// perhitungan lead Time Demand
					$leadtime = $data->lead_times;
					$rleadtime = $this->Penjualan_m->rleadtime($data->id_obat);
					$ltd = $leadtime*$rleadtime->lead_times;
					// perhitungan Safety Stock
					$pht = $this->Penjualan_m->pht($data->id_obat);
					$ltt = $this->Penjualan_m->ltt($data->id_obat);
					$hitungphtltd = $pht->banyak*$ltt->lead_times;
					$rrph = $this->Penjualan_m->rrph($data->id_obat);
					$hitungrrphrleadtime = $rrph->banyak*$rleadtime->lead_times;
					$safetystock = $hitungphtltd-$hitungrrphrleadtime;
					// perhitungan Reoder Point
					$reoderpoint = $leadtime+$safetystock;
					if ($reoderpoint >= $data->stok) {
						$cekro = $this->Penjualan_m->getro($data->id_obat);
						if ($cekro == FALSE) {
							$adddata= array(
								'id_obat'=>$data->id_obat,
								'tgl_reorder_point'=>date('Y-m-d'),
								'jml_stok_sekarang'=>$data->stok,
								'jml_aman'=>$safetystock,
								'id_status'=>'0',
							);
							$this->Penjualan_m->insertrp($adddata);
						}
						
					}
					// echo "<pre>";print_r(ceil($reoderpoint));echo "</pre>";exit();
				}
				$pesan = 'Penjualan '.$this->input->post('nama_pembeli').' berhasil di bayar';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/penjualan/detail/'.$getref->ref));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}

	//untuk menghapus daftar penjualan yang sudah dibuat
	public function delete($id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{
			$this->Penjualan_m->delete($id);
			$this->session->set_flashdata('message', 'Penjualan berhasil di hapus');
			redirect(base_url('index.php/penjualan'));
		}
	}

	// untuk mengupdate jumlah obat dan grandtotal
	public function upjmlobat($ref,$id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{
			if ($this->input->post('banyak')<0) {
				$this->session->set_flashdata('message', 'Banyak tidak boleh minus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
				
			}
			if ($this->input->post('grandtotal')<0) {
				$this->session->set_flashdata('message', 'Grandtotal tidak boleh minus');
			redirect(base_url('index.php/pembelian/detail/'.$ref));
				
			}
			
			$detmenunota = $this->Penjualan_m->detmenunota($id);
			$detobat = $this->Penjualan_m->detobat($detmenunota->id_obat);
			
			//update jumlah stok dari table menu to penjualan 
			$upbanyak = array(
				'banyak' =>$this->input->post('jmlobat'),
				'grandtotal'=> $detobat->harga_jual*$this->input->post('jmlobat'),
			);
			// echo "<pre>";print_r($updtstok);echo "</pre>";exit();
			$this->Penjualan_m->upmenupenjualan($detmenunota->id_menu_to_penjualan,$upbanyak);

			// update stok dari menu obat
			$stoksaatini = $detobat->stok+$detmenunota->banyak;
			$updtstok = array(
				'stok' =>$stoksaatini-$this->input->post('jmlobat'),
			);
			// echo "<pre>";print_r($updtstok);echo "</pre>";exit();
			$this->Obat_m->update($detobat->id_obat,$updtstok);
			$this->session->set_flashdata('message', 'Penjualan berhasil di tambahkan');
			redirect(base_url('index.php/penjualan/detail/'.$ref));
		}
	}

	// untuk menambahkan nama pembeli
	public function addnama($noref){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$id = $this->input->post('id_penjualan');
				$additional_data = array(
					'nama_pembeli' => $this->input->post('nama_pembeli'),
				);
				$this->Penjualan_m->update($id,$additional_data);
				$pesan = 'Penjualan '.$this->input->post('nama_pembeli').' berhasil di tambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/penjualan/detail/'.$noref));
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
			$detmenunota = $this->Penjualan_m->detmenunota($id);
			$detobat = $this->Penjualan_m->detobat($detmenunota->id_obat);
			$this->Penjualan_m->deleteobat($id);
			$updtstok = array(
				'stok' =>$detobat->stok+$detmenunota->banyak,
			);
			// echo "<pre>";print_r($updtstok);echo "</pre>";exit();
			$this->Obat_m->update($detobat->id_obat,$updtstok);
			$this->session->set_flashdata('message', 'Penjualan berhasil di hapus');
			redirect(base_url('index.php/penjualan/detail/'.$ref));
		}
	}
	
}

