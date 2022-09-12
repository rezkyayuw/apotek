<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Obat_m');
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
				$data['title'] = 'Daftar Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['getkategori'] = $this->Obat_m->getkategori();
				$data['getunit'] = $this->Obat_m->getunit();
				$data['getpemasok'] = $this->Obat_m->getpemasok();
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['page'] = 'admin/obat/main-v';
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
					if($this->session->userdata('nama_kategori') != NULL){
						$post['nama_kategori'] = $this->session->userdata('nama_kategori');
					}
					if($this->session->userdata('unit') != NULL){
						$post['unit'] = $this->session->userdata('unit');
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
				$allcount = $this->Obat_m->getrecordCount($search_text);
		        // Get records
				$users_record = $this->Obat_m->getData($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/obat/index/';
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
			redirect(base_url('index.php/admin/login'));
		}
	}

	public function habis($rowno=0){
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
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['getkategori'] = $this->Obat_m->getkategori();
				$data['getunit'] = $this->Obat_m->getunit();
				$data['getpemasok'] = $this->Obat_m->getpemasok();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/obat/habis-v';
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
					if($this->session->userdata('nama_kategori') != NULL){
						$post['nama_kategori'] = $this->session->userdata('nama_kategori');
					}
					if($this->session->userdata('unit') != NULL){
						$post['unit'] = $this->session->userdata('unit');
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
				$allcount = $this->Obat_m->getrecordCountHabis($search_text);
		        // Get records
				$users_record = $this->Obat_m->getDataHabis($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/obat/habis/';
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

	public function kedaluwarsa($rowno=0){
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
				$data['title'] = 'Daftar Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/obat/kedaluwarsa-v';
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['getkategori'] = $this->Obat_m->getkategori();
				$data['getunit'] = $this->Obat_m->getunit();
				$data['getpemasok'] = $this->Obat_m->getpemasok();
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
					if($this->session->userdata('nama_kategori') != NULL){
						$post['nama_kategori'] = $this->session->userdata('nama_kategori');
					}
					if($this->session->userdata('unit') != NULL){
						$post['unit'] = $this->session->userdata('unit');
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
				$allcount = $this->Obat_m->getrecordCountKedaluwarsa($search_text);
		        // Get records
				$users_record = $this->Obat_m->getDataKedaluwarsa($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/obat/kedaluwarsa/';
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
	public function detail($id){
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
				$detaildata = $this->Obat_m->detail($id);
				$getkategori = $this->Obat_m->getkategori();
				$getunit = $this->Obat_m->getunit();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$getpemasok = $this->Obat_m->getpemasok();
				$data['title'] = 'Daftar Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				$data['getkategori'] = $getkategori;
				$data['getunit'] = $getunit;
				$data['getpemasok'] = $getpemasok;
				$data['page'] = 'admin/obat/edit-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
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
				$getkategori = $this->Obat_m->getkategori();
				$getunit = $this->Obat_m->getunit();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$getpemasok = $this->Obat_m->getpemasok();
				$data['title'] = 'Tambah Obat';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['getkategori'] = $getkategori;
				$data['getunit'] = $getunit;
				$data['getpemasok'] = $getpemasok;
				$data['page'] = 'admin/obat/tambah-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	public function proses_tambah(){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker','karyawan');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// $id = $this->input->post('id_obat');
				if ($this->input->post('stok') <0) {
					$pesan = 'Stok obat tidak boleh minus';
					$this->session->set_flashdata('message', $pesan );
					redirect(base_url('index.php/obat'));
				}
				if ($this->input->post('lead_times') <0) {
					$pesan = 'Lead time obat tidak boleh minus';
					$this->session->set_flashdata('message', $pesan );
					redirect(base_url('index.php/obat'));
				}
				$additional_data = array(
					'kode_obat' => $this->input->post('kode_obat'),
					'nama_obat' => $this->input->post('nama_obat'),
					'penyimpanan' => $this->input->post('penyimpanan'),
					'stok' => $this->input->post('stok'),
					'unit' => $this->input->post('unit'),
					'nama_kategori' => $this->input->post('nama_kategori'),
					'kedaluwarsa' => $this->input->post('kedaluwarsa'),
					'harga_jual' => $this->input->post('harga_jual'),
					'harga_beli' => $this->input->post('harga_beli'),
					'pcs' => $this->input->post('pcs'),
					'nama_pemasok' => $this->input->post('nama_pemasok'),
					'lead_times' => $this->input->post('lead_times'),
				);
				$this->Obat_m->insert($additional_data);
				$pesan = 'Obat '.$this->input->post('nama_obat').' berhasil di tambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/obat'));
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
				$id = $this->input->post('id_obat');
				$additional_data = array(
					'kode_obat' => $this->input->post('kode_obat'),
					'nama_obat' => $this->input->post('nama_obat'),
					'penyimpanan' => $this->input->post('penyimpanan'),
					'unit' => $this->input->post('unit'),
					'stok' => $this->input->post('stok'),
					'nama_kategori' => $this->input->post('nama_kategori'),
					'kedaluwarsa' => $this->input->post('kedaluwarsa'),
					'harga_jual' => $this->input->post('harga_jual'),
					'harga_beli' => $this->input->post('harga_beli'),
					'pcs' => $this->input->post('pcs'),
					'nama_pemasok' => $this->input->post('nama_pemasok'),
					'lead_times' => $this->input->post('lead_times'),
				);
				$this->Obat_m->update($id,$additional_data);
				$pesan = 'Obat '.$this->input->post('nama_obat').' berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/obat'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	public function delete($id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}else{
			$this->Obat_m->delete($id);
			$this->session->set_flashdata('message', 'Obat berhasil di hapus');
			redirect(base_url('index.php/obat'));
		}
	}
	
}

