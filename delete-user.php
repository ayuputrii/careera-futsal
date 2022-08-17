<?php
  include 'layout/header.php';
  $id_user = (int)$_GET['id_user'];
  
  if(deleteUser($id_user) > 0){
    echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='user.php'; </script>";
  }else{
    echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='user.php'; </script>";
  }
?>