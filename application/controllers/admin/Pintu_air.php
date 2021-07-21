<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pintu_air extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pintu_air_model');
		$this->load->model('bendungan_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }
    
    public function index()
    {
        $pintu_air = $this->pintu_air_model->listing();

		$data = array(	'title'         => 'Data Pintu Air' ,
						'pintu_air' 	=> $pintu_air ,
						'isi' 	        => 'admin/pintu_air/index'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $valid = $this->form_validation;
        $bendungan = $this->bendungan_model->listing();

        $valid->set_rules('nama','Pintu Air','required',
			array( 	'required'		=> '%s harus diisi'));
        
        if($valid->run()===FALSE) {
            
            $data = array ( 'title'     => 'Tambah Data Bendungan',
                            'bendungan' => $bendungan,
                            'isi'       => 'admin/pintu_air/tambah'
                            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(  'nama'                  => $i->post('nama'),
                            'bendungan_id'          => $i->post('id_bendungan'),
                            'lebar'                 => $i->post('lebar'),
                            'tinggi_kerangka'       => $i->post('tinggi_kerangka'),
                            'tinggi_daun_pintu'     => $i->post('tinggi_daun_pintu')
                        );
            $this->pintu_air_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
            redirect(base_url('admin/pintu_air'),'refresh');
        }
    }
}