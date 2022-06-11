<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      
      // if (!$this->session->userdata('idKonsumen')) {
      //    redirect('login');
      // }
		$this->load->model('Mcrud');
   }

	public function index()
	{
		$data['title'] = 'Halaman Utama';
		$data['produk'] = $this->Mcrud->get_all_data_produk()->result();
		$data['produk_terbaru'] = $this->Mcrud->get_all_produk_terbaru()->result();
		
		$this->template->load('frontend/layout_frontend', 'frontend/home', $data);
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		$data['jml_toko'] = $this->Mcrud->jumlah_toko()->result();
		$data['jml_produk'] = $this->Mcrud->jumlah_produk()->result();
		$data['jml_pesanan'] = $this->Mcrud->jumlah_pesanan()->result();
		$this->template->load('frontend/layout_frontend', 'frontend/dashboard', $data);
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

	//MENU PRODUK
	public function list_produk()
	{
		$data['title'] = 'Produk Toko Saya';
		$data['produk'] = $this->Mcrud->get_all_data_produk()->result();
		$this->template->load('frontend/layout_frontend', 'frontend/produk/index', $data);
	}

	public function add_produk()
	{
		$data['title'] = 'Buat Produk';
		$data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['toko'] = $this->Mcrud->get_all_data('tbl_toko')->result();
		$this->template->load('frontend/layout_frontend', 'frontend/produk/form_add', $data);
	}
	
	public function save_produk(){
		$idKat = $this->input->post('idKat');
		$idToko = $this->input->post('idToko');
		$namaProduk = $this->input->post('namaProduk');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$berat = $this->input->post('berat');
		$deskripsiProduk = $this->input->post('deskripsiProduk');
      $dataInsert = array(
			'idKat' => $idKat,
			'idToko'=> $idToko,
			'namaProduk' => $namaProduk,
			'harga' => $harga,
			'stok' => $stok,
			'berat' => $berat,
			'deskripsiProduk'=>$deskripsiProduk
		);

      $idProduk = $this->Mcrud->insertProduk($dataInsert, 'tbl_produk');

		if ($_FILES != null) {
			$this->aksi_upload_gambar_produk($idProduk);
		}
      redirect('list-produk');
	}


	public function getDetailProduk($id){
		$data['title'] = 'Edit Produk';
		$data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
      $data['toko'] = $this->Mcrud->get_all_data('tbl_toko')->result();
		$data['produk'] = $this->Mcrud->get_detail_data_produk($id)->row_object();
      $this->template->load('frontend/layout_frontend', 'frontend/produk/form_edit', $data);
   }

	public function editProduk(){
      $idProduk = $this->input->post('idProduk');
      $idKat = $this->input->post('idKat');
		$idToko = $this->input->post('idToko');
		$namaProduk = $this->input->post('namaProduk');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$berat = $this->input->post('berat');
		$deskripsiProduk = $this->input->post('deskripsiProduk');
      $dataUpdate = array(
			'idKat' => $idKat,
			'idToko'=> $idToko,
			'namaProduk' => $namaProduk,
			'harga' => $harga,
			'stok' => $stok,
			'berat' => $berat,
			'deskripsiProduk'=>$deskripsiProduk
		);
      $this->Mcrud->update('tbl_produk', $dataUpdate, 'idProduk', $idProduk);

		if ($_FILES != null) {
			$this->aksi_upload_gambar_produk($idProduk);
		}

      redirect('edit-produk/'. $idProduk);
   }

	private function aksi_upload_gambar_produk($idProduk)
	{
		$config['upload_path']          = './assets/member/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = 'produk-' . date('ymd') . '-' . substr(md5(rand()), 0, 5);

		$this->load->library('upload', $config);

		if (!empty($_FILES['berkas']['name'])) {

			if ($this->upload->do_upload('berkas')) {

				$uploadData = $this->upload->data();

				//Compres Foto
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/member/produk/' . $uploadData['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '80%';
				$config['width'] = 600;
				$config['height'] = 400;
				$config['new_image'] = './assets/member/produk/' . $uploadData['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$item = $this->db->where('idProduk', $idProduk)->get('tbl_produk')->row();

				//replace foto lama 
				if ($item->foto != "placeholder_image.png") {
					$target_file = './assets/member/produk/' . $item->foto;
					unlink($target_file);
				}

				$data['foto'] = $uploadData['file_name'];

				$this->db->where('idProduk', $idProduk);
				$this->db->update('tbl_produk', $data);
			}
		}
	}

	public function deleteProduk($id){
      $dataWhere = array('idProduk'=>$id);
      $this->Mcrud->delete('tbl_produk', $dataWhere);
      redirect('list-produk');
   }

	public function keranjang(){
		$data['title'] = 'Keranjang Saya';
		$data['kategori'] = $this->Mcrud->get_all_kategori()->result();
		$this->template->load('frontend/layout_frontend', 'frontend/keranjang', $data);
	}

	public function cart_tambah($idproduk){
		$status = $this->session->userdata('status');
		if(empty($status)){
			redirect('login');
		} else {
			$jml_keranjang = count($this->cart->contents());
			if(empty($jml_keranjang)){
				$data_produk = $this->Mcrud->get_produk_by_id($idproduk)->row_object();

				$insert_cart = array(
					'id' => $idproduk,
					'idToko' => $data_produk->idToko,
					'name' => $data_produk->namaProduk,
					'price' => $data_produk->harga,
					'gambar' => $data_produk->foto,
					'qty' => 1
				);

				$this->cart->insert($insert_cart);
				redirect('keranjang');
			} else {
				$idToko = '';
				if($cart = $this->cart->contents()){
					foreach($cart as $item){
						$idToko = $item['idToko'];
					}
				}

				$data_produk = $this->Mcrud->get_produk_by_id($idproduk)->row_object();
				if($idToko==$data_produk->idToko){
					$data_produk = $this->Mcrud->get_produk_by_id($idproduk)->row_object();

					$insert_cart = array(
						'id' => $idproduk,
						'idToko' => $data_produk->idToko,
						'name' => $data_produk->namaProduk,
						'price' => $data_produk->harga,
						'gambar' => $data_produk->foto,
						'qty' => 1
					);

					$this->cart->insert($insert_cart);
					redirect('keranjang');
				} else {
					echo "barang harus dari toko yang sama";
				}
			}
		}
	}

	public function hapus_cart($rowid){
		$data_hapus = array(
			'rowid'=>$rowid,
			'qty' => 0
		);

		$this->cart->update($data_hapus);
		redirect('keranjang');
	}

	public function selesai_belanja()
	{
		$idToko = ' ';
		if($cart = $this->cart->contents()){
			foreach($cart as $item){
				$idToko = $item['idToko'];
			}
		}
		$data_pembeli = array (
			'idKonsumen' => $this->session->userdata('idKonsumen'),
			'tglOrder'	=> date('Y-m-d'),
			'idToko'	=> $idToko,
			'statusOrder' => 'Belum Bayar',
		);
		$idTerakhir = $this->Mcrud->insert('tbl_order',$data_pembeli);
		$last_insert_id = $this->db->insert_id();

		if($cart = $this->cart->contents()){
			foreach($cart as $item){
				$data_detail = array(
					'idOrder'	=> $last_insert_id,
					'idProduk'	=> $item['id'],
					'jumlah'	=> $item['qty'],
					'harga'		=> $item['price']
				);

				$this->Mcrud->insert('tbl_detail_order',$data_detail);
			}
		}
		$this->cart->destroy();
		redirect('list-pesanan');
	}

	public function transaksi()
	{
		$data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['order']=$this->Mcrud->get_order()->result();
		$this->template->load('frontend/layout_frontend', 'frontend/transaksi/index', $data);
	}

}
