<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// load model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengaduan_model');
		$this->load->model('jenis_model');
		$this->load->model('bendungan_model');
		$this->load->model('pintu_air_model');
		$this->load->helper('string');
	}

	//halaman utama website 
	public function index()
	{
		$id = $this->session->userdata('id');
		$pengaduan 	=	$this->pengaduan_model->index($id);

		$data = array( 	'title'		=> 'Laporan Maintenance',
						'pengaduan'	=>	$pengaduan,
						// 'slider'	=>	$slider,
						'isi'		=> 	'home/index'
					);
		// print_r($data); die();
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function riwayat($id_pelanggan){
		$riwayat = $this->pengaduan_model->riwayat($id_pelanggan);

		$data = array( 	'title' 	=> 	'Pengaduan TV Kabel',
						'riwayat'	=>	$riwayat,
						'isi'		=>  'home/index');
		// print_r($data); die();
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		if($this->session->userdata('email')){
			$id				= $this->session->userdata('id');
			$email			= $this->session->userdata('email');
			$nama_pegawai	= $this->session->userdata('nama_pegawai');

			$pegawai 		= $this->pelanggan_model->sudah_login($email,$nama_pegawai);
			$jenis_maintenance = $this->jenis_model->listing();
			$bendungan = $this->bendungan_model->listing();
			$pintu_air = $this->pintu_air_model->listing();

			$valid = $this->form_validation;

			$valid->set_rules('rincian_kendala','Kendala','required',
				array( 	'required'		=> '%s harus diisi'));


			if($valid->run()===FALSE){
				
				$data = array(	'pegawai' 				=> $pegawai,
								'jenis_maintenance'		=> $jenis_maintenance,
								'bendungan'				=> $bendungan,
								'pintu_air'				=> $pintu_air,
								'isi' 					=> 'home/tambah');

				$this->load->view('home/layout/wrapper', $data, FALSE);
			} else {
				$i = $this->input;
				$data = array(	'pegawai_id'		=> $this->session->userdata('id'),
								'no_pengaduan' 		=> $i->post('no_pengaduan'),
								'bendungan_id' 		=> $i->post('bendungan_id'),
								'pintu_air_id' 		=> $i->post('pintu_air'),
								'rincian_kendala'	=> $i->post('rincian_kendala'),
								'status'			=> '0',
								'tanggal_pengaduan'	=> date('Y-m-d H:i:s'));
				
				$jenis_id = $i->post('jenis_id');
				// print_r($jenis_id); die();

				$this->pengaduan_model->tambah($data, $jenis_id);
				$this->session->set_flashdata('sukses', 'Pengaduan terkirim.');
				redirect(base_url('home/index'),'refresh');
				
			}
		}
	}

	public function pintuAir()
	{
		$bendungan_id = $this->input->post('bendungan_id');

		$bendungan = $this->pintu_air_model->listByBendungan($bendungan_id);

		$lists = "<option value=''>Pilih</option>";

		foreach ($bendungan as $data) {
			$lists .= "<option value='".$data->id."'>".$data->nama."</option>";
		}

		$callback = array('list_bendungan'=>$lists);
		// print_r($callback); die();
		echo json_encode($callback);
	}

	public function detail_pengaduan($no_pengaduan)
	{
		$detail_pengaduan = $this->pengaduan_model->detail_pengaduan($no_pengaduan);
		$data = array(	'title'				=> 'Detail Pengaduan',
						'detail_pengaduan' 	=> $detail_pengaduan,
						'isi'				=> 'home/detail_pengaduan');
		// print_r($data); die();
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}
	

	public function edit_profile($id_pelanggan)
	{
		$id_user = $this->session->userdata('id_pelanggan');
		$valid = $this->form_validation;
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */