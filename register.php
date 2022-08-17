<?php
include 'layout/header-not-login.php';
?>
<div style="position: relative;">
  <div style="position: absolute; z-index: 10; right: 150px; top: 150px;">
    <div class="bg-secondary bg-opacity-50 rounded-5" style="padding: 36px; width: 600px;">
      <h4 style="text-align: center; font-weight: bold;">DAFTAR</h4>
      <form method="POST" action="register.php" class="mt-4">
        <?php echo display_error(); ?>
        <div class="mb-3">
          <label for="nama" class="form-label text-dark">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Lengkap" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label text-dark">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Input Username" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-dark">Email</label>
          <input type="email" class="form-control rounded-3" id="email" name="email" aria-describedby="emailHelp" placeholder="Input Your Email" required>
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label text-dark">Nomor Handphone</label>
          <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Input Nomor Handphone" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label text-dark">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" placeholder="Input Alamat" required></textarea>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Input Your Password" required>
        </div>
        <div class="d-flex flex-row mt-4 justify-content-end mb-2">
          <h2 id="emailHelp" class="form-text text-dark mb-2">Sudah punya akun?</h2>&ensp;
          <a href="login.php">
            <button type="button" class="btn btn-danger text-white btn-small btn-sm">LOGIN!</button>
          </a>
        </div>
        <button class="btn text-white w-100 mt-2 btn-lg" style="background-color:rgba(89, 222, 43, 15%);" onClick="return confirm('Apakah yang anda daftarkan telah sesuai?');" name="register" type="submit">DAFTAR</button>
      </form>
    </div>
  </div>
  <div style="position: relative;">
    <img src="assets/image/background.png" width="100%" height="20%" />
  </div>
</div>