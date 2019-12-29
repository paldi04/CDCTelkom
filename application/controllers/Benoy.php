<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benoy extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }else{
      $this->load->model('M_Sumber');
    }
  }

  public function index()
  {
    $data = [];
    $this->load->template('test_model',$data);
  }

  public function tampil()
  {
      $this->M_Sumber->pengguna();
      $array_type = ["Admin","Jobseeker","Company"];
      $list = $this->M_Sumber->get_datatables();
      $data = array();
      $no = $_POST['start'];
        // foreach ($list as $field) {
        //     $no++;
        //     $row = array();
        //     $row[] = $no;
        //     $row[] = $field->us_id;
        //     $row[] = $field->us_email;
        //     $row[] = $array_type[$field->us_type];
        //     $row[] = ($field->us_status == 1 ? 'Aktif' : 'Tidak Aktif');
        //     $row[] = "<button class='btn btn-success update-dataSumber_data' data-id='". $field->us_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
        //     <button class='btn btn-danger konfirmasiHapus-sumber_data' data-id='". $field->us_id ."' data-toggle='modal' data-target='#konfirmasiHapus'><i class='glyphicon glyphicon-remove-sign'></i> Hapus </button>";
        //
        //     $data[] = $row;
        // }

      $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->M_Sumber->count_all(),
          "recordsFiltered" => $this->M_Sumber->count_filtered(),
          "data" => $data,
      );
      //output dalam format JSON
      echo json_encode($output);
  }

}
?>
