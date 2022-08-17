<?php
include '../layout/header-login-user.php';
include '../config/auth-controller.php';

if (!isLoggedIn()) {
  $_SESSION['msg'] = "Kamu harus login terlebih dahulu";
  header('location: ../login.php');
}

$data = select("SELECT * FROM tb_lapangan ORDER BY kode_lapangan DESC");
?>

<div class="mt-4">
  <h2 style="text-align: center;">Informasi Lapangan</h2>
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <?php foreach ($data as $lapangan) : ?>
      <div class="d-flex flex-row justify-content-between mb-4">
        <img src="../assets/image/<?php echo $lapangan['gambar']; ?>" width="400px" height="400px" class="rounded" style="margin-right: 16px" />
        <div class="d-flex flex-column w-75 mt-2">
          <h4 class="text-dark  mb-2">Nomor Lapangan: <?php echo $lapangan['nomor_lapangan']; ?></h4>
          <h4 class="text-dark text-opacity-75 mb-2"><?php echo $lapangan['deskripsi']; ?></h4>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include '../layout/footer.php';
