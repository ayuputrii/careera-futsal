<?php
  include 'layout/header.php';
  $kode_jam = (int)$_GET['kode_jam'];
  
  if(deleteJam($kode_jam) > 0){
    echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='jam.php'; </script>";
  }else{
    echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='jam.php'; </script>";
  }
?>