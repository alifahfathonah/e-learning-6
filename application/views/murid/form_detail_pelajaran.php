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
          
              <?php if($Rating > 0){ ?>
                <li class="list-group-item">
                  <b>Rating</b> <a class="pull-right">
                  <?php for ($i=0; $i < $Rating; $i++) { ?>
                    <i class="fa fa-star text-yellow"></i>
                  <?php } ?>
                </li>
              <?php } ?>
                
              </ul>
              <form action="<?=base_url() ?>murid/pelajaran/saveData" id="ff" method="post">
                <input type="hidden" name="id_guru" value="<?=$data->id_guru ?>">
                <input type="hidden" name="id_modul" value="<?=$data->id ?>">
                    <a type="submit" class="btn btn-primary btn-block" onclick="myFunction('<?=$data->nama ?>')"><b>Belajar</b></a>
              </form>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Pengalaman</strong>

              <p class="text-muted">
                <?=$data->pengalaman ?>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi</strong>

              <p><?=$data->deskripsi ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Comment</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <?php foreach ($desc as $value) { ?>
                <div class="post">
                  <div class="user-block">
                      <span class="username" style="margin-left: 0px">
                        <a href="#"><?=$value->nama ?></a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?=$value->deskripsi ?>
                  </p>
                </div>
                <?php } ?>
              
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