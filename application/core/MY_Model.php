<?php
class MY_Model extends CI_Model
{
	var $table;
	var $column_order;
	var $column_search;
	var $order;
	var $whereclause;
	var $joinclause;
	var $joinclauseon;
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status');
	// var $column_search = array('us_id','us_email','us_type', 'us_status');
	// var $order = array('us_id' => 'asc');
	// var $whereclause = "(us_type = 1 OR us_type = 2)";

	private function _get_datatables_query(){

			$this->db->from($this->table);

			$i = 0;

			foreach ($this->column_search as $item){
					if($_POST['search']['value']){

							if($i===0){
									$this->db->group_start();
									$this->db->like($item, $_POST['search']['value']);
							}
							else{
									$this->db->or_like($item, $_POST['search']['value']);
							}

							if(count($this->column_search) - 1 == $i)
									$this->db->group_end();
					}
					$i++;
			}

			if(isset($_POST['order'])){
					$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			}
			else if(isset($this->order)){
					$order = $this->order;
					$this->db->order_by(key($order), $order[key($order)]);
			}
	}

	function get_datatables(){
	 $this->_get_datatables_query();
		 if($_POST['length'] != -1)
				 $this->db->limit($_POST['length'], $_POST['start']);
				 // $this->db->join('tbl_barang', 'tbl_log_credit.id_barang = tbl_barang.id_barang');
				 // $this->db->join('tbl_nasabah', 'tbl_log_credit.id_nasabah = tbl_nasabah.id_nasabah');
				 if (!is_null($this->joinclause)) {
					 $this->db->join($this->joinclause, $this->joinclauseon);
				 }
				 // $this->db->join('users_company', 'users_company.uscom_id = lowongan.low_company');

				 $this->db->where($this->whereclause);
			 $query = $this->db->get();
		 return $query->result();

	 }

	function count_filtered(){
			  $this->_get_datatables_query();
			  // $this->db->join('tbl_barang', 'tbl_log_credit.id_barang = tbl_barang.id_barang');
			  // $this->db->join('tbl_nasabah', 'tbl_log_credit.id_nasabah = tbl_nasabah.id_nasabah');
				if (!is_null($this->joinclause)) {
					$this->db->join($this->joinclause, $this->joinclauseon);
				}
			  $this->db->where($this->whereclause);
		  $query = $this->db->get();
	  return $query->num_rows();
	}

	public function count_all(){
			if (!is_null($this->joinclause)) {
				$this->db->join($this->joinclause, $this->joinclauseon);
			}
			$this->db->from($this->table);
			return $this->db->count_all_results();
	}

	public function getProv($search = ""){
			if($search != ""){
				$this->db->where('nama', $search);
			}

			return $this->db->get('provinsi')->result_array();
	}

	public function getKota($prov = "", $kota = ""){
			if($prov != ""){
				$this->db->where('id_prov', $prov);
			}
			if($kota != ""){
				$this->db->where('nama', $kota);
			}

			return $this->db->get('kota')->result_array();
	}

}
?>
