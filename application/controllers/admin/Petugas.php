<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
    }

    public function index()
    {
        $petugas = $this->petugas_model->listing();
        $data = array(  'title'     => 'Data Petugas',
                        'petugas'   => $petugas,
                        'isi'       => 'admin/petugas/index'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $valid = $this->form_validation;
        
        $valid->set_rules('nama','Petugas','required',
			array( 	'required'		=> '%s harus diisi'));
        
        if($valid->run()===FALSE) {
            
            $data = array ( 'title'     => 'Tambah Data Petugas',
                            'isi'       => 'admin/petugas/tambah'
                            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(  'nip'       => $i->post('nip'),
                            'nama'      => $i->post('nama'),
                            'nohp'      => $i->post('nohp'),
                            'jenkel'    => $i->post('jenkel'),
                            'jabatan'   => $i->post('jabatan'),
                            'bendungan_id'  => $i->post('bendungan_id')
                        );
            $this->petugas_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
            redirect(base_url('admin/petugas'),'refresh');
        }
    }
}