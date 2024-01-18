<?php
class M_tugas_akhir extends CI_Model{
    public function count_tugas_akhir(){
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $this->db->select('tugas_akhir.id,alumni.nim,alumni.nama as nama_alumni,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.file_jurnal,tugas_akhir.file_tugas_akhir');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->where('prodi.id',$id_prodi);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_tugas_akhir(){
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $this->db->select('tugas_akhir.id,alumni.nim,alumni.nama as nama_alumni,tugas_akhir.tahun_terbit,tugas_akhir.judul,tugas_akhir.file_jurnal,tugas_akhir.file_tugas_akhir');
        $this->db->from('tugas_akhir');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->join('prodi','alumni.id_prodi=prodi.id');
        $this->db->where('prodi.id',$id_prodi);
        $this->db->order_by('alumni.nim','ASC');
        $query = $this->db->get();
        return $query->result_object();
    }
}