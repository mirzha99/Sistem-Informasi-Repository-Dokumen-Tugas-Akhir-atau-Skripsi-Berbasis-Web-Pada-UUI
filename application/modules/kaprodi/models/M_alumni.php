<?php
class M_alumni extends CI_Model{
    public function count_alumni(){
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('id_prodi',$id_prodi);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_alumni(){
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('id_prodi',$id_prodi);
        $this->db->order_by('nim','ASC');
        $query = $this->db->get();
        return $query->result_object();
    }
    public function add(){
        //form
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $no_telpon = $this->input->post('no_telpon');
        
        //upload images
        upload_file("image/alumni","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
            if($error == "You did not select a file to upload."){
                $gambar = "no_image";
            }else if($error == "The filetype you are attempting to upload is not allowed."){
                $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                redirect('kaprodi/alumni');
            }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                redirect('kaprodi/alumni');
            }
        }else{
            $gambar = $this->upload->data('file_name');
        }
        $check_nim = $this->db->get_where('alumni',['nim'=>$nim])->num_rows();
        if($check_nim > 0){
            $this->session->set_flashdata('flash',alertme('danger','Nim Sudah Ada'));
            redirect('kaprodi/alumni');
        }
        $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
        $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
        $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
        if($check_username_admin > 0 || $check_username_kaprodi > 0 || $check_username_alumni > 0){
            $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada, Harap Gunakan Username Lain'));
            redirect('kaprodi/alumni');
        }
        $data = [
            'nim'=>$nim,
            'nama'=>$nama,
            'id_prodi'=>$id_prodi,
            'username'=>$username,
            'password'=>$password,
            'no_telpon'=>$no_telpon,
            'gambar'=>$gambar,
        ];
        $this->db->insert('alumni',$data);
        return $this->db->affected_rows();
    }
    public function id($id){
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        return $this->db->get_where('alumni',['id'=>$id,'id_prodi'=>$id_prodi])->row_object();
    }
    public function edit(){
        $id = $this->input->post("id");
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        //cegah kaprodi edit alumni dari kaprodi lain;
        $check_alumni_id = $this->db->get_where('alumni',['id'=>$id,'id_prodi'=>$id_prodi])->num_rows();
        if($check_alumni_id === 0){
            return FALSE;
        }
        //form
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        //upload images
        $alumni_id = $this->db->get_where('alumni',['id'=>$id])->row_object();
        upload_file("image/alumni","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
                if($error == "You did not select a file to upload."){
                    $gambar = $alumni_id->gambar;
                }else if($error == "The filetype you are attempting to upload is not allowed."){
                    $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                    redirect('kaprodi/alumni');
                }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                    $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                    redirect('kaprodi/alumni');
                }
        }else{
            remove_file("image/alumni/{$alumni_id->gambar}");
            $gambar = $this->upload->data('file_name');
        }
        //check nim
        $check_nim_id = $this->db->get_where('alumni',['id'=>$id,'nim'=>$nim])->num_rows();
        if($check_nim_id === 0){
            $check_nim = $this->db->get_where('alumni',['nim'=>$nim])->num_rows();
            if($check_nim > 0){
                $this->session->set_flashdata('flash',alertme('danger','Nim tidak boleh sama'));
                redirect('kaprodi/alumni');
            }
        }
        //check username
        $check_username_id = $this->db->get_where('alumni',['id'=>$id,'username'=>$username])->num_rows();
        if($check_username_id === 0){
            $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
            $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
            $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
            if($check_username_admin > 0 || $check_username_kaprodi > 0 || $check_username_alumni > 0){
                $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada, Harap Gunakan Username Lain'));
                redirect('kaprodi/alumni');
            }
        }
        //check password
        $check_password = $this->db->get_where('alumni',['id'=>$id])->row_object()->password;
        if($pass == $check_password){
            $password = $pass;
        }else{
            $password = password_hash($pass,PASSWORD_DEFAULT);
        }
        $data = [
            'nim'=>$nim,
            'nama'=>$nama,
            'id_prodi'=>$id_prodi,
            'username'=>$username,
            'password'=>$password,
            'no_telpon'=>$no_telpon,
            'gambar'=>$gambar,
        ];
        $this->db->update('alumni',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function hapus(){
        $id = $this->input->post("id");
        $id_prodi = $this->auth_lib->profil()['id_prodi'];
        $gambar_alumni = $this->db->get_where('alumni',['id'=>$id])->row_object()->gambar;
        $jurnal = $this->db->get_where('alumni',['id'=>$id])->row_object()->file_jurnal;
        $tugas_akhir = $this->db->get_where('alumni',['id'=>$id])->row_object()->file_tugas_akhir;
        //cegah kaprodi hapus alumni dari kaprodi lain;
        $check_alumni_id = $this->db->get_where('alumni',['id'=>$id,'id_prodi'=>$id_prodi])->num_rows();
        if($check_alumni_id === 0){
            return FALSE;
        }
        $this->db->delete('tugas_akhir',['id_alumni'=>$id]);
        $this->db->delete('alumni',['id'=>$id]);
        $query = $this->db->affected_rows();
        if($query > 0){
            remove_file("image/alumni/{$gambar_alumni}");
            remove_file("pdf/{$jurnal}");
            remove_file("pdf/{$tugas_akhir}");
        }
        return $query;
    }
}