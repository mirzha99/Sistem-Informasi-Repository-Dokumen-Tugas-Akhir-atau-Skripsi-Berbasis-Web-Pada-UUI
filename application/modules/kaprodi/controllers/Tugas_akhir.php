<?php
class Tugas_akhir extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->kaprodi_login();
        $this->load->model('kaprodi/M_tugas_akhir','tugas_akhir');
    }
    public function index(){
        $data['title'] = "Tugas Akhir";
        $data['tugas_akhir'] = $this->tugas_akhir->get_tugas_akhir();
        $this->template->load('template/main','kaprodi/tugas_akhir/tugas_akhir',$data);
    }
}