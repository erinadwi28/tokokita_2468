<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/form_login');
	}

	public function dashboard()
	{
		$this->template->load('layout_admin', 'admin/dashboard');
	}
}
