<?php
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->admin_login();
        $this->load->model('admin/M_admin','admin');
    }
    public function index(){
        $data['title'] = "Home";
        $data['jumlah'] = $this->admin->get_count();
        $this->template->load('template/main','admin/home',$data);
    }
}