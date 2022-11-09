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
    body {
        background-color: #e8e8e8;
    }
    .kartu {
        width: 800px;
        margin: 0 auto;
        margin-top: 70px;
        box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,.03);
        transition: all .3s;
    } 
    .foto {
        padding: 20px;
    }
    tbody {
    font-size: 20px;
    font-weight: 300;
    }
    .biodata {
    margin-top: 30px;
    }
</style> 
</head>
<body>
    <div class="container">
    
    <h2> About</h2>
    <section class="content">
    <div class="card">
    <div class="row">
      <div class="col-md-3">
      <div class="foto" >
        <img src="img/putri.jpg" alt="" width="200" height="auto" style="border: 7px solid ; border-radius: 20px;">
      </div>
      </div>
      <div class="col-md-8 kertas-biodata">
        <div class="biodata">
        <table width="100%" border="0">
    <tbody><tr>
        <td valign="top">
        <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;">
          <tbody>
          <tr>
              <td width="30%" valign="top" class="textt">Aplikasi ini dibuat oleh</td>
              <td width="2%">:</td>
            </tr>
            <tr>
              <td width="25%" valign="top" class="textt">Nama</td>
                <td width="2%">:</td>
                <td >Putri Eka Zulviana</td>
            </tr>
          <tr>
              <td class="textt">NIM</td>
                <td>:</td>
                <td>2031730110</td>
            </tr>
          <tr>
              <td class="textt">Tanggal</td>
                <td>:</td>
                <td>3 November 2022</td>
            </tr>
          <!-- <tr>
              <td class="textt">Tanggal Lahir</td>
                <td>:</td>
                <td>31/08/1997</td>
            </tr>
          <tr>
              <td class="textt">Fakultas</td>
                <td>:</td>
                <td>Teknik</td>
            </tr>
          <tr>
              <td valign="top" class="textt">Prodi</td>
                <td valign="top">:</td>
                <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td valign="top" class="textt">Blog</td>
                <td valign="top">:</td>
                <td>www.kochengoren.net</td>
            </tr> -->
        </tbody></table>
        </td>
    </tr>
    </tbody></table>
  </div>
      <!-- </div> -->
    </div>
</div>
    </div>
</section>
</body>

</html>
