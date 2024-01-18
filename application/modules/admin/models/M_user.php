<?php
class M_user extends CI_Model{
    public function get_user(){
        return $this->db->get('admin')->result_object();
    }
    public function add(){
        //upload images
        upload_file("image/admin","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
            if($error == "You did not select a file to upload."){
                $gambar = "no_image";
            }else if($error == "The filetype you are attempting to upload is not allowed."){
                $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                redirect('admin/user');
            }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                redirect('admin/user');
            }
        }else{
            $gambar = $this->upload->data('file_name');
        }
        //Form User
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $no_telpon = $this->input->post('no_telpon');
        //check_username
        $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
        $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
        $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
        if($check_username_admin > 0 || $check_username_kaprodi > 0 || $check_username_alumni > 0){
            $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada, Harap Gunakan Username Lain'));
            redirect('admin/user');
        }
        $data = [
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'no_telpon'=>$no_telpon,
            'gambar'=>$gambar
        ];
        $this->db->insert('admin',$data);
        return $this->db->affected_rows();
    }
    public function id($id = null){
        return $this->db->get_where('admin',['id'=>$id])->row_object();
    }
    public function edit(){
        //upload images
        $id = $this->input->post("id");
        $admin_id = $this->db->get_where('admin',['id'=>$id])->row_object();
        upload_file("image/admin","gif|jpg|png|jpeg");
        if (!$this->upload->do_upload('gambar')){
            $error = $this->upload->display_errors();
                if($error == "You did not select a file to upload."){
                    $gambar = $admin_id->gambar;
                }else if($error == "The filetype you are attempting to upload is not allowed."){
                    $this->session->set_flashdata('flash',alertme('danger','File tidak di izinkan'));
                    redirect('admin/admin');
                }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                    $this->session->set_flashdata('flash',alertme('danger','Ukuran file terlalu besar maksimal 50 mb'));
                    redirect('admin/admin');
                }
        }else{
            remove_file("image/admin/{$admin_id->gambar}");
            $gambar = $this->upload->data('file_name');
        }
         //cegah modifikasi superadmin
         if($id == 1){
            redirect('admin');
        }
        //Form User
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        //check_username
        $check_username_admin_id = $this->db->get_where('admin',['id'=>$id,'username'=>$username])->num_rows();
        if($check_username_admin_id === 0){
            $check_username_admin = $this->db->get_where('admin',['username'=>$username])->num_rows();
            $check_username_kaprodi = $this->db->get_where('kaprodi',['username'=>$username])->num_rows();
            $check_username_alumni = $this->db->get_where('alumni',['username'=>$username])->num_rows();
            if($check_username_admin > 0 || $check_username_kaprodi > 0 || $check_username_alumni > 0){
                $this->session->set_flashdata('flash',alertme('danger','Username Sudah Ada, Harap Gunakan Username Lain'));
                redirect('admin/user');
            }
        }
        if($pass === $admin_id->password){
            $password = $pass;
        }else{
            $password = password_hash($pass,PASSWORD_DEFAULT);
        }
     
        $data = [
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'no_telpon'=>$no_telpon,
            'gambar'=>$gambar
        ];
        $this->db->update('admin',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function hapus(){
        $id= $this->input->post('id');
        $admin = $this->db->get_where('admin',['id'=>$id])->row_object();
        //cegah modifikasi superadmin
        if($id == 1){
            redirect('admin');
        }
        $this->db->delete('admin',['id'=>$id]);

        $query = $this->db->affected_rows();

        if($query > 0 ){
            remove_file("image/admin/$admin->gambar");
        }
        return $query;
    }
}