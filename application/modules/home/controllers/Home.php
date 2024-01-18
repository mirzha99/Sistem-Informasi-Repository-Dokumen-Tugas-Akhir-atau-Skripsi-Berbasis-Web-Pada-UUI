<?php
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->auth_lib->is_login();
        $this->load->model('home/M_tugas_akhir','tugas_akhir');
        $this->load->model('home/M_jumlah_pengunjung','jumlah_pengunjung');
    }
    public function index(){
        $data['title'] = "Home";
        $data['jumlah']=$this->jumlah_pengunjung->view();
        $data['tugas_akhir'] = $this->tugas_akhir->get_all_tugas_akhir();
        $this->template->load('template/home','home/tugas_akhir',$data);
    }
    public function fakultas($id=null){
        $nama_fakultas = $this->db->get_where('fakultas',['id'=>$id]);
        if($nama_fakultas->num_rows() === 0 || $id == null){
            redirect('home');
        }
        $data['title'] = "Fakultas {$nama_fakultas->row_object()->nama}";
        $data['jumlah']=$this->jumlah_pengunjung->view();
        $data['tugas_akhir'] = $this->tugas_akhir->get_fakultas_tugas_akhir($id);
        $this->template->load('template/home','home/tugas_akhir',$data);
    }
    public function prodi($id=null){
        $nama_prodi = $this->db->get_where('prodi',['id'=>$id]);
        if($nama_prodi->num_rows() === 0 || $id == null){
            redirect('home');
        }
        $data['title'] = "Prodi {$nama_prodi->row_object()->nama}";
        $data['jumlah']=$this->jumlah_pengunjung->view();
        $data['tugas_akhir'] = $this->tugas_akhir->get_prodi_tugas_akhir($id);
        $this->template->load('template/home','home/tugas_akhir',$data);
    }
    public function view($id=null){
        $check_tugas_akhir = $this->db->get_where('tugas_akhir',['id'=>$id])->num_rows();
        if($id==null|| $check_tugas_akhir === 0){
            redirect('home');
        }
        $this->tugas_akhir->count_view($id);
        $data['title'] ="Detail Tugas Akhir";
        $data['view'] = $this->tugas_akhir->view($id);
        $this->template->load('template/home','home/view_tugas_akhir',$data);
    }
    public function donwload_jurnal($id,$jurnal){
        $this->tugas_akhir->count_donwload_jurnal($id);
        redirect("assets/pdf/$jurnal");
    }
    public function donwload_ta($id,$ta){
        $this->tugas_akhir->count_donwload_ta($id);
        redirect("assets/pdf/$ta");
    }
    public function json($id=null){
        $check_tugas_akhir = $this->db->get_where('tugas_akhir',['id'=>$id])->num_rows();
        if($id==null|| $check_tugas_akhir === 0){
            echo json_encode(['msg'=>"Alumni Not Found"]);
        }else{
            echo json_encode($this->tugas_akhir->view($id));
        }
        
    }
}