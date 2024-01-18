<?php
class Auth extends CI_Controller{
   public function __construct(){
        parent::__construct();
        $this->auth_lib->is_login();
   }
   public function index(){
    $this->load->view('auth/login');
   }
   public function login(){
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          if(empty($username) || empty($password)){
               $this->session->set_flashdata('flash',alertme('danger','Form Login Tidak Boleh Kosong'));
               redirect('auth');
          }else{
               $this->_login();
          }
   }
   protected function _login(){
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $check_admin = $this->db->get_where('admin',['username'=>$username]);
          $check_kaprodi = $this->db->get_where('kaprodi',['username'=>$username]);
          $check_alumni = $this->db->get_where('alumni',['username'=>$username]);
          
          if($check_admin->num_rows() > 0){
               if(password_verify($password,$check_admin->row_object()->password)){
                    $admin = $check_admin->row_object();
                    $data_login = [
                         'id'=>$admin->id,
                         'nama'=>$admin->nama,
                         'username'=>$admin->username,
                         'gambar'=>$admin->gambar,
                    ];
                    $this->session->set_userdata('admin',$data_login);
                    redirect('admin');
               }else{
                    $this->session->set_flashdata('flash',alertme('danger','Password Salah'));
                    redirect('auth');
               }
          }elseif($check_kaprodi->num_rows() > 0){
               if(password_verify($password,$check_kaprodi->row_object()->password)){
                    $kaproid = $check_kaprodi->row_object();
                    $data_login = [
                         'id'=>$kaproid->id,
                         'nama'=>$kaproid->nama,
                         'username'=>$kaproid->username,
                         'gambar'=>$kaproid->gambar,
                    ];
                    $this->session->set_userdata('kaprodi',$data_login);
                    redirect('kaprodi');
               }else{
                    $this->session->set_flashdata('flash',alertme('danger','Password Salah'));
                    redirect('auth');
               }
          }elseif ($check_alumni->num_rows() > 0) {
               if(password_verify($password,$check_alumni->row_object()->password)){
                    $alumni = $check_alumni->row_object();
                    $data_login = [
                         'id'=>$alumni->id,
                         'nama'=>$alumni->nama,
                         'username'=>$alumni->username,
                         'gambar'=>$alumni->gambar,
                    ];
                    $this->session->set_userdata('alumni',$data_login);
                    redirect('alumni');
               }else{
                    $this->session->set_flashdata('flash',alertme('danger','Password Salah'));
                    redirect('auth');
               }
          }else{
               $this->session->set_flashdata('flash',alertme('danger','Username Tidak Di Temukan'));
               redirect('auth');
          }
   }
}