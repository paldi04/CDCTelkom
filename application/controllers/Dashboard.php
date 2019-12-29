<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
  }

  function index()
  {
    $this->db->where(["usjob_stat_mahasiswa" => 1]);
    $alumni = $this->db->get("users_jobseeker")->num_rows();
    $this->db->where(["usjob_stat_mahasiswa" => 0]);
    $mahasiswa = $this->db->get("users_jobseeker")->num_rows();
    $perusahaan = $this->db->get("users_company")->num_rows();
    $perusahaan = $this->db->get("users_company")->num_rows();
    $data['total'] = [
      "Alumni" => ["total" => $alumni, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
      "Mahasiswa" => ["total" => $mahasiswa, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
      "Perusahaan" => ["total" => $perusahaan, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
      "Full Time" => ["total" => $alumni, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
      "Part Time" => ["total" => $mahasiswa, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
      "Event" => ["total" => 0, "background" => 'bg-primary',"ionicon" => 'ion-bag',],
    ];
    $this->load->template('dashboard', $data);
  }

}
