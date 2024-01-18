<?php 
class M_profil extends CI_Model{
    public function update(){
        $id = $this->auth_lib->profil()['id'];
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $role = $this->auth_lib->profil()['role'];

        $get_user = $this->db->get_where($role,['id'=>$id])->row_object();
        if(empty($pass)){
            $password = $get_user->password;
        }else{
            $password = password_hash($pass,PASSWORD_DEFAULT);
        }
        if($this->db->get_where($role,['username'=>$username,'id'=>$id])->num_rows() === 0){
            $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
            $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
            $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
            if($check_username_admin > 0 || $check_username_kaprodi > 0 || $check_username_alumni > 0){
                $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada, Harap Gunakan Username Lain'));
                redirect('profil');
            }
        }
        //upload images
        upload_file("image/{$role}","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
                if($error == "You did not select a file to upload."){
                    $gambar = $get_user->gambar;
                }else if($error == "The filetype you are attempting to upload is not allowed."){
                    $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                    redirect('profil');
                }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                    $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                    redirect('profil');
                }
        }else{
            remove_file("image/{$role}/{$get_user->gambar}");
            $gambar = $this->upload->data('file_name');
        }
        $data = [
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'gambar'=>$gambar,
        ];
        $this->db->update($role,$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
}