<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	private $email_code;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	// listing semua pelanggan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail pelanggan
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// pelanggan yang login
	public function sudah_login($id,$nama_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id', $id);
		$this->db->where('nama_pegawai', $nama_pegawai);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login pelanggan
	public function login($id,$password)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where(array(	'nik'	=> $id,
								'password'	=> SHA1($password)));
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}
	// tambah data
	public function tambah($data)
	{
		$this->db->insert('pegawai', $data);
		return $this->db->insert_id();
	}

	public function verify_email($key)
	{
		$this->db->where('token', $key);
		$this->db->where('status', '0');
		$query = $this->db->get('pegawai');

		if($query->num_rows() > 0)
		{
			$data = array(
				'status'	=> '1'
			);
			$this->db->where('token', $key);
			$this->db->update('pegawai', $data);
			return true;
		}
		else
		{
			return false;
		}
	}

	
	// edit data
	public function edit($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan',$data);
	}
	// delete data
	public function delete($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan',$data);
	}
}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */