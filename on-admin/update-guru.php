<?php
include "../koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$nip = $_GET['nip'];

// Ambil Data yang Dikirim dari Form
$nama_guru  = $_POST['nama_guru'];
$jk         = $_POST['jk'];
$alamat     = $_POST['alamat'];
$telp_hp    = $_POST['telp_hp'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "foto-guru/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM tb_guru WHERE nip='".$nip."'";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("foto-guru/".$data['foto'])) // Jika foto ada
      unlink("foto-guru/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images

    // Proses ubah data ke Database
      $query = "UPDATE tb_guru SET nama_guru='".$nama_guru."', jk='".$jk."', alamat='".$alamat."', telp_hp='".$telp_hp."', foto='".$fotobaru."' WHERE nip='".$nip."'";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
        ?><script>alert ('Data berhasil diubah!');location="data-guru.php";</script><?php
    }else{
      // Jika Gagal, Lakukan :
        ?><script>alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');location="data-guru.php";</script><?php
    }
}else{
    // Jika gambar gagal diupload, Lakukan :
    ?><script>alert ('Maaf, Gambar gagal untuk diupload.');location="data-guru.php";</script><?php
}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
    $query = "UPDATE tb_guru SET nama_guru='".$nama_guru."', jk='".$jk."', alamat='".$alamat."', telp_hp='".$telp_hp."' WHERE nip='".$nip."'";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    ?><script>alert ('Data berhasil diubah!');location="data-guru.php";</script><?php
}else{
    // Jika Gagal, Lakukan :
    ?><script>alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');location="data-guru.php";</script><?php
}
}
?>