<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->admin_login();
        $this->load->model('admin/M_user','user');
    }
    public function index(){
        $data['title'] = "Manajemen User";
        $data['user'] = $this->user->get_user();
        $this->template->load('template/main','admin/user/user',$data);
    }
    public function add(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');

        if(empty($nama) || empty($username) || empty($password) || empty($no_telpon)){
            $this->session->set_flashdata('flash',alertme('danger','Form user Tidak Boleh Kosong'));
            redirect('admin/user');
        }else{
            if($this->user->add() > 0){
                $this->session->set_flashdata('flash',alertme('success','User Berhasil Di Tambah'));
                redirect('admin/user');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','User Gagal Di Tambah'));
                redirect('admin/user');
            }
        }
    }
    public function id($id=null){
        $check_id_admin = $this->db->get_where('admin',['id'=>$id])->num_rows();
        if($check_id_admin === 0 || empty($id)){
            redirect('admin/user');
        }else{
            echo json_encode($this->user->id($id));
        }
    }
    public function edit(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');

        if(empty($id) || empty($nama) || empty($username) || empty($password) || empty($no_telpon)){
            $this->session->set_flashdata('flash',alertme('danger','Form user Tidak Boleh Kosong'));
            redirect('admin/user');
        }else{
            if($this->user->edit() > 0){
                $this->session->set_flashdata('flash',alertme('success','User Berhasil Di Edit'));
                redirect('admin/user');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','User Gagal Di Edit'));
                redirect('admin/user');
            }
        }
    }
    public function hapus(){
        if($this->user->hapus() > 0){
            $this->session->set_flashdata('flash',alertme('success',"Kaprodi Berhasil Di Hapus"));
            redirect('admin/user');
        }else{
            $this->session->set_flashdata('flash',alertme('danger',"Kaprodi Gagal Di Hapus"));
            redirect('admin/user');
        }
    }
}