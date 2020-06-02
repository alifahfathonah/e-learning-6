<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Master Mata Pelajaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php 
              $pelajaran = '';
              $id = '';
              $url = 'saveData';
              if(isset($data)){
                $pelajaran = $data[0]->mata_pelajaran;
                $id = $data[0]->id;
                $url = 'updateData';

              }
            ?>

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>administrator/master_mata_pelajaran/<?=$url;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-6">
                    <input type="text" value="<?= $pelajaran;?>" class="form-control" placeholder="Mata Pelajaran" name="mata_pelajaran" required>
                    <input type="hidden" value="<?= $id;?>" class="form-control" placeholder="Mata Pelajaran" name="id">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url()?>administrator/master_mata_pelajaran" class="btn btn-default">Kembali</a>
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