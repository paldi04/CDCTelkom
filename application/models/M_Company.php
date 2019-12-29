<?php
class M_Company extends MY_model
{

	function perusahaan(){
		$this->table = "users_company";
		$this->column_order = array(null, 'uscom_id', 'uscom_nama_com', 'uscom_tmpt_berdiri', 'uscom_tgl_berdiri', 'uscom_nohp', 'uscom_telepon', 'uscom_prov', 'uscom_kota', 'uscom_image');
		$this->column_search = array('uscom_id', 'uscom_nama_com', 'uscom_tmpt_berdiri', 'uscom_tgl_berdiri', 'uscom_nohp', 'uscom_telepon', 'uscom_prov', 'uscom_kota', 'uscom_image');
		$this->order = array('uscom_id' => 'asc');
		$this->whereclause = [];
  }

	function getEdit_perusahaan($id){
		$get = $this->db->get_where('users_company', ["uscom_id" => $id]);
		return $get->row_array();
	}

  function add_perusahaan($data){
    $data = [
      'uscom_id' => $this->create_uid(),
			'uscom_nama_com' => $data['nama_perusahaan'],
			'uscom_tmpt_berdiri' => $data['tempat_berdiri'],
			'uscom_tgl_berdiri' => $data['tgl_berdiri'],
			'uscom_nohp' => $data['no_hp'],
			'uscom_jenis' => $data['jenis'],
			'uscom_bidang' => $data['bidang'],
			'uscom_telepon' => $data['telepon'],
			'uscom_prov' => $data['provinsi'],
			'uscom_kota' => $data['kota'],
			'uscom_image' => $data['image'],
			'uscom_alamat' => $data['alamat'],
    ];

    return $this->db->insert('users_company', $data);
  }

	function update_perusahaan($data){
		$data_update = [
			'uscom_nama_com' => $data['nama_perusahaan'],
			'uscom_tmpt_berdiri' => $data['tempat_berdiri'],
			'uscom_tgl_berdiri' => $data['tgl_berdiri'],
			'uscom_nohp' => $data['no_hp'],
			'uscom_jenis' => $data['jenis'],
			'uscom_bidang' => $data['bidang'],
			'uscom_telepon' => $data['telepon'],
			'uscom_prov' => $data['provinsi'],
			'uscom_kota' => $data['kota'],
			'uscom_alamat' => $data['alamat'],
		];

		if (!empty($data['image'])) {
			$data_update['uscom_image'] = $data['image'];
		}

		$this->db->where('uscom_id', $data['id']);
		return $this->db->update('users_company', $data_update);
	}

	function pelamar($pel_low_id = ""){
		$this->table = "pelamar";
		$this->column_order = array(null, 'pel_id','pel_users','pel_low_id', 'pel_status');
		$this->column_search = array('pel_id','pel_users','pel_low_id', 'pel_status');
		$this->order = array('pel_id' => 'asc');
			if($pel_low_id != ""){
				$this->whereclause = ["pel_low_id" => $pel_low_id];
			}
  }

	function getEdit_pelamar($id){
		$get = $this->db->getwhere('pelamar', ["pel_id" => $id]);
		return $get->result_array();
	}

	function update_pelamar($data){
		$data = [
				'pel_users' => $data['users'],
				'pel_low_id' => $data['low_id'],
				'pel_status' => $data['status'],
			];

		$this->db->where('pel_id', $data['id']);
		return $this->db->update('pelamar', $data);
	}

	function getAll() {
		return $this->db->get('users_company')->result_array();
	}

	function delete($id) {
		$this->db->delete('users_company', array('uscom_id' => $id));
	}

	function create_uid(){
		$ref = microtime(true);
		$sec = $ref | 0;
		return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}
}
?>
