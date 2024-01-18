<?php
class auth_lib{
    public function profil(){
        $ci = get_instance();
        $admin = $ci->session->userdata('admin');
        $kaprodi = $ci->session->userdata('kaprodi');
        $alumni = $ci->session->userdata('alumni');

        if($admin){
            $ci->db->select('id,nama,username,gambar');
            $ci->db->from('admin');
            $ci->db->where('id',$admin['id']);
            $query = $ci->db->get()->row_object();
            //check gambar
            if(check_file("image/admin/{$query->gambar}") === true){
                $gambar = base_url()."assets/image/admin/{$query->gambar}"; 
            }else{
                $gambar = base_url()."assets/image/default.jpeg"; 
            }
            //return profil
            $profil = [
                'id'=> $query->id,
                'nama'=> $query->nama,
                'username'=>$query->username,
                'gambar'=>$gambar,
                'role'=>'admin',
            ];
        }elseif ($kaprodi){
            $ci->db->select('kaprodi.id,kaprodi.nama,prodi.nama as nama_prodi,fakultas.nama as nama_fakultas,id_prodi,username,gambar');
            $ci->db->from('kaprodi');
            $ci->db->join('prodi','kaprodi.id_prodi=prodi.id');
            $ci->db->join('fakultas','prodi.id_fakultas=fakultas.id');
            $ci->db->where('kaprodi.id',$kaprodi['id']);
            $query = $ci->db->get()->row_object();
            //check gambar
            if(check_file("image/kaprodi/{$query->gambar}") === true){
                $gambar = base_url()."assets/image/kaprodi/{$query->gambar}"; 
            }else{
                $gambar = base_url()."assets/image/default.jpeg"; 
            }
            //return profil
            $profil = [
                'id'=> $query->id,
                'nama'=> $query->nama,
                'id_prodi'=> $query->id_prodi,
                'prodi'=>$query->nama_prodi,
                'fakultas'=>$query->nama_fakultas,
                'username'=>$query->username,
                'gambar'=>$gambar,
                'role'=>'kaprodi',
            ];
        }elseif($alumni){
            $ci->db->select('alumni.id,alumni.nim,alumni.nama,alumni.username,prodi.id as id_prodi, prodi.nama as nama_prodi, fakultas.nama as nama_fakultas,alumni.gambar');
            $ci->db->from('alumni');
            $ci->db->join('prodi','alumni.id_prodi=prodi.id');
            $ci->db->join('fakultas','prodi.id_fakultas=fakultas.id');
            $ci->db->where('alumni.id',$alumni['id']);
            $query = $ci->db->get()->row_object();
            //check gambar
            if(check_file("image/alumni/{$query->gambar}") === true){
                $gambar = base_url()."assets/image/alumni/{$query->gambar}"; 
            }else{
                $gambar = base_url()."assets/image/default.jpeg"; 
            }
            //return profil
            $profil = [
                'id'=> $query->id,
                'nama'=> $query->nama,
                'nim'=>$query->nim,
                'id_prodi'=> $query->id_prodi,
                'prodi'=>$query->nama_prodi,
                'fakultas'=>$query->nama_fakultas,
                'username'=>$query->username,
                'gambar'=>$gambar,
                'role'=>'alumni',
            ];
        }else{
            $profil = NULL;
        }
        return $profil;
    }
    public function is_login(){
        $ci = get_instance();
        $admin = $ci->session->userdata('admin');
        $kaprodi = $ci->session->userdata('kaprodi');
        $alumni = $ci->session->userdata('alumni');

        if($admin){
            redirect('admin');
        }elseif ($kaprodi){
            redirect('kaprodi');
        }elseif($alumni){
            redirect('alumni');
        }
    }

    public function admin_login(){
        $ci = get_instance();
        $admin = $ci->session->userdata('admin');
        if(!$admin){
            redirect('auth');
        }
    }
    public function kaprodi_login(){
        $ci = get_instance();
        $kaprodi = $ci->session->userdata('kaprodi');
        if(!$kaprodi){
            redirect('auth');
        }
    }
    public function alumni_login(){
        $ci = get_instance();
        $alumni = $ci->session->userdata('alumni');
        if(!$alumni){
            redirect('auth');
        }
    }
    public function destroy_session(){
        $ci = get_instance();
        $ci->session->sess_destroy('admin');
        $ci->session->sess_destroy('kaprodi');
        $ci->session->sess_destroy('alumni');
    }
}