<?php echo $this->session->flashdata("k") ?>
<style type="text/css">
    div.stars {
      width: 100%;
      display: inline-block;
      padding-right: 12%;
    }

    input.star { display: none; }

    label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
</style>
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

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>guru/profile/updateData" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class=" control-label">Nama :</label>
                          <div class="controls">
                            <input type="text" name="nama" class="form-control" value="<?php echo $data[0]->nama;?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class=" control-label">Email :</label>
                          <div class="controls">
                            <input type="text" name="email" class="form-control" value="<?php echo $data[0]->email;?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class=" control-label">Telp :</label>
                          <div class="controls">
                            <input type="text" name="telp" class="form-control" value="<?php echo $data[0]->telp;?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Akun Skype</label>
                          <div class="controls">
                            <input type="text" name="skype" class="form-control" value="<?php echo $data[0]->skype;?>" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Password :</label>
                          <div class="controls">
                            <input type="text" name="password" class="form-control" value="<?php echo $data[0]->password;?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="controls">
                              <input type="date" class="form-control" value="<?php echo $data[0]->tgl_lahir;?>"  name="tgl_lahir" required>
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Pengalaman :</label>
                          <div class="controls">
                            <textarea name="pengalaman" class="form-control" required><?php echo $data[0]->pengalaman;?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Deskripsi :</label>
                          <div class="controls">
                            <textarea name="deskripsi" class="form-control" required><?php echo $data[0]->deskripsi;?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">File :</label>
                          <div class="controls">
                            <input type="file"  name="file"   class="form-control">

                            <span style="color: red;">* File must extensi .zip .rar</span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class=" control-label">Ijazah :</label>
                          <div class="controls">
                            <input type="file"  name="ttd"  class="form-control">
                            <span style="color: red;">* File must extensi .png </span>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <?php
                        if($data[0]->foto<>""){
                      ?>
                        <img src="<?php echo base_url()?>assets/file/guru/<?php echo $data[0]->foto?>" alt="" class="img-rounded img-responsive" />                       
                      <?php }else{?>
                        <img src="<?php echo base_url()?>assets/file/avatar.png" alt="" class="img-rounded img-responsive" /> 
                      <?php }?>
                        <input type="file" name="foto" class="form-control">
                        <?php if($rating > 0){ ?>
                        <div class="row" style="margin: 0 auto;">
                          <div class="stars" style="left: 50%;">
                            <input class="star star-5" id="star-5" type="radio" name="star" class="star" value="5" <?=($rating == "5") ? "checked='checked'" : "esfsdf" ?> disabled  />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" class="star" value="4" <?=($rating == "4") ? "checked='checked'" : "esfsdf" ?> disabled />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" class="star" value="3" <?=($rating == "3") ? "checked='checked'" : "esfsdf" ?> disabled />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" class="star" value="2" <?=($rating == "2") ? "checked='checked'" : "esfsdf" ?> disabled />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" class="star" value="1" <?=($rating == "1") ? "checked='checked'" : "esfsdf" ?> disabled />
                            <label class="star star-1" for="star-1"></label>
                          </div>
                         </div> 
                         <?php } ?>
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->

          <div class="col-md-12">
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content