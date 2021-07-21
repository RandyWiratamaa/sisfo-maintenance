<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }
    
    public function tampil($id_user){
        $tampil = $this->profile_model->tampil($id_user);
		$data   = array(	'title'			=> 'Profile',
						'tampil'        	=> $tampil,
						'isi'				=> 'admin/profile/index');
		print_r($data); die();
		$this->load->view('home/layout/wrapper', $data, FALSE);
    }
}