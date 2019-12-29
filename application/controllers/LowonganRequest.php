<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LowonganRequest extends CI_Controller{

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
    $this->load->model('M_LowonganRequest');
  }

  public function index() {
    $this->load->template('index_lowongan_request');
  }

  public function add() {
    $this->load->template('add_lowongan_request');
  }

  public function edit($id) {
    $data = $this->M_LowonganRequest->getEdit($id);
    $this->load->template('edit_lowongan_request', $data);
  }

  public function save() {
    $data = $this->input->post();
    $this->M_LowonganRequest->save($data);
    redirect('/LowonganRequest');
  }

  public function update() {
    $data = $this->input->post();
    $this->M_LowonganRequest->update($data);
    redirect('/LowonganRequest');
  }

  public function delete($id) {
    $this->M_LowonganRequest->delete($id);
    redirect('/LowonganRequest');
  }

  public function detail($id) {
    $data = $this->M_LowonganRequest->getEdit($id);
    $this->load->template('detail_perusahaan', $data);
  }

  public function approve($id) {
    $this->M_LowonganRequest->approve($id);
    redirect('/LowonganRequest');
  }

  public function decline($id) {
    $this->M_LowonganRequest->decline($id);
    redirect('/LowonganRequest');
  }

  public function datatables() {
    $this->M_LowonganRequest->prepare();
    $list = $this->M_LowonganRequest->get_datatables();
    $data = array();
    $no = $_POST['start'];
    $statuses = ['Belum Acc', 'Sudah Acc', 'Request ditolak'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img width="100" height="100" src="'. base_url() .'uploads/'. $field->uscom_image.'"/>';
        $row[] = $field->uscom_nama_com;
        $row[] = $field->uscom_jenis;
        $row[] = $field->uscom_nama_com;
        $row[] = $this->M_LowonganRequest->getJumlahLoker($field->uscom_id);
        $row[] = $statuses[$field->uscom_status];

        // $row[] = $d['info'];
        $row[] = "<a class='btn btn-success' href='". base_url()."LowonganRequest/detail/" . $field->uscom_id ."'>Detail</a> ".
                  ($field->uscom_status == 0 ? "<a class='btn btn-primary' href='". base_url()."LowonganRequest/approve/" . $field->uscom_id ."'>Setuju</a>
                  <a class='btn btn-danger' href='". base_url()."LowonganRequest/decline/" . $field->uscom_id ."'>Tolak</a>" : "");

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_LowonganRequest->count_all(),
        "recordsFiltered" => $this->M_LowonganRequest->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }
}
