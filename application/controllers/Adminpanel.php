<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {


	public function index()
	{
		if (!$this->session->userdata('idAdmin')) {
			$this->load->view('admin/form_login');
		} else {
			$this->template->load('layout_admin', 'admin/dashboard');
		}
	}

	public function dashboard()
	{
		$this->template->load('layout_admin', 'admin/dashboard');
	}
}
