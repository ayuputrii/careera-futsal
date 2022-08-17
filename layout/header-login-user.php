<?php
include 'config/app.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Careera Futsal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="./assets/icon/icon-logo.svg">
</head>

<body class="font-family-sans-serif">
  <nav class="navbar shadow" style="background-color:rgba(89, 222, 43, 15%); padding-left: 90px; height: 70px;">
    <div class="d-flex flex-row">
      <a class="navbar-brand text-dark" href="./">Info Lapangan</a>
      <a class="navbar-brand text-dark" href="reservasi.php">Pemesanan</a>
      <!-- <a class="navbar-brand text-dark" href="payment.php">Bayar</a> -->
      <!-- <a class="navbar-brand text-dark" href="payment-confirmation.php">Konfirmasi Bayar</a> -->
      <a class="navbar-brand text-dark" href="history.php">Riwayat Pesanan</a>
    </div>
    <div class="dropdown" style="margin-right: 50px;">
      <button class="btn bg-white rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 150px;">
        <img src="https://www.shareicon.net/download/2017/02/15/878685_user_512x512.png" width="30px" height="30px" />
        Akun
      </button>
      <ul class="dropdown-menu rounded-4">
        <!-- <li><a class="dropdown-item" href="profile.php">Profile</a></li> -->
        <li><a class="dropdown-item rounded-4" href="../logout.php">Keluar</a></li>
      </ul>
    </div>
  </nav>