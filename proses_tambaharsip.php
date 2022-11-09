<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $gambar = $_FILES['NamaFile']['name'];
  $judul = $_POST['nomor_surat'];
  $penulis = $_POST['kategori'];
  $tahun = $_POST['judul'];

//cek dulu jika ada gambar produk jalankan coding ini
if($gambar != "") {
  $ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['NamaFile']['tmp_name'];
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'file/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $sql  = "INSERT INTO arsip (nomor_surat, kategori, judul, file) VALUES ('$judul', '$penulis', '$tahun', '$nama_gambar_baru')";
                  $result = mysqli_query($kon, $sql);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($kon).
                           " - ".mysqli_error($kon));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='arsip.php';</script>";
                  }

            } else {
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='proses_tambaharsip.php';</script>";
            }
} else {
  $sql  = "INSERT INTO arsip (nomor_surat, kategori, judul, file) VALUES ('$judul', '$penulis', '$tahun', '$nama_gambar_baru')";
                  $result = mysqli_query($kon, $sql);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($kon).
                           " - ".mysqli_error($kon));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='arsip.php';</script>";
                  }
}
