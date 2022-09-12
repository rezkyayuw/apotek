
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Kategori_m extends CI_Model{

	public function daftar($id){
		
		$this->db->where('id_kategori', $id);
		
		$query = $this->db->get('table_kategori');
		
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('table_kategori');
		if(!empty($search['string'])){
			$this->db->like('nama_kategori', $search['string']);
			$this->db->or_like('des_kategori', $search['string']);
		}
		$this->db->order_by('id_kategori','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_kategori');
		if(!empty($search['string'])){
			$this->db->like('nama_kategori', $search['string']);
			$this->db->or_like('des_kategori', $search['string']);
		}
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('table_kategori');
		return $query->row();
	}
	function insert($data){
		$this->db->insert('table_kategori',$data);
	}
	function update($id,$data){
		$this->db->where('id_kategori',$id);
		$this->db->update('table_kategori',$data);
	}
	function delete($id){
		$this->db->where('id_kategori', $id);
		$this->db->delete('table_kategori');
	}
}







