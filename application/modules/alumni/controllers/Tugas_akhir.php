<?php
class Tugas_akhir extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->alumni_login();
        $this->load->model('M_Tugas_akhir','tugas_akhir');
    }
    public function index(){
        $data['title'] = "Tugas Akhir ".$this->auth_lib->profil()['nama'];
        $data['tugas_akhir'] = $this->tugas_akhir->get_tugas_akhir();
        $this->template->load('template/main','alumni/tugas_akhir/tugas_akhir',$data);
    }
    public function modifikasi(){
        $judul = $this->input->post('judul');
        $abstrak = $this->input->post('abstrak');
        $keyword = $this->input->post('keyword');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $referensi = $this->input->post('referensi');

        if(empty($judul) || empty($abstrak) || empty($keyword) || empty($tahun_terbit) || empty($referensi)){
            $this->session->set_flashdata('flash',alertme('danger',"Form Tugas Akhir Tidak Boleh Kosong"));
            redirect('alumni/tugas_akhir');
        }else{
            if($this->tugas_akhir->modifikasi() > 0){
                $this->session->set_flashdata('flash',alertme('success','Tugas Akhir Berhasil Di Update'));
                redirect('alumni/tugas_akhir');
            }else{
                $this->session->set_flashdata('flash',alertme('danger','Tugas Akhir Gagal Di Update'));
                redirect('alumni/tugas_akhir');
            }
        }
    }
}