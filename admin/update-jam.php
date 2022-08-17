<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

//mengambil data dari kode jam
$kode_jam = (int)$_GET['kode_jam'];
$jam = select("SELECT * FROM tb_jam ORDER BY kode_jam DESC")[0];

if (isset($_POST['update'])) {
  if (updateJam($_POST) > 0) {
    echo "<script>alert('Data Berhasil Diubah.'); document.location.href='jam.php'; </script>";
  } else {
    echo "<script>alert('Data Gagal Untuk Diubah.'); document.location.href='jam.php'; </script>";
  }
}

if (isset($_POST['cancel'])) {
  echo "<script>document.location.href='jam.php'; </script>";
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-secondary">Ubah Jam Ketersediaan</h2>
      <form action="" method="POST">
        <input type="hidden" class="form-control" id="kode_jam" name="kode_jam" value=<?= $jam['kode_jam']; ?> placeholder="Input Kode Jam" required readonly>
        <div class="mb-3">
          <label for="jam" class="form-label text-secondary text-opacity-75">Jam</label>
          <input type="time" class="form-control" id="jam" name="jam" value=<?= $jam['jam']; ?> required>
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