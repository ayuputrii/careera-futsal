<?php
include '../layout/header-login-user.php';
include '../config/auth-controller.php';

$id_user =  $_SESSION['user']['id_user'];

if (!isLoggedIn()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_reservasi");

$data = select("SELECT tb_reservasi.id_reservasi, tb_reservasi.tgl_reservasi, tb_jadwal.nomor_lapangan, tb_jadwal.harga, tb_jadwal.jam_mulai, tb_jadwal.jam_selesai, tb_reservasi.status_bayar
  FROM tb_reservasi
  INNER JOIN tb_jadwal ON tb_reservasi.id_jadwal = tb_jadwal.kode_jadwal
  WHERE tb_reservasi.id_user=$id_user
");

$start = "SELECT * FROM tb_jadwal";
$result = $db->query($start);
$options = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<div class="mt-4">
  <h2 style="text-align: center;">Riwayat Pesanan</h2>
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <table class="table table-bordered border-secondary mt-4">
      <thead class="bg-success bg-opacity-75 text-white">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal Reservasi</th>
          <th scope="col">Nomor Lapangan</th>
          <th scope="col">Waktu</th>
          <th scope="col">Harga</th>
          <th scope="col">Status Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data as $reservasi) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <th scope="row"><?= $reservasi['tgl_reservasi']; ?></th>
            <th scope="row"><?= $reservasi['nomor_lapangan']; ?></th>
            <th scope="row"><?= $reservasi['jam_mulai']; ?> - <?= $reservasi['jam_selesai']; ?></th>
            <th scope="row">Rp <?php echo number_format($reservasi['harga'], 0, ',', '.'); ?></th>
            <th scope="row" class="text-danger"><?= $reservasi['status_bayar']; ?></th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include '../layout/footer.php';
