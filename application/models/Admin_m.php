
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Admin_m extends CI_Model{

	public function perusahaan($id){
		//baru melihat data yang mau diambil
		$this->db->where('id_perusahaan', $id);
		//query bisa diganti dengan kata hasil. maksud dari kode ini baru membungkus data yang akan dikirim. kata perusahaan yang tulis adalan nama tabel di db
		$query = $this->db->get('perusahaan');
		//code ini untuk mengirimkan data. row digunakan untuk menampilkan data daru query where yang tulis, sedankan kalau result untuk menampilkan semua data yang ada pada tabel. ada jg yang namanaya result_array hampir sama dengan result hnya ada sedikit perbdaan dibagian penulisan.
		return $query->row();
	}

	public function table_obat($id){
		$this->db->where('id_obat', $id);
		$query = $this->db->get('table_obat');
		return $query->row();
	}

	public function table_unit($id){
		$this->db->where('id_unit', $id);
		$query = $this->db->get('table_unit');
		return $query->row();
	}

	public function table_pemasok($id){
		$this->db->where('id_pemasok', $id);
		$query = $this->db->get('table_pemasok');
		return $query->row();
	}
	public function get_all_order(){
		$this->db->select('table_reoder_point.*,table_obat.*, table_unit.unit AS nm_unit');
		$this->db->where('table_reoder_point.id_status', '0');
		$this->db->join('table_obat', 'table_obat.id_obat = table_reoder_point.id_obat');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$query = $this->db->get('table_reoder_point');
		return $query->result();
	}
	function totalobat(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_obat');
		return $query->row();
	}

	function totalobathabis(){
		$this->db->select('count(*) as jumlah');
		$this->db->where('table_obat.stok <=','0');
		$query = $this->db->get('table_obat');
		return $query->row();
	}
	function totalobatkedaluwarsa(){
		$this->db->select('count(*) as jumlah');
		$this->db->where('table_obat.kedaluwarsa <=',date('Y-m-d'));
		$query = $this->db->get('table_obat');
		return $query->row();
	}

	function totalkategori(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_kategori');
		return $query->row();
	}

	function totalunit(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_unit');
		return $query->row();
	}
	function cekobat($idobat){
		$this->db->where('id_obat',$idobat);
		$this->db->where('id_status','0');
		$query = $this->db->get('menu_to_pembelian');
		return $query->row();
	}
	function totalpemasok(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_pemasok');
		return $query->row();
	}
	function totalpembelian(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}

	function totalpenjualan(){
		$this->db->select('count(*) as jumlah');
		$query = $this->db->get('table_penjualan');
		return $query->row();
	}
	function getpenjualan($post){
		$this->db->join('users', 'users.id = table_penjualan.id_user');
		$this->db->where('tgl_beli BETWEEN "'. date('Y-m-d', strtotime($post['tgl_awal'])). '" and "'. date('Y-m-d', strtotime($post['tgl_akhir'])).'"');
		return $this->db->get('table_penjualan')->result_array();
	}

	function getpembelian($post){
		$this->db->join('users', 'users.id = table_pembelian.id_user');
		$this->db->where('tgl_beli BETWEEN "'. date('Y-m-d', strtotime($post['tgl_awal'])). '" and "'. date('Y-m-d', strtotime($post['tgl_akhir'])).'"');
		return $this->db->get('table_pembelian')->result_array();
	}
	function gettgl($post){
		$this->db->select('tgl_beli');
		$this->db->select_sum('grandtotal');
		$this->db->where('tgl_beli BETWEEN "'. date('Y-m-d', strtotime($post['tgl_awal'])). '" and "'. date('Y-m-d', strtotime($post['tgl_akhir'])).'"');
		$this->db->group_by('tgl_beli');
		$this->db->order_by('tgl_beli','asc');
		return $this->db->get('table_penjualan')->result_array();
	}
	
	public function getobat($post) {
		$this->db->select('table_obat.nama_obat');
		$this->db->select_sum('menu_to_penjualan.banyak');
		$this->db->from('menu_to_penjualan');
		$this->db->join('table_obat', 'table_obat.id_obat = menu_to_penjualan.id_obat');
		$this->db->where('tgl_beli BETWEEN "'. date('Y-m-d', strtotime($post['tgl_awal'])). '" and "'. date('Y-m-d', strtotime($post['tgl_akhir'])).'"');
		$this->db->group_by('menu_to_penjualan.id_obat');
		$this->db->order_by('banyak','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	function update($id,$data){
		$this->db->where('id_perusahaan',$id);
		$this->db->update('perusahaan',$data);
	}
}







