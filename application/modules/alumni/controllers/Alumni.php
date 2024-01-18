<?php 
class Alumni extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->alumni_login();
        $this->load->model('alumni/M_alumni','alumni');
    }
    public function index(){
        $data['title'] = "Alumni";
        $data['jumlah'] = $this->alumni->jumlah();
        $this->template->load('template/main','alumni/home',$data);
    }
}