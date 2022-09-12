<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct(){
		parent::__construct();

		//fungsinya agar tidak terjadi pengulangan penulisan file Admin_m
		$this->load->model('Admin_m');
		//nama library yang dipakai ion_auth
		$this->load->library('Ion_auth');
	}


	public function index()
	{
		//fungsi logged_in?? 
		//fungsi dri tulisan base_url untuk menunjukkan lokasi
		if ($this->ion_auth->logged_in()) {
			redirect(base_url('index.php/dashboard'));
		}
		$perusahaan = $this->Admin_m->perusahaan(1);
		$data['perusahaan']=$perusahaan;
		//menampilkan nama perusahaan
		//perusahaan yang setelah Admin_m adalah nama function (perusahaan), '1' adalah id_perusahaan pertama dan mengeluarkan nama perusahaan sesuai angka yang tertulis
		//tittle bisa diganti dengan judul, yang nnti akan ditulis di view. title merupakan array
		$data['title'] = $this->Admin_m->perusahaan('1')->nama_perusahaan;
		//fungsi $data agar mengambil data dan akan ditampilkan dilogin-v
		$this->load->view('login-v',$data);
	}

	function proses_login(){

		if ($this->ion_auth->login($this->input->post('username'),$this->input->post('password'))) {
	   	    //jika login sukses, redirect ke halaman admin
			redirect(base_url('index.php/dashboard'));
		}else{
			$pesan = $this->ion_auth->errors();
			$this->session->set_flashdata('message', $pesan );
			//jka salah akan kembali ke login 
			redirect(base_url('index.php/login'));
		}

	}


	function logout(){

		//logout user
		$logout = $this->ion_auth->logout();
		//redirect ke halaman login
		redirect(base_url('index.php/login'));
	}
}
