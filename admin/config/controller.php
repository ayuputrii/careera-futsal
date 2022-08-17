<?php
  include 'db.php';

  //fungsi untuk menampilkan data
  function select($query){
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    if(!$result){
      die(mysqli_error($db));
    }

    while($row = mysqli_fetch_array($result)){
      $rows[] = $row;
    }

    return $rows;
  }
  
  //fungsi untuk menampilkan jumlah data
  function total($query){
    global $db;

    $result = mysqli_query($db, $query);
    $jumlah = mysqli_num_rows($result);

    return $jumlah;
  }


  //fungsi untuk mencari riwayat pesanan
  function search($query){
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    if(!$result){
      die(mysqli_error($db));
    }

    while($row = mysqli_fetch_array($result)){
      $rows[] = $row;
    }

    return $rows;
  }

  //Fungsi Untuk Menambahkan Data
    //fungsi untuk menambahkan data jam
    function createJam($post){
      global $db;

      $jam = $post['jam'];

      $query = "INSERT INTO tb_jam VALUES(null, '$jam')";
      mysqli_query($db, $query);
      return mysqli_affected_rows($db);
    }
    //fungsi untuk menambahkan data jadwal
    function createJadwal($post){
      global $db;

      $tgl_jadwal = $post['tgl_jadwal'];
      $nomor_lapangan = $post['nomor_lapangan'];
      $jam_mulai = $post['jam_mulai'];
      $jam_selesai = $post['jam_selesai'];
      $harga = $post['harga'];
      $status_lapangan = $post['status_lapangan'];

      $query = "INSERT INTO tb_jadwal VALUES(null, '$tgl_jadwal', '$nomor_lapangan', '$jam_mulai', '$jam_selesai', '$harga', '$status_lapangan')";
      mysqli_query($db, $query);
      return mysqli_affected_rows($db);
    }
    //fungsi untuk menambahkan data lapangan
    function createLapangan($post){
      global $db;

      $nomor_lapangan = $post['nomor_lapangan'];
      $gambar = $_FILES['gambar']['name'];
      $deskripsi = $post['deskripsi'];

      if($gambar != "") {
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
          move_uploaded_file($file_tmp, '../assets/image/'.$nama_gambar_baru);
          $query = "INSERT INTO tb_lapangan (nomor_lapangan, deskripsi, gambar) VALUES ('$nomor_lapangan', '$deskripsi', '$nama_gambar_baru')";
          $result = mysqli_query($db, $query);
          if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                " - ".mysqli_error($db));
          } else{
            return mysqli_affected_rows($db);
          }
        } else { 
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='lapangan.php';</script>";
          }
      } else {
        $query = "INSERT INTO tb_lapangan (nomor_lapangan, deskripsi, gambar) VALUES ('$nomor_lapangan', '$deskripsi', null)";
        $result = mysqli_query($db, $query);
        if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($db).
          " - ".mysqli_error($db));
        } else {
          return mysqli_affected_rows($db);
        }
      }
    }

  //Fungsi Untuk Mengubah Data
    //fungsi untuk mengubah data jam
    function updateJam($post){
      global $db;

      $kode_jam = $post['kode_jam'];
      $jam = $post['jam'];

      $query = "UPDATE tb_jam SET jam = '$jam' WHERE kode_jam=$kode_jam";
      mysqli_query($db, $query);
      return mysqli_affected_rows($db);
    }
    //fungsi untuk mengubah data jadwal
    function updateJadwal($post){
      global $db;

      $kode_jadwal = $post['kode_jadwal'];
      $tgl_jadwal = $post['tgl_jadwal'];
      $nomor_lapangan = $post['nomor_lapangan'];
      $jam_mulai = $post['jam_mulai'];
      $jam_selesai = $post['jam_selesai'];
      $harga = $post['harga'];
      $status_lapangan = $post['status_lapangan'];

      $query = "UPDATE tb_jadwal SET tgl_jadwal = '$tgl_jadwal', nomor_lapangan = '$nomor_lapangan', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', harga = '$harga', status_lapangan = '$status_lapangan' WHERE kode_jadwal='$kode_jadwal'";
      mysqli_query($db, $query);
      return mysqli_affected_rows($db);
    }
    //fungsi untuk mengubah data lapangan
    function updateLapangan($post){
      global $db;

      $kode_lapangan = $post['kode_lapangan'];
      $nomor_lapangan = $post['nomor_lapangan'];
      $gambar = $_FILES['gambar']['name'];
      $deskripsi = $post['deskripsi'];

      if($gambar != "") {
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
          move_uploaded_file($file_tmp, '../assets/image/'.$nama_gambar_baru);
          $query = "UPDATE tb_lapangan SET nomor_lapangan = '$nomor_lapangan', deskripsi = '$deskripsi', gambar = '$nama_gambar_baru' WHERE kode_lapangan = '$kode_lapangan'";
          $result = mysqli_query($db, $query);
          if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                " - ".mysqli_error($db));
          } else{
            return mysqli_affected_rows($db);
          }
        } else { 
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='lapangan.php';</script>";
          }
      } else {
        $query = "UPDATE tb_lapangan SET nomor_lapangan = '$nomor_lapangan', deskripsi = '$deskripsi' WHERE kode_lapangan = '$kode_lapangan'";
        $result = mysqli_query($db, $query);
        if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($db).
          " - ".mysqli_error($db));
        } else {
          return mysqli_affected_rows($db);
        }
      }
    }

  //Fungsi Untuk Menghapus Data
    //fungsi untuk hapus data jam
    function deleteJam($kode_jam){
      global $db;

      mysqli_query($db, "DELETE FROM tb_jam WHERE kode_jam=$kode_jam");
      return mysqli_affected_rows($db);
    }
    //fungsi untuk hapus data jadwal
    function deleteJadwal($kode_jadwal){
      global $db;

      mysqli_query($db, "DELETE FROM tb_jadwal WHERE kode_jadwal=$kode_jadwal");
      return mysqli_affected_rows($db);
    }
    //fungsi untuk hapus data lapangan
    function deleteLapangan($kode_lapangan){
      global $db;

      mysqli_query($db, "DELETE FROM tb_lapangan WHERE kode_lapangan=$kode_lapangan");
      return mysqli_affected_rows($db);
    }
    //fungsi untuk hapus data history
    function deleteReservasi($id_reservasi){
      global $db;

      mysqli_query($db, "DELETE FROM tb_reservasi WHERE id_reservasi=$id_reservasi");
      return mysqli_affected_rows($db);
    }
    //fungsi untuk hapus data user
    function deleteUser($id_user){
      global $db;

      mysqli_query($db, "DELETE FROM tb_user WHERE id_user=$id_user");
      return mysqli_affected_rows($db);
    }
