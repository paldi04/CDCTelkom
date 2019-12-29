<?php
class M_Tampilan extends MY_model
{
	var $table = "tampilan";
	var $column_order = array(null, 'tampil_id', 'tampil_label','tampil_file', 'tampil_data');
	var $column_search = array('tampil_id', 'tampil_label','tampil_file', 'tampil_data');
	var $order = array('tampil_id' => 'asc');
	var $whereclause;

	function slide_show(){
		$this->whereclause = ["tampil_type" => "S"];
  }

	function video(){
		$this->whereclause = ["tampil_type" => "V"];
  }

	function testimoni(){
		$this->whereclause = ["tampil_type" => "T"];
  }

	function kerja_sama(){
		$this->whereclause = ["tampil_type" => "K"];
  }

	function carrer_news(){
		$this->whereclause = ["tampil_type" => "C"];
  }

	function add($data){
		$data = [
				'tampil_id' => $this->create_uid(),
				'tampil_label' => $data['label'],
				'tampil_file' => $data['file'],
				'tampil_data' => $data['data'],
				'tampil_type' => $data['type'],
				'tampil_created_by' => $data['admin_Id'],
			];

		return $this->db->insert($this->table, $data);
	}

	function getEdit($id, $type){
		$get = $this->db->get_where($this->table, ["tampil_id" => $id, "tampil_type" => $type]);
		return $get->row_array();
	}

	function update($data){
		$e = [
        'tampil_label' => $data['label'],
        'tampil_file' => $data['file'],
        'tampil_data' => json_encode($data['data']),
			];

		$this->db->where('tampil_id', $data['id']);
		return $this->db->update($this->table, $e);
	}

	function delete($id) {
		$this->db->delete($this->table, array('tampil_id' => $id));
	}

	function create_uid(){
	 	$ref = microtime(true);
	 	$sec = $ref | 0;
	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
	}
}
?>
