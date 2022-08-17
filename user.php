<?php 
  include 'layout/header.php';
  $data = select("SELECT * FROM tb_user ORDER BY id_user DESC");

  if(isset($_GET['search'])){
    $search = $_GET['search'];
    $data = search("SELECT * FROM tb_user WHERE id_user LIKE '%".$search."%'");				
  }else{
    $data = search("SELECT * FROM tb_user");		
  }
?>
  <div class="p-4 mt-4">
    <div class="d-flex justify-content-between">
      <div class="col-8">
        <h2 class="text-dark mb-4">Menu Akun Pengguna</h2>
        <form class="d-flex" role="search" action="" method="GET">
          <input class="form-control me-2" type="search" placeholder="Cari disini" id="search" name="search" aria-label="Search">
          <button class="btn btn-success" type="submit" value="search">Cari</button>
        </form>      
        <i style="float: left;font-size: 12px; margin-top: 2px;" class="text-dark mb-4">Cari berdasarkan ID User</i>
        <table class="table table-bordered border-secondary mt-4">
          <thead class="bg-success bg-opacity-75 text-white">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Id User</th>
              <th scope="col">Nama User</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">No Handphone</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $user) : ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <th scope="row"><?= $user['id_user']; ?></th>
                <th scope="row"><?= $user['nama']; ?></th>
                <th scope="row"><?= $user['username']; ?></th>
                <th scope="row"><?= $user['email']; ?></th>
                <th scope="row"><?= $user['no_hp']; ?></th>
                <th scope="row"><?= $user['alamat']; ?></th>
                <th scope="row" class="d-flex flex-row">
                  <a href="delete-user.php?id_user=<?= $user['id_user']; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin data user ini dihapus?');">Hapus</a>
                </th>            
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex flex-row-reverse p-4 mb-3 align-self-end">
        <img src="assets/icon/futsal-logo.svg" alt="" width="100%" height="100%" class="d-inline-block align-text-center">
      </div>
    </div>
   
  </div>
<?php include 'layout/footer.php'?>