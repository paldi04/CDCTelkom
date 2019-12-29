<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber_data extends CI_Controller{

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
    $data['modal_tambah_sumber_data'] = show_my_modal('modals/tambah_sumber_data', 'tambah-sumber_data');
    $this->load->template('sumber_data_pengguna',$data);
  }

  public function pengguna() {
    // $data['pengguna'] = $this->M_Sumber->getPengguna(); #BENOY
    $data = [];
    $this->load->template('sumber_data_pengguna',$data);
  }

  function tampil(){
        $this->M_Sumber->pengguna();
        $array_type = ["Admin","Jobseeker","Company"];
        $list = $this->M_Sumber->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->us_id;
            $row[] = $field->us_email;
            $row[] = $array_type[$field->us_type];
            $row[] = ($field->us_status == 1 ? 'Aktif' : 'Tidak Aktif');
            $row[] = "<button class='btn btn-success update-dataSumber_pengguna' data-id='". $field->us_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
            <a href='". base_url() ."Sumber_data/delete_pengguna/". $field->us_id ."' class='btn btn-danger'>Hapus</a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Sumber->count_all(),
            "recordsFiltered" => $this->M_Sumber->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
  }

  public function mahasiswa(){
    $data = [];
    $this->load->template('sumber_data_mahasiswa',$data);
  }

  public function get_update() {
    $id 						= trim($_POST['id']);
    $mahasiswa = $this->M_Sumber->getEdit_mahasiswa($id);
    $data['mahasiswa'] = $mahasiswa[0];
    $data['provinsi'] = $this->M_Sumber->getProv();
    $data['kota'] = $this->M_Sumber->getKota();
    echo show_my_modal('modals/update_sumber_data_mahasiswa', 'update-sumber_data', $data);
  }

  public function get_update_pengguna() {
    $id 						= trim($_POST['id']);
    $data['pengguna'] = $this->M_Sumber->getEdit_pengguna($id);
    $data['type_list'] = ['Admin','Jobseeker','Company'];
    echo show_my_modal('modals/update_sumber_data_pengguna', 'update-sumber_data_pengguna', $data);
  }

  public function update_sumber_mahasiswa() {
    $this->M_Sumber->update_mahasiswa($this->input->post());
    redirect('/Sumber_data/mahasiswa');
  }

  public function update_sumber_pengguna() {
    $this->M_Sumber->update_pengguna($this->input->post());
    redirect('/Sumber_data/pengguna');
  }

  function tampil_mahasiswa(){
        $this->M_Sumber->mahasiswa();
        $array_type = ["Admin","Jobseeker","Company"];
        $list = $this->M_Sumber->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->usjob_nim;
            $row[] = $field->usjob_nama;
            $row[] = $field->usjob_tmpt_lahir . " / " . $field->usjob_tgl_lahir;
            $row[] = ($field->usjob_gender == "L" ? "Laki Laki" : "Perempuan");
            $row[] = $field->usjob_prov;
            $row[] = $field->usjob_kota;
            $row[] = "<button class='btn btn-success update-dataSumber_data' data-id='". $field->usjob_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Sumber->count_all(),
            "recordsFiltered" => $this->M_Sumber->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
  }

  function delete($id) {
    $this->M_Sumber->delete($id);
    redirect('/Sumber_data/mahasiswa');
  }

  function delete_pengguna($id) {
    $this->M_Sumber->delete_pengguna($id);
    redirect('/Sumber_data/pengguna');
  }
}
?>
