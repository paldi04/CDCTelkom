<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
  }

  function index()
  {
      $profil = $this->getData();
      $profil[0]['Akses']  = ucfirst($_SESSION['role']);
      $data['profil'] = $profil[0];
      $this->load->template('profil', $data);
  }

  public function get_update() {
    $data['provinsi'] = $this->db->get("provinsi")->result_array();
    $data['kota'] = $this->db->get("kota")->result_array();
    $data['profil'] = $this->getData()[0];

    echo show_my_modal('modals/update_profil', 'update-profil', $data);
  }

  public function update() {
    $data['id'] = $this->input->post('id');
    $data['nama'] = $this->input->post('nama');
    $data['tmpt_lahir'] = $this->input->post('tmpt_lahir');
    $data['tgl_lahir'] = $this->input->post('tgl_lahir');
    $data['gender'] = $this->input->post('gender');
    $data['nohp'] = $this->input->post('nohp');
    $data['gender'] = $this->input->post('gender');
    $data['jenis'] = $this->input->post('jenis');
    $data['bidang'] = $this->input->post('bidang');
    $data['prov'] = $this->input->post('prov');
    $data['kota'] = $this->input->post('kota');
    $data['alamat'] = $this->input->post('alamat');

		$e = [
      'a_id' => $data['id'],
      'a_nama' => $data['nama'],
      'a_tmpt_lahir' => $data['tmpt_lahir'],
      'a_tgl_lahir' => $data['tgl_lahir'],
      'a_gender' => $data['gender'],
      'a_nohp' => $data['nohp'],
      'a_jenis' => $data['jenis'],
      'a_bidang' => $data['bidang'],
      'a_prov' => $data['prov'],
      'a_kota' => $data['kota'],
      'a_alamat' => $data['alamat'],
		];

		$this->db->where('a_id', $data['id']);
		$this->db->update("users_".$_SESSION['role'], $e);

    redirect('/Profil');
  }

  public function delete() {
    $id = $this->input->post('id');
  }

  function getData() {
    $tabel = "users_".$_SESSION['role'];
    $this->db->where( [$_SESSION['awal']."id" => $_SESSION['profil_id']]);
      return $this->db->get($tabel)->result_array();
  }
}
