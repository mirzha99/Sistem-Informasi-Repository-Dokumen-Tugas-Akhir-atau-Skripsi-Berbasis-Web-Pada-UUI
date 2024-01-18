<?php
class Prodi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->admin_login();
        $this->load->model('M_fakultas','fakultas');
        $this->load->model('M_prodi','prodi');
    }
    public function index(){
        $data['title'] = "Program Studi";
        $data['fakultas'] = $this->fakultas->get_fakultas();
        $data['prodi'] = $this->prodi->prodi();
        $this->template->load('template/main','admin/prodi/prodi',$data);
    }
    public function add(){
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_prodi = $this->input->post('nama_prodi');

        if(empty($id_fakultas) || empty($nama_prodi)){
            $this->session->set_flashdata('flash',alertme('danger','From Fakultas Atau Nama Prodi Tidak Boleh Kosong'));
            redirect('admin/prodi');
        }else{
            if($this->prodi->add() > 0){
                $this->session->set_flashdata('flash',alertme('success','Prodi Berhasil Di Tambah'));
                redirect("admin/prodi");
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Prodi Gagal Di Tambah'));
                redirect("admin/prodi");
            }
        }
    }
    public function id($id=null){
        $check_id = $this->db->get_where('prodi',['id'=>$id])->num_rows();
        if(empty($id) || $check_id === 0){
            redirect('admin/prodi');
        }else{
            echo json_encode($this->prodi->id($id));
        }
    }
    public function edit(){
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_prodi = $this->input->post('nama_prodi');

        if(empty($id_fakultas) || empty($nama_prodi)){
            $this->session->set_flashdata('flash',alertme('danger','From Fakultas Atau Nama Prodi Tidak Boleh Kosong'));
            redirect('admin/prodi');
        }else{
            if($this->prodi->edit() > 0){
                $this->session->set_flashdata('flash',alertme('success','Prodi Berhasil Di Edit'));
                redirect("admin/prodi");
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Prodi Gagal Di Edit'));
                redirect("admin/prodi");
            }
        }
    }
    public function hapus(){
        if($this->prodi->hapus() > 0){
            $this->session->set_flashdata('flash',alertme('success','Prodi Berhasil Di Hapus'));
            redirect("admin/prodi");
        }else{
            $this->session->set_flashdata('flash',alertme('danger','Prodi Gagal Di Hapus'));
            redirect("admin/prodi");
        }
    }
}