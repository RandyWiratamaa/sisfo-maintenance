<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

		public function status_user()
		{
			$this->db->select('*');
			$this->db->from('status_user');
			$this->db->order_by('id_status', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// listing semua user
		public function listing()
		{
			$this->db->select('users.*, bendungan.nama as bendungan');
			$this->db->from('users');
			$this->db->join('bendungan', 'bendungan.id = users.bendungan_id', 'left');
			$this->db->where('akses_level', 'Admin');
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail user
		public function detail($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id_user', $id_user);
			$this->db->order_by('id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		//  Total User Dasbord
		public function total_teknisi()
		{
			$this->db->select('COUNT(*) AS total');
			$this->db->from('users');
			// $this->db->where('akses_level','Teknisi');
			$query = $this->db->get();
			return $query->row();
		}

		public function total_user_reguler()
		{
			$this->db->select('COUNT(*) AS total');
			$this->db->from('pegawai');
			$query = $this->db->get();
			return $query->row();
		}

		// Login user
		public function login($username,$password)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array(	'username'	=> $username,
							 		'password'	=> SHA1($password)));
			$this->db->order_by('id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		// tambah data
		public function tambah($data)
		{
			$this->db->insert('users', $data);
		}
		// edit data
		public function edit($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users',$data);
		}
		// delete data
		public function delete($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->delete('users',$data);
		}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */