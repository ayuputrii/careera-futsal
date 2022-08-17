<?php
include 'layout/header-not-login.php';;

$start = "SELECT status_lapangan FROM tb_jadwal";
$result = $db->query($start);
$options = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['search'])) {
  $tgl_jadwal = $_GET['search'];
  $status_lapangan = $_GET['search'];
  $data = search("SELECT * FROM tb_jadwal WHERE tgl_jadwal LIKE %$tgl_jadwal% OR status_lapangan LIKE %$status_lapangan%;");
} else {
  $data = search("SELECT * FROM tb_jadwal");
}
?>
<div class="mt-4">
  <h2 style="text-align: center;">Info Jadwal</h2>
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <form action="" role="search" action="" method="GET">
      <div class="mb-3" style="margin-right: 12px;">
        <label for="tgl_jadwal" class="form-label text-dark">Pilih Tanggal</label>
        <input type="date" class="form-control" id="tgl_jadwal" name="tgl_jadwal" required>
      </div>
      <div class="mb-3" style="margin-right: 12px;">
        <label for="status_lapangan" class="form-label text-dark">Status Lapangan</label>
        <div class="form-floating">
          <select class="form-select" id="status_lapangan" name="status_lapangan" aria-label="Floating label select example" required>
            <option selected>Pilih Status Lapangan</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Tidak Tersedia">Tidak Tersedia</option>
          </select>
          <label for="status_lapangan">Pilih Status Lapangan</label>
        </div>
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
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include 'layout/footer.php';
