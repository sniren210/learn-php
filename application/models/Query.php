<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAll($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	public function getOne($table,$field)
	{
		$this->db->select($field);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	public function deleteData($table,$dataDB,$data)
	{
		// $this->db->where($dataDB,$data);
		$this->db->delete($table, $data);
	}

	public function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

	public function updateData($table,$data,$field,$id)
	{
		$this->db->where($field,$id);
		$this->db->update($table,$data);
	}

	public function joinTwoLeft($table1,$table2,$field1,$field2){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('berita.status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}
}