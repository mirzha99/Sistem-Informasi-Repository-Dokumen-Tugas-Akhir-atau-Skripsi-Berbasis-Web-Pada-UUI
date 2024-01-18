<?php
class M_jumlah_pengunjung extends CI_Model{
    protected function view_ip(){
        $ip = $this->input->ip_address();
        $check_view = $this->db->get_where('count_view',['ip'=>$ip])->num_rows();
        if($check_view === 0 ){
            $this->db->insert('count_view',['ip'=>$ip]);
        }
    }

    public function view(){
        $this->view_ip();
        $view = $this->db->get('count_view')->num_rows();
        $jurnal = $this->db->get('count_donwload_jurnal')->num_rows();
        $ta = $this->db->get('count_donwload_ta')->num_rows();
        $data = [
            'view'=>$view,
            'jurnal'=>$jurnal,
            'ta'=>$ta,
        ];
        return $data;
    }
}