<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_jam ORDER BY kode_jam DESC");

if (isset($_POST['add'])) {
  if (createJam($_POST) > 0) {
    echo "<script>alert('Data Berhasil Disimpan.'); document.location.href='jam.php'; </script>";
  } else {
    echo "<script>alert('Data Gagal Untuk Disimpan.'); document.location.href='jam.php'; </script>";
  }
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-dark">Menu Jam Ketersediaan</h2>
      <form action="" method="POST">
        <div class="mb-4">
          <label for="jam" class="form-label text-dark">Jam</label>
          <input type="time" class="form-control border-success" id="jam" name="jam" required>
        </div>
        <button type="submit" class="btn btn-success bg-opacity-75 text-white" name="add" onClick="return confirm('Apakah data yang anda masukkan sudah sesuai?');">Tambah</button>
      </form>
      <table class="table table-bordered border-secondary mt-4">
        <thead class="bg-success bg-opacity-75 text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Jam</th>
            <th scope="col">Jam</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data as $jam) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <th scope="row"><?= $jam['kode_jam']; ?></th>
              <th scope="row"><?= $jam['jam']; ?></th>
              <th scope="row" class="d-flex flex-row">
                <a href="update-jam.php?kode_jam=<?= $jam['kode_jam']; ?>" class="btn btn-secondary" onClick="return confirm('Apakah anda yakin data jam ini diubah?');">Ubah</a>&nbsp;
                <a href="delete-jam.php?kode_jam=<?= $jam['kode_jam']; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin data jam ini dihapus?');">Hapus</a>
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