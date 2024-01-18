<?php
class M_kaprodi extends CI_Model{
    public function prodi(){
        $kaprodi_id = $this->db->get('kaprodi')->result_object();

        $kaprodi = [0];
        foreach($kaprodi_id as $k){
            $kaprodi[] = $k->id_prodi;
        }

        $this->db->select('prodi.id,prodi.nama as nama_prodi,fakultas.nama as nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where_not_in('prodi.id',$kaprodi);

        $query = $this->db->get();
        return $query->result_object();
    }
    public function get_kaprodi(){
        $this->db->select('kaprodi.id,kaprodi.nama,kaprodi.username,prodi.nama as nama_prodi,fakultas.nama as nama_fakultas,kaprodi.gambar');
        $this->db->from('kaprodi');
        $this->db->join('prodi','kaprodi.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $query = $this->db->get();
        return $query->result_object();
    }
    public function add(){
        //upload images
        upload_file("image/kaprodi","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
            if($error == "You did not select a file to upload."){
                $gambar = "no_image";
            }else if($error == "The filetype you are attempting to upload is not allowed."){
                $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                redirect('admin/kaprodi');
            }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                redirect('admin/kaprodi');
            }
        }else{
            $gambar = $this->upload->data('file_name');
        }
        
        //form kaprodi
        $nama_ketua_prodi = $this->input->post("nama_ketua_prodi");
        $id_prodi = $this->input->post("id_prodi");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
        $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
        $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
        if($check_username_kaprodi > 0 || $check_username_admin > 0 || $check_username_alumni > 0){
            $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada ! Harap Memilih Username Lain.'));
            redirect('admin/kaprodi');
        }
        $data = [
            "nama"=> $nama_ketua_prodi,
            "id_prodi"=> $id_prodi,
            "username"=> $username,
            "password"=> password_hash($password,PASSWORD_DEFAULT),
            "gambar"=> $gambar,
        ];
        $this->db->insert('kaprodi',$data);
        return $this->db->affected_rows();
    }
    public function id($id){
        $this->db->select('kaprodi.id,kaprodi.nama,kaprodi.username,kaprodi.password,prodi.nama as nama_prodi,fakultas.nama as nama_fakultas,kaprodi.gambar');
        $this->db->from('kaprodi');
        $this->db->join('prodi','kaprodi.id_prodi=prodi.id');
        $this->db->join('fakultas','prodi.id_fakultas=fakultas.id');
        $this->db->where('kaprodi.id',$id);
        $query = $this->db->get();
        return $query->row_object();
    }
    public function edit(){
        //upload images
        $id = $this->input->post("id");
        $kaprodi_id = $this->db->get_where('kaprodi',['id'=>$id])->row_object();
        upload_file("image/kaprodi","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
                if($error == "You did not select a file to upload."){
                    $gambar = $kaprodi_id->gambar;
                }else if($error == "The filetype you are attempting to upload is not allowed."){
                    $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                    redirect('admin/kaprodi');
                }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                    $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                    redirect('admin/kaprodi');
                }
        }else{
            remove_file("image/kaprodi/{$kaprodi_id->gambar}");
            $gambar = $this->upload->data('file_name');
        }
                
        //form kaprodi
        $nama_ketua_prodi = $this->input->post("nama_ketua_prodi");
        $username = $this->input->post("username");
        $pass = $this->input->post("password");
        //kondisi
        $check_username_kaprodi_id = $this->db->get_where('kaprodi',['id'=>$id,'username'=>$username])->num_rows();
        if($check_username_kaprodi_id === 0){
            $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
            $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
            $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
            if($check_username_kaprodi > 0 || $check_username_admin > 0 || $check_username_alumni > 0){
                $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada ! Harap Memilih Username Lain.'));
                redirect('admin/kaprodi');
            }
        }
        if($pass === $kaprodi_id->password){
            $password = $pass;
        }else{
            $password = password_hash($pass,PASSWORD_DEFAULT);
        }

        $data = [
            'nama'=>$nama_ketua_prodi,
            'username'=>$username,
            'password'=>$password,
            'gambar'=>$gambar,
        ];
        $this->db->update('kaprodi',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function hapus(){
        $id = $this->input->post('id');
        $kaprodi_id = $this->db->get_where('kaprodi',['id'=>$id])->row_object();
        $this->db->delete('kaprodi',['id'=>$id]);

        $query = $this->db->affected_rows();
        if($query !== 0){
            remove_file("image/kaprodi/{$kaprodi_id->gambar}");
        }
        return $query;
    }
}