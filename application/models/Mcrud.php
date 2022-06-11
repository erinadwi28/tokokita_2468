<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_all_data($tabel)
	{
		$q = $this->db->get($tabel);
		return $q;
	}

	public function insert($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id)
	{
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id)
	{
		$this->db->where($id);
		$this->db->delete($tabel);
	}

	public function get_all_data_ongkir(){
		$this->db->select('tbl_kurir.idKurir, tbl_kurir.namaKurir, Asal.idKota As idKotaAsal, Tujuan.idKota As idKotaTujuan, Asal.namaKota As kotaAsal, Tujuan.namaKota As kotaTujuan, tbl_biaya_kirim.*');
      $this->db->from('tbl_biaya_kirim');
      $this->db->join('tbl_kurir', 'tbl_kurir.idKurir = tbl_biaya_kirim.idKurir', 'INNER');
      $this->db->join('tbl_kota As Asal', 'Asal.idKota  = tbl_biaya_kirim.idKotaAsal', 'INNER');
      $this->db->join('tbl_kota As Tujuan', 'Tujuan.idKota  = tbl_biaya_kirim.idKotaTujuan', 'INNER');

      return $this->db->get();
	}

	public function get_detail_data_ongkir($id){
		$this->db->select('tbl_kurir.idKurir, tbl_kurir.namaKurir, Asal.idKota As idKotaAsal, Tujuan.idKota As idKotaTujuan, Asal.namaKota As kotaAsal, Tujuan.namaKota As kotaTujuan, tbl_biaya_kirim.*');
      $this->db->from('tbl_biaya_kirim');
      $this->db->join('tbl_kurir', 'tbl_kurir.idKurir = tbl_biaya_kirim.idKurir', 'INNER');
      $this->db->join('tbl_kota As Asal', 'Asal.idKota  = tbl_biaya_kirim.idKotaAsal', 'INNER');
      $this->db->join('tbl_kota As Tujuan', 'Tujuan.idKota  = tbl_biaya_kirim.idKotaTujuan', 'INNER');
		$this->db->where('tbl_biaya_kirim.idBiayaKirim', $id);

      return $this->db->get();
	}

	
	public function get_data_kurir(){
		$this->db->select('*');
		$this->db->from('tbl_kurir');

		return $this->db->get();
	}

	public function get_data_kota(){
		$this->db->select('*');
		$this->db->from('tbl_kota');

		return $this->db->get();
	}

	public function aktifMember($tabel, $id)
	{
		$data = array(
			'statusAktif' => 'Y',
	  	);

		$this->db->where($id);
		$this->db->update($tabel, $data);
	}

	public function nonAktifMember($tabel, $id)
	{
		$data = array(
			'statusAktif' => 'N',
	  );

		$this->db->where($id);
		$this->db->update($tabel, $data);
	}

	//aksi tambah data toko
	public function insertToko($dataInsert, $tabel)
	{
		$this->db->insert($tabel, $dataInsert);
		return $this->db->insert_id();
	}

	public function aktifToko($tabel, $id)
	{
		$data = array(
			'statusAktif' => 'Y',
	  	);

		$this->db->where($id);
		$this->db->update($tabel, $data);
	}

	public function nonAktifToko($tabel, $id)
	{
		$data = array(
			'statusAktif' => 'N',
	  );

		$this->db->where($id);
		$this->db->update($tabel, $data);
	}

	public function get_all_data_produk(){
		$this->db->select('tbl_produk.*, tbl_toko.namaToko, tbl_kategori.namakat');
      $this->db->from('tbl_produk');
      $this->db->join('tbl_toko', 'tbl_produk.idToko = tbl_toko.idToko', 'INNER');
      $this->db->join('tbl_kategori', 'tbl_produk.idKat  = tbl_kategori.idKat', 'INNER');

      return $this->db->get();
	}

	//aksi tambah data produk
	public function insertProduk($dataInsert, $tabel)
	{
		$this->db->insert($tabel, $dataInsert);
		return $this->db->insert_id();
	}

	public function get_detail_data_produk($id){
		$this->db->select('tbl_produk.*, tbl_toko.namaToko, tbl_kategori.namakat');
      $this->db->from('tbl_produk');
      $this->db->join('tbl_toko', 'tbl_produk.idToko = tbl_toko.idToko', 'INNER');
      $this->db->join('tbl_kategori', 'tbl_produk.idKat  = tbl_kategori.idKat', 'INNER');
		$this->db->where('tbl_produk.idProduk', $id);
		
      return $this->db->get();
	}

	// jumlah pada dashboard user
	public function jumlah_toko() {
		$this->db->select('COUNT(idToko) as total_toko');
		$this->db->from('tbl_toko');

		$hasil = $this->db->get();
		return $hasil;
	}

	public function jumlah_produk() {
		$this->db->select('COUNT(idProduk) as total_produk');
		$this->db->from('tbl_produk');

		$hasil = $this->db->get();
		return $hasil;
	}

	public function jumlah_pesanan() {
		$this->db->select('COUNT(idOrder) as total_pesanan');
		$this->db->from('tbl_order');

		$hasil = $this->db->get();
		return $hasil;
	}

	public function get_all_produk_terbaru() {
		$this->db->order_by('idProduk', 'DESC');
		$this->db->limit(4);
		$hasil = $this->db->get('tbl_produk');
		return $hasil;
	}

	public function get_produk_by_id($id){
		$this->db->select('*');
      $this->db->from('tbl_produk');
		$this->db->where('idProduk', $id);
		
      return $this->db->get();
	}

	public function get_all_kategori(){
		$this->db->select('*');
      $this->db->from('tbl_kategori');
		
      return $this->db->get();
	}

	public function get_order(){
	  	$this->db->select('*');
      $this->db->from('tbl_order');
      $this->db->join('tbl_member','tbl_member.idKonsumen = tbl_order.idKonsumen');      
      $this->db->join('tbl_toko','tbl_order.idToko = tbl_toko.idToko');    
		$this->db->join('tbl_detail_order','tbl_order.idOrder = tbl_detail_order.idOrder');  
		$this->db->join('tbl_produk','tbl_detail_order.idProduk = tbl_produk.idProduk');  
      
      return $this->db->get();
	}

}
