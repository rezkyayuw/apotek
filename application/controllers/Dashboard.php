<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	    $this->load->model('Admin_m');
	    $this->load->library('Ion_auth');
	   // $this->load->library('pagination');
	}

	public function index(){
		//menampilkan nama perusahaan
		//perusahaan yang setelah Admin_m adalah nama function (perusahaan), '1' adalah id_perusahaan pertama dan mengeluarkan nama perusahaan sesuai angka yang tertulis
		//tittle bisa diganti dengan judul, yang nnti akan ditulis di view. title merupakan array
		$datauser = $this->ion_auth->user()->row();
		$perusahaan = $this->Admin_m->perusahaan(1);
		$data['perusahaan'] = $perusahaan;
		$data['users'] = $datauser;
		$reoderpoint = $this->Admin_m->get_all_order();
		$totalobat = $this->Admin_m->totalobat();
		$totalkategori = $this->Admin_m->totalkategori();
		$totalunit = $this->Admin_m->totalunit();
		$totalpemasok = $this->Admin_m->totalpemasok();
		$totalpenjualan = $this->Admin_m->totalpenjualan();
		$totalpembelian = $this->Admin_m->totalpembelian();
		
		$data['title'] = $this->Admin_m->perusahaan('1')->nama_perusahaan;
		$data['reoderpoint'] = $reoderpoint;
		$data['totalobat'] = $totalobat->jumlah;
		$data['totalkategori'] = $totalkategori->jumlah;
		$data['totalunit'] = $totalunit->jumlah;
		$data['totalpemasok'] = $totalpemasok->jumlah;
		$data['totalpembelian'] = $totalpembelian->jumlah;
		$data['totalpenjualan'] = $totalpenjualan->jumlah;
		$totalobathabis = $this->Admin_m->totalobathabis();
		$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
		$data['totalobathabis'] = $totalobathabis->jumlah;
		$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
		$data['page'] = 'admin/dashboard/main-v';
		//fungsi $data agar mengambil data dan akan ditampilkan didashboard-v
		$this->load->view('admin/dashboard-v',$data);
	}
 

}

