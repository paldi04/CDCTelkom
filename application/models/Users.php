<?php
class Users extends CI_Model
{
	public function authenticate($username, $password){
		$this->db->select("us_id, us_type, us_data");
		$auth = $this->db->get_where('users', ['us_email' => $username, 'us_pass' => md5($password)]);
		$array = ["admin","jobseeker","company"];
		$array2 = ["a_","usjob_","uscom_"];
			if($auth->num_rows()){
				foreach($auth->result() as $data)
				   $this->session->set_userdata('auth', true);
		           $this->session->set_userdata('id', $data->us_id);
		           $this->session->set_userdata('role', $array[$data->us_type]);
		           $this->session->set_userdata('profil_id', $data->us_data);
		           $this->session->set_userdata('awal', $array2[$data->us_type]);
		           $this->session->set_userdata('us_id', $data->us_id);
				   return true;
			}
			else{
			   $this->session->set_userdata('auth', false);
			   return false;
			}
	}
}
?>
