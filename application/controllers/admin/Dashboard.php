<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		// proteksi halaman 
		$this->simple_login->cek_login();
		$this->load->model('pengaduan_model');
		// $this->load->model('produk_model');
		// $this->load->model('kategori_model');
	}
	
	// halaman dashbor admin
	public function home($bendungan_id){

		// echo $this->session->userdata('bendungan_id'); die();

		$total_teknisi				= 	$this->user_model->total_teknisi();
		$total_user_reguler			= 	$this->user_model->total_user_reguler();
		$pengaduan					= 	$this->pengaduan_model->pengaduan($bendungan_id);

		$data = array( 	'title' 				=> 	'Dashboard',
						'total_teknisi'			=>	$total_teknisi,
						'total_user_reguler'	=>	$total_user_reguler,
						'pengaduan'				=>	$pengaduan,
						'isi'					=>	'admin/dashboard/index' 
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function verifikasi($id)
	{
		$data 	= array('id' => $id );
		$this->pengaduan_model->verifikasi($data);
		$this->session->set_flashdata('sukses', 'Data Telah Diverifikasi');
		redirect(base_url('admin/dashboard'),'refresh');
	}

	public function pesan($no_pengaduan)
	{
		$detail_pengaduan = $this->pengaduan_model->detail_pengaduan($no_pengaduan);

		$valid 		= 	$this->form_validation;
		$valid->set_rules('catatan','Catatan Perbaikan','required',
			array( 	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
			$data = array(	'isi' => 'admin/dashboard/pesan',
							'detail_pengaduan' 	=> $detail_pengaduan);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$data = array (	'no_pengaduan'		=> $no_pengaduan,
							'catatan' 			=> $i->post('catatan'),
							'id_teknisi'		=> $i->post('id_teknisi'),
							'status'			=> $i->post('status'));

			$this->pengaduan_model->edit($data);


			// SEND SMS GATEWAY
			
			// $userkey = 'bcd4ef197eb7';
			// $passkey = 'dqzqu2jqiw';
			// $telepon = $i->post('telepon');
			// $message = $i->post('catatan');
			// $url = "https://reguler.zenziva.net/apps/smsapi.php";
			// $curlHandle = curl_init();
			// curl_setopt($curlHandle, CURLOPT_URL, $url);
			// curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 
			// 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
			// curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			// curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
			// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
			// curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
			// curl_setopt($curlHandle, CURLOPT_POST, 1);
			// $results = curl_exec($curlHandle);
			// curl_close($curlHandle);
			// $XMLdata = new SimpleXMLElement($results);
			// $status = $XMLdata->message[0]->text;
			// print_r($XMLdata);
			// echo $status;

			$this->session->set_flashdata('sukses', 'Data Berhasil Di Proses');
			redirect(base_url('admin/dashboard'),'refresh');
		}
	}

}
