<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }
    
    public function index()
    {
        $jenis = $this->jenis_model->listing();

		$data = array(	'title'         => 'Data Bendungan' ,
						'jenis' 	    => $jenis ,
						'isi' 	        => 'admin/jenis/index'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('jenis','Jenis','required',
			array( 	'required'		=> '%s harus diisi'));
        
        if($valid->run()===FALSE) {
            
            $data = array ( 'title'     => 'Tambah Data',
                            'isi'       => 'admin/jenis/tambah'
                            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(  'jenis'      => $i->post('jenis'));
            $this->jenis_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
            redirect(base_url('admin/jenis'),'refresh');
        }
    }
}