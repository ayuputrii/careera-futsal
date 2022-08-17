<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_jadwal ORDER BY kode_jadwal DESC");

$lapangan = "SELECT nomor_lapangan FROM tb_lapangan";
$resultLapangan = $db->query($lapangan);
$optionsLapangan = mysqli_fetch_all($resultLapangan, MYSQLI_ASSOC);


$jam = "SELECT jam FROM tb_jam";
$resultJam = $db->query($jam);
$optionsJam = mysqli_fetch_all($resultJam, MYSQLI_ASSOC);

if (isset($_POST['add'])) {
  if (createJadwal($_POST) > 0) {
    echo "<script>alert('Data Berhasil Disimpan.'); document.location.href='jadwal.php'; </script>";
  } else {
    echo "<script>alert('Data Gagal Untuk Disimpan.'); document.location.href='jadwal.php'; </script>";
  }
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-dark">Menu Jadwal</h2>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="tgl_jadwal" class="form-label text-dark">Tanggal Jadwal</label>
          <input type="date" class="form-control" id="tgl_jadwal" name="tgl_jadwal" placeholder="Input Tanggal Jadwal" required>
        </div>

        <div class="mb-3">
          <label for="tgl_jadwal" class="form-label text-dark">Nomor Lapangan</label>
          <div class="form-floating">
            <select class="form-select" id="nomor_lapangan" name="nomor_lapangan" aria-label="Floating label select example" required>
              <option selected>Pilih Nomor Lapangan</option>
              <?php foreach ($optionsLapangan as $option) { ?>
                <option><?php echo $option['nomor_lapangan']; ?></option>
              <?php } ?>
            </select>
            <label for="nomor_lapangan">Pilih Nomor Lapangan</label>
          </div>
        </div>

        <div class="mb-3">
          <label for="jam_mulai" class="form-label text-dark">Jam Mulai</label>
          <div class="form-floating">
            <select class="form-select" id="jam_mulai" name="jam_mulai" aria-label="Floating label select example" required>
              <option selected>Pilih Jam Mulai</option>
              <?php foreach ($resultJam as $option) { ?>
                <option><?php echo $option['jam']; ?></option>
              <?php } ?>
            </select>
            <label for="jam_mulai">Pilih Jam Mulai</label>
          </div>
        </div>

        <div class="mb-3">
          <label for="jam_selesai" class="form-label text-dark">Jam Selesai</label>
          <div class="form-floating">
            <select class="form-select" id="jam_selesai" name="jam_selesai" aria-label="Floating label select example" required>
              <option selected>Pilih Jam Selesai</option>
              <?php foreach ($resultJam as $option) { ?>
                <option><?php echo $option['jam']; ?></option>
              <?php } ?>
            </select>
            <label for="jam_selesai">Pilih Jam Selesai</label>
          </div>
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label text-dark">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" placeholder="Input Harga" required>
        </div>

        <div class="mb-3">
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
        <button type="submit" class="btn btn-success bg-opacity-75 text-white" name="add" onClick="return confirm('Apakah data yang anda masukkan sudah sesuai?');">Tambah</button>
      </form>
      <table class="table table-bordered border-secondary mt-4">
        <thead class="bg-success bg-opacity-75 text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Jadwal</th>
            <th scope="col">Nomor Lapangan</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
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
              <th scope="row"><?= $jadwal['tgl_jadwal']; ?></th>
              <th scope="row"><?= $jadwal['nomor_lapangan']; ?></th>
              <th scope="row"><?= $jadwal['jam_mulai']; ?></th>
              <th scope="row"><?= $jadwal['jam_selesai']; ?></th>
              <th scope="row">Rp <?php echo number_format($jadwal['harga'], 0, ',', '.'); ?></th>
              <th scope="row"><?= $jadwal['status_lapangan']; ?></th>
              <th scope="row" class="d-flex flex-row">
                <a href="update-jadwal.php?kode_jadwal=<?= $jadwal['kode_jadwal']; ?>" class="btn btn-secondary" onClick="return confirm('Apakah anda yakin data jadwal ini diubah?');">Ubah</a>&nbsp;
                <a href="delete-jadwal.php?kode_jadwal=<?= $jadwal['kode_jadwal']; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin data jadwal ini dihapus?');">Hapus</a>
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