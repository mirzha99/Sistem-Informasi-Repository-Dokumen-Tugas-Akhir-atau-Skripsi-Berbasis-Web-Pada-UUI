<?php
class M_prodi extends CI_Model{
    public function prodi(){
        $this->db->select('prodi.id,prodi.nama as nama_prodi,fakultas.nama as nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $query = $this->db->get();
        return $query->result_object();
    }
    public function add(){
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_prodi = $this->input->post('nama_prodi');

        $check_nama_prodi = $this->db->get_where('prodi',['nama'=>$nama_prodi])->num_rows();
        if($check_nama_prodi > 0){
            $this->session->set_flashdata('flash',alertme('danger','Nama Prodi Tidak Boleh Sama'));
            redirect('admin/prodi');
        }else{
            $this->db->insert('prodi',['nama'=>$nama_prodi,'id_fakultas'=>$id_fakultas]);
            return $this->db->affected_rows();
        }
    }
    public function id($id){
        $this->db->select('prodi.id,prodi.nama as nama_prodi,fakultas.id as id_fakultas,fakultas.nama as nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where('prodi.id',$id);
        $query = $this->db->get();
        return $query->row_object();
    }
    public function edit(){
        $id = $this->input->post('id');
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_prodi = $this->input->post('nama_prodi');

        $check_nama_prodi_id = $this->db->get_where('prodi',['id'=>$id,'nama'=>$nama_prodi])->num_rows();
        if($check_nama_prodi_id === 0){
            $check_nama_prodi = $this->db->get_where('prodi',['nama'=>$nama_prodi])->num_rows();
            if($check_nama_prodi > 0){
                $this->session->set_flashdata('flash',alertme('danger','Nama Prodi Tidak Boleh Sama'));
                redirect('admin/prodi');
            }else{
                $this->db->update('prodi',['nama'=>$nama_prodi,'id_fakultas'=>$id_fakultas],['id'=>$id]);
                return $this->db->affected_rows();
            }
        }else{
            $this->db->update('prodi',['nama'=>$nama_prodi,'id_fakultas'=>$id_fakultas],['id'=>$id]);
            return $this->db->affected_rows(); 
        }
    }
    public function hapus(){
        $id = $this->input->post('id');
        
        $this->db->delete('prodi',['id'=>$id]);
        return $this->db->affected_rows();
    }
}