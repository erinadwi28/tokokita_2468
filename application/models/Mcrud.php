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
}
