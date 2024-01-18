<?php
class M_alumni extends CI_Model{
    protected function jumlah_view(){
        $id_alumni = $this->auth_lib->profil()['id'];
        $this->db->select('*');
        $this->db->from('count_view_ta');
        $this->db->join('tugas_akhir','count_view_ta.id_tugas_akhir=tugas_akhir.id');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->where('alumni.id',$id_alumni);
        $query = $this->db->get();
        return $query->num_rows();
    }
    protected function jumlah_donwload_jurnal(){
        $id_alumni = $this->auth_lib->profil()['id'];
        $this->db->select('*');
        $this->db->from('count_donwload_jurnal');
        $this->db->join('tugas_akhir','count_donwload_jurnal.id_tugas_akhir=tugas_akhir.id');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->where('alumni.id',$id_alumni);
        $query = $this->db->get();
        return $query->num_rows();
    }
    protected function jumlah_donwload_ta(){
        $id_alumni = $this->auth_lib->profil()['id'];
        $this->db->select('*');
        $this->db->from('count_donwload_ta');
        $this->db->join('tugas_akhir','count_donwload_ta.id_tugas_akhir=tugas_akhir.id');
        $this->db->join('alumni','tugas_akhir.id_alumni=alumni.id');
        $this->db->where('alumni.id',$id_alumni);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function jumlah(){
        $jumlah = [
            'view'=>$this->jumlah_view(),
            'jurnal'=>$this->jumlah_donwload_jurnal(),
            'ta'=>$this->jumlah_donwload_ta(),
        ];
        return $jumlah;
    }
}