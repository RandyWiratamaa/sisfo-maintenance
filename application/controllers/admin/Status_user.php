<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_user extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }

    public function index()
	{
		$status_user = $this->user_model->status_user();

		$data = array(	'title' 		=> 'Status User' ,
						'status_user' 	=> $status_user ,
						'isi' 			=> 'admin/status_user/index'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
    
}