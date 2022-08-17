<?php
include '../layout/header-login-user.php';
include '../config/auth-controller.php';

if (!isLoggedIn()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT tb_reservasi.id_reservasi, tb_jadwal.nomor_lapangan, tb_jadwal.harga, tb_jadwal.jam_mulai, tb_jadwal.jam_selesai
  FROM tb_reservasi
  INNER JOIN tb_jadwal ON tb_reservasi.id_jadwal = tb_jadwal.kode_jadwal;
  ");


$start = "SELECT * FROM tb_jadwal";
$result = $db->query($start);
$options = mysqli_fetch_all($result, MYSQLI_ASSOC);


if (isset($_POST['cancel'])) {
  echo "<script>document.location.href='jam.php'; </script>";
}

?>
<div class="mt-4">
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <div class="bg-white rounded-4 p-4">
      <h2 style="text-align: center; font-weight: bold;">Konfirmasi Pembayaran</h2>
      <form method="POST" action="">
        <div class="mb-3">
          <label for="id_reservasi" class="form-label text-dark">Id Reservasi</label>
          <input type="number" class="form-control" id="id_reservasi" name="id_reservasi" placeholder="Input Id Reservasi" readonly required>
        </div>
        <div class="mb-3">
          <label for="gambar_payment" class="form-label text-dark">Upload Bukti Pembayaran</label>
          <input type="file" class="form-control bg-secondary w-25 bg-opacity-25" id="gambar_payment" name="gambar_payment" required>
        </div>
        <div class="d-flex flex-row justify-content-end">
          <button type="submit" class="btn btn-success bg-opacity-75 text-white rounded-4 w-100" name="confirmation" onClick="return confirm('Apakah data yang dikirimkan sesuai?');">Konfirmasi</button>&nbsp;
        </div>
      </form>
    </div>
  </div>
  <?php include '../layout/footer.php';
