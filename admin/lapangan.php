<?php
include 'layout/header.php';
include '../config/auth-controller.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_lapangan ORDER BY kode_lapangan DESC");

if (isset($_POST['add'])) {
  if (createLapangan($_POST) > 0) {
    echo "<script>alert('Data Berhasil Disimpan.'); document.location.href='lapangan.php'; </script>";
  } else {
    echo "<script>alert('Data Gagal Untuk Disimpan.'); document.location.href='lapangan.php'; </script>";
  }
}
?>
<div class="p-4 mt-4">
  <div class="d-flex justify-content-between">
    <div class="col-8">
      <h2 class="text-dark">Menu Lapangan</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nomor_lapangan" class="form-label text-dark">Nomor Lapangan</label>
          <input type="number" class="form-control" id="nomor_lapangan" name="nomor_lapangan" placeholder="Input Nomor Lapangan" required>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label text-dark">Gambar</label>
          <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" required></textarea>
            <label for="deskripsi">Deskripsi</label>
          </div>
        </div>
        <button type="submit" class="btn btn-success bg-opacity-75 text-white" name="add" onClick="return confirm('Apakah data yang anda masukkan sudah sesuai?');">Tambah</button>
      </form>
      <table class="table table-bordered border-secondary mt-4">
        <thead class="bg-success bg-opacity-75 text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Lapangan</th>
            <th scope="col">Nomor Lapangan</th>
            <th scope="col">Gambar</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data as $lapangan) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <th scope="row"><?= $lapangan['kode_lapangan']; ?></th>
              <th scope="row"><?= $lapangan['nomor_lapangan']; ?></th>
              <th scope="row"><img src="../assets/image/<?php echo $lapangan['gambar']; ?>" width='100px' height='100px' /></th>
              <th scope="row"><?php echo substr($lapangan['deskripsi'], 0, 20); ?>...</th>
              <th scope="row" class="d-flex flex-row">
                <a href="update-lapangan.php?kode_lapangan=<?= $lapangan['kode_lapangan']; ?>" class="btn btn-secondary" onClick="return confirm('Apakah anda yakin data lapangan ini diubah?');">Ubah</a>&nbsp;
                <a href="delete-lapangan.php?kode_lapangan=<?= $lapangan['kode_lapangan']; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin data lapangan ini dihapus?');">Hapus</a>
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