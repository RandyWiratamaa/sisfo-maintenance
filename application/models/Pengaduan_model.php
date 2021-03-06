<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua produk
		public function index($id)
		{
			$this->db->select('pengaduan.*,
								pegawai.id,
								pegawai.nama_pegawai,
								pegawai.nik,
								pegawai.telepon,
								pegawai.alamat');
			$this->db->from('pengaduan');
			// join table database
			$this->db->join('pegawai', 'pegawai.id = pengaduan.pegawai_id', 'left');
			// $this->db->where(array('pengaduan.id' => $this->session->userdata('id')));
			// end join
			$this->db->where('pegawai_id',$id);
			$this->db->group_by('pengaduan.no_pengaduan');
			$this->db->order_by('no_pengaduan', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function pengaduanById($id)
		{
			$this->db->select('*');
			$this->db->from('pengaduan');
			$this->db->where('id', $id);
			$this->db->order_by('id', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		public function verifikasi($id)
		{
			$status = [
				'status'     => '1'
			];
			$this->db->set($status);
			$this->db->where('id', $id);
			$this->db->update();
		}

		public function pengaduan($bendungan_id){
			$this->db->select('pengaduan.*,
								pegawai.id,
								pegawai.nama_pegawai,
								pegawai.nik,
								pegawai.telepon,
								pegawai.alamat');
			$this->db->from('pengaduan');
			// join table database
			$this->db->join('pegawai', 'pegawai.id = pengaduan.pegawai_id', 'left');
			// end join
			$this->db->where('bendungan_id', $bendungan_id);
			$this->db->group_by('pengaduan.no_pengaduan');
			$this->db->order_by('no_pengaduan', 'desc');
			$query = $this->db->get();
			return $query->result();
		}	

		public function tambah ($data, $jenis_id)
		{
			$this->db->trans_start();
			$this->db->insert('pengaduan', $data);

			// print_r($data['bendungan_id']); die();

			$pengaduan_id = $this->db->insert_id();
			$pegawai_id = $data['pegawai_id'];
			$bendungan_id = $data['bendungan_id'];
			$pintu_air_id = $data['pintu_air_id'];
			$result = array();
			foreach($jenis_id AS $key => $val) {
				$result[] = array(
					'pengaduan_id' => $pengaduan_id,
					'jenis_id'	=> $_POST['jenis_id'][$key],
					'pegawai_id' => $pegawai_id,
					'bendungan_id' => $bendungan_id,
					'pintu_air_id' => $pintu_air_id
				);
			}

			$this->db->insert_batch('detail_pengaduan', $result);
			$this->db->trans_complete();
		}

		public function detail_pengaduan($no_pengaduan)
		{
			$this->db->select('pengaduan.no_pengaduan,
								pengaduan.tanggal_pengaduan,
								pengaduan.status,
								pegawai.alamat,
								pegawai.email,
								pegawai.telepon,
								jenis_maintenance.jenis,
								bendungan.nama as bendungan,
								pintu_air.nama as pintu_air,
								pegawai.nama_pegawai');
			$this->db->from('detail_pengaduan');
			// join table database
			$this->db->join('pengaduan', 'pengaduan.id = detail_pengaduan.pengaduan_id', 'left');
			$this->db->join('jenis_maintenance', 'jenis_maintenance.id = detail_pengaduan.jenis_id', 'left');
			$this->db->join('bendungan', 'bendungan.id = detail_pengaduan.bendungan_id', 'left');
			$this->db->join('pintu_air', 'pintu_air.id = detail_pengaduan.pintu_air_id', 'left');
			$this->db->join('pegawai', 'pegawai.id = detail_pengaduan.pegawai_id', 'left');
			// $this->db->group_by('pengaduan.no_pengaduan');
			// $this->db->group_by('pengaduan.tanggal_pengaduan');
			// $this->db->group_by('pengaduan.status');
			// $this->db->group_by('pegawai.alamat');
			// $this->db->group_by('pegawai.email');
			// $this->db->group_by('pegawai.telepon');
			// $this->db->group_by('pegawai.nama_pegawai');
			// $this->db->group_by('bendungan.nama');
			// $this->db->group_by('pintu_air.nama');
			// end join
			$this->db->where('pengaduan.no_pengaduan', $no_pengaduan);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit($data)
		{
			// print_r($data); die();
			$this->db->where('no_pengaduan', $data['no_pengaduan']);
			$this->db->update('pengaduan',$data);
		}



		// public function listing_report()
		// {
		// 	$this->db->select('produk.nama_produk,produk.stok,sum(transaksi_kasir.qty) as terjual');
		// 	$this->db->from('produk');
		// 	$this->db->join('transaksi_kasir', 'transaksi_kasir.kode_produk = produk.kode_produk', 'left');
		// 	$this->db->group_by('produk.kode_produk');
		// 	$this->db->order_by('terjual', 'desc');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// // listing semua produk Home
		// public function home()
		// {
		// 	$this->db->select('produk.*,
		// 						users.nama,
		// 						kategori.nama_kategori,
		// 						kategori.slug_kategori,
		// 						COUNT(gambar.id_gambar) AS total_gambar');
		// 	$this->db->from('produk');
		// 	// join table database
		// 	$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// 	// end join
		// 	$this->db->where('produk.status_produk', 'Publish');
		// 	$this->db->group_by('produk.id_produk');
		// 	$this->db->order_by('id_produk', 'desc');
		// 	$this->db->limit(12);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// // read Produk
		// public function read($slug_produk)
		// {
		// 	$this->db->select('produk.*,
		// 						users.nama,
		// 						kategori.nama_kategori,
		// 						kategori.slug_kategori,
		// 						COUNT(gambar.id_gambar) AS total_gambar');
		// 	$this->db->from('produk');
		// 	// join table database
		// 	$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// 	// end join
		// 	$this->db->where('produk.status_produk', 'Publish');
		// 	$this->db->where('produk.slug_produk', $slug_produk);
		// 	$this->db->group_by('produk.id_produk');
		// 	$this->db->order_by('id_produk', 'desc');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// // produk
		// public function produk($limit,$start)
		// {
		// 	$this->db->select('produk.*,
		// 						users.nama,
		// 						kategori.nama_kategori,
		// 						kategori.slug_kategori,
		// 						COUNT(gambar.id_gambar) AS total_gambar');
		// 	$this->db->from('produk');
		// 	// join table database
		// 	$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// 	// end join
		// 	$this->db->where('produk.status_produk', 'Publish');
		// 	$this->db->group_by('produk.id_produk');
		// 	$this->db->order_by('id_produk', 'desc');
		// 	$this->db->limit($limit,$start);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// //  Total Produk
		// public function total_produk()
		// {
		// 	$this->db->select('COUNT(*) AS total');
		// 	$this->db->from('produk');
		// 	$this->db->where('status_produk', 'Publish');
		// 	$query = $this->db->get();
		// 	// $row = $query->row();
		// 	// die($row);
		// 	return $query->row();
		// }

		// // kategori produk
		// public function kategori($id_kategori,$limit,$start)
		// {
		// 	$this->db->select('produk.*,
		// 						users.nama,
		// 						kategori.nama_kategori,
		// 						kategori.slug_kategori,
		// 						COUNT(gambar.id_gambar) AS total_gambar');
		// 	$this->db->from('produk');
		// 	// join table database
		// 	$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// 	// end join
		// 	$this->db->where('produk.status_produk', 'Publish');
		// 	$this->db->where('produk.id_kategori', $id_kategori);
		// 	$this->db->group_by('produk.id_produk');
		// 	$this->db->order_by('id_produk', 'desc');
		// 	$this->db->limit($limit,$start);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// //  Total kategori Produk
		// public function total_kategori($id_kategori)
		// {
		// 	$this->db->select('COUNT(*) AS total');
		// 	$this->db->from('produk');
		// 	$this->db->where('status_produk', 'Publish');
		// 	$this->db->where('id_kategori', $id_kategori);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }
		// //  Total kategori Produk Dasbord
		// public function total_kategori_dasbor()
		// {
		// 	$this->db->select('COUNT(*) AS total');
		// 	$this->db->from('kategori');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }


		// // listing kategori
		// public function listing_kategori()
		// {
		// 	$this->db->select('produk.*,
		// 						users.nama,
		// 						kategori.nama_kategori,
		// 						kategori.slug_kategori,
		// 						COUNT(gambar.id_gambar) AS total_gambar');
		// 	$this->db->from('produk');
		// 	// join table database
		// 	$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// 	// end join
		// 	$this->db->group_by('produk.id_kategori');
		// 	$this->db->order_by('id_produk', 'desc');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }		

		// // Detail produk
		// public function detail($id_produk)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('produk');
		// 	$this->db->where('id_produk', $id_produk);
		// 	$this->db->order_by('id_produk', 'ASC');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// // Detail gambar produk
		// public function detail_gambar($id_gambar)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('gambar');
		// 	$this->db->where('id_gambar', $id_gambar);
		// 	$this->db->order_by('id_gambar', 'ASC');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// // gambar
		// public function gambar($id_produk)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('gambar');
		// 	$this->db->where('id_produk', $id_produk);
		// 	$this->db->order_by('id_gambar', 'desc');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// // tambah data
		// public function tambah($data)
		// {
		// 	$this->db->insert('produk', $data);
		// }

		// // tambah gambar
		// public function tambah_gambar($data)
		// {
		// 	$this->db->insert('gambar', $data);
		// }

		// // edit data
		// public function edit($data)
		// {
		// 	$this->db->where('id_produk', $data['id_produk']);
		// 	$this->db->update('produk',$data);
		// }

		// // delete data
		// public function delete($data)
		// {
		// 	$this->db->where('id_produk', $data['id_produk']);
		// 	$this->db->delete('produk',$data);
		// }

		// // delete gambar
		// public function delete_gambar($data)
		// {
		// 	$this->db->where('id_gambar', $data['id_gambar']);
		// 	$this->db->delete('gambar',$data);
		// }

		// public function barcode_detail($kode_produk)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('produk');
		// 	$this->db->where('kode_produk', $kode_produk);
		// 	$this->db->order_by('id_produk');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function barcode_semua()
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('produk');
		// 	$this->db->order_by('id_produk');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }
		
}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */