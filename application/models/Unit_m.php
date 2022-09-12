
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Unit_m extends CI_Model{

	public function daftar($id){
		
		$this->db->where('id_unit', $id);
		
		$query = $this->db->get('table_unit');
		
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('table_unit');
		if(!empty($search['string'])){
			$this->db->like('unit', $search['string']);
			//$this->db->or_like('kode_obat', $search);
		}
		$this->db->order_by('id_unit','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_unit');
		if(!empty($search['string'])){
			$this->db->like('unit', $search['string']);
		//	$this->db->or_like('kode_obat', $search);
		}
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id_unit', $id);
		$query = $this->db->get('table_unit');
		return $query->row();
	}

	function insert($data){
		$this->db->insert('table_unit',$data);
	}
	function update($id,$data){
		$this->db->where('id_unit',$id);
		$this->db->update('table_unit',$data);
	}
	function delete($id){
		$this->db->where('id_unit', $id);
		$this->db->delete('table_unit');
	}
}







