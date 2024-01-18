<?php
class M_Tugas_akhir extends CI_Model{
    public function get_tugas_akhir(){
        $id_alumni = $this->auth_lib->profil()['id'];
        $tugas_akhir = $this->db->get_where('tugas_akhir',['id_alumni'=>$id_alumni])->row_object();
        if(empty($tugas_akhir)){
            $data = [
                'id_alumni'=>'',
                'judul'=>'',
                'abstrak'=>'',
                'keyword'=>'',
                'tahun_terbit'=>'',
                'referensi'=>'',
                'file_jurnal'=>'',
                'file_tugas_akhir'=>'',
            ];
        }else{
            $data = [
                'judul'=>$tugas_akhir->judul,
                'abstrak'=>$tugas_akhir->abstrak,
                'keyword'=>$tugas_akhir->keyword,
                'tahun_terbit'=>$tugas_akhir->tahun_terbit,
                'referensi'=>$tugas_akhir->referensi,
                'file_jurnal'=>$tugas_akhir->file_jurnal,
                'file_tugas_akhir'=>$tugas_akhir->file_tugas_akhir,
            ];
        }
        return $data;
    }
    public function modifikasi(){
        $id_alumni = $this->auth_lib->profil()['id'];
        $judul = $this->input->post('judul');
        $abstrak = $this->input->post('abstrak');
        $keyword = $this->input->post('keyword');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $referensi = $this->input->post('referensi');
        $check_tugas_akhir = $this->db->get_where('tugas_akhir',['id_alumni'=>$id_alumni]);
        $file = $check_tugas_akhir->row_object();
        //upload jurnal
        upload_file("pdf/","pdf");
        if (!$this->upload->do_upload('jurnal')){
            $error = $this->upload->display_errors();
            if($error == "You did not select a file to upload."){
                if($file->file_jurnal != ""){
                    $jurnal = $file->file_jurnal;
                }else{
                    $jurnal = "no_upload";
                }
                
            }else if($error == "The filetype you are attempting to upload is not allowed."){
                $this->session->set_flashdata('flash',alertme('danger','File Jurnal tidak di izinkan'));
                redirect('alumni/tugas_akhir');
            }else if($error == "The file you are attempting to upload is larger than the permitted size."){
                $this->session->set_flashdata('flash',alertme('danger','Ukuran file jurnal terlalu besar maksimal 50 mb'));
                redirect('alumni/tugas_akhir');
            }
        }else{
            remove_file("pdf/{$file->file_jurnal}");
            $jurnal = $this->upload->data('file_name');
        }

        if (!$this->upload->do_upload('tugas_akhir')) {
            $error2 = $this->upload->display_errors();
            if($error2 == "You did not select a file to upload." || $error2 =="You did not select a file to upload.You did not select a file to upload."){
                if($file->file_tugas_akhir != ""){
                    $tugas_akhir = $file->file_tugas_akhir;
                }else{
                    $tugas_akhir = "no_upload";
                }
            }else if($error2 == "The filetype you are attempting to upload is not allowed." || $error2 == "You did not select a file to upload.The filetype you are attempting to upload is not allowed."){
                $this->session->set_flashdata('flash',alertme('danger','File Tugas Akhir tidak di izinkan'));
                redirect('alumni/tugas_akhir');
            }else if($error2 == "The file you are attempting to upload is larger than the permitted size." || $error2 == "You did not select a file to upload.The file you are attempting to upload is larger than the permitted size."){
                $this->session->set_flashdata('flash',alertme('danger','Ukuran file Tugas Akhir terlalu besar maksimal 50 mb'));
                redirect('alumni/tugas_akhir');
            }
        } else {
            remove_file("pdf/{$file->file_tugas_akhir}");
            $tugas_akhir = $this->upload->data('file_name');
        }

        
        $data = [
            'id_alumni'=>$id_alumni,
            'judul'=>$judul,
            'abstrak'=>$abstrak,
            'keyword'=>$keyword,
            'tahun_terbit'=>$tahun_terbit,
            'referensi'=>$referensi,
            'file_jurnal'=>$jurnal,
            'file_tugas_akhir'=>$tugas_akhir,
            'date_modifikasi'=>time(),
        ];
        
        if($check_tugas_akhir->num_rows() > 0){
            $this->db->update('tugas_akhir',$data,['id'=>$check_tugas_akhir->row_object()->id]);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('tugas_akhir',$data);
            return $this->db->affected_rows();
        }
    }
}