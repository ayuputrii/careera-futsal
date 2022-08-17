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

?>
<div class="mt-4">
  <h2 style="text-align: center;">Pembayaran Data Reservasi</h2>
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <table class="table table-bordered border-secondary mt-4">
      <thead>
        <tr class="bg-success bg-opacity-75 text-white">
          <th scope="col">No</th>
          <th scope="col">Waktu</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nomor Lapangan</th>
          <th scope="col">Total Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data as $payment) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <th scope="row"><?= $payment['jam_mulai']; ?> - <?= $jadwal['jam_selesai']; ?></th>
            <th scope="row"><?= $payment['tgl_jadwal']; ?></th>
            <th scope="row">Rp <?php echo number_format($option['harga'], 0, ',', '.'); ?></th>
            <th scope="row"><?= $payment['nomor_lapangan']; ?></th>
            <th scope="row"><?= $payment['total_bayar']; ?></th>
          </tr>
        <?php endforeach; ?>
        <tr>
          <th scope="row">1</th>
          <th scope="row">09:00 - 10:00</th>
          <th scope="row">22-08-2022</th>
          <th scope="row">001</th>
          <th scope="row">Rp 20000</th>
        </tr>
        <tr>
          <th scope="col" colspan="4" style="text-align: right;">TOTAL :</th>
          <th scope="col" colspan="4" style="text-align: left;">Rp 20000</th>
          <!-- <th scope="col" colspan="4" style="text-align: left;">    Rp <?php echo number_format($jadwal['harga'], 0, ',', '.'); ?></th> -->
        </tr>
      </tbody>
    </table>
    <button class="btn bg-primary bg-opacity-50 w-100 text-white" onClick="return confirm('Apakah anda yakin membayar ini?');">Bayar</button>
  </div>
</div>
<?php include '../layout/footer.php';
