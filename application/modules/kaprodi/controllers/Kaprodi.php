<?php
class Kaprodi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->kaprodi_login();
        $this->load->model('kaprodi/M_tugas_akhir','tugas_akhir');
        $this->load->model('kaprodi/M_alumni','alumni');
    }
    public function index(){
        $data['title'] = "Kaprodi";
        $data['jumlah_ta'] = $this->tugas_akhir->count_tugas_akhir();
        $data['jumlah_alumni'] = $this->alumni->count_alumni();
        $this->template->load('template/main','kaprodi/home',$data);
    }
}