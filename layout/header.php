<?php include 'config/app.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careera Futsal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/icon/icon-logo.svg">
  </head>
  <body class="font-family-sans-serif bg-success bg-opacity-50">
  <nav class="navbar shadow p-2 bg-white">
    <div class="container-fluid">
      <a class="navbar-brand text-success text-opacity-75 fw-bold" href="/">
        <img src="assets/icon/icon-logo.svg" alt="" width="60" height="60" class="d-inline-block align-text-center">
        CAREERA FUTSAL
      </a>
      <div class="d-flex flex-row">
        <a href="./" class="text-success text-decoration-none"><h6>Beranda</h6></a>&ensp;&ensp;
         <a href="user.php" class="text-success text-decoration-none"><h6>User</h6></a>&ensp;&ensp;
         <a href="jam.php" class="text-success text-decoration-none"><h6>Jam</h6></a>&ensp;&ensp;
         <a href="jadwal.php" class="text-success text-decoration-none"><h6>Jadwal</h6></a>&ensp;&ensp;
         <a href="lapangan.php" class="text-success text-decoration-none"><h6>Lapangan</h6></a>&ensp;&ensp;
         <a href="history.php" class="text-success text-decoration-none"><h6>Riwayat Pesanan</h6></a>&ensp;&ensp;
         <a href="logout.php" class="text-success text-decoration-none" onClick="return confirm('Apakah anda yakin akan keluar?');"><h6>Logout</h6></a>&ensp;&ensp;
      </div>
    </div>
  </nav>