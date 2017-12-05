<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-android-upload"></i> Impor Data Siswa
      <small>SMK NEGERI 1 BRONDONG</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="<?php print $root; ?>admin/student" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> BACK</a>
              </h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                <br/>
                <?php 
                $time = microtime();
                $time = explode(' ', $time);
                $time = $time[1] + $time[0];
                $start = $time;
                ?>
                <p><strong>Perhatian!</strong>
                  <ol>
                    <li>Hanya file .xls (Excel 2003) yang diijinkan.</li>
                    <li>Untuk mengimpor silahkan download formatnya <a class="label label-warning" href="<?php print $root; ?>impor_data_siswa.xls"><strong>disini.</strong></a></li>
                    <li>Jangan merubah format yang ada di excel.</li>
                  </ol>
                </p><br/>
                <form name="myForm" id="myForm" onSubmit="return validateForm()" action="<?php print $root;?>admin/student/import-xls" method="post" enctype="multipart/form-data">
                  <input type="file" id="filesiswa" class="form-control" name="filesiswa" required /><br/>
                  <input type="submit" name="submit" class="btn btn-md btn-success flat" value="Import" />
                </form><br/>
                <!-- start progres bar -->
                <?php 
                if (isset($_POST['submit'])) {
                  ?>
                  <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
                  <div id="info"></div><br/>
                  <?php
                }
                ?>
                <!-- end progres bar -->
                <script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
function validateForm()
{
  function hasExtension(inputID, exts) {
    var fileName = document.getElementById(inputID).value;
    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
  }

  if(!hasExtension('filesiswa', ['.xls'])){
    alert("Hanya file XLS (Excel 2003) yang diijinkan.");
    return false;
  }
}
</script>

<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
mysql_connect('localhost', 'root', '');
mysql_select_db('smknbrondong');

//memanggil file excel_reader
require "excel_reader.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

  $target = basename($_FILES['filesiswa']['name']) ;
  move_uploaded_file($_FILES['filesiswa']['tmp_name'], $target);

  $data = new Spreadsheet_Excel_Reader($_FILES['filesiswa']['name'],false);

//    menghitung jumlah baris file xls
  $baris = $data->rowcount($sheet_index=0);

//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
  for ($i=2; $i<=$baris; $i++)
  {

//        menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah 
//        jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
    $barisreal = $baris-1;
    $k = $i-1;

// menghitung persentase progress
    $percent = intval($k/$barisreal * 100)."%";

// mengupdate progress
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
    document.getElementById("info").innerHTML="'.$k.' data berhasil diimport! ('.$percent.' selesai).";
    </script>';

//       membaca data (kolom ke-1 sd terakhir)
    $nis_nisn         = $data->val($i, 1);
    $nama_siswa       = $data->val($i, 2);
    $jk               = $data->val($i, 3);
    $tmp_lahir        = $data->val($i, 4);
    $tgl_lahir        = $data->val($i, 5);
    $agama            = $data->val($i, 6);
    $alamat_siswa     = $data->val($i, 7);
    $telp_hp_siswa    = $data->val($i, 8);
    $nama_sek_asal    = $data->val($i, 9);
    $alamat_sek_asal  = $data->val($i, 10);
    $th_ijazah        = $data->val($i, 11);
    $no_ijazah        = $data->val($i, 12);
    $diterima_kelas   = $data->val($i, 13);
    $tgl_diterima     = $data->val($i, 14);
    $nama_ayah        = $data->val($i, 15);
    $nama_ibu         = $data->val($i, 16);
    $alamat_ortu      = $data->val($i, 17);
    $telp_hp_ortu     = $data->val($i, 18);
    $pekerjaan_ortu   = $data->val($i, 19);
    $nama_wali        = $data->val($i, 20);
    $alamat_wali      = $data->val($i, 21);
    $telp_hp_wali     = $data->val($i, 22);
    $pekerjaan_wali   = $data->val($i, 23);

//      setelah data dibaca, masukkan ke tabel pegawai sql
    $query = "INSERT INTO tb_siswa (nis_nisn, nama_siswa, jk, tmp_lahir, tgl_lahir, agama, alamat_siswa, telp_hp_siswa, nama_sek_asal, alamat_sek_asal, th_ijazah, no_ijazah, diterima_kelas, tgl_diterima, nama_ayah, nama_ibu, alamat_ortu, telp_hp_ortu, pekerjaan_ortu, nama_wali, alamat_wali, telp_hp_wali, pekerjaan_wali) VALUES ('$nis_nisn', '$nama_siswa', '$jk', '$tmp_lahir', '$tgl_lahir', '$agama', '$alamat_siswa', '$telp_hp_siswa', '$nama_sek_asal', '$alamat_sek_asal', '$th_ijazah', '$no_ijazah', '$diterima_kelas', '$tgl_diterima', '$nama_ayah', '$nama_ibu', '$alamat_ortu', '$telp_hp_ortu', '$pekerjaan_ortu', '$nama_wali', '$alamat_wali', '$telp_hp_wali', '$pekerjaan_wali')";
    
    $hasil = mysql_query($query);

    flush();

    sleep(1);
  }

  if(!$hasil){
    die(mysql_error());
  }
  unlink($_FILES['filesiswa']['name']);
}
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo "Selesai dalam ".$total_time." detik";
?>

</div></div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "_footer.php";
?>