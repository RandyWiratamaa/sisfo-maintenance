<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendungan extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bendungan_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }
    
    public function index()
    {
        $bendungan = $this->bendungan_model->listing();

		$data = array(	'title'         => 'Data Bendungan' ,
						'bendungan' 	=> $bendungan ,
						'isi' 	=> 'admin/bendungan/index'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama','Bendungan','required',
			array( 	'required'		=> '%s harus diisi'));
        
        if($valid->run()===FALSE) {
            
            $data = array ( 'title'     => 'Tambah Data Bendungan',
                            'isi'       => 'admin/bendungan/tambah'
                            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(  'nama'      => $i->post('nama'),
                            'alamat'    => $i->post('alamat')
                        );
            $this->bendungan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
            redirect(base_url('admin/bendungan'),'refresh');
        }
    }
}