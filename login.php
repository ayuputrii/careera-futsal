<?php
include 'layout/header-not-login.php';
?>
<div style="position: relative;">
  <div style="position: absolute; z-index: 10; right: 150px; top: 250px;">
    <div class="bg-secondary bg-opacity-50 rounded-5" style="padding: 36px; width: 600px;">
      <h4 style="text-align: center; font-weight: bold;">LOGIN</h4>
      <form method="POST" action="login.php" class="mt-4">
        <?php echo display_error(); ?>
        <div class="mb-3">
          <label for="email" class="form-label text-dark">Email</label>
          <input type="email" class="form-control rounded-3" id="email" name="email" aria-describedby="emailHelp" placeholder="Input Your Email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Input Your Password" required>
        </div>
        <div class="d-flex flex-row mt-4 justify-content-end mb-2">
          <div id="emailHelp" class="form-text text-dark mb-2">Belum punya akun?</div>&ensp;
          <a href="register.php">
            <button type="button" class="btn btn-danger text-white btn-small btn-sm">DAFTAR!</button>
          </a>
        </div>
        <button class="btn text-white w-100 mt-2 btn-lg" style="background-color:rgba(89, 222, 43, 15%);" name="login" type="submit">LOGIN</button>
      </form>
    </div>
  </div>
  <div style="position: relative;">
    <img src="assets/image/background.png" width="100%" height="20%" />
  </div>
</div>