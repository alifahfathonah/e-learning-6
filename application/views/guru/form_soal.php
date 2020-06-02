<!-- Main content -->
    <script>
      function jumlahSoal() {
        $('#content').html('');
        for (var i = 1; i <= $('#jumlah').val(); i++) {
          $('#content').append('<hr><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Soal No '+i+'</label><div class="col-sm-6"><textarea class="form-control" name="soal'+ i +'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">A</label><div class="col-sm-6"><textarea class="form-control" name="a'+i+'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">B</label><div class="col-sm-6"><textarea class="form-control" name="b'+i+'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">C</label><div class="col-sm-6"><textarea class="form-control" name="c'+i+'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">D</label><div class="col-sm-6"><textarea class="form-control" name="d'+i+'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">E</label><div class="col-sm-6"><textarea class="form-control" name="e'+i+'" required="required"></textarea></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Jawaban</label><div class="col-sm-2"><select class="form-control" name="benar'+i+'" required="required"><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option></select></div></div>');
        }
      }
    </script>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Soal</h3>
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

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>guru/soal/input_soal" method="post" enctype="multipart/form-data">
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Soal</label>
                  <div class="col-sm-2">
                    <select class="form-control" required="required" name="jumlah" id="jumlah" onchange="jumlahSoal()">
                      <option value=""></option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </div>
                </div>

                <div id="content">


                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url()?>guru/soal" class="btn btn-default">Kembali</a>
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
