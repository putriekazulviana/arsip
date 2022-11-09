<!DOCTYPE html>
<html>
<head>
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
<style>
.btn {
        transition: transform 0.7s;
      }
.btn:hover {
        transform: translateY(10px);
      }
</style> 
</head>
<body>
    <div class="container">
    <!-- <br> -->
    <h2>Arsip Surat</h2>
    <div class="alert alert-info">
				<medium>
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br />
				Klik "Lihat" pada kolom aksi untuk menampilkan surat.<br />
				</medium>
			</div>
    <!-- <h6>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h6>
    <h6>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h6> -->
    <br>
    <!-- <form action="index.php" method="get">
	<label>Cari surat: </label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
    </form> -->
    <!-- SidebarSearch Form -->
    <!-- <form class="form-group row" method="get" action="">
        <div class="col-sm-11">
        <input type="text" class="form-control" placeholder="Cari surat" name="cari">
        </div>
    </form> -->
    <form class="form-group row" method="get" action="">
              <span>Cari surat: </span>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="search" name="cari">

              </div>
              <input type="submit" class="btn btn-primary" value="Cari!" />
    </form>

    <!-- <br> -->
    <!-- <a href="tambahbuku.php" class="btn btn-primary" role="button"><i class="bi bi-pencil-square"></i> Tambah Data</a>
    <a href="cetakbuku.php" class="btn btn-primary" role="button"><i class="bi bi-printer"></i> Cetak Data</a> -->
    <!-- <br> -->
    <table class="table table-bordered table-hover">
    <!-- <br> -->
    <thead>
        <tr>
            <!-- <th style="text-align: center;">ID</th> -->
            <th style="text-align: center;">Nomor Surat</th>
            <th style="text-align: center;">Kategori</th>
            <th style="text-align: center;">Judul</th>
            <th style="text-align: center;">Waktu Pengarsipan</th>
            <th colspan='3' style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php 
include "koneksi.php";
    // tampilkan data arsip
    $query = mysqli_query($kon, "SELECT * FROM arsip");

    // $query = $pdo->prepare("select * from arsip where nomor_surat = :nomor_surat");
    // $query->execute(array('kategori') => $_POST['kategori']);

    if (isset($_GET['cari'])) {
      $query = mysqli_query($kon, "SELECT * FROM arsip WHERE judul LIKE '%".
        $_GET['cari']."%'");
    }
    

    while ($dt = mysqli_fetch_assoc($query)) {
      ?>

      <tr>
        <!-- <td style="text-align: center;"><?= $dt['id_arsip']; ?></td> -->
        <td style="text-align: center;"><?= $dt['nomor_surat']; ?></td>
        <td style="text-align: center;"><?= $dt['kategori']; ?></td>
        <td style="text-align: center;"><?= $dt['judul']; ?></td>
        <td style="text-align: center;"><?= $dt['waktu']; ?></td>
        <td style="text-align: center;">
        <a href="editarsip.php?id_arsip=<?php echo $dt['id_arsip'];?>" class="btn btn-success"> Edit </a>  
        <a href="deletearsip.php?id_arsip=<?php echo $dt['id_arsip'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');" class="btn btn-danger"> Hapus </a>  
        <a href="file/<?php echo $dt['file'];?> "download="<?php echo $dt['file'];?>" class="btn btn-warning"> Unduh </a>
        <a href="lihat_data.php?nomor_surat=<?php echo $dt['nomor_surat'] ?>" class="btn btn-primary"> Lihat </a>
        </td>
      </tr>

    <?php
    }
    ?>
  </tbody>
</table>

<a href="tambaharsip.php" class="btn btn-primary" role="button"> Arsipkan Surat</a>

</div>

</body>
</html>
