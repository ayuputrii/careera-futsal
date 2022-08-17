<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

//mengambil data dari kode lapangan
$kode_lapangan = (int)$_GET['kode_lapangan'];
$lapangan = select("SELECT * FROM tb_lapangan ORDER BY kode_lapangan DESC")[0];

if (isset($_POST['update'])) {
  if (updateLapangan($_POST) > 0) {
    echo "<script>alert('Data Berhasil Diubah.'); document.location.href='lapangan.php'; </script>";
  } else {
    echo "<script>alert('Data Gagal Untuk Diubah.'); document.location.href='lapangan.php'; </script>";
  }
}

if (isset($_POST['cancel'])) {
  echo "<script>document.location.href='lapangan.php'; </script>";
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-dark">Ubah Lapangan</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="number" class="form-control" id="kode_lapangan" name="kode_lapangan" placeholder="Input Kode Lapangan" value=<?= $lapangan['kode_lapangan']; ?> required readonly>
        <div class="mb-3">
          <label for="nomor_lapangan" class="form-label text-dark">Nomor Lapangan</label>
          <input type="number" class="form-control" id="nomor_lapangan" name="nomor_lapangan" placeholder="Input Nomor Lapangan" value=<?= $lapangan['nomor_lapangan']; ?> required>
        </div>
        <div class="mb-3 d-flex flex-column">
          <label for="gambar" class="form-label text-dark">Gambar</label>
          <img src="../assets/image/<?php echo $lapangan['gambar']; ?>" width='15%' height='15%' class="border border-success mb-3 rounded" />
          <input type="file" class="form-control" id="gambar" name="gambar">
          <i style="float: left;font-size: 12px;color: red">Abaikan jika tidak merubah gambar lapangan</i>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" required><?= $lapangan['deskripsi']; ?></textarea>
            <label for="deskripsi">Deskripsi</label>
          </div>
        </div>
        <button type="submit" class="btn btn-warning text-white" name="update" onClick="return confirm('Apakah data yang anda ubah sudah sesuai?');">Ubah</button>
        <button type="submit" class="btn btn-danger text-white" name="cancel" onClick="return confirm('Apakah anda yakin ingin membatalkan nya?');">Batal</button>
      </form>
    </div>
    <div class="d-flex flex-row-reverse p-4 mb-3 align-self-end">
      <img src="../assets/icon/futsal-logo.svg" alt="" width="100%" height="100%" class="d-inline-block align-text-center">
    </div>
  </div>

</div>
<?php include 'layout/footer.php' ?>