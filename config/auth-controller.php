<?php
session_start();
include 'db.php';

// variable declaration
$nama = "";
$username  = "";
$email  = "";
$no_hp = "";
$alamat = "";
$errors = array();

// call the register() function if register is clicked
if (isset($_POST['register'])) {
  register();
}

// call the login() function if register is clicked
if (isset($_POST['login'])) {
  login();
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: ../login.php");
}

// REGISTER USER
function register()
{
  global $db, $errors, $nama, $username, $email, $no_hp, $alamat;

  // receive all input values from the form
  $nama        =  e($_POST['nama']);
  $username    =  e($_POST['username']);
  $email       =  e($_POST['email']);
  $no_hp       =  e($_POST['no_hp']);
  $alamat      =  e($_POST['alamat']);
  $password    =  e($_POST['password']);

  if (empty($nama)) {
    array_push($errors, "Nama harus diisi");
  }
  if (empty($username)) {
    array_push($errors, "Username harus diisi");
  }
  if (empty($email)) {
    array_push($errors, "Email harus diisi");
  }
  if (empty($no_hp)) {
    array_push($errors, "No Handphone harus diisi");
  }
  if (empty($alamat)) {
    array_push($errors, "Alamat harus diisi");
  }
  if (empty($password)) {
    array_push($errors, "Password harus diisi");
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    if (isset($_POST['level'])) {
      $level = e($_POST['level']);
      $query = "INSERT INTO tb_user VALUES(null, '$nama', '$username', '$email', '$password', '$no_hp', '$alamat', '$level')";
      mysqli_query($db, $query);
      $_SESSION['success']  = "New user successfully created!!";
      header('location: admin/user.php');
    } else {
      $query = "INSERT INTO tb_user VALUES(null, '$nama', '$username', '$email', '$password', '$no_hp', '$alamat', 'user')";
      mysqli_query($db, $query);

      // get id of the created user
      $logged_in_user_id = mysqli_insert_id($db);

      $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
      $_SESSION['success']  = "successfully register";
      header('location: admin/index.php');
    }
  }
}

// return user array from their id
function getUserById($id_user)
{
  global $db;
  $query = "SELECT * FROM tb_user WHERE id_user=" . $id_user;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

// LOGIN USER
function login()
{
  global $db, $email, $errors;

  // grap form values
  $email = e($_POST['email']);
  $password = e($_POST['password']);

  // make sure form is filled properly
  if (empty($email)) {
    array_push($errors, "Email harus diisi");
  }
  if (empty($password)) {
    array_push($errors, "Password harus diisi");
  }

  // attempt login if no errors on form
  if (count($errors) == 0) {
    $password = md5($password);

    $query = "SELECT * FROM tb_user WHERE email='$email' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
      // check if user is admin or user
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['level'] == 'admin') {
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: admin/index.php');
      } else {
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: user/index.php');
      }

      die("Query gagal dijalankan: " . mysqli_errno($db) .
        " - " . mysqli_error($db));
    } else {
      array_push($errors, "Email atau Password anda tidak sesuai");
    }
  }
}

function isLoggedIn()
{
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') {
    return true;
  } else {
    return false;
  }
}

// escape string
function e($val)
{
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
  global $errors;

  if (count($errors) > 0) {
    echo '<div class="error">';
    foreach ($errors as $error) {
      echo $error . '<br>';
    }
    echo '</div>';
  }
}
