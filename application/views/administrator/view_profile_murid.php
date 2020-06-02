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

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>murid/profile/updateData" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-8">
                    <div class="form-group">
                      <label class=" control-label">Nama :</label>
                      <div class="controls">
                        <input type="text" disabled="disabled" name="nama" class="form-control" value="<?php echo $data[0]->nama;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class=" control-label">Email :</label>
                      <div class="controls">
                        <input type="text" disabled="disabled" name="email" class="form-control" value="<?php echo $data[0]->email;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class=" control-label">Telp :</label>
                      <div class="controls">
                        <input type="text" disabled="disabled" name="telp" class="form-control" value="<?php echo $data[0]->telp;?>" required>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <?php
                    if($data[0]->foto<>""){
                  ?>
                    <img src="<?php echo base_url()?>assets/file/murid/<?php echo $data[0]->foto?>" alt="" class="img-rounded img-responsive" />                       
                  <?php }else{?>
                    <img src="<?php echo base_url()?>assets/file/avatar.png" alt="" class="img-rounded img-responsive" /> 
                  <?php }?>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>administrator/data/murid">Kembali</a>
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