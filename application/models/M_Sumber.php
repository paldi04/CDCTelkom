<?php
class M_Sumber extends MY_model
{
	// var $table = 'users'; //nama tabel dari database
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status'); //field yang ada di table user
	// var $column_search = array('us_id','us_email','us_type', 'us_status'); //field yang diizin untuk pencarian
	// var $order = array('us_id' => 'asc'); // default order
	// var $whereclause = ""; // default order

	function pengguna(){
		$this->table = "users";
		$this->column_order = array(null, 'us_id','us_email','us_type', 'us_status', null);
		$this->column_search = array('us_id','us_email','us_type', 'us_status');
		$this->order = array('us_id' => 'asc');
		$this->whereclause = "(us_type = 1 OR us_type = 2)";
  }

	function getEdit_pengguna($id){
		$get = $this->db->get_where('users', ["us_id" => $id]);
		return $get->row_array();
  }

	function update_pengguna($data){
		$d = [
      'us_email' => $data['email'],
      'us_type' => $data['type'],
      'us_status' => $data['status'],
		];

		if (!empty($d['password'])) {
			$data['us_pass'] = $d['password'];
		}

		$this->db->where('us_id', $data['id']);
		return $this->db->update('users', $d);
  }

	function mahasiswa(){
		$this->table = "users_jobseeker";
		$this->column_order = array(null, 'usjob_id','usjob_nama','usjob_nim', 'usjob_tmpt_lahir', 'usjob_tgl_lahir', 'usjob_gender', 'usjob_prov', 'usjob_kota', null);
		$this->column_search = array('usjob_id','usjob_nama','usjob_nim', 'usjob_tmpt_lahir', 'usjob_tgl_lahir', 'usjob_gender', 'usjob_prov', 'usjob_kota');
		$this->order = array('usjob_id' => 'asc');
		$this->whereclause = ["usjob_stat_mahasiswa" => 0];
  }

	function getEdit_mahasiswa($id){
		$where = $this->db->where('usjob_id', $id);
		$get = $this->db->get('users_jobseeker');
			return $get->result_array();
	}

	function update_mahasiswa($data){
		$edit = [
        'usjob_nim' => $data['nim'],
        'usjob_nama' => $data['nama'],
        'usjob_tmpt_lahir' => $data['tempat'],
        'usjob_tgl_lahir' => $data['tgl'],
        'usjob_prov' => $data['prov'],
        'usjob_kota' => $data['kota'],
			];

		$this->db->where('usjob_id', $data['id']);
		return $this->db->update('users_jobseeker', $edit);
	}

	function delete($id) {
		$this->db->delete("users_jobseeker", array('usjob_id' => $id));
	}

	function delete_pengguna($id) {
		$this->db->delete("users", array('us_id' => $id));
	}
}
?>
