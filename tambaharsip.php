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

    <h3>Arsip Surat >> Unggah</h3>
    <div class="alert alert-info">
				<medium>
        Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br />
				Catatan:<br />
        <ul>
          <li>Gunakan file berformat PDF</li>
        </ul>
				</medium>
			</div>
    <!-- <h5>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        Catatan:
        <ul>
          <li>Gunakan file berformat PDF</li>
        </ul> -->
        <!-- <br>&nbsp &nbsp &nbsp*  -->
    </h5>
    <br>
    <form method="POST" action="proses_tambaharsip.php" enctype="multipart/form-data">
        <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Nomor Surat</label>
                <div class="col-sm-3">
                  <input required type="text" name="nomor_surat" class="form-control">
                </div>
        </div>

        <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Kategori</label>
                <div class="col-sm-4">
                  <select name="kategori" class="form-control">
                  <option value="Nota Dinas">Akomodasi</option>
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
            
            <a href="arsip.php" class="btn btn-warning"> Kembali </a>

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form><br><br>
</div>    

</body>
</html>

