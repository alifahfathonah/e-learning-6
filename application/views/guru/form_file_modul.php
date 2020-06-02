<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">File Modul</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php
              $modul = '';
              $id = '';
              $id_modul = '';
              $harga = '';
              $disabled='';
              $url = 'saveData';
              if(isset($data)){
                $modul = $data[0]->modul;
                $id_modul= $data[0]->id_modul;
                $id = $data[0]->id;
                $disabled="disabled='disabled'";
                $url = 'updateData';
              }
            ?>

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>guru/file_modul/<?=$url;?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Modul</label>
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <div class="col-sm-6">
                    <select class="form-control" required="required" <?php echo $disabled?>  name="id_modul">
                      <option value="<?php echo $id_modul?>"><?php echo $modul?></option>
                      <option>-- Piliah Modul --</option>
                      <?php
                        foreach ($data_modul as $key => $value) {
                      ?>
                      <option value="<?php echo $value->id;?>"><?php echo $value->modul;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">File</label>
                  <div class="col-sm-6">
                    <input type="file" required="required" name="file" class="form-control">
                  </div>
                </div>
                <span style="color: red">
                Catatan : </br>
                1. Ukuran file maksimal 500 MB <br>
                2. File harus berektensi .jpg .png .jpeg .pdf .mp4 .avi <br>
                </span>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url()?>guru/file_modul" class="btn btn-default">Kembali</a>
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
