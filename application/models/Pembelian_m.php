
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//membuat coode php , ketik php terus tekan control+enter


class Pembelian_m extends CI_Model{

	public function daftar($id){
		
		$this->db->where('id_pembelian', $id);
		
		$query = $this->db->get('table_pembelian');
		
		return $query->row();
	}
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('table_pembelian.*,users.*,table_pemasok.nama_pemasok AS pemasok');
		$this->db->from('table_pembelian');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('users.first_name', $search['string']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_pembelian.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->order_by('id_pembelian','desc');
		$this->db->join('users', 'users.id = table_pembelian.id_user');
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_pembelian.nama_pemasok');
		$this->db->order_by('id_pembelian','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('table_pembelian');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('table_pemasok.nama_pemasok', $search['string']);
			$this->db->or_like('users.first_name', $search['string']);
		}
		if(!empty($search['nama_pemasok'])){
			$this->db->where('table_pembelian.nama_pemasok', $search['nama_pemasok']);
		}
		$this->db->join('table_pemasok', 'table_pemasok.id_pemasok = table_pembelian.nama_pemasok');
		$this->db->join('users', 'users.id = table_pembelian.id_user');
		$this->db->order_by('id_pembelian','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function detail($id){
		$this->db->where('id_pembelian', $id);
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}
	public function detref($noref){
		$this->db->where('ref', $noref);
		$this->db->join('users', 'users.id = table_pembelian.id_user');
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}
	public function detobat($idobat){
		$this->db->where('id_obat', $idobat);
		$query = $this->db->get('table_obat');
		return $query->row();
	}
	public function dftrobatdipilih($idpembelian){
		$this->db->select('menu_to_pembelian.*,table_obat.*,menu_to_pembelian.lead_times AS leadtime, table_unit.unit AS nm_unit');
		$this->db->where('id_pembelian', $idpembelian);
		$this->db->join('table_obat', 'table_obat.id_obat = menu_to_pembelian.id_obat');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$query = $this->db->get('menu_to_pembelian');
		return $query->result();
	}
	public function detpembelian($idpembelian){
		$this->db->where('id_pembelian', $idpembelian);
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}
	public function detpembelianbyref($ref){
		$this->db->where('ref', $ref);
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}
	public function cekpembelian(){
		$this->db->order_by('id_pembelian','desc');
		$query = $this->db->get('table_pembelian');
		return $query->row();
	}
	public function detmenunota($id){
		$this->db->where('id_menu_to_pembelian', $id);
		$query = $this->db->get('menu_to_pembelian');
		return $query->row();
	}
	function insert($data){
		$this->db->insert('table_pembelian',$data);
	}
	function insmenupembelian($data){
		$this->db->insert('menu_to_pembelian',$data);
	}
	function update($id,$data){
		$this->db->where('id_pembelian',$id);
		$this->db->update('table_pembelian',$data);
	}
	function delete($id){
		$this->db->where('id_pembelian', $id);
		$this->db->delete('table_pembelian');
	}
	function upmenupembelian($id,$data){
		$this->db->where('id_menu_to_pembelian',$id);
		$this->db->update('menu_to_pembelian',$data);
	}
	function updatero($id,$data){
		$this->db->where('id_obat',$id);
		$this->db->update('table_reoder_point',$data);
	}
	function deleteobat($id){
		$this->db->where('id_menu_to_pembelian', $id);
		$this->db->delete('menu_to_pembelian');
	}
	public function countpembelian() {
		$this->db->select('count(*) as getcount');
		$this->db->from('table_pembelian');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['getcount'];
	}

	public function detailpem($id){
		$this->db->where('id_pemasok', $id);
		$query = $this->db->get('table_pemasok');
		return $query->row();
	}
	public function detailunit($id){
		$this->db->where('id_unit', $id);
		$query = $this->db->get('table_unit');
		return $query->row();
	}

	public function getpemasok(){
		$query = $this->db->get('table_pemasok');
		return $query->result();
	}
	// Fetch records
	public function getDatacariobat($rowno,$rowperpage,$search) {
		$this->db->select('table_pembelian.*,menu_to_pembelian.*,table_obat.*,table_kategori.*,table_unit.unit AS nm_unit');
		$this->db->from('menu_to_pembelian');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('table_obat.nama_obat', $search['string']);
			$this->db->or_like('table_obat.kode_obat', $search['string']);
			
		}
		if(!empty($search['kategori'])){
			$this->db->where('table_kategori.id_kategori', $search['kategori']);
		}
		$this->db->order_by('menu_to_pembelian.id_pembelian','desc');
		$this->db->join('table_pembelian', 'table_pembelian.id_pembelian = menu_to_pembelian.id_pembelian');
		$this->db->join('table_obat', 'table_obat.id_obat = menu_to_pembelian.id_obat');
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->order_by('menu_to_pembelian.id_pembelian','desc');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}
	// Select total records
	public function getrecordCountcariobat($search) {

		$this->db->select('count(*) as allcount');
		$this->db->from('menu_to_pembelian');
		if(!empty($search['string'])){
			$this->db->like('ref', $search['string']);
			$this->db->or_like('table_obat.nama_obat', $search['string']);
			$this->db->or_like('table_obat.kode_obat', $search['string']);
			
		}
		if(!empty($search['kategori'])){
			$this->db->where('table_kategori.id_kategori', $search['kategori']);
		}
		$this->db->order_by('menu_to_pembelian.id_pembelian','desc');
		$this->db->join('table_pembelian', 'table_pembelian.id_pembelian = menu_to_pembelian.id_pembelian');
		$this->db->join('table_obat', 'table_obat.id_obat = menu_to_pembelian.id_obat');
		$this->db->join('table_kategori', 'table_kategori.id_kategori = table_obat.nama_kategori');
		$this->db->join('table_unit', 'table_unit.id_unit = table_obat.unit');
		$this->db->order_by('menu_to_pembelian.id_pembelian','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}







