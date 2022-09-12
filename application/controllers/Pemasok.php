<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Pemasok_m');
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
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar Pemasok';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/pemasok/main-v';
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
				$allcount = $this->Pemasok_m->getrecordCount($search_text);
		        // Get records
				$users_record = $this->Pemasok_m->getData($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/pemasok/index/';
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
				$detaildata = $this->Pemasok_m->detail($id);
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar Pemasok';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['detaildata'] = $detaildata;
				$data['groups'] = $this->ion_auth->groups()->result();
				$data['usergroups'] = array();
				if($usergroups = $this->ion_auth->get_users_groups($id)->result()){
					foreach($usergroups as $group)
					{
						$data['usergroups'][] = $group->id;
					}
				}
				$data['page'] = 'admin/pemasok/edit-v';
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
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Tambah Pemasok';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/pemasok/tambah-v';
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
				// $id = $this->input->post('id_pemasok');
				$additional_data = array(
					'nama_pemasok' => $this->input->post('nama_pemasok'),
					'alamat' => $this->input->post('alamat'),
					'phone' => $this->input->post('phone'),
				);
				$this->Pemasok_m->insert($additional_data);
				$pesan = 'Supplier '.$this->input->post('nama_pemasok').' berhasil di tambahkan';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pemasok'));
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
				$id = $this->input->post('id_pemasok');
				$additional_data = array(
					'nama_pemasok' => $this->input->post('nama_pemasok'),
					'alamat' => $this->input->post('alamat'),
					'phone' => $this->input->post('phone'),
				);
				$this->Pemasok_m->update($id,$additional_data);
				$pesan = 'Supplier '.$this->input->post('nama_pemasok').' berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/pemasok'));
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
			$this->Pemasok_m->delete($id);
			$this->session->set_flashdata('message', 'Supplier berhasil di hapus');
			redirect(base_url('index.php/pemasok'));
		}
	}
	
}

