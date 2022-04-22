<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      
      if (!$this->session->userdata('idKonsumen')) {
         redirect('login');
      }
		$this->load->model('Mcrud');
   }

	public function index()
	{
		$data['title'] = 'Halaman Utama';
		$this->template->load('frontend/layout_frontend', 'frontend/home', $data);
	}

	//MENU TOKO
   public function list_toko()
	{
		$data['title'] = 'Toko Saya';
		$data['toko'] = $this->Mcrud->get_all_data('tbl_toko')->result();
		$this->template->load('frontend/layout_frontend', 'frontend/toko/index', $data);
	}

	public function add_toko()
	{
		$data['title'] = 'Buat Toko';
		$this->template->load('frontend/layout_frontend', 'frontend/toko/form_add', $data);
	}

	public function save_toko()
	{
		$namaToko = $this->input->post('namaToko');
		$deskripsi = $this->input->post('deskripsi');
      $dataInsert = array(
			'idKonsumen' => $this->session->userdata('idKonsumen'),
			'namaToko'=>$namaToko,
			'deskripsi'=>$deskripsi,
			'statusAktif'=> 'Y'
		);

      $idToko = $this->Mcrud->insertToko($dataInsert, 'tbl_toko');

		if ($_FILES != null) {
			$this->aksi_upload_logo_toko($idToko);
		}
      redirect('list-toko-saya');
	}

	private function aksi_upload_logo_toko($idToko)
	{
		$config['upload_path']          = './assets/member/toko/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = 'logo_toko-' . date('ymd') . '-' . substr(md5(rand()), 0, 5);

		$this->load->library('upload', $config);

		if (!empty($_FILES['berkas']['name'])) {

			if ($this->upload->do_upload('berkas')) {

				$uploadData = $this->upload->data();

				//Compres Foto
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/member/toko/' . $uploadData['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '80%';
				$config['width'] = 600;
				$config['height'] = 400;
				$config['new_image'] = './assets/member/toko/' . $uploadData['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$item = $this->db->where('idToko', $idToko)->get('tbl_toko')->row();

				//replace foto lama 
				if ($item->logo != "placeholder_image.png") {
					$target_file = './assets/member/toko/' . $item->logo;
					unlink($target_file);
				}

				$data['logo'] = $uploadData['file_name'];

				$this->db->where('idToko', $idToko);
				$this->db->update('tbl_toko', $data);
			}
		}
	}

	public function getDetailToko($id){
      $dataWhere = array('idToko'=>$id);
		$data['title'] = 'Edit Toko';
		$data['toko'] = $this->Mcrud->get_by_id('tbl_toko', $dataWhere)->row_object();
      $this->template->load('frontend/layout_frontend', 'frontend/toko/form_edit', $data);
   }

	public function editToko(){
      $idToko = $this->input->post('idToko');
      $namaToko = $this->input->post('namaToko');
		$deskripsi = $this->input->post('deskripsi');
      $dataUpdate = array(
			'namaToko'=>$namaToko,
			'deskripsi'=>$deskripsi,
		);
      $this->Mcrud->update('tbl_toko', $dataUpdate, 'idToko', $idToko);

		if ($_FILES != null) {
			$this->aksi_upload_logo_toko($idToko);
		}

      redirect('edit-toko-saya/'. $idToko);
   }

	public function nonAktifToko($id){

      $dataWhere = array('idToko'=>$id);
      $this->Mcrud->nonAktifToko('tbl_toko', $dataWhere);
      redirect('list-toko-saya');
   }

   public function aktifToko($id){

      $dataWhere = array('idToko'=>$id);
      $this->Mcrud->aktifToko('tbl_toko', $dataWhere);
      redirect('list-toko-saya');
   }

}
