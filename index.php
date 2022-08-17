<?php 
  include 'layout/header.php';

	$jumlahUser = total("SELECT * FROM tb_user");
	$jumlahLapangan = total("SELECT * FROM tb_lapangan");
	$jumlahJam = total("SELECT * FROM tb_jam");
	$jumlahJadwal = total("SELECT * FROM tb_jadwal");
  
?>
  <div class="p-4 mt-4">
    <div class="d-flex justify-content-between">
      <div class="col-8">
        <h2 class="text-dark">Selamat Datang di Website Admin Careera Futsal Subang!</h2>
        <p>Careera Futsal Subang, konsep olahraga Futsal berstandar Internasional dengan fasilitas Mewah dan Cool, sangat nyaman untuk hangout di kota Subang.</p>

        <div class="d-flex flex-row mt-4">
          <div class="bg-white shadow pb-4 pt-4 rounded w-75" style="text-align: center; margin-right: 10px;">
            <h4 class="text-dark text-opacity-75">Total User</h4>
            <h2 class="text-secondary"><?php echo $jumlahUser; ?></h2>
          </div>
          <div class="bg-white shadow pb-4 pt-4 rounded w-50" style="text-align: center; margin-right: 10px;">
            <h4 class="text-dark text-opacity-75">Total Lapangan</h4>
            <h2 class="text-secondary"><?php echo $jumlahUser; ?></h2>
          </div>
        </div>

        <div class="d-flex flex-row mt-4">
          <div class="bg-white shadow pb-4 pt-4 rounded w-50" style="text-align: center; margin-right: 10px;">
            <h4 class="text-dark text-opacity-75">Total Jam</h4>
            <h2 class="text-secondary"><?php echo $jumlahJam; ?></h2>
          </div> 
          <div class="bg-white shadow pb-4 pt-4 rounded w-50" style="text-align: center; margin-right: 10px;">
            <h4 class="text-dark text-opacity-75">Total Jadwal</h4>
            <h2 class="text-secondary"><?php echo $jumlahJadwal; ?></h2>
          </div>
        </div>
      </div>
      <div class="d-flex flex-row-reverse p-4 mb-3 align-self-end">
        <img src="assets/icon/futsal-logo.svg" alt="" width="100%" height="100%" class="d-inline-block align-text-center">
      </div>
    </div>
   
  </div>
<?php include 'layout/footer.php'?>