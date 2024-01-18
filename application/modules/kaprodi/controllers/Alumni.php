<?php
class Alumni extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->kaprodi_login();
        $this->load->model('kaprodi/M_alumni','alumni');
    }
    public function index(){
        $data['title'] = "Alumni";
        $data['alumni'] = $this->alumni->get_alumni();
        $this->template->load('template/main','kaprodi/alumni/alumni',$data);
    }
    public function add(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        if(empty($nim) || empty($nama) || empty($username) || empty($password) || empty($no_telpon)){
            $this->session->set_flashdata('flash',alertme('danger','Form alumni tidak boleh kosong'));
            redirect('kaprodi/alumni');
        }else{
            if($this->alumni->add() > 0){
                $this->session->set_flashdata('flash',alertme('success','Alumni berhasil di tambah'));
                redirect('kaprodi/alumni');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Alumni gagal di tambah'));
                redirect('kaprodi/alumni'); 
            }
        }
    }
    public function id($id=null){
        $check_id = $this->db->get_where('alumni',['id'=>$id])->num_rows();
        if($id === null || $check_id === 0){
            redirect('kaprodi/alumni');
        }else{
            echo json_encode($this->alumni->id($id));
        }
    }
    public function edit(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        if(empty($nim) || empty($nama) || empty($username) || empty($password) || empty($no_telpon)){
            $this->session->set_flashdata('flash',alertme('danger','Form alumni tidak boleh kosong'));
            redirect('kaprodi/alumni');
        }else{
            if($this->alumni->edit() > 0){
                $this->session->set_flashdata('flash',alertme('success','Alumni berhasil di edit'));
                redirect('kaprodi/alumni');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Alumni gagal di edit'));
                redirect('kaprodi/alumni'); 
            }
        }
    }
    public function hapus(){
        if($this->alumni->hapus() > 0){
            $this->session->set_flashdata('flash',alertme('success','Alumni berhasil di hapus'));
            redirect('kaprodi/alumni');
        }else{
            $this->session->set_flashdata('flash',alertme('danger','Alumni gagal di hapus'));
            redirect('kaprodi/alumni'); 
        }
    }
}