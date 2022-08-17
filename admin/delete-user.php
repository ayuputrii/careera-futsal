<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$id_user = (int)$_GET['id_user'];

if (deleteUser($id_user) > 0) {
  echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='user.php'; </script>";
} else {
  echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='user.php'; </script>";
}
