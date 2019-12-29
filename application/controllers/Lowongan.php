<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller{

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
    $this->load->model('M_Lowongan');
    $this->load->model('M_Company');
  }

  public function index() {
    $this->load->template('index_lowongan');
  }

  public function add() {
    $data['prodi'] = $this->M_Lowongan->getProdi();
    $data['perusahaan'] = $this->M_Company->getAll();
    $this->load->template('add_lowongan', $data);
  }

  public function edit($id) {
    $data = $this->M_Lowongan->getEdit($id);
    $data['prodi'] = $this->M_Lowongan->getProdi();
    $data['perusahaan'] = $this->M_Company->getAll();
    $this->load->template('edit_lowongan', $data);
  }

  public function save() {
    $data = $this->input->post();
    $this->M_Lowongan->save($data);
    redirect('/Lowongan');
  }

  public function update() {
    $data = $this->input->post();
    $this->M_Lowongan->update($data);
    redirect('/Lowongan');
  }

  public function delete($id) {
    $this->M_Lowongan->delete($id);
    redirect('/Lowongan');
  }

  public function datatables() {
    $this->M_Lowongan->prepare();
    $list = $this->M_Lowongan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $field->uscom_nama_com;
        $row[] = ($field->low_kategori == 0 ? 'Full Time' : 'Part Time');
        $row[] = $field->low_posisi;
        $row[] = $field->low_jumlah;
        $row[] = $field->low_valid_until;

        // $row[] = $d['info'];
        $row[] = "<a class='btn btn-success' href='". base_url()."Lowongan/edit/" . $field->low_id ."'>Edit</a>
                  <a class='btn btn-danger' href='". base_url()."Lowongan/delete/" . $field->low_id ."'>Delete</a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Lowongan->count_all(),
        "recordsFiltered" => $this->M_Lowongan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }
}
