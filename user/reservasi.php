<?php
include '../layout/header-login-user.php';
include '../config/auth-controller.php';

if (!isLoggedIn()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$start = "SELECT status_lapangan FROM tb_jadwal";
$result = $db->query($start);
$options = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $data = search("SELECT * FROM tb_jadwal WHERE tgl_jadwal LIKE '%" . $search . "%'");
} else {
  $data = search("SELECT * FROM tb_jadwal");
}

if (isset($_GET['page'])) {
  $pages = array("reservasi", "cart");
  if (in_array($_GET['page'], $pages)) {
    $_page = $_GET['page'];
  } else {
    $_page = "reservasi";
  }
} else {
  $_page = "reservasi";
}
?>
<div class="mt-4">
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <h2 style="text-align: center;">Pemesanan Lapangan</h2>
    <form action="" role="search" action="" method="GET">
      <div class="mb-3" style="margin-right: 12px;">
        <label for="search" class="form-label text-dark">Pilih Tanggal</label>
        <input type="date" class="form-control" id="search" name="search">
      </div>
      <button class="btn bg-success bg-opacity-75 text-white" style="width: 100px;" type="submit" vLUW="search">Cari</button>
    </form>
    <table class="table table-bordered border-secondary mt-4">
      <thead class="bg-success bg-opacity-75 text-white">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nomor Lapangan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Waktu</th>
          <th scope="col">Harga</th>
          <th scope="col">Status Lapangan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data as $jadwal) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <th scope="row"><?= $jadwal['nomor_lapangan']; ?></th>
            <th scope="row"><?= $jadwal['tgl_jadwal']; ?></th>
            <th scope="row"><?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_selesai']; ?></th>
            <th scope="row">Rp <?php echo number_format($jadwal['harga'], 0, ',', '.'); ?></th>
            <th scope="row"><?= $jadwal['status_lapangan']; ?></th>
            <th scope="row" class="d-flex flex-row">
              <a href="reservasi.php?page=reservasi&action=add&id=<?php echo $jadwal['id_reservasi'] ?>" class="btn bg-success bg-opacity-75 text-white" onClick="return confirm('Apakah anda yakin menambah jadwal ini?');">Tambah</a>&nbsp;
            </th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div style="margin-top: 36px;">
      <h4 class="text-secondary">Data Pesanan</h4>
      <table class="table table-bordered border-secondary mt-4">
        <thead class="bg-success bg-opacity-75 text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nomor Lapangan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data as $lapangan) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <th scope="row"><?= $lapangan['tgl_jadwal']; ?></th>
              <th scope="row"><?= $lapangan['nomor_lapangan']; ?></th>
              <th scope="row"><?= $lapangan['jam_mulai']; ?> - <?= $lapangan['jam_selesai']; ?></th>
              <th scope="row">Rp <?php echo number_format($lapangan['harga'], 0, ',', '.'); ?></th>
              <th scope="row">
                <a href="delete.php?kode_jadwal=<?= $lapangan['kode_jadwal']; ?>" class="btn bg-danger bg-opacity-75 text-white" onClick="return confirm('Apakah anda yakin menghapus jadwal ini?');">Hapus</a>&nbsp;
              </th>
            </tr>
          <?php endforeach; ?>
          <tr>
            <th colspan="4" style="text-align: right;">Total :</th>
            <th colspan="2" style="text-align: left;">
              Rp <?php echo number_format($jadwal['harga'], 0, ',', '.'); ?>
            </th>
          </tr>
          <tr>
            <th colspan="4" style="text-align: right;">Metode Pembayaran :</th>
            <th colspan="2">
              <div class="mb-3" style="margin-right: 12px;">
                <div class="form-floating">
                  <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" aria-label="Floating label select example" required>
                    <option selected>Pilih Metode Pembayaran</option>
                    <option value="Tranfer ke BCA">Tranfer ke BCA</option>
                    <option value="Transfer ke BNI">Transfer ke BNI</option>
                    <option value="Transfer ke Mandiri">Transfer ke Mandiri</option>
                    <option value="Transfer ke BSI">Transfer ke BSI</option>
                  </select>
                  <label for="metode_pembayaran">Pilih Metode Pembayaran</label>
                </div>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
      <button class="btn bg-success bg-opacity-75 w-100">
        <a name="add" class="text-decoration-none text-white" onClick="return confirm('Apakah anda yakin memesan jadwal yang telah anda tambahkan?');">Reservasi</a>
      </button>
    </div>
  </div>
</div>
<?php include '../layout/footer.php';
