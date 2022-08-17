<?php
  include 'layout/header.php';
  $kode_lapangan = (int)$_GET['kode_lapangan'];
  
  if(deleteLapangan($kode_lapangan) > 0){
    echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='lapangan.php'; </script>";
  }else{
    echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='lapangan.php'; </script>";
  }
?>