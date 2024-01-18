<?php
function alertme($color,$message){
    if($color == "warning" || $color == "danger"){
      $status = "Gagal !";
    }else{
      $status = "Sukses !";
    }
    //logs($status,$message);
    return "<div class='alert alert-{$color} alert-dismissible fade show' role='alert'>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    <strong>{$status}</strong> {$message}</div>";
}
//file helper
function upload_file($location,$allow){
  $ci = get_instance();
  //image config
  $img['upload_path']          = "./assets/$location";
  $img['allowed_types']        = $allow;
  $img['max_size']             = 50000;
  $img['max_width']            = 102400;
  $img['max_height']           = 768000;
  //load librari ci upload
  $ci->load->library('upload',$img);
}
function check_file($location){
  $file_location = "./assets/{$location}";
  if(file_exists($file_location)){
    return true;
  }
}
function remove_file($location){
  $file_location = "./assets/{$location}";
  if(file_exists($file_location)){
    unlink($file_location);
  }
}