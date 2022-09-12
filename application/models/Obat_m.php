
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Obat_m extends CI_Model{

	public function daftar($id){
		
		$this->db->where('id_obat', $id);
		
		$query = $this->db->get('table_obat');
		
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$this->db->order_by('id_obat','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function getDataHabis($rowno,$rowperpage,$search) {
		$this->db->select('table_obat.*,table_kategori.nama_kategori,table_unit.unit,table_pemasok.nama_pemasok');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$this->db->where('table_obat.stok',0);
		$this->db->order_by('id_obat','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCountHabis($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$this->db->where('table_obat.stok',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function getDataKedaluwarsa($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->where('table_obat.kedaluwarsa <=',date('Y-m-d'));
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$this->db->order_by('kedaluwarsa','asc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCountKedaluwarsa($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_obat');
		if(!empty($search['string'])){
			$this->db->like('nama_obat', $search['string']);
			$this->db->or_like('kode_obat', $search['string']);
			$this->db->or_like('penyimpanan', $search['string']);
			$this->db->or_like('table_kategori.nama_kategori', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('table_unit.unit', $search['string']);
		}
		if(!empty($search['nama_kategori'])){
			$this->db->where('table_obat.nama_kategori', $search['nama_kategori']);
		}
		if(!empty($search['unit'])){
			$this->db->where('table_obat.unit', $search['unit']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_obat.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->where('table_obat.kedaluwarsa <=',date('Y-m-d'));
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_obat.nama_pemasok');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id_obat', $id);
		$query = $this->db->get('table_obat');
		return $query->row();
	}
	function insert($data){
		$this->db->insert('table_obat',$data);
	}
	function update($id,$data){
		$this->db->where('id_obat',$id);
		$this->db->update('table_obat',$data);
	}
	function delete($id){
		$this->db->where('id_obat', $id);
		$this->db->delete('table_obat');
	}
	public function getkategori(){
		$query = $this->db->get('table_kategori');
		return $query->result();
	}
	public function detailkat($id){
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('table_kategori');
		return $query->row();
	}

	public function detailunit($id){
		$this->db->where('id_unit', $id);
		$query = $this->db->get('table_unit');
		return $query->row();
	}
	public function detailpem($id){
		$this->db->where('id_pemasok', $id);
		$query = $this->db->get('table_pemasok');
		return $query->row();
	}

	public function getunit(){
		$query = $this->db->get('table_unit');
		return $query->result();
	}

	public function getobat(){
		$query = $this->db->get('table_obat');
		return $query->result();
	}
	public function getpemasok(){
		$query = $this->db->get('table_pemasok');
		return $query->result();
	}
}







