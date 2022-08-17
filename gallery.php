<?php
include 'layout/header-not-login.php';;
$data = select("SELECT * FROM tb_lapangan ORDER BY kode_lapangan DESC");
?>
<div class="mt-4">
  <h2 style="text-align: center;">Galeri</h2>
  <div style="background-color:rgba(89, 222, 43, 15%); padding: 36px;" class="w-75 mx-auto mt-4">
    <?php foreach ($data as $lapangan) : ?>
      <div class="d-flex flex-row justify-content-between mb-4 flex-wrap">
        <img src="assets/image/<?php echo $lapangan['gambar']; ?>" width="200px" height="200px" class="rounded mb-4" style="margin-right: 16px" />
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include 'layout/footer.php';
