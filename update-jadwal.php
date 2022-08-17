<?php 
  include 'layout/header.php';

  $lapangan ="SELECT nomor_lapangan FROM tb_lapangan";
  $resultLapangan = $db->query($lapangan);
  $optionsLapangan= mysqli_fetch_all($resultLapangan, MYSQLI_ASSOC);

  $start ="SELECT jam_mulai FROM tb_jadwal";
  $resultStart = $db->query($start);
  $optionsMulai= mysqli_fetch_all($resultStart, MYSQLI_ASSOC);

  $jam_selesai ="SELECT jam_selesai FROM tb_jadwal";
  $resultEnd = $db->query($jam_selesai);
  $optionSelesai= mysqli_fetch_all($resultEnd, MYSQLI_ASSOC);

  //mengambil data dari kode jadwal
  $kode_jadwal = (int)$_GET['kode_jadwal'];
  $jadwal = select("SELECT * FROM tb_jadwal ORDER BY kode_jadwal DESC")[0];

  if(isset($_POST['update'])){
    if(updateJadwal($_POST) > 0){
      echo "<script>alert('Data Berhasil Diubah.'); document.location.href='jadwal.php'; </script>";
    }else{
      echo "<script>alert('Data Gagal Untuk Diubah.'); document.location.href='jadwal.php'; </script>";
    }
  }  
  
  if(isset($_POST['cancel'])){
    echo "<script>document.location.href='jadwal.php'; </script>";
  }
?>
  <div class="p-4 mt-4">
    <div class="d-flex justify-content-between">
      <div class="col-8">
        <h2 class="text-dark">Menu Jadwal</h2>
        <form action="" method="POST">
          <input type="hidden" class="form-control" id="kode_jadwal" name="kode_jadwal" value=<?= $jadwal['kode_jadwal']; ?> placeholder="Input Kode Jadwal" required readonly>
          <div class="mb-3">
            <label for="tgl_jadwal" class="form-label text-dark">Tanggal Jadwal</label>
            <input type="date" class="form-control" id="tgl_jadwal" name="tgl_jadwal" placeholder="Input Tanggal Jadwal" value=<?= $jadwal['tgl_jadwal']; ?> required>
          </div>

          <div class="mb-3">
            <label for="tgl_jadwal" class="form-label text-dark">Nomor Lapangan</label>
            <div class="form-floating">
              <select class="form-select" id="nomor_lapangan" name="nomor_lapangan" aria-label="Floating label select example" required>
                <option selected value="<?= $jadwal['nomor_lapangan']; ?>"><?= $jadwal['nomor_lapangan']; ?></option>
                <?php foreach ($optionsLapangan as $option) { ?>
                  <option><?php echo $option['nomor_lapangan']; ?></option>
                <?php }?>
              </select>
              <label for="nomor_lapangan">Pilih Nomor Lapangan</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="jam_mulai" class="form-label text-dark">Jam Mulai</label>
            <div class="form-floating">
              <select class="form-select" id="jam_mulai" name="jam_mulai" aria-label="Floating label select example">
                <option selected value="<?= $jadwal['jam_mulai']; ?>"><?= $jadwal['jam_mulai']; ?></option>
                <?php foreach ($optionsMulai as $option) { ?>
                  <option><?php echo $option['jam_mulai']; ?></option>
                <?php }?>
              </select>
              <label for="jam_mulai">Pilih Jam Mulai</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="jam_selesai" class="form-label text-dark">Jam Selesai</label>
            <div class="form-floating">
              <select class="form-select" id="jam_selesai" name="jam_selesai" aria-label="Floating label select example">
                <option selected value="<?= $jadwal['jam_selesai']; ?>"><?= $jadwal['jam_selesai']; ?></option>
                <?php foreach ($optionSelesai as $option) { ?>
                  <option><?php echo $option['jam_selesai']; ?></option>
                <?php }?>
              </select>
              <label for="jam_selesai">Pilih Jam Selesai</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label text-dark">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Input Harga" value=<?= $jadwal['harga']; ?> required>
          </div>

          <div class="mb-3">
            <label for="status_lapangan" class="form-label text-dark">Status Lapangan</label>
            <div class="form-floating">
              <select class="form-select" id="status_lapangan" name="status_lapangan" aria-label="Floating label select example">
                <option selected value="<?= $jadwal['status_lapangan']; ?>"><?= $jadwal['status_lapangan']; ?></option>
                  <option value="Tersedia">Tersedia</option>
                  <option value="Tidak Tersedia">Tidak Tersedia</option>
              </select>
              <label for="status_lapangan">Pilih Status Lapangan</label>
            </div>
          </div>
          <button type="submit" class="btn btn-warning text-white" name="update" onClick="return confirm('Apakah data yang anda ubah sudah sesuai?');">Ubah</button>
          <button type="submit" class="btn btn-danger text-white" name="cancel" onClick="return confirm('Apakah anda yakin ingin membatalkan nya?');">Batal</button>
        </form>
      </div>
      <div class="d-flex flex-row-reverse p-4 mb-3 align-self-end">
        <img src="assets/icon/futsal-logo.svg" alt="" width="100%" height="100%" class="d-inline-block align-text-center">
      </div>
    </div>
   
  </div>
<?php include 'layout/footer.php'?>