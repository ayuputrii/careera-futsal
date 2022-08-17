<?php
  include 'layout/header.php';
  $id_reservasi = (int)$_GET['id_reservasi'];
  
  if(deleteReservasi($id_reservasi) > 0){
    echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='history.php'; </script>";
  }else{
    echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='history.php'; </script>";
  }
?>