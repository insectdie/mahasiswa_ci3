<?php

class ProdiModel extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  { 
    $this->db->select('p.id, p.kode_prodi, p.nama_prodi, p.jurusan_id, j.kode_jurusan, j.nama_jurusan');
    $this->db->from('tb_prodi as p');
    $this->db->join('tb_jurusan as j', 'p.jurusan_id = j.id', 'left');
    $this->db->order_by('p.id', 'desc');
    
    $query = $this->db->get();
    
    return $query->result();
  }

  public function find_prodi($id)
  {
    return $this->db->get_where('tb_prodi', array('id' => $id))->row();
  }
}
