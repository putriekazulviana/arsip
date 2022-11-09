<?php
//mengaktifkan session php
session_start();

include 'koneksi.php';

//mengambil data yang dikirim dr form login
$username = $_POST['username'];
$password = $_POST['password'];

//menyeleksi data dr form login dg DB
$data = mysqli_query($kon,"select*from login where username='$username' and password='$password'");

//menghitung jumlah data yg ditemukan
$cek = mysqli_num_rows($data);

//pengecekan kondisi apabila ditemukan data
if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:index.php");
}else{
    header("location:login.php?pesan=gagal");
}
?>
