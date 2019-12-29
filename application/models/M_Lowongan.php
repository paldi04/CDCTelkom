<?php
class M_Lowongan extends MY_model
{
	// var $table = 'users'; //nama tabel dari database
	// var $column_order = array(null, 'us_id','us_email','us_type', 'us_status'); //field yang ada di table user
	// var $column_search = array('us_id','us_email','us_type', 'us_status'); //field yang diizin untuk pencarian
	// var $order = array('us_id' => 'asc'); // default order
	// var $whereclause = ""; // default order

	function prepare(){
		$this->table = "lowongan";
		$this->column_order = array (
  0 => NULL,
  1 => 'users_company.uscom_nama_com',
  2 => 'low_kategori',
  3 => 'low_posisi',
  4 => 'low_jumlah',
  5 => 'low_valid_until',
  6 => NULL,
);
		$this->column_search = array (
  0 => 'low_company',
  1 => 'low_kategori',
  2 => 'low_posisi',
  3 => 'low_jumlah',
  4 => 'low_valid_until',
);
		$this->order = array (
  'low_id' => 'asc',
);
		$this->db->join('users_company', 'users_company.uscom_id = lowongan.low_company');
		$this->whereclause = array ();

  }

	function getEdit($id){
		$get = $this->db->get_where('lowongan', ["low_id" => $id]);
		return $get->row_array();
  }

	function save($data){

$d = [
    "low_id" => $this->create_uid(),
    "low_company" => $data["nama_perusahaan"],
    "low_kategori" => $data["tipe_kerja"],
    "low_posisi" => $data["posisi"],
    "low_jumlah" => $data["jumlah_kebutuhan"],
    "low_valid_until" => $data["valid_until"],
    "low_jenjang" => $data["jenjang"],
    "low_jurusan" => json_encode($data["jurusan"]),
    "low_level" => $data["level"],
    "low_syarat" => $data["syarat"],
    "low_syarat_khusus" => $data["syarat_khusus"],
    "low_info" => $data["info"],
  ];


		$this->db->where('low_id', $data['id']);
		return $this->db->insert('lowongan', $d);
  }

	function update($data){

$d = [
		"low_company" => $data["nama_perusahaan"],
		"low_kategori" => $data["tipe_kerja"],
		"low_posisi" => $data["posisi"],
		"low_jumlah" => $data["jumlah_kebutuhan"],
		"low_valid_until" => $data["valid_until"],
		"low_jenjang" => $data["jenjang"],
		"low_jurusan" => json_encode($data["jurusan"]),
		"low_level" => $data["level"],
		"low_syarat" => $data["syarat"],
		"low_syarat_khusus" => $data["syarat_khusus"],
		"low_info" => $data["info"],
  ];


		$this->db->where('low_id', $data['id']);
		return $this->db->update('lowongan', $d);
  }

	function delete($id) {
		$this->db->delete("lowongan", array('low_id' => $id));
	}

	function create_uid(){
	 	$ref = microtime(true);
	 	$sec = $ref | 0;
	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}

	function getProdi() {
		return ['S1 Teknik Telekomunikasi',
                      'S1 Teknik Telekomunikasi (International)',
                      'S1 Teknik Elektro',
                      'S1 Teknik Elektro (International)',
                      'S1 Teknik Fisika',
                      'S1 Teknik Komputer',
                      'S2 Teknik Elektro-Telekomunikasi',
                      'S1 Informatika',
                      'S1 Informatika (International)',
                      'S1 Teknologi Informasi',
                      'S1 Rekayasa Perangkat Lunak',
                      'S2 Informatika',
                      'S1 Teknik Industri',
                      'S1 Teknik Industri (International)',
                      'S1 Sistem Informasi',
                      'S1 Sistem Informasi (International)',
                      'S1 Teknik Logistik',
                      'S2 Teknik Industri',
                      'S1 International ICT Business',
                      'S1 MBTI',
                      'S1 Akuntansi',
                      'S2 Manajemen',
                      'S1 Administrasi Bisnis',
                      'S1 Administrasi Bisnis (International)',
                      'S1 Ilmu Komunikasi',
                      'S1 Ilmu Komunikasi (International Class)',
                      'S1 Digital Public Relation',
                      'S1 Desain Komunikasi Visual',
                      'S1 Desain Komunikasi Visual (International)',
                      'S1 Industrial Design',
                      'S1 Desain Interior',
                      'S1 Kriya (Fashion and Textile Design)',
                      'S1 Creative Arts',
                      'D3 Teknologi Telekomunikasi',
                      'D3 Rekayasa Perangkat Lunak Aplikasi',
                      'D3 Sistem Informasi',
                      'D3 Sistem Informasi Akuntansi',
                      'D3 Teknologi Komputer',
                      'D3 Manajemen Pemasaran',
                      'D3 Perhotelan',
                      'S1 Terapan Teknologi Rekayasa Multimedia'];
	}
}
