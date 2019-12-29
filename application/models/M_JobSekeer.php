<?php
class M_JobSekeer extends MY_model
{
	// var $table = 'users'; //nama tabel dari database
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status'); //field yang ada di table user
	// var $column_search = array('us_id','us_email','us_type', 'us_status'); //field yang diizin untuk pencarian
	// var $order = array('us_id' => 'asc'); // default order
	// var $whereclause = ""; // default order

	function prepare(){
		$this->table = "users_jobseeker";
		$this->column_order = array (
   	NULL,
	 	'usjob_image',
	 	'usjob_nim',
   	'usjob_nama',
   	'usjob_nohp',
   	'us_email',
   	'usjob_stat_mahasiswa',
   	'usjob_kota',
   	'usjob_jenjang',
   	'usjob_prog_study',
   	NULL,
);
		$this->column_search = array (
		 'usjob_image',
		 'usjob_nim',
	   'usjob_nama',
	   'usjob_nohp',
	   'us_email',
	   'usjob_stat_mahasiswa',
	   'usjob_kota',
	   'usjob_jenjang',
	   'usjob_prog_study',
);
		$this->order = array (
  'usjob_id' => 'asc',
);

		// $this->db->join('users', 'users.us_data = users_jobseeker.usjob_id');
		$this->joinclause = "users";
		$this->joinclauseon = "users.us_data = users_jobseeker.usjob_id";
		$this->whereclause = ['users.us_type' => 1];
  }

	function getEdit($id){
		$this->db->select('*');
		$this->db->from('users_jobseeker');
		$this->db->join('users', 'users.us_data = users_jobseeker.usjob_id');
		$this->db->where('users.us_type', 1);
		return $this->db->get()->row_array();
  }

	function save($data){

$d = [
    "usjob_id" => $this->create_uid(),
    "usjob_nama" => $data["nama_jobseeker"],
    "usjob_nim" => $data["nim"],
    "usjob_tmpt_lahir" => $data["tmpt_lahir"],
    "usjob_tgl_lahir" => $data["tgl_lahir"],
    "usjob_nohp" => $data["nohp"],
    "usjob_gender" => $data["gender"],
    "usjob_prov" => $data["prov"],
    "usjob_kota" => $data["kota"],
    "usjob_alamat" => $data["alamat"],
    "usjob_ktp" => $data["ktp"],
    "usjob_profesi" => $data["profesi"],
    "usjob_jenjang" => $data["jenjang"],
    "usjob_prog_study" => $data["prog_study"],
    "usjob_thn_msk" => $data["thn_msk"],
    "usjob_thn_lls" => $data["thn_lls"],
    "usjob_stat_mahasiswa" => $data["stat_mahasiswa"],
    "usjob_stat_data" => $data["stat_data"],
    "usjob_image" => $data["foto"]
  ];


		$this->db->where('usjob_id', $data['id']);
		return $this->db->insert('users_jobseeker', $d);
  }

	function update($data){

$d = [
    "usjob_nama" => $data["nama_jobseeker"],
    "usjob_nim" => $data["nim"],
    "usjob_tmpt_lahir" => $data["tmpt_lahir"],
    "usjob_tgl_lahir" => $data["tgl_lahir"],
    "usjob_nohp" => $data["nohp"],
    "usjob_gender" => $data["gender"],
    "usjob_prov" => $data["prov"],
    "usjob_kota" => $data["kota"],
    "usjob_alamat" => $data["alamat"],
    "usjob_ktp" => $data["ktp"],
    "usjob_profesi" => $data["profesi"],
    "usjob_jenjang" => $data["jenjang"],
    "usjob_prog_study" => $data["prog_study"],
    "usjob_thn_msk" => $data["thn_msk"],
    "usjob_thn_lls" => $data["thn_lls"],
    "usjob_stat_mahasiswa" => $data["stat_mahasiswa"],
    "usjob_stat_data" => $data["stat_data"],
    "usjob_image" => $data["foto"]
  ];


		$this->db->where('usjob_id', $data['id']);
		return $this->db->update('users_jobseeker', $d);
  }

	function delete($id) {
		$this->db->delete("users_jobseeker", array('usjob_id' => $id));
	}

	function create_uid(){
	 	$ref = microtime(true);
	 	$sec = $ref | 0;
	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}
}
