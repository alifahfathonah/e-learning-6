<!-- Main content -->
<?php echo $this->session->flashdata("k") ?>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class=" control-label">Nama :</label>
                          <div class="controls">
                            <input type="text" disabled="disabled" name="nama" class="form-control" value="<?php echo $data[0]->nama;?>" required>
                          </div>
                        </div>
                                              
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="controls">
                              <input type="date" class="form-control" value="<?php echo $data[0]->tgl_lahir;?>"  disabled="disabled" name="tgl_lahir" required>
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Pengalaman :</label>
                          <div class="controls">
                            <textarea disabled="disabled" name="pengalaman" class="form-control" required><?php echo $data[0]->pengalaman;?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Deskripsi :</label>
                          <div class="controls">
                            <textarea disabled="disabled" name="deskripsi" class="form-control" required><?php echo $data[0]->deskripsi;?></textarea>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <?php
                        if($data[0]->foto<>""){
                      ?>
                        <img src="<?php echo base_url()?>assets/file/guru/<?php echo $data[0]->foto?>" alt="" class="img-rounded img-responsive" />                       
                      <?php }else{?>
                        <img src="<?php echo base_url()?>assets/file/guru/profile.jpg" alt="" class="img-rounded img-responsive" /> 
                      <?php }?>
                        
                    </div>

              </div>
              <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>murid/belajar/result">Kembali</a>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->