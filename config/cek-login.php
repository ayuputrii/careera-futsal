<?php 
  session_start();
  
  include 'db.php';
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $login = mysqli_query($db, "SELECT * FROM tb_user WHERE email='$email' AND password='$password'");
  $cek = mysqli_num_rows($login);
  
  if($cek > 0){
    $data = mysqli_fetch_assoc($login);
  
    if($data['level']=="admin"){
      $_SESSION['email'] = $email;
      $_SESSION['level'] = "admin";
      header("location:index.php"); 
    }else{
      header("location:index.php?pesan=gagal");
    }
  }
?>