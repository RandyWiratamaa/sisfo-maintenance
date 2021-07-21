<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Halaman Registrasi
	public function index()
	{
		require 'vendor/autoload.php';

		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_pegawai','Nama Lengkap','required',
			array( 	'required'		=> '%s harus diisi'));
		
		$valid->set_rules('nik','NIK','required|is_unique[pegawai.nik]',
			array( 	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s Sudah Terdaftar'));
		
		$valid->set_rules('email','Email','required|valid_email|is_unique[pegawai.email]',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid',
					'is_unique'		=> '%s Sudah Terdaftar'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));
		$valid->set_rules('repeat_password', 'Confirm Password', 'required|matches[password]',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE)
		{
			// end validasi
			$data = array('title' => 	'Registrasi Pegawai');
			$this->load->view('registrasi/index', $data, FALSE);
			// masuk Database
		} else
		{
			$nip = $this->input->post('nik');
			$cek_nip = $this->db->query("SELECT * from petugas where nip = '" . $nip . "'")->result_array();

			if(count($cek_nip) > 0)
			{
				$token = md5(rand());
				$i= $this->input;
				$data = array(	'nama_pegawai'		=>	$i->post('nama_pegawai'),
								'nik'				=>	$i->post('nik'),
								'email'				=>	$i->post('email'),
								'password'			=>	SHA1($i->post('password')),
								'telepon'			=>	$i->post('telepon'),
								'alamat'			=>	$i->post('alamat'),
								'tanggal_daftar'	=>	date('Y-m-d H:i:s'),
								'status'			=> 	"0",
								'token'				=>	$token
							);
				
				// print_r($data); die();
				$id = $this->pelanggan_model->tambah($data);
				
				// print_r($id); die();
				$subject = "Verifikasi Pendaftaran";
				$message = "<a href='".base_url()."registrasi/verify_email/".$token."'>VERIFIKASI</a>";
	
				$API_KEY = "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";
				
				if($id > 0)
				{			
					
					$email = new \SendGrid\Mail\Mail();
					$email->setFrom("noreply@pelaporanmaintenance.id", "Dinas Perairan");
					$email->setSubject($subject);
					$email->addTo($i->post('email'), $i->post('nama_pegawai'));
					$email->addContent("text/html", $message);
					// $email->addContent(
					// 	"text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
					// );
					$sendgrid = new \SendGrid($API_KEY);
	
					if($sendgrid->send($email));
					{
						// echo "Email Terkirim";
						$this->session->set_flashdata('sukses', 'Registrasi berhasil, Verifikasi Email terlebih dahulu !');
						redirect(base_url('login/pegawai'),'refresh');
					}
				}
			} else
			{
				$this->session->set_flashdata('sukses', 'NIP belum terdaftar !!');	
				redirect(base_url('registrasi'),'refresh');
			}
		}
	}

	public function verify_email()
	{
		if($this->uri->segment(3))
		{
			$verification_key = $this->uri->segment(3);
			if($this->pelanggan_model->verify_email($verification_key))
			{
				$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login/pegawai">here</a></h1>';
			}
			else
			{
				$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login/pegawai">here</a></h1>';
			}
			$this->load->view('registrasi/email_verification', $data);
			
		}
	}
	// public function sukses()
	// {
	// 	$data = array(	'title' => 	'Registrasi berhasil' );
	// 	$this->load->view('login/index', $data, FALSE);
	// }

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */