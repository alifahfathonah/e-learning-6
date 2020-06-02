<!-- Main content -->
<?php echo $this->session->flashdata("k") ?>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Verifikasi pembelajaran <?php echo $data_belajar->mata_pelajaran." Modul ".$data_belajar->modul." (".$data_belajar->nama.")"; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="row">
                <div class="col-md-1" style="width: 3%;"></div>
                <div class="col-md-11"><div class="bg-green disabled color-palette" style="padding: 10px;">
                    <span>*) Catatan
                        <ul>
                          <li>Tanpa Verifikasi, Belajar Tidak dapat dimulai</li>
                          <li>Bukti verifikasi harus berbentuk gambar</li>
                        </ul>
                    </span>
                </div></div>
                <div class="col-md-1" style="width: 2%;"></div>
            </div>
           <div class="row">
              <div class="col-md-4 text-center" style="margin-top: 5%;">
                <span><img src="<?=base_url();?>assets/image/cimb niaga.jpg" width="90"></span><br>
                <span>A\n : E-learning</span><br>
                <span>1234-9097-8392</span>
              </div>
              <div class="col-md-4 text-center" style="margin-top: 5%;">
                <span><img src="<?=base_url();?>assets/image/Logo mandiri.png" width="90"></span><br>
                <span>A\n : E-learning</span><br>
                <span>1234-9097-8392</span>
              </div>
             <div class="col-md-4 text-center" style="margin-top: 5%;">
                <span><img src="<?=base_url();?>assets/image/bank-bca.png" width="90"></span><br>
                <span>A\n : E-learning</span><br>
                <span>1234-9097-8392</span>
              </div>
            </div>
            
            <hr>
            <form class="text-center" role="form" action="<?php echo base_url() ?>murid/verifikasi/saveData" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Verification</label>
                  <input type="hidden" name="id" value="<?=$data_belajar->id ?>">
                  <input type="file" id="file" name="file" style="margin:0 auto;">

                  <p class="help-block">Upload verification</p>
                  <p class="help-block">Total Amount</p>
                  <p><h2><b>Rp. <?=$data_belajar->harga; ?></b></h2></p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->