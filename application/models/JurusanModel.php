<?php

class JurusanModel extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_jurusan');
    $this->db->order_by('id', 'desc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }

  public function find_jurusan($id)
  {
    return $this->db->get_where('tb_jurusan', array('id' => $id))->row();
  }
  
}
