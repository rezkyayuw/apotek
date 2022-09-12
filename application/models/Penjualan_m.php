
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Penjualan_m extends CI_Model{

	public function daftar($id){
		
		$this->db->where('id_penjualan', $id);
		
		$query = $this->db->get('table_penjualan');
		
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('*');
		$this->db->from('table_penjualan');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('nama_pembeli', $search['string']);
			$this->db->or_like('users.first_name', $search['string']);
			
		}
		$this->db->order_by('id_penjualan','desc');
		$this->db->join('users', 'users.id = table_penjualan.id_user');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_penjualan');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('nama_pembeli', $search['string']);
			$this->db->or_like('users.first_name', $search['string']);
		}
		$this->db->join('users', 'users.id = table_penjualan.id_user');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id_penjualan', $id);
		$query = $this->db->get('table_penjualan');
		return $query->row();
	}
	public function detref($noref){
		$this->db->where('ref', $noref);
		$this->db->join('users', 'users.id = table_penjualan.id_user');
		$query = $this->db->get('table_penjualan');
		return $query->row();
	}
	public function detobat($idobat){
		$this->db->where('id_obat', $idobat);
		$query = $this->db->get('table_obat');
		return $query->row();
	}
	public function dftrobatdipilih($idpenjualan){
		$this->db->where('id_penjualan', $idpenjualan);
		$this->db->join('table_obat', 'table_obat.id_obat = menu_to_penjualan.id_obat');
		$query = $this->db->get('menu_to_penjualan');
		return $query->result();
	}
	public function detpenjualan($idpenjualan){
		$this->db->where('id_penjualan', $idpenjualan);
		$query = $this->db->get('table_penjualan');
		return $query->row();
	}
	public function getro($id){
		$this->db->where('id_obat', $id);
		$this->db->where('id_status','0');
		$query = $this->db->get('table_reoder_point');
		return $query->row();
	}
	public function detmenunota($id){
		$this->db->where('id_menu_to_penjualan', $id);
		$query = $this->db->get('menu_to_penjualan');
		return $query->row();
	}
	function insert($data){
		$this->db->insert('table_penjualan',$data);
	}
	function insertrp($data){
		$this->db->insert('table_reoder_point',$data);
	}
	function insmenupenjualan($data){
		$this->db->insert('menu_to_penjualan',$data);
	}
	function update($id,$data){
		$this->db->where('id_penjualan',$id);
		$this->db->update('table_penjualan',$data);
	}
	function delete($id){
		$this->db->where('id_penjualan', $id);
		$this->db->delete('table_penjualan');
	}
	function upmenupenjualan($id,$data){
		$this->db->where('id_menu_to_penjualan',$id);
		$this->db->update('menu_to_penjualan',$data);
	}
	function deleteobat($id){
		$this->db->where('id_menu_to_penjualan', $id);
		$this->db->delete('menu_to_penjualan');
	}
	public function countpenjualan() {
		$this->db->select('count(*) as getcount');
		$this->db->from('table_penjualan');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['getcount'];
	}
	function rleadtime($idobat){
		$this->db->select_avg('lead_times');
		$this->db->where('id_obat',$idobat);
		$query = $this->db->get('menu_to_pembelian');
		return $query->row();
	}
	function pht($idobat){
		$this->db->select_max('banyak');
		$this->db->where('id_obat',$idobat);
		$query = $this->db->get('menu_to_penjualan');
		return $query->row();
	}
	function ltt($idobat){
		$this->db->select_max('lead_times');
		$this->db->where('id_obat',$idobat);
		$query = $this->db->get('menu_to_pembelian');
		return $query->row();
	}
	function rrph($idobat){
		$this->db->select_avg('banyak');
		$this->db->where('id_obat',$idobat);
		$query = $this->db->get('menu_to_penjualan');
		return $query->row();
	}
}







