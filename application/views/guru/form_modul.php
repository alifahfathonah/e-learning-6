<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modul</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php 
              $id = '';
              $mata_pelajaran = '';
              $modul = '';
              $harga = '';
              $url = 'saveData';
              if(isset($data)){
                $mata_pelajaran = $data[0]->mata_pelajaran;
                $modul= $data[0]->modul;
                $id = $data[0]->id;
                $harga = $data[0]->harga;
                $url = 'updateData';
              }
            ?>

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>guru/modul/<?=$url;?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <input type="hidden" value="<?=$id ?>" name="id">
                  <div class="col-sm-6">
                    <input type="text" name="mata_pelajaran" required="required" class="form-control" value="<?php echo $mata_pelajaran?>" placeholder="Mata Pelajaran">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Modul</label>

                  <div class="col-sm-6">
                    <input type="text" name="modul" required="required" class="form-control" value="<?php echo $modul?>" placeholder="Nama Modul">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-6">
                    <input type="text" name="harga" required="required" class="form-control" value="<?php echo $harga?>" placeholder="Harga">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url()?>guru/modul" class="btn btn-default">Kembali</a>
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