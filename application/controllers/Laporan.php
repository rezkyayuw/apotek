<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	    $this->load->model('Admin_m');
	    $this->load->model('Obat_m');
	    $this->load->model('Pembelian_m');
	    $this->load->library('Ion_auth');
	}

	public function index(){
		//menampilkan nama perusahaan
		//perusahaan yang setelah Admin_m adalah nama function (perusahaan), '1' adalah id_perusahaan pertama dan mengeluarkan nama perusahaan sesuai angka yang tertulis
		//tittle bisa diganti dengan judul, yang nnti akan ditulis di view. title merupakan array
		$datauser = $this->ion_auth->user()->row();
		$perusahaan = $this->Admin_m->perusahaan(1);
		$data['title'] = $this->Admin_m->perusahaan('1')->nama_perusahaan;
		$totalobathabis = $this->Admin_m->totalobathabis();
		$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
		$data['users'] = $datauser;
		$data['totalobathabis'] = $totalobathabis->jumlah;
		$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
		$data['perusahaan'] = $perusahaan;
		$data['page'] = 'admin/laporan/main-v';
		//fungsi $data agar mengambil data dan akan ditampilkan didashboard-v
		$this->load->view('admin/dashboard-v',$data);
	}

	public function detail(){
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
				$getpenjualan = $this->Admin_m->getpenjualan($post);
				$getpembelian = $this->Admin_m->getpembelian($post);
				$getpemasok = $this->Obat_m->getpemasok();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$gettgl = $this->Admin_m->gettgl($post);
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$getobat = $this->Admin_m->getobat($post);
				$data['title'] = 'Laporan';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['getpenjualan'] = $getpenjualan;
				$data['getpembelian'] = $getpembelian;
				$data['getobat'] = $getobat;
				$data['gettgl'] = $gettgl;
				$data['getpemasok'] = $getpemasok;
				$data['post'] = $post;
				$data['page'] = 'admin/laporan/detail-v';
		        // echo "<pre>";print_r($gettgl);echo "<pre>";exit();
				$this->load->view('admin/dashboard-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
 
 public function cetak($tglawal,$tglakhir){
		if ($this->ion_auth->logged_in()) {
			$level = array('apoteker');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/dashboard'));
			}else{
				// default Setting
				$post = array('tgl_awal'=>$tglawal,'tgl_akhir'=>$tglakhir);
				$datauser = $this->ion_auth->user()->row();
				$perusahaan = $this->Admin_m->perusahaan(1);
				$getpenjualan = $this->Admin_m->getpenjualan($post);
				$getpembelian = $this->Admin_m->getpembelian($post);
				$getpemasok = $this->Obat_m->getpemasok();
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$gettgl = $this->Admin_m->gettgl($post);
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$getobat = $this->Admin_m->getobat($post);
				$data['title'] = 'Laporan';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['getpenjualan'] = $getpenjualan;
				$data['getpembelian'] = $getpembelian;
				$data['getobat'] = $getobat;
				$data['gettgl'] = $gettgl;
				$data['getpemasok'] = $getpemasok;
				// $data['page'] = 'admin/laporan/laporan-cetak-v';
		        // echo "<pre>";print_r($gettgl);echo "<pre>";exit();
				$this->load->view('admin/laporan/laporan-cetak-v', $data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
 

}

