
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//halaman login
	public function user()
	{

		// validasi
		$this->form_validation->set_rules('username','Username','required',
				array('required' => 'Username / Password Anda Salah' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Username / Password Anda Salah' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login Administrator');
		$this->load->view('admin/login/index', $data, FALSE);
	}
		
		// ambil fungsi logout
	public function logout()
	{
		$this->simple_login->logout();
	}
	
		//halaman login Pelanggan
	public function pegawai()
	{

		// validasi
		$this->form_validation->set_rules('id','ID','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$id 		= $this->input->post('id');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login_pegawai($id,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login' );
		$this->load->view('login/index', $data, FALSE);
	}
		// ambil fungsi logout
	public function logout_pegawai()
	{
		$this->simple_login->logout_pegawai();
	}
	
	public function forgotPassword()
	{
		$data = array( 'title' 	=> 	'Forgot Password' );
		$this->load->view('login/forgotPassword', $data, FALSE);
	}

	public function resetLink()
	{
		$email = $this->input->post('email');
		$result = $this->db->query("SELECT * from pegawai where email = '" . $email . "'")->result_array();

		//echo $r['token'];
		// print_r($result); die();
		if(count($result) > 0)
		{
			$reset_token = rand(1000,9999);

			$this->db->query("update pegawai set password='".SHA1($reset_token)."' where email ='".$email."'");

			$this->load->library('email');

			$config = array(
				'protocol'		=> 'smtp',
				'smtp_host'		=> 'smtp.gmail.com',
				'smtp_crypto'	=> 'ssl',
				'smtp_port'		=> 465,
				'smtp_user'		=> 'raynaldoriantama@gmail.com',
				'smtp_pass'		=> 'raynaldo1q2w3e4r5t',
				'mailtype'		=> 'html',
				'charset'		=> 'utf-8',
				'newline'       => "\r\n",
				'mailtype'		=> 'html',
				'wordwrap'		=> TRUE,
				'validation'	=> TRUE
			);

			$this->email->initialize($config);

			$this->email->from('raynaldoriantama@gmail.com', 'Reset Password');
			$this->email->to($email);
			$this->email->subject('Reset Password');
			$this->email->message("Click this link to Reset Password <br> <a href='". base_url('login/reset?token=').$reset_token."'>RESET PASSWORD</a><br>Password anda adalah'".$reset_token."'");
			if($this->email->send())
			{
				// echo "SUKSES";
				$this->session->set_flashdata('sukses', 'Silahkan Check Email');
				redirect(base_url('login/pegawai'),'refresh');
			}
			else
			{
				echo "GAGAL";
				// echo $this->email->error();
			}
		}
		else
		{
			$this->session->set_flashdata('warning', 'Email tidak terdaftar !!');
			redirect(base_url('login/forgotPassword'));
		}
	}

	public function reset()
	{
		$data['reset_token'] = $this->input->get('reset_token');
		$_SESSION['reset_token']=$data['reset_token'];
		$this->load->view('login/resetpass');
	}

	public function updatepass()
	{
		$_SESSION['reset_token'];
		$data=$this->input->post();
		if($data['password']==$data['cpassword'])
		{
			$this->db->query("update pelanggan set password='".$data['password']."' where password='".$_SESSION['reset_token']."'");
			$data = array( 'title' 	=> 	'Login' );
			$this->load->view('login/index', $data, FALSE);
		}
	}
}