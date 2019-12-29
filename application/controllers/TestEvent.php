<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller{

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
    $this->load->model('M_Event');
  }

  public function index() {
    $this->load->template('index_test_event');
  }

  public function add() {
    $this->load->template('add_test_event');
  }

  public function edit($id) {
    $data = $this->M_Event->getEdit($id);
    $this->load->template('edit_test_event', $data);
  }

  public function save() {
    $file_name = $this->load->create_uid() . '.jpg';

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 5000;
    $config['max_height']           = 5000;
    $config['file_name']           = $file_name;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('gambar'))
    {
      $error = array('error' => $this->upload->display_errors());

    }
    else
    {
      $data = $this->input->post();
      $data['gambar'] = $file_name;
      $this->M_Event->save($data);
      redirect('/Event');
    }
  }

  public function update() {

    if (!empty($_FILES['gambar']['name'])) {
      $file_name = $this->load->create_uid() . '.jpg';

      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100;
      $config['max_width']            = 5000;
      $config['max_height']           = 5000;
      $config['file_name']           = $file_name;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambar'))
      {
        $error = array('error' => $this->upload->display_errors());

      }
      else
      {
        $data = $this->input->post();
        $data['gambar'] = $file_name;
        $this->M_Event->update($data);
        redirect('/Event');
      }
    } else {
      $data = $this->input->post();
      $this->M_Event->update($data);
      redirect('/Event');
    }
  }

  public function delete($id) {
    $this->M_Event->delete($id);
    redirect('/Event');
  }

  public function datatables() {
    $this->M_Event->prepare();
    $list = $this->M_Event->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = '<img src="'. base_url() . 'uploads/'. $field->e_gambar .'" width="100" height="100">';
$row[] = $field->e_petugas;
$row[] = $field->e_judul;
$row[] = $field->e_kategori;
$row[] = $field->e_headline;

        // $row[] = $d['info'];
        $row[] = "<a class='btn btn-success' href='". base_url()."Event/edit/" . $field->e_id ."'>Edit</a>
                  <a class='btn btn-danger' href='". base_url()."Event/delete/" . $field->e_id ."'>Delete</a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Event->count_all(),
        "recordsFiltered" => $this->M_Event->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }
}
