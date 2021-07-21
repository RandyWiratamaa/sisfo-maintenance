<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pintu_air_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('pintu_air.*,bendungan.nama as nm_bendungan');
        $this->db->from('pintu_air');
        $this->db->join('bendungan', 'bendungan.id = pintu_air.bendungan_id');
        $this->db->order_by('pintu_air.id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($data)
    {
        $this->db->insert('pintu_air', $data);
    }

    public function bendungan()
    {
        $this->db->select('*');
        $this->db->from('bendungan');
        $query = $this->db->get();
    }

    public function listByBendungan($bendungan_id)
    {
        $this->db->where('bendungan_id', $bendungan_id);
        $result = $this->db->get('pintu_air')->result();

        return $result;
    }
}
