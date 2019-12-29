<?php
class M_Event extends MY_model
{
	// var $table = 'users'; //nama tabel dari database
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status'); //field yang ada di table user
	// var $column_search = array('us_id','us_email','us_type', 'us_status'); //field yang diizin untuk pencarian
	// var $order = array('us_id' => 'asc'); // default order
	// var $whereclause = ""; // default order

	function prepare(){
		$this->table = "event";
		$this->column_order = array (
  0 => 'e_gambar',
  1 => 'e_petugas',
  2 => 'e_judul',
  3 => 'e_kategori',
  4 => 'e_headline',
  5 => NULL,
);
		$this->column_search = array (
  0 => 'e_id',
  1 => 'e_judul',
  2 => 'e_petugas',
  3 => 'e_kategori',
  4 => 'e_headline',
);
		$this->order = array (
  'e_id' => 'asc',
);
		$this->whereclause = array (
);
  }

	function getEdit($id){
		$get = $this->db->get_where('event', ["e_id" => $id]);
		return $get->row_array();
  }

	function save($data){

$d = [
    "e_id" => $this->create_uid(),
    "e_gambar" => $data["gambar"],
    "e_judul" => $data["judul"],
    "e_petugas" => $data["petugas"],
    "e_kategori" => $data["kategori"],
    "e_headline" => $data["headline"],
  ];


		$this->db->where('e_id', $data['id']);
		return $this->db->insert('event', $d);
  }

	function update($data){

$d = [
    "e_judul" => $data["judul"],
    "e_petugas" => $data["petugas"],
    "e_kategori" => $data["kategori"],
    "e_headline" => $data["headline"],
  ];


		if (!empty($data['gambar'])) {
			$d['e_gambar']  = $data["gambar"];
		}

		$this->db->where('e_id', $data['id']);
		return $this->db->update('event', $d);
  }

	function delete($id) {
		$this->db->delete("event", array('e_id' => $id));
	}

	function create_uid(){
	 	$ref = microtime(true);
	 	$sec = $ref | 0;
	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}
}
