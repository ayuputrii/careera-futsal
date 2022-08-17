<?php
  $db = new mysqli('localhost', 'root', '', 'db_futsal');
  
  if(!$db){
    echo "Gagal koneksi ke database";
  }else{
    echo "";
  }
?>