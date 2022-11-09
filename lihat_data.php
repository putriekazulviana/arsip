<!DOCTYPE html>
<html>
<head>
    <title>Form Lihat Surat</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
    <?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:login.php?pesan=belum_login");
    }
    ?>   
<?php
    include("layout/header.php");
    include("layout/sidebar.php");
    include("layout/topbar.php");
?>   
</head>
<body>
<div class="container">

    <h3>Arsip Surat >> Lihat</h3>
    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Arsip Surat</a></li>
              <li class="breadcrumb-item active">Lihat</li>
            </ol>
    </div> -->
   
<br>
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">

  <div class="card-body">
  <?php
  include "koneksi.php";
// $id = $_GET['id_arsip'];
$nomor_surat = $_GET['nomor_surat'];
// echo "Nomor Surat: ".$nomor_surat."<br>";

$query = mysqli_query($kon, "SELECT * FROM arsip WHERE nomor_surat = '$nomor_surat'");
while ($dt = mysqli_fetch_assoc($query)) {
?>
<?php
echo "Nomor Surat: ".$dt['nomor_surat']."<br>";
echo "Kategori: ".$dt['kategori']."<br>";
echo "Judul: ".$dt['judul']."<br>";
echo "Waktu Unggah: ".$dt['waktu']."<br>";

?>
<br>
<object data="file/<?php echo $dt['file'] ?>" width="100%" height="700px"></object>
<br>
<br>
  <a href="arsip.php" class="btn btn-primary"> Kembali </a>
  <a href="file/<?php echo $dt['file'];?> "download="<?php echo $dt['file'];?>" class="btn btn-warning"> Unduh </a>
  <!-- <a href="updatefile.php?nomor_surat='.$dt['nomor_surat'].'" class="btn btn-success"> Edit / Ganti File </a> -->
  <a href="editarsip.php?id_arsip=<?php echo htmlspecialchars($dt['id_arsip']);
            ?>" class="btn btn-success" role="button">Edit/ Ganti File</a>

  <?php
}
?>

  <!-- <input type="file" name="NamaFile" accept="application/pdf" class="form-control-file"> -->

</div>
    <!-- </form> -->
  <!-- /.card-body -->
  <!-- <div class="card-footer">
    Footer
  </div> -->
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
    <br><br>
</div>    

</body>
</html>

