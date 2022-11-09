<!DOCTYPE html>
<html>
<head>
    <title>Form Arsip Surat</title>
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
<?php
    include("koneksi.php");
    if(!isset($_GET['nomor_surat'])){
        header('Location: view.php');
    }
    $id = $_GET['nomor_surat'];
    $sql = "SELECT * FROM arsip WHERE nomor_surat=$id";
    $query = mysqli_query($kon, $sql);
    $barang = mysqli_fetch_assoc($query);

    if(mysqli_num_rows($query)<1){
        die("data tidak ditemukan...");
    }
?>

    <h3>Arsip Surat >> Ganti File</h3>
    
    <br>
    <form method="POST" action="proses_updatefile.php" enctype="multipart/form-data">
      <div class="form-group">
            <input type="hidden" name="id_arsip" />
        </div>  
    
      <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Nomor Surat</label>
                <div class="col-sm-3">
                  <input required type="hidden" name="nomor_surat" class="form-control" value="<?php echo $barang['nomor_surat']?>"/>
                </div>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Kategori</label>
                <div class="col-sm-4">
                  <select name="kategori" class="form-control">
                    <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
                  </select>
                </div>
              </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Judul </label>
                <div class="col-sm-5">
                  <input required type="text" name="judul" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"> File Surat (PDF) </label>
                <div class="col-sm-3">
                  <input type="file" name="NamaFile" accept="application/pdf" class="form-control-file">
                </div>
            </div>
            
            <a href="lihat_data.php" class="btn btn-warning"> Kembali </a>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form><br><br>
</div>    

</body>
</html>

