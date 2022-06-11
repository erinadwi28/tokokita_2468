<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginMember extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('idKonsumen')) {
         redirect('frontend');
      } else {
			$data['title'] = 'Login Akun Pengguna';
		   $this->template->load('frontend/layout_frontend', 'frontend/form_login', $data);
		}
	}

	public function aksi_login()
	{
      $this->load->model('Mlogin');
      $u = $this->input->post('username');
      $p = $this->input->post('password');

      $cek = $this->Mlogin->cek_login_member($u, $p);

      if($cek){
         $data_session = [
            'idKonsumen' => $cek['idKonsumen'],
            'username' => $cek['username'],
            'status' => 'login'
         ];

         $this->session->set_userdata($data_session);
         redirect('beranda');
      } else {
         redirect('login');
      }
   }

   public function logout()
	{
      $this->session->sess_destroy();
      redirect('beranda');
   }
}
