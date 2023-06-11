<?php
defined("BASEPATH") or exit("No direct script access allowed");

class MahasiswaController extends CI_Controller
{
    private $mahasiswa;
    private $jurusan;
    private $prodi;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');

        $this->load->model("MahasiswaModel");
        $this->load->model("JurusanModel");
        $this->load->model("ProdiModel");

        $this->mahasiswa = new MahasiswaModel();
        $this->jurusan = new JurusanModel();
        $this->prodi = new ProdiModel();
    }

    public function index()
    {
        $data["data"] = $this->mahasiswa->get_all();
        $this->load->template('mahasiswa/list', $data);
    }

    public function create()
    {
        $data['jurusan'] = $this->jurusan->get_all();
        $data['prodi_all'] = $this->prodi->get_all();
        $this->load->template('mahasiswa/create', $data);
    }

    public function store()
    {
        $this->form_validation();
    
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->mahasiswa->insert_mahasiswa();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
            redirect(base_url('mahasiswa'));
        }
    }

    public function edit($id)
    {
        $data = array(
            'jurusan' => $this->jurusan->get_all(),
            'prodi_all' => $this->prodi->get_all(),
            'prodi' => $this->prodi->find_prodi($id),
            'mahasiswa' => $this->mahasiswa->find_mahasiswa($id)
        );
        
        $this->load->template('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation();
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            redirect(base_url('mahasiswa/edit/' . $id));
        } else {
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            $this->mahasiswa->update_mahasiswa($id);
            redirect(base_url('mahasiswa'));
        }
    }

    public function form_validation() 
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[7]|max_length[7]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[50]');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|max_length[15]');
        $this->form_validation->set_rules('jurusan_id', 'Nama Jurusan', 'required');
        $this->form_validation->set_rules('prodi_id', 'Nama Program Studi', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|max_length[5]');
    }

    public function delete($id)
    {
        $this->mahasiswa->delete_mahasiswa($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
    }
}
