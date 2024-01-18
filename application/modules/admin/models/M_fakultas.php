<?php
class M_fakultas extends CI_Model{
   public function get_fakultas(){
        $this->db->select('*');
        $this->db->from('fakultas');
        $query = $this->db->get();
        return $query->result_object();
   }
   public function add (){
        $nama = $this->input->post('nama');
        $check_nama = $this->db->get_where('fakultas',['nama'=>$nama])->row_object();
        if($check_nama > 0){
            $this->session->set_flashdata('flash',alertme('danger','Fakultas Sudah Ada'));
            redirect('admin/fakultas');
        }else{
            $this->db->insert('fakultas',['nama'=>$nama]);
            return $this->db->affected_rows();
        }
   }
   public function id($id){
        return $this->db->get_where('fakultas',['id'=>$id])->row_object();
   }
   public function edit(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $check_nama = $this->db->get_where('fakultas',['nama'=>$nama])->row_object();
        if($check_nama > 0){
            $this->session->set_flashdata('flash',alertme('danger','Fakultas Sudah Ada'));
            redirect('admin/fakultas');
        }else{
            $this->db->update('fakultas',['nama'=>$nama],['id'=>$id]);
            return $this->db->affected_rows();
        }
   }
   public function hapus(){
        $id = $this->input->post('id');
        $this->db->delete('prodi',['id_fakultas'=>$id]);
        $this->db->delete('fakultas',['id'=>$id]);
        return $this->db->affected_rows();
   }
}