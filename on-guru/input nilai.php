<?php
  include "_header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="ion ion-trophy"></i> Input Nilai Siswa</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form method="POST" action="input-guru.php" class="form-horizontal">
              <center><h4><label class="label label-success">NILAI PENGETAHUAN</label></h4></center><br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Tugas 1</label>
                <div class="col-sm-1">
                  <input name="nt1" type="text" id="nt1" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-1 control-label">Tugas 2</label>
                <div class="col-sm-1">
                  <input name="nt2" type="text" id="nt2" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Tugas 3</label>
                <div class="col-sm-1">
                  <input name="nt3" type="text" id="nt3" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Tugas 4</label>
                <div class="col-sm-1">
                  <input name="nt4" type="text" id="nt4" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Tugas 5</label>
                <div class="col-sm-1">
                  <input name="nt5" type="text" id="nt5" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Harian 1</label>
                <div class="col-sm-1">
                  <input name="nh1" type="text" id="nh1" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-1 control-label">Harian 2</label>
                <div class="col-sm-1">
                  <input name="nh2" type="text" id="nh2" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Harian 3</label>
                <div class="col-sm-1">
                  <input name="nh3" type="text" id="nh3" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Harian 4</label>
                <div class="col-sm-1">
                  <input name="nh4" type="text" id="nh4" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Harian 5</label>
                <div class="col-sm-1">
                  <input name="nh5" type="text" id="nh5" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Akhir</label>
                <div class="col-sm-1">
                  <input name="akhir_np" type="text" id="akhir_np" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Predikat</label>
                <div class="col-sm-1">
                  <input name="pre_np" type="text" id="pre_np" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <center><h4><label class="label label-danger">NILAI KETERAMPILAN</label></h4></center><br>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Proses 1</label>
                <div class="col-sm-1">
                  <input name="np1" type="text" id="np1" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-1 control-label">Proses 2</label>
                <div class="col-sm-1">
                  <input name="np2" type="text" id="np2" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proses 3</label>
                <div class="col-sm-1">
                  <input name="np3" type="text" id="np3" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proses 4</label>
                <div class="col-sm-1">
                  <input name="np4" type="text" id="np4" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proses 5</label>
                <div class="col-sm-1">
                  <input name="np5" type="text" id="np5" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Produk 1</label>
                <div class="col-sm-1">
                  <input name="produk1" type="text" id="produk1" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-1 control-label">Produk 2</label>
                <div class="col-sm-1">
                  <input name="produk2" type="text" id="produk2" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Produk 3</label>
                <div class="col-sm-1">
                  <input name="produk3" type="text" id="produk3" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Produk 4</label>
                <div class="col-sm-1">
                  <input name="produk4" type="text" id="produk4" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Produk 5</label>
                <div class="col-sm-1">
                  <input name="produk5" type="text" id="produk5" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Proyek 1</label>
                <div class="col-sm-1">
                  <input name="proyek1" type="text" id="proyek1" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-1 control-label">Proyek 2</label>
                <div class="col-sm-1">
                  <input name="proyek2" type="text" id="proyek2" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proyek 3</label>
                <div class="col-sm-1">
                  <input name="proyek3" type="text" id="proyek3" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proyek 4</label>
                <div class="col-sm-1">
                  <input name="proyek4" type="text" id="proyek4" class="form-control" placeholder="..." required="required" />
                </div>
                <label class="col-sm-1 control-label">Proyek 5</label>
                <div class="col-sm-1">
                  <input name="proyek5" type="text" id="proyek5" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Akhir</label>
                <div class="col-sm-1">
                  <input name="akhir_nk" type="text" id="akhir_nk" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Predikat</label>
                <div class="col-sm-1">
                  <input name="pre_nk" type="text" id="pre_nk" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <center><h4><label class="label label-warning">UTS dan UAS</label></h4></center><br>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai UTS</label>
                <div class="col-sm-1">
                  <input name="uts" type="text" id="uts" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai UAS</label>
                <div class="col-sm-1">
                  <input name="uas" type="text" id="uas" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <hr size="50px">

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-1">
                  <input name="jumlah" type="text" id="jumlah" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
                <label class="col-sm-2 control-label">Rata-rata</label>
                <div class="col-sm-1">
                  <input name="rata" type="text" id="rata" class="form-control" placeholder="..." autofocus="on" required="required">
                </div>
              </div>

              <!-- <div class="form-group" style="margin-bottom: 20px;"> -->
                <!-- <label class="col-sm-2 control-label"></label> -->
                <!-- <div class="col-sm-6"> -->
                <input type="submit" value="SIMPAN" class="btn btn-md btn-primary pull-right" />
                <!-- </div> -->
              <!-- </div> -->
            </form>
          </div>
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