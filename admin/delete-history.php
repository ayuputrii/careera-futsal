<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$id_reservasi = (int)$_GET['id_reservasi'];

if (deleteReservasi($id_reservasi) > 0) {
  echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='history.php'; </script>";
} else {
  echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='history.php'; </script>";
}
