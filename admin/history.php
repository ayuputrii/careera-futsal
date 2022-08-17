<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_reservasi ORDER BY id_reservasi DESC");

$start = "SELECT * FROM tb_jadwal";
$result = $db->query($start);
$options = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $data = search("SELECT * FROM tb_reservasi WHERE username LIKE '%" . $search . "%'");
} else {
  $data = search("SELECT * FROM tb_reservasi");
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-dark mb-4">Menu Riwayat Pesanan</h2>
      <form class="d-flex" role="search" action="" method="GET">
        <input class="form-control me-2" type="search" placeholder="Cari disini" id="search" name="search" aria-label="Search">
        <button class="btn btn-success" type="submit" value="search">Cari</button>
      </form>
      <i style="float: left;font-size: 12px; margin-top: 2px;" class="text-dark mb-4">Cari berdasarkan Username Member</i>
      <table class="table table-bordered border-secondary mt-4">
        <thead class="bg-success bg-opacity-75 text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Member</th>
            <th scope="col">Username</th>
            <th scope="col">Nomor Invoice</th>
            <th scope="col">Tanggal Invoice</th>
            <th scope="col">Kode Jadwal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data as $history) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <th scope="row"><?= $history['nama']; ?></th>
              <th scope="row"><?= $history['username']; ?></th>
              <th scope="row"><?= $history['no_reservasi']; ?></th>
              <th scope="row"><?= $history['tgl_reservasi']; ?></th>
              <th scope="row"><?= $history['id_jadwal']; ?></th>
              <th scope="row" class="d-flex flex-row">
                <a href="delete-history.php?id_reservasi=<?= $history['id_reservasi']; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin data riwayat pesanan ini dihapus?');">Hapus</a>
              </th>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="d-flex flex-row-reverse p-4 mb-3 align-self-end">
      <img src="../assets/icon/futsal-logo.svg" alt="" width="100%" height="100%" class="d-inline-block align-text-center">
    </div>
  </div>

</div>
<?php include 'layout/footer.php' ?>