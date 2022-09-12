<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	    $this->load->model('Admin_m');
	    $this->load->model('Users_m');
	    $this->load->library('Ion_auth');
	    $this->load->library('pagination');
	}
	public function index($rowno=0){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$post = $this->input->post();
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$data['title'] = 'Daftar User';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/user/main-v';
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
				$allcount = $this->Users_m->getrecordCount($search_text);
		        // Get records
				$users_record = $this->Users_m->getData($rowno,$rowperpage,$search_text);
		        // Pagination Configuration
				$config['base_url'] = base_url().'index.php/users/index/';
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
			$level = array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$detaildata = $this->Users_m->detail($id);
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Daftar User';
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
				$data['page'] = 'admin/user/edit-v';
		        // echo "<pre>";print_r($users_record);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
		public function proses_edit(){
			if ($this->ion_auth->logged_in()) {
				$level=array('apoteker');
				if (!$this->ion_auth->in_group($level)) {
					$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
					$this->session->set_flashdata('message', $pesan );
					redirect(base_url('index.php/dashboard'));
				}else{
					$id = $this->input->post('id');
					$additional_data = array(
						'email' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'jk' => $this->input->post('jk'),
						'phone' => $this->input->post('phone'),
						'active' => $this->input->post('active'),
						);
					if ($this->input->post('password') == TRUE) {
						$additional_data['password'] = $this->input->post('password');
						$additional_data['repassword'] = $this->input->post('password');
					}
					$groups = $this->input->post('groups');
					$this->ion_auth->remove_from_group('', $id);
					$this->ion_auth->add_to_group($groups, $id);
					$this->ion_auth->update($id, $additional_data);

					$pesan = 'User '.$this->input->post('username').' berhasil di edit';
					$this->session->set_flashdata('message', $pesan );
					redirect(base_url('index.php/users'));
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
			$this->ion_auth->delete_user($id);
			$this->session->set_flashdata('message', 'Users berhasil di hapus');
			redirect(base_url('index.php/users'));
		}
	}
	public function create(){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Tambah User';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['groups'] = $this->ion_auth->groups()->result();
				$data['page'] = 'admin/user/tambah-v';
				$this->load->view('admin/dashboard-v',$data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	public function proses_create(){
		if ($this->ion_auth->logged_in()) {
			$level=array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$group = array($this->input->post('groups'));

				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => '1',
					'phone' => $this->input->post('phone'),
					'jk' => $this->input->post('jk'),
					);
				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				$pesan = 'User '.$username.' berhasil dibuat';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/users'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	// public function index(){
	// 	if ($this->ion_auth->Logged_in()) {
	// 		$level = array('apoteker');
	// 		if ($this->ion_auth->in_group($level)) {
	// 			$data['title'] = $this->Admin_m->perusahaan('1')->nama_perusahaan;
	// 			$data['page'] ='admin/user/main-v';
	// 			//fungsi $data agar mengambil data dan akan ditampilkan didashboard-v
	// 			$this->load->view('admin/dashboard-v',$data);
	// 		}else{
	// 			$pesan = 'Anda tidak memiliki hak untuk mengakses halaman User';
	// 			$this->session->set_flashdata('message', $pesan );
	// 			redirect(base_url('index.php/dashboard'));
	// 		}
	// 	}else{
	// 		$pesan = 'Login terlebih dahulu';
	// 		$this->session->set_flashdata('message', $pesan );
	// 		redirect(base_url('index.php/login'));
	// 	}
	// }
}

