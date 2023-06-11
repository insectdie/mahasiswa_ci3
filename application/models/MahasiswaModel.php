<?php

class MahasiswaModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select(
            "m.id, m.nim, m.nama, m.alamat, m.no_hp, p.nama_prodi, j.nama_jurusan, m.kelas"
        );
        $this->db->from("tb_mahasiswa as m");
        $this->db->join("tb_prodi as p", "m.prodi_id = p.id", "left");
        $this->db->join("tb_jurusan as j", "m.jurusan_id = j.id", "left");
        $this->db->order_by("m.id", "desc");

        $query = $this->db->get();

        return $query->result();
    }

    public function rows_count()
    {
        return $this->db->count_all("tb_mahasiswa");
    }

    public function insert_mahasiswa()
    {
        $data = [
            "nim" => $this->input->post("nim"),
            "nama" => $this->input->post("nama"),
            "alamat" => $this->input->post("alamat"),
            "no_hp" => $this->input->post("no_hp"),
            "jurusan_id" => $this->input->post("jurusan_id"),
            "prodi_id" => $this->input->post("prodi_id"),
            "kelas" => $this->input->post("kelas"),
        ];

        return $this->db->insert("tb_mahasiswa", $data);
    }

    public function update_mahasiswa($id)
    {
        $data = [
            "nim" => $this->input->post("nim"),
            "nama" => $this->input->post("nama"),
            "alamat" => $this->input->post("alamat"),
            "no_hp" => $this->input->post("no_hp"),
            "jurusan_id" => $this->input->post("jurusan_id"),
            "prodi_id" => $this->input->post("prodi_id"),
            "kelas" => $this->input->post("kelas"),
        ];

        if ($id == 0) {
            return $this->db->insert("tb_mahasiswa", $data);
        } else {
            $this->db->where("id", $id);
            return $this->db->update("tb_mahasiswa", $data);
        }
    }

    public function find_mahasiswa($id)
    {
        return $this->db->get_where("tb_mahasiswa", ["id" => $id])->row();
    }

    public function delete_mahasiswa($id)
    {
        return $this->db->delete("tb_mahasiswa", ["id" => $id]);
    }
}
