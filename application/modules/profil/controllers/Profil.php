<?php
class Profil extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->auth_lib->profil() === NULL){
            redirect('auth');
        }
        $this->load->model('profil/M_profil','profil');
    }
    public function index(){
        $data['title'] = "profil";
        $data['profil'] = $this->auth_lib->profil();
        $this->template->load('template/main','profil/profil',$data);
    }
    public function update(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        if(empty($nama) || empty($username)){
            $this->session->set_flashdata('flash',alertme('danger','Form Profil Tidak Boleh Kosong'));
            redirect('profil');
        }else{
            if($this->profil->update() > 0){
                $this->session->set_flashdata('flash',alertme('success','Profil Berhasil di Update'));
                redirect('profil');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Profil Gagal di Update'));
                redirect('profil');
            }
        }
    }
}