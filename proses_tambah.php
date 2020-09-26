<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
  $name          = $_POST['name'];
  $importir_id   = $_POST['importir_id'];
  $photo         = $_FILES['photo']['name'];
  $qty           = $_POST['qty'];
  $price         = $_POST['price'];



//cek dulu jika ada gambar produk jalankan coding ini
if($photo != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload
  $x = explode('.', $photo); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['photo']['tmp_name'];
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$photo; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database 
                  $query = "INSERT INTO produk (name, importir_id, photo, qty, price) VALUES ('$name', '$importir_id', '$nama_gambar_baru', '$qty', '$price' )";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (name, importir_id, photo, qty, price) VALUES ('$name', '$importir_id', '$qty', '$price', null)";
                  $result = mysqli_query($koneksi, $query);
                  // memeriksa query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}
