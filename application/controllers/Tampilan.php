<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('auth')){
        redirect('auth/login');
    }
    $this->load->model('M_Tampilan');
  }

  // slide show

  public function slide_show()
  {
    $data['modal_tambah_slide_show'] = show_my_modal('modals/tambah_slide_show', 'tambah-slide_show');
    $this->load->template('slide_show',$data);
  }

  public function tambah_slide_show()
  {
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

      echo json_encode([
        'success' => false,
        'msg' => show_err_message($error['error'])
      ]);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $this->M_Tampilan->add([
        'label' => '',
        'file' => $file_name,
        'data' => '',
        'type' => 'S',
        'admin_Id' => $this->session->us_id
      ]);

      echo json_encode([
        'success' => true,
        'msg' => 'berhasil disimpan'
      ]);
    }
  }

  public function delete() {
    $id = $this->input->post('id');
    $this->M_Tampilan->delete($id);
  }

  public function get_update_slide_show() {
		$id = $this->input->post('id');
    $data = $this->M_Tampilan->getEdit($id, 'S');
		echo show_my_modal('modals/update_slide_show', 'update-slide_show', $data);
	}

  public function update_slide_show() {
    $id = $this->input->post('id');

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

        echo json_encode([
          'success' => false,
          'msg' => show_err_message($error['error'])
        ]);
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $this->M_Tampilan->update([
          'id' => $id,
          'label' => '',
          'file' => $file_name,
          'data' => '',
        ]);

        echo json_encode([
          'success' => true,
          'msg' => 'berhasil diupdate'
        ]);
      }
    } else {

      echo json_encode([
        'success' => false,
        'msg' => show_err_message('gambar tidak boleh kosong')
      ]);
    }
	}

  // video

  public function video()
  {
    $data['modal_tambah_video'] = show_my_modal('modals/tambah_video', 'tambah-video');
    $this->load->template('video',$data);
  }

  public function tambah_video()
  {
    $url_video = $this->input->post('url_video');

    $this->M_Tampilan->add([
      'label' => '',
      'file' => $url_video,
      'data' => '',
      'type' => 'V',
      'admin_Id' => $this->session->us_id
    ]);

    echo json_encode([
      'success' => true,
      'msg' => 'berhasil disimpan'
    ]);
  }

  public function get_update_video() {
		$id = $this->input->post('id');
    $data = $this->M_Tampilan->getEdit($id, 'V');
		echo show_my_modal('modals/update_video', 'update-video', $data);
	}

  public function update_video() {
    $id = $this->input->post('id');
    $url_video = $this->input->post('url_video');

    $this->M_Tampilan->update([
      'id' => $id,
      'label' => '',
      'file' => $url_video,
      'data' => '',
    ]);

    echo json_encode([
      'success' => true,
      'msg' => 'berhasil diupdate'
    ]);
  }

  public function delete_video() {
    $id = $this->input->post('id');
  }

  // testimoni

  public function testimoni()
  {
    $data['modal_tambah_testimoni'] = show_my_modal('modals/tambah_testimoni', 'tambah-testimoni');
    $this->load->template('testimoni',$data);
  }

  public function tambah_testimoni()
  {
    $data['nama'] = $this->input->post('nama');
    $data['pesan_kesan_testimoni'] = $this->input->post('pesan_kesan_testimoni');

    $this->M_Tampilan->add([
      'label' => '',
      'file' => '',
      'data' => json_encode($data),
      'type' => 'T',
      'admin_Id' => $this->session->us_id
    ]);

    echo json_encode([
      'success' => true,
      'msg' => 'berhasil disimpan'
    ]);
  }

  public function update_testimoni() {
    $id = $this->input->post('id');
    $data['nama'] = $this->input->post('nama');
    $data['pesan_kesan_testimoni'] = $this->input->post('pesan_kesan_testimoni');

    $this->M_Tampilan->update([
      'id' => $id,
      'label' => '',
      'file' => '',
      'data' => $data,
      'type' => 'T',
      'admin_Id' => $this->session->us_id
    ]);

    echo json_encode([
      'success' => true,
      'msg' => 'berhasil diupdate'
    ]);
  }

  public function delete_testim() {
    $id = $this->input->post('id');
  }

  // career news

  public function career_news()
  {
    $data['modal_tambah_career_news'] = show_my_modal('modals/tambah_career_news', 'tambah-career_news');
    $this->load->template('career_news',$data);
  }

  public function tambah_career_news()
  {
    $this->load->template('modals/tambah_career_news');
  }

  public function save_career_news()
  {
    $data['info'] = $this->input->post('info');

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
      $data['gambar'] = $file_name;
      $this->M_Tampilan->add([
        'label' => '',
        'file' => '',
        'data' => json_encode($data),
        'type' => 'C',
        'admin_Id' => $this->session->us_id
      ]);

      redirect('/Tampilan/career_news');
    }
  }

  public function edit_career_news($id)
  {
    $data = $this->M_Tampilan->getEdit($id, 'C');
    $data['data'] = json_decode($data['tampil_data'], true);

    // die(var_export($data));

    $this->load->template('modals/update_career_news', $data);
  }

  public function update_career_news() {
    $id = $this->input->post('id');
    $data['gambar'] = $this->input->post('old_gambar');
    $data['info'] = $this->input->post('info');

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
        $data['gambar'] = $file_name;
        $this->M_Tampilan->update([
          'id' => $id,
          'label' => '',
          'file' => '',
          'data' => $data,
          'type' => 'C',
          'admin_Id' => $this->session->us_id
        ]);

        redirect('/Tampilan/career_news');
      }
    }
    else
    {
      $this->M_Tampilan->update([
        'id' => $id,
        'label' => '',
        'file' => '',
        'data' => $data,
        'type' => 'C',
        'admin_Id' => $this->session->us_id
      ]);

      redirect('/Tampilan/career_news');
    }
  }

  public function delete_career_news($id) {
    $this->M_Tampilan->delete($id);
    redirect('/Tampilan/career_news');
  }

  public function kerjasama()
  {
    $this->load->template('kerja_sama');
  }

  public function tambah_kerja_sama()
  {
    $this->load->template('modals/tambah_kerja_sama');
  }

  public function save_kerja_sama()
  {
    $data['deskripsi'] = $this->input->post('deskripsi');
    $data['negara'] = $this->input->post('negara');
    $data['provinsi'] = $this->input->post('provinsi');
    $data['kota'] = $this->input->post('kota');

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
      $data['gambar'] = $file_name;
      $this->M_Tampilan->add([
        'label' => '',
        'file' => '',
        'data' => json_encode($data),
        'type' => 'K',
        'admin_Id' => $this->session->us_id
      ]);

      redirect('/Tampilan/kerjasama');
    }
  }

  public function edit_kerja_sama($id)
  {
    $data = $this->M_Tampilan->getEdit($id, 'K');
    $data['data'] = json_decode($data['tampil_data'], true);

    // die(var_export($data));

    $this->load->template('modals/update_kerja_sama', $data);
  }

  public function update_kerja_sama() {
    $id = $this->input->post('id');
    $data['gambar'] = $this->input->post('old_gambar');
    $data['deskripsi'] = $this->input->post('deskripsi');
    $data['negara'] = $this->input->post('negara');
    $data['provinsi'] = $this->input->post('provinsi');
    $data['kota'] = $this->input->post('kota');

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
        $data['gambar'] = $file_name;
        $this->M_Tampilan->update([
          'id' => $id,
          'label' => '',
          'file' => '',
          'data' => $data,
          'type' => 'K',
          'admin_Id' => $this->session->us_id
        ]);

        redirect('/Tampilan/kerjasama');
      }
    }
    else
    {
      $this->M_Tampilan->update([
        'id' => $id,
        'label' => '',
        'file' => '',
        'data' => $data,
        'type' => 'K',
        'admin_Id' => $this->session->us_id
      ]);

      redirect('/Tampilan/kerjasama');
    }
  }

  public function delete_kerja_sama($id) {
    $this->M_Tampilan->delete($id);
    redirect('Tampilan/kerjasama');
  }

  public function data_slide_show() {
    $this->M_Tampilan->slide_show();
    $list = $this->M_Tampilan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] = '<img src="'. base_url() . 'uploads/'. $field->tampil_file .'" width="100" height="100">';
        $row[] = "<button class='btn btn-success update-slide_show' data-id='". $field->tampil_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
                  <button class='btn btn-danger konfirmasiHapus-slide_show' data-id='". $field->tampil_id ."' data-toggle='modal' data-target='#konfirmasiHapus'><i class='glyphicon glyphicon-remove-sign'></i> Hapus </button>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Tampilan->count_all(),
        "recordsFiltered" => $this->M_Tampilan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function data_video() {
    $this->M_Tampilan->video();
    $list = $this->M_Tampilan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $row = array();
        $row[] =  $field->tampil_file;
        $row[] = "<button class='btn btn-success update-video' data-id='". $field->tampil_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
                  <button class='btn btn-danger konfirmasiHapus-video' data-id='". $field->tampil_id ."' data-toggle='modal' data-target='#konfirmasiHapus'><i class='glyphicon glyphicon-remove-sign'></i> Hapus </button>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Tampilan->count_all(),
        "recordsFiltered" => $this->M_Tampilan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function data_testimoni() {
    $this->M_Tampilan->testimoni();
    $list = $this->M_Tampilan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $d = json_decode($field->tampil_data, true);
        $row = array();
        $row[] = $d['nama'];
        $row[] = $d['pesan_kesan_testimoni'];
        $row[] = "<button class='btn btn-success update-testimoni' data-id='". $field->tampil_id ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
                  <button class='btn btn-danger konfirmasiHapus-testimoni' data-id='". $field->tampil_id ."' data-toggle='modal' data-target='#konfirmasiHapus'><i class='glyphicon glyphicon-remove-sign'></i> Hapus </button>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Tampilan->count_all(),
        "recordsFiltered" => $this->M_Tampilan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function data_kerja_sama() {
    $this->M_Tampilan->kerja_sama();
    $list = $this->M_Tampilan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $d = json_decode($field->tampil_data, true);
        $row = array();
        $row[] = '<img width="100" height="100" src="'. base_url() .'uploads/'. $d['gambar'] .'">';
        $row[] = $d['deskripsi'];
        $row[] = $d['negara'];
        $row[] = $d['provinsi'];
        $row[] = $d['kota'];
        $row[] = "<a class='btn btn-success' href='". base_url()."Tampilan/edit_kerja_sama/" . $field->tampil_id ."'>Edit</a>
                  <a class='btn btn-danger' href='". base_url()."Tampilan/delete_kerja_sama/" . $field->tampil_id ."'>Delete</a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Tampilan->count_all(),
        "recordsFiltered" => $this->M_Tampilan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function data_career_news() {
    $this->M_Tampilan->carrer_news();
    $list = $this->M_Tampilan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
        $no++;
        $d = json_decode($field->tampil_data, true);
        $row = array();
        $row[] = '<img width="100" height="100" src="'. base_url() .'uploads/'. $d['gambar'] .'">';
        $row[] = $d['info'];
        $row[] = "<a class='btn btn-success' href='". base_url()."Tampilan/edit_career_news/" . $field->tampil_id ."'>Edit</a>
                  <a class='btn btn-danger' href='". base_url()."Tampilan/delete_career_news/" . $field->tampil_id ."'>Delete</a>";

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Tampilan->count_all(),
        "recordsFiltered" => $this->M_Tampilan->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }

  public function get_update_testimoni() {
		$id = $this->input->post('id');
    $data = $this->M_Tampilan->getEdit($id, 'T');
    $data['data'] = json_decode($data['tampil_data'], true);

		echo show_my_modal('modals/update_testimoni', 'update-testimoni', $data);
	}
}
