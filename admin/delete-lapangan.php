<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$kode_lapangan = (int)$_GET['kode_lapangan'];

if (deleteLapangan($kode_lapangan) > 0) {
  echo "<script>alert('Data Berhasil Dihapus.'); document.location.href='lapangan.php'; </script>";
} else {
  echo "<script>alert('Data Gagal Untuk Dihapus.'); document.location.href='lapangan.php'; </script>";
}
