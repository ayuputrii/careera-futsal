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

  //Fungsi Untuk Menghapus Data
    //fungsi untuk hapus data jam
    function deleteJam($kode_jam){
      global $db;

      mysqli_query($db, "DELETE FROM tb_jam WHERE kode_jam=$kode_jam");
      return mysqli_affected_rows($db);
    }
?>