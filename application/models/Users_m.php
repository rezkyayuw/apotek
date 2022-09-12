
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Users_m extends CI_Model{

	public function daftar($id){
		//baru melihat data yang mau diambil
		$this->db->where('id_perusahaan', $id);
		//query bisa diganti dengan kata hasil. maksud dari kode ini baru membungkus data yang akan dikirim. kata perusahaan yang tulis adalan nama tabel di db
		$query = $this->db->get('perusahaan');
		//code ini untuk mengirimkan data. row digunakan untuk menampilkan data daru query where yang tulis, sedankan kalau result untuk menampilkan semua data yang ada pada tabel. ada jg yang namanaya result_array hampir sama dengan result hnya ada sedikit perbdaan dibagian penulisan.
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('users');
		if(!empty($search['string'])){
			$this->db->like('username', $search['string']);
			$this->db->or_like('first_name', $search['string']);
		//	$this->db->or_like('jk', $search['string']);
			$this->db->or_like('phone', $search['string']);
			$this->db->or_like('perusahaan.nama_perusahaan', $search['string']);

		}
		$this->db->order_by('id','desc');
		$this->db->limit($rowperpage, $rowno);
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = users.company');
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('users');
		if(!empty($search['string'])){
			$this->db->like('username', $search['string']);
			$this->db->or_like('first_name', $search['string']);
			//$this->db->or_like('jk', $search['string']);
			$this->db->or_like('phone', $search['string']);
			$this->db->or_like('perusahaan.nama_perusahaan', $search['string']);
		}
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = users.company');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}
	public function getgroup($id){
		$this->db->where('user_id', $id);
		$query = $this->db->get('users_groups');
		return $query->result();
	}
	public function detailgroup($id){
		$this->db->where('id', $id);
		$query = $this->db->get('groups');
		return $query->row();
	}
}







