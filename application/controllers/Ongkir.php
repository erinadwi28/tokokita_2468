<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

   function __construct()
   {
      parent::__construct();
      $this->load->model('Mcrud');
   }

	public function index()
	{
      $data['ongkir'] = $this->Mcrud->get_all_data_ongkir()->result();
		
      $this->template->load('layout_admin', 'admin/ongkir/index', $data);
	}

   public function add(){
      $data['kurir'] = $this->Mcrud->get_data_kurir()->result();
      $data['kota'] = $this->Mcrud->get_data_kota()->result();
      $this->template->load('layout_admin','admin/ongkir/form_add', $data);
   }

   public function save(){
      $dataInsert = array(
         'idKurir' => $this->input->post('idKurir'),
         'idKotaAsal' => $this->input->post('idKotaAsal'),
         'idKotaTujuan' => $this->input->post('idKotaTujuan'),
         'biaya' => $this->input->post('biaya')
      );

      $this->Mcrud->insert('tbl_biaya_kirim', $dataInsert);
      redirect('ongkir');
   }

   public function getid($id){
      $dataWhere = array('idBiayaKirim'=>$id);
		$data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $dataWhere)->row_object();
      $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
      $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();

      $this->template->load('layout_admin', 'admin/ongkir/form_edit', $data);
   }

   public function edit(){
      $id = $this->input->post('idBiayaKirim');
      $dataUpdate = array(
         'idKurir' => $this->input->post('idKurir'),
         'idKotaAsal' => $this->input->post('idKotaAsal'),
         'idKotaTujuan' => $this->input->post('idKotaTujuan'),
         'biaya' => $this->input->post('biaya')
      );

      $this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
      redirect('ongkir');
   }

   public function deleteOngkir($id){
      $dataWhere = array('idBiayaKirim'=>$id);
      $this->Mcrud->delete('tbl_biaya_kirim', $dataWhere);
      redirect('ongkir');
   }

}
