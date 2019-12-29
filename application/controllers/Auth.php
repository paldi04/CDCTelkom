<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct(){
    parent::__construct();
  }

  function login(){
      $this->load->view('login');
  }

  public function authenticate(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
  		if ($this->form_validation->run() == FALSE){
  			$this->login();
  		}
  		else{
  			$this->load->model('Users');
    			if($this->Users->authenticate($this->input->post('email'), $this->input->post('password'))){
    				redirect('dashboard');
    			}else{
    				$this->session->set_flashdata("Error", "Kombinasi email dan password belum tepat");
    				$this->login();
    			}
  		}
  }

  public function logout(){
   $this->session->unset_userdata('auth');
     $this->session->unset_userdata('us_id');
     redirect('auth/login');
  }
}
