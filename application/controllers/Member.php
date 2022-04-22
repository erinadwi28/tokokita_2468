<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

   function __construct()
   {
      parent::__construct();
      $this->load->model('Mcrud');
   }

	public function index()
	{
		$data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();
      $this->template->load('layout_admin', 'admin/member/index', $data);
	}

   public function nonAktif($id){

      $dataWhere = array('idKonsumen'=>$id);
      $this->Mcrud->nonAktifMember('tbl_member', $dataWhere);
      redirect('member');
   }

   public function aktif($id){

      $dataWhere = array('idKonsumen'=>$id);
      $this->Mcrud->aktifMember('tbl_member', $dataWhere);
      redirect('member');
   }

}
