<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id_arsip'];
  $gambar = $_FILES['NamaFile']['name'];
  $judul = $_POST['nomor_surat'];
  $penulis = $_POST['kategori'];
  $tahun = $_POST['judul'];
//   $penerbit = $_POST['penerbit'];
//   $genre = $_POST['genre'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar != "") {
    $ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['NamaFile']['tmp_name'];
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'file/'.$nama_gambar_baru); //memindah file gambar ke folder gambar

                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $sql  = "UPDATE arsip SET file = '$nama_gambar_baru', nomor_surat = '$judul', kategori = '$penulis', judul= '$tahun'";
                    $sql .= "WHERE nomor_surat = '$judul'";
                    $result = mysqli_query($kon, $sql);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='arsip.php';</script>";
                    }
              } else {
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='updatebuku.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $sql  = "UPDATE arsip SET nomor_surat = '$judul', kategori = '$penulis', judul= '$tahun'";
      $sql .= "WHERE nomor_surat = '$judul'";
      $result = mysqli_query($kon, $sql);
      // periksa query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='arsip.php';</script>";
      }
    }
