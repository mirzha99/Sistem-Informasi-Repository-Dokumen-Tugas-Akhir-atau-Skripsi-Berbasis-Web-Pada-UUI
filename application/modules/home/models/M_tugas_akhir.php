<?php
class M_tugas_akhir extends CI_Model{
    public function get_all_tugas_akhir(){
        $this->db->select('tugas_akhir.id,alumni.nama as nama_alumni,prodi.nama as nama_prodi,alumni.nim,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.abstrak,tugas_akhir.keyword');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $query = $this->db->get();
        return $query->result_object();
    }
    public function get_fakultas_tugas_akhir($id){
        $this->db->select('tugas_akhir.id,alumni.nama as nama_alumni,prodi.nama as nama_prodi,alumni.nim,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.abstrak,tugas_akhir.keyword');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where('fakultas.id',$id);
        $query = $this->db->get();
        return $query->result_object();
    }
    public function get_prodi_tugas_akhir($id){
        $this->db->select('tugas_akhir.id,alumni.nama as nama_alumni,prodi.nama as nama_prodi,alumni.nim,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.abstrak,tugas_akhir.keyword');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where('prodi.id',$id);
        $query = $this->db->get();
        return $query->result_object();
    }
    public function view($id){
        $this->db->select('tugas_akhir.id,alumni.nama as nama_alumni,prodi.nama as nama_prodi,alumni.nim,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.abstrak,tugas_akhir.keyword,tugas_akhir.referensi,tugas_akhir.file_jurnal,tugas_akhir.file_tugas_akhir');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where('tugas_akhir.id',$id);
        $query = $this->db->get();
        return $query->row_object();
    }
    public function count_view($id){
        $ip = $this->input->ip_address();
        $ta = $this->db->get_where('count_view_ta',['ip'=>$ip,'id_tugas_akhir'=>$id])->num_rows();
        if($ta === 0){
            $this->db->insert('count_view_ta',['ip'=>$ip,'id_tugas_akhir'=>$id]);
        }
    }
    public function count_donwload_jurnal($id){
        $ip = $this->input->ip_address();
        $ta = $this->db->get_where('count_donwload_jurnal',['ip'=>$ip,'id_tugas_akhir'=>$id])->num_rows();
        if($ta === 0){
            $this->db->insert('count_donwload_jurnal',['ip'=>$ip,'id_tugas_akhir'=>$id]);
        }
    }
    public function count_donwload_ta($id){
        $ip = $this->input->ip_address();
        $ta = $this->db->get_where('count_donwload_ta',['ip'=>$ip,'id_tugas_akhir'=>$id])->num_rows();
        if($ta === 0){
            $this->db->insert('count_donwload_ta',['ip'=>$ip,'id_tugas_akhir'=>$id]);
        }
    }
}