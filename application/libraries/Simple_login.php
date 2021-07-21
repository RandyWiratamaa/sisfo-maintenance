<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load model
        $this->CI->load->model('user_model');
        $this->CI->load->model('pelanggan_model');
	}

	// fungsi login user
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user, maka buat session loginnya

		// print_r($check->bendungan_id); die();
		if ($check) {
			$id_user		=	$check->id_user;
			$nama			=	$check->nama;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			$bendungan_id	=	$check->bendungan_id;

			// echo($bendungan_id); die();
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('bendungan_id', $bendungan_id);

			
			if ($akses_level === 'Super Administrator' or $akses_level === 'Admin') {
				// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('admin/dashboard/home/'. $bendungan_id),'refresh');
			}else {
					// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('home'),'refresh');
				}
			
		}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/user'),'refresh');
			}
		}

		// fungsi login pelanggan
	public function login_pegawai($id,$password)
	{
		$check = $this->CI->pelanggan_model->login($id,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$nik				=	$check->nik;
			$id					=	$check->id;
			$nama_pegawai		=	$check->nama_pegawai;
			$email				=	$check->email;
			$status				=	$check->status;
			$token				=	$check->token;
			// buat session
			$this->CI->session->set_userdata('id',$id);
			$this->CI->session->set_userdata('nik',$nik);
			$this->CI->session->set_userdata('nama_pegawai',$nama_pegawai);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('status',$status);
			$this->CI->session->set_userdata('token',$token);
			// die();
			redirect(base_url('home'),'refresh');
		}else{
			// die();
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','ID atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/pelanggan'),'refresh');
			}
		}

	// fungsi cek login
	public function cek_login()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','Silahkan Login Terlebih Dahulu');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_akses_level()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('akses_level') == "User") {
			// $this->CI->session->set_flashdata('warning','Anda Bukan Admin');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi logout
	public function logout()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('bendungan_id');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('/'),'refresh');
		}

		// fungsi logout Pelanggan
	public function logout_pegawai()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('nik');
		$this->CI->session->unset_userdata('nama_pegawai');
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('token');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login/pegawai'),'refresh');
		}

}
