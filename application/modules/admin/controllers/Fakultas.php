<?php
class Fakultas extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->admin_login();
        $this->load->model('admin/M_fakultas','fakultas');
    }
    public function index(){
        $data['title'] = "Fakultas";
        $data['fakultas'] = $this->fakultas->get_fakultas();
        $this->template->load('template/main','admin/fakultas/fakultas',$data);
    }
    public function add(){
        $nama = $this->input->post('nama');
        if(empty($nama)){
            $this->session->set_flashdata('flash',alertme('danger','From Tidak Boleh Kosong'));
            redirect('admin/fakultas');
        }else{
            if($this->fakultas->add() > 0){
                $this->session->set_flashdata('flash',alertme('success','Fakultas Berhasil Di Tambah'));
                redirect("admin/fakultas");
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Fakultas Gagal Di Tambah'));
                redirect("admin/fakultas");
            }
        }
    }
    public function id($id=null){
        $check_id = $this->db->get_where('fakultas',['id'=>$id])->num_rows();
        if($id==null || $check_id === 0){
            redirect('admin/fakultas');
        }else{
            echo json_encode($this->fakultas->id($id));
        }
    }
    public function edit(){
        $nama = $this->input->post('nama');
        if(empty($nama)){
            $this->session->set_flashdata('flash',alertme('danger','From Tidak Boleh Kosong'));
            redirect('admin/fakultas');
        }else{
            if($this->fakultas->edit() > 0){
                $this->session->set_flashdata('flash',alertme('success','Fakultas Berhasil Di Edit'));
                redirect("admin/fakultas");
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Fakultas Gagal Di Edit'));
                redirect("admin/fakultas");
            }
        }
    }
    public function hapus(){
        if($this->fakultas->hapus() > 0){
            $this->session->set_flashdata('flash',alertme('success','Fakultas Berhasil Di Hapus'));
            redirect("admin/fakultas");
        }else{
            $this->session->set_flashdata('flash',alertme('danger','Fakultas Gagal Di Hapus'));
            redirect("admin/fakultas");
        }
    }
}