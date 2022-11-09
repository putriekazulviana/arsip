<?php
include("koneksi.php");

if(isset($_GET['id_arsip'])){
    $id = htmlspecialchars($_GET['id_arsip']);

    $sql = "delete from arsip where id_arsip ='$id'";
    $hasil = mysqli_query($kon, $sql);

    //kondisi apakah berhasil/tdk
    if($hasil){
        header("Location:arsip.php");
    }else{
        echo "<div class='alert alert-danger'>Data Gagal dihapus.</div>";
    }
}
?>
