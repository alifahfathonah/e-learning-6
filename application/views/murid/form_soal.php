<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php
              $foto = "file/guru/$data->foto";
                if($data->foto == "" || $foto == null){
                  $foto= "image/default.png";
                }
            ?>
              <img class="profile-user-img img-responsive img-circle" src="<?=base_url() ?>assets/<?=$foto ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$data->nama ?></h3>

              <p class="text-muted text-center"><?=$data->modul ?></p>
              <ul class="list-group list-group-unbordered list_modul">
                <li class="list-group-item">
                  <b>Daftar Modul :</b>
                  <ol>
                    <?php foreach ($list_modul as $value){?>
                    <li>
                      <span title="<?php echo $value->file?>"><?php echo $value->file?></span>
                    </li>
                    <?php }?>
                  </ol>
                </li>
                
              </ul>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Soal</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <form action="<?=base_url() ?>murid/soal/done" method="post">
                <input type="hidden" name="id_belajar" value="<?=$this->uri->segment(4); ?>">
                <input type="hidden" name="count" value="<?php echo count($soal); ?>">
                <?php $no=1; foreach ($soal as $value) { ?>
                <input type="hidden" name="id<?=$no;?>" value="<?=$value->id; ?>" >
                <div class="post">
                  <div class="user-block">
                      <span class="username" style="margin-left: 0px">
                        <?=$no.". ".$value->soal; ?>
                      </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?=$no; ?>" value="a"><?=$value->a; ?>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?=$no; ?>" value="b"><?=$value->b; ?>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?=$no; ?>" value="c"><?=$value->c; ?>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?=$no; ?>" value="d"><?=$value->d; ?>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?=$no; ?>" value="e"><?=$value->e; ?>
                          </label>
                        </div>
                      </div>
                  </p>
                </div>
                <?php $no++; } ?>
                <hr>
                <button class="btn btn-primary" type="submit">Done</button>
                </form>
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
<script type="text/javascript">
function myFunction(param) {
    var txt;
    var r = confirm("Apakah Anda Yakin akan Belajar dengan " + param + " ?");
    if (r == true) {
        $('#ff').submit();
    }
}
</script>

<style type="text/css">
.list_modul{
  overflow: hidden;
}
</style>