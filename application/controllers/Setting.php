<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->library('Ion_auth');
		$this->load->library('pagination');
	}
	public function index(){
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
				$totalobathabis = $this->Admin_m->totalobathabis();
				$totalobatkedaluwarsa = $this->Admin_m->totalobatkedaluwarsa();
				$data['totalobathabis'] = $totalobathabis->jumlah;
				$data['totalobatkedaluwarsa'] = $totalobatkedaluwarsa->jumlah;
				$data['title'] = 'Setting';
				$data['perusahaan'] = $perusahaan;
				$data['users'] = $datauser;
				$data['page'] = 'admin/setting-v';
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
				$id = $this->input->post('id_perusahaan');
				$additional_data = array(
					'kode_perusahaan' => $this->input->post('kode_perusahaan'),
					'nama_perusahaan' => $this->input->post('nama_perusahaan'),
					'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
					'nama_pemilik' => $this->input->post('nama_pemilik'),
					'no_sipa' => $this->input->post('no_sipa'),
				);
				if (!empty($_FILES["logo"]["tmp_name"])) {
				    $config['file_name'] = strtolower(url_title('logo'.'-'.$this->input->post('nama_perusahaan').'-'.date('Ymd').'-'.time('Hms')));
				    $config['upload_path'] = './assets/img/';
				    $config['allowed_types'] = 'gif|jpg|png|jpeg';
				    $config['max_size'] = 2048;
				    $config['max_width'] = '';
				    $config['max_height'] = '';

				    $this->load->library('upload', $config);
				    if (!$this->upload->do_upload('logo')){
				        $error = $this->upload->display_errors();
				        $this->session->set_flashdata('eror', $error );
				        redirect(base_url('index.php/admin/setting'));
				    }
				    else{
				        $file = $this->Admin_m->perusahaan(1)->logo;
				        if ($file != "logo.png") {
				            unlink("assets/img/$file");
				        }
				        $img = $this->upload->data('file_name');
				        $additional_data['logo'] = $img;
				        $file = "assets/img/$img";
				        //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
				    }
				}
				// echo "<pre>";print_r($additional_data);echo "</pre>";exit();
				$this->Admin_m->update('1',$additional_data);
				$pesan = 'Detail '.$this->input->post('nama_perusahaan').' berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/setting/'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/login'));
		}
	}
	
}

