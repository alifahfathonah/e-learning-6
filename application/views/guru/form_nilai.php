<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mata Pelajaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php 
              $mata_pelajaran = '';
              $id = '';
              $id_master_mata_pelajaran = '';
              $nama_murid = '';
              $nilai = '';
              $url = 'saveData';
              if(isset($data)){
                $mata_pelajaran = $data[0]->mata_pelajaran;
                $id_master_mata_pelajaran= $data[0]->id_master_mata_pelajaran;
                $id = $data[0]->id;
                $nama_murid = $data[0]->nama;
                $nilai = $data[0]->nilai;
                $url = 'updateData';
              }
            ?>

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>guru/nilai/<?=$url;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <div class="col-sm-6">
                    <input type="text" disabled="disabled" name="mata_pelajaran" class="form-control" value="<?php echo $mata_pelajaran?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Murid</label>
                  <div class="col-sm-6">
                    <input type="text" disabled="disabled" name="nama" class="form-control" value="<?php echo $nama_murid?>" placeholder="Nama Murid">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nilai</label>
                  <div class="col-sm-6">
                    <input type="text" name="nilai" class="form-control" value="<?php echo $nilai?>" placeholder="Nilai">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url()?>guru/nilai" class="btn btn-default">Kembali</a>
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