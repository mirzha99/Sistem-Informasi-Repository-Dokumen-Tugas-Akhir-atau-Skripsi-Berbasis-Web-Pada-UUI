<?php
class M_admin extends CI_Model{
    public function get_count(){
        $fakultas = $this->db->get('fakultas')->num_rows();
        $prodi = $this->db->get('prodi')->num_rows();
        $kaprodi = $this->db->get('kaprodi')->num_rows();
        $user = $this->db->get('admin')->num_rows();

        $data = [
            'fakultas'=>$fakultas,
            'prodi'=>$prodi,
            'kaprodi'=>$kaprodi,
            'user'=>$user,
        ];
        return $data;
    }
}