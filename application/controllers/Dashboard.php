<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->model('pengaduan_model');
		// // $this->load->model('kategori_model');
		// // $this->load->model('konfigurasi_model');
		// $this->load->helper('string');
	}

    public function index() {

        $this->load->view('dashboard/index');
    }
}