<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }else{
      $this->load->model('M_Company');
      $this->load->model('M_Sumber');
    }
  }

  public function perusahaan()
  {
    $d['provinsi'] = $this->M_Sumber->getProv();
    $d['kota'] = $this->M_Sumber->getKota();
    $data['modal_tambah_perusahaan'] = show_my_modal('modals/tambah_perusahaan', 'tambah-perusahaan', $d);
    $this->load->template('perusahaan',$data);
  }

  public function save() {
    $data = $this->input->post();
    $file_name = $this->load->create_uid() . '.jpg';
    $data['image'] = $file_name;

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
      var_export($error);
    }
    else
    {
      $upload_data = array('upload_data' => $this->upload->data());
      $this->M_Company->add_perusahaan($data);

      redirect('/Perusahaan/perusahaan');
    }
  }

  public function update() {
    $data = $this->input->post();
    $file_name = $this->load->create_uid() . '.jpg';

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

        $data['image'] = $file_name;
        $upload_data = array('upload_data' => $this->upload->data());
        $this->M_Company->update_perusahaan($data);
        redirect('/Perusahaan/perusahaan');
      }
    }
    else
    {
      $this->M_Company->update_perusahaan($data);

      redirect('/Perusahaan/perusahaan');
    }
  }

  public function perusahaan_Tampil()
  {
    $this->M_Company->perusahaan();
    $list = $this->M_Company->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $field->uscom_nama_com;
        $row[] = $field->uscom_tmpt_berdiri;
        $row[] = $field->uscom_tgl_berdiri;
        $row[] = $field->uscom_nohp;
        $row[] = $field->uscom_telepon;
        $row[] = $field->uscom_prov;
        $row[] = $field->uscom_kota;
        $row[] = '<img width="100" height="100" src="'. base_url() . 'uploads/' .$field->uscom_image .'">';
        $row[] = "<button class='btn btn-success update-dataPerusahaan' data-id='". $field->uscom_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
        <a class='btn btn-danger' href='". base_url() . "/Perusahaan/delete/" .$field->uscom_id ."'> Hapus </a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Company->count_all(),
        "recordsFiltered" => $this->M_Company->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function update_perusahaan() {
		$id = $this->input->post('id');

    $data['provinsi'] = $this->M_Sumber->getProv();
    $data['kota'] = $this->M_Sumber->getKota();
    $data['perusahaan'] = $this->M_Company->getEdit_perusahaan($id);

		echo show_my_modal('modals/update_perusahaan', 'update-perusahaan', $data);
	}

  public function delete($id) {
    $this->M_Company->delete($id);
    redirect('Perusahaan/perusahaan');
  }

  // pelamar

  public function pelamar()
  {
    $data['modal_tambah_pelamar'] = show_my_modal('modals/tambah_pelamar', 'tambah-pelamar');
    $this->load->template('pelamar',$data);
  }

  public function update_pelamar() {
		$id 						= trim($_POST['id']);
		$where['n_id']	= $id;
		$data = "";

		echo show_my_modal('modals/update_pelamar', 'update-pelamar', $data);
	}

  public function delete_pelamar() {
    $id = $this->input->post('id');
  }

  // campus recruitment

  public function campus_recruitment()
  {
    $data['modal_tambah_campus_recruitment'] = show_my_modal('modals/tambah_campus_recruitment', 'tambah-campus_recruitment');
    $this->load->template('campus_recruitment',$data);
  }

  public function update_campus_recruitment() {
		$id 						= trim($_POST['id']);
		$where['n_id']	= $id;
		$data = "";

		echo show_my_modal('modals/update_campus_recruitment', 'update-campus_recruitment', $data);
	}

  public function delete_campus_recruitment() {
    $id = $this->input->post('id');
  }
}
