<?php
class Kaprodi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->admin_login();
        $this->load->model('M_kaprodi','kaprodi');
    }
    public function index(){
        $data['title'] = "Ketua Prodi";
        $data['prodi'] = $this->kaprodi->prodi();
        $data['kaprodi'] = $this->kaprodi->get_kaprodi();
        $this->template->load('template/main','admin/kaprodi/kaprodi',$data);
    }
    public function add(){
        $nama_ketua_prodi = $this->input->post("nama_ketua_prodi");
        $id_prodi = $this->input->post("id_prodi");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        if(empty($nama_ketua_prodi) || empty($id_prodi) || empty($username) || empty($password)){
            $this->session->set_flashdata('flash',alertme('danger',"Form Kaprodi Tidak Boleh Kosong"));
            redirect('admin/kaprodi');
        }else{
            if($this->kaprodi->add() > 0){
                $this->session->set_flashdata('flash',alertme('success',"Kaprodi Berhasil Di Tambah"));
                redirect('admin/kaprodi');
            }else{
                $this->session->set_flashdata('flash',alertme('danger',"Kaprodi Gagal Di Tambah"));
                redirect('admin/kaprodi');
            }
        }
    }
    public function id($id=null){
        $check_id = $this->db->get_where('kaprodi',['id'=>$id])->num_rows();
        if(empty($id) || $check_id === 0){
            redirect('admin/kaprodi');
        }else{
            echo json_encode($this->kaprodi->id($id));
        }
    }
    public function edit(){
        $id = $this->input->post("id");
        $nama_ketua_prodi = $this->input->post("nama_ketua_prodi");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        if(empty($id) || empty($nama_ketua_prodi) || empty($username) || empty($password)){
            $this->session->set_flashdata('flash',alertme('danger',"Form Kaprodi Tidak Boleh Kosong"));
            redirect('admin/kaprodi');
        }else{
            if($this->kaprodi->edit() > 0){
                $this->session->set_flashdata('flash',alertme('success',"Kaprodi Berhasil Di Edit"));
                redirect('admin/kaprodi');
            }else{
                $this->session->set_flashdata('flash',alertme('danger',"Kaprodi Gagal Di Edit"));
                redirect('admin/kaprodi');
            }
        }
    }
    public function hapus(){
        if($this->kaprodi->hapus() > 0){
            $this->session->set_flashdata('flash',alertme('success',"Kaprodi Berhasil Di Hapus"));
            redirect('admin/kaprodi');
        }else{
            $this->session->set_flashdata('flash',alertme('danger',"Kaprodi Gagal Di Hapus"));
            redirect('admin/kaprodi');
        }
    }
}