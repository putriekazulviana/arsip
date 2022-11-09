<?php
$server = "127.0.0.1:3306";
$user = "root";
$password = "";
$database = "arsip";

$kon = mysqli_connect($server,$user,$password,$database);

if(!$kon){
    die("Gagal terhubung dengan database".mysqli_connect_error());
}
