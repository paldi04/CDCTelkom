<?php
class M_LowonganRequest extends MY_model
{
	// var $table = 'users'; //nama tabel dari database
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status'); //field yang ada di table user
	// var $column_search = array('us_id','us_email','us_type', 'us_status'); //field yang diizin untuk pencarian
	// var $order = array('us_id' => 'asc'); // default order
	// var $whereclause = ""; // default order

	function prepare(){
		$this->table = "users_company";
		$this->column_order = array (
  0 => NULL,
  1 => 'uscom_image',
  2 => 'uscom_nama_com',
  3 => 'uscom_jenis',
  4 => 'uscom_nama_com',
  5 => NULL,
  6 => NULL,
  7 => NULL,
);
		$this->column_search = array (
  0 => 'uscom_nama_com',
  1 => 'uscom_jenis',
);
		$this->order = array (
  'uscom_id' => 'asc',
);
		$this->whereclause = array (
);
  }

	function getEdit($id){
		$get = $this->db->get_where('users_company', ["uscom_id" => $id]);
		return $get->row_array();
  }

	function getJumlahLoker($company_id) {
    $this->db->where(["low_company" => $company_id]);
    return $this->db->get("lowongan")->num_rows();
	}

	function delete($id) {
		$this->db->delete("users_company", array('uscom_id' => $id));
	}
	
  public function approve($id) {
		$data = [
			'uscom_status' => 1
		];

		$this->db->where('uscom_id', $id);
		$this->db->update('users_company', $data);
  }

  public function decline($id) {
		$data = [
			'uscom_status' => 2
		];

		$this->db->where('uscom_id', $id);
		$this->db->update('users_company', $data);
  }

	function create_uid(){
	 	$ref = microtime(true);
	 	$sec = $ref | 0;
	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}
}
