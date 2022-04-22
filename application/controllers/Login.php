<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function aksi_login()
	{
      $this->load->model('Mlogin');
      $u = $this->input->post('username');
      $p = $this->input->post('password');

      $cek = $this->Mlogin->cek_login($u, $p);

      if($cek){
         $data_session = [
            'idAdmin' => $cek['idAdmin'],
            'userName' => $cek['userName'],
            'status' => 'login'
         ];

         $this->session->set_userdata($data_session);
         redirect('adminpanel/dashboard');
      } else {
         redirect('adminpanel');
      }
   }

   public function logout()
	{
      $this->session->sess_destroy();
      redirect('adminpanel');
   }
}
