<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobSekeer extends CI_Controller{

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
    $this->load->model('M_JobSekeer');
  }

  public function index() {
    $this->load->template('index_job_sekeer');
  }

  public function add() {
    $data['provinsi'] = $this->M_JobSekeer->getProv();
    $this->load->template('add_job_sekeer', $data);
  }

  public function edit($id) {
    $data = $this->M_JobSekeer->getEdit($id);
    $data['provinsi'] = $this->M_JobSekeer->getProv();
    $data['kota'] = $this->M_JobSekeer->getKota();
    $this->load->template('edit_job_sekeer', $data);
  }

  public function detail($id) {
    $data['profil'] = $this->db->get_where('users_jobseeker', ["usjob_id" => $id])->row_array();
    $this->load->template('jobseeker_detail', $data);
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

    if ( ! $this->upload->do_upload('foto'))
    {
      $error = array('error' => $this->upload->display_errors());

    }
    else
    {
      $data = $this->input->post();
      $data['gambar'] = $file_name;
      $this->M_JobSekeer->save($data);
      redirect('/JobSekeer');
    }
  }

  public function update() {
    $data = $this->input->post();
    $this->M_JobSekeer->update($data);
    redirect('/JobSekeer');
  }

  public function delete($id) {
    $this->M_JobSekeer->delete($id);
    redirect('/JobSekeer');
  }

  public function datatables() {
    $this->M_JobSekeer->prepare();
    $list = $this->M_JobSekeer->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img width="100" height="100" src="'. base_url() . 'uploads/' . $field->usjob_image . '"/>';
        $row[] = $field->usjob_nim;
        $row[] = $field->usjob_nama;
        $row[] = $field->usjob_nohp;
        $row[] = $field->us_email;
        $row[] = $field->usjob_stat_mahasiswa;
        $row[] = $field->usjob_kota;
        // $row[] = $field->usjob_jenjang;
        $row[] = $field->usjob_prog_study;

        // $row[] = $d['info'];
        $row[] = "<a class='btn btn-success' href='". base_url()."JobSekeer/detail/" . $field->usjob_id ."'>Detail</a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_JobSekeer->count_all(),
        "recordsFiltered" => $this->M_JobSekeer->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }
}
