<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function tampil($id_user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'ASC');
        $query = $this->db->get();
        return $query->row();
    }

    public function detail($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pelanggan', 'ASC');
        $query = $this->db->get();
        return $query->row();
    }
}