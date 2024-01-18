<?php
class logout extends CI_Controller{
    public function index(){
        $this->auth_lib->destroy_session();
        $this->session->set_flashdata('flash',alertme('success','Logout Berhasil'));
        redirect('auth');
    }
}