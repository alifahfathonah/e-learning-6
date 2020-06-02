<style type="text/css">
.paper-icon-button{
  display: none;
}
#download{
  display: none;
}
#buttons{
  display: none;
}
       div.stars {
  width: 270px;
  display: inline-block;
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
<!-- Main content -->

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materi</h3>
            </div>
            <!-- /.box-header -->

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>murid/belajar/done/<?=$this->uri->segment(4); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="id_belajar" name="id" value="<?=$data_belajar->id ?>">
              <?php if($data_belajar->status_clear == 0){ ?>
              <div class="box-body">
                <div class="col-md-12">
                  <table width="100%" class="table text-muted border" style="font-weight: 600;font-size: 15px;">
                   <tr>
                     <td width="15%" style="border: none">Mata Pelajaran</td>
                     <td align="center" width="3%" style="border: none">:</td>
                     <td style="border: none"><?=$data_belajar->mata_pelajaran; ?></td>
                   </tr>
                   <tr>
                     <td width="15%" style="border: none">Materi</td>
                     <td align="center" width="3%" style="border: none">:</td>
                     <td style="border: none"><?=$data_belajar->modul; ?></td>
                   </tr>
                    <tr>
                     <td width="15%" style="border: none">Nama Pengajar</td>
                     <td align="center" style="border: none">:</td>
                     <td style="border: none"><?=$data_belajar->nama; ?></td>
                   </tr>
                    <tr>
                     <td width="15%" style="border: none"><span class="fa fa-envelope-o"></span> Email Pengajar </td>
                     <td align="center" style="border: none">:</td>
                     <td style="border: none"><?=$data_belajar->email; ?></td>
                    </tr>
                    <tr>
                     <td width="15%" style="border: none"><span class="fa fa-whatsapp"> Phone Pengajar </td>
                     <td align="center" style="border: none">:</td>
                     <td style="border: none"> </span> <?=$data_belajar->telp; ?></td>
                    </tr>
                    <?php if($data_belajar->skype){?>
                    <tr>
                     <td width="15%" style="border: none"><span class="fa fa-skype"></span> Skype</td>
                     <td align="center" style="border: none">:</td>
                     <td style="border: none">
                       <a href="<?= 'skype:'.$data_belajar->skype.'?call'; ?>"> <span class="fa fa-phone-square"></span> <?=$data_belajar->skype; ?></a><br>
                       <a href="<?= 'skype:'.$data_belajar->skype.'?chat'; ?>"><span class="fa fa-commenting"></span> <?=$data_belajar->skype; ?></a><br>
                      
                      </td>
                    </tr>
                    <?php }?>
                 </table>
                 <span class="text-danger"><i>*) Diharapkan menghubungi kontak yang tertera</i></span>
                </div>
                
              </div>
              <hr/>
              <?php } ?>
              <div class="box-body">
                <div class="col-md-12">
                <h2>Modul</h2>
                  <table width="100%" class="table text-primary border" style="font-weight: 600;font-size: 15px;">
                   <?php foreach ($modul as $value) {
                  ?>
                    <tr>
                     <td width="10%" style="border: none"><a data-toggle="modal" href="#myModal2<?=$value->id ?>"><?=$value->file ?></a></td>
                     <!-- <td width="10%" style="border: none"><a data-toggle="modal" href="<?=base_url() ?>assets/file/modul/<?=$value->file ?>" target="_blank"><?=$value->file ?></a></td> -->
                   </tr>
                   <div class="modal fade" id="myModal2<?=$value->id ?>" role="dialog">
                    <div class="modal-dialog" style="width: 90%;margin: auto;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Modul</h3>
                            </div>
                            <div class="modal-body form" style="max-height: 800px;height: 550px;">
                              <?php 
                                $exVal = explode(".", $value->file);
                                if(end($exVal) == "avi" || end($exVal) == "mp4"){
                               ?>
                               <video width="100%" height="500px" controls>
                                  <source src="<?=base_url() ?>assets/file/modul/<?=$value->file ?>" type="video/mp4">
                               <?php }else{ ?>
                                <iframe style="margin: 0 auto;display:block;width: 100%;height: 500px;text-align: center;" src="<?=base_url() ?>assets/file/modul/<?=$value->file ?>?rel=0" align="center" id="frame"></iframe>
                               <?php } ?>
                             
                                
                              </video>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                  <?php
                   } ?>
                   
                 </table>
                </div>
                
              </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <?php if($data_belajar->status_clear == 0){ ?>
                <a href="<?php echo base_url()?>murid/belajar/<?php echo $this->uri->segment(4); ?>"><button type="submit" class="btn btn-primary">Done</button> </a>
                <?php } ?>
                <a href="<?php echo base_url()?>murid/belajar" class="btn btn-default">Close</a>
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

    <!-- Bootstrap modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Rating</h3>
            </div>
            <div class="modal-body form">
              
                <form action="" method="post">
                  <input type="hidden" id="id_guru" value="<?=$data_belajar->id_guru ?>">
                  <input type="hidden" id="id_murid" value="<?php echo $this->session->userdata('data')['id']; ?>">
                  <div class="stars">
                    <input class="star star-5" id="star-5" type="radio" name="star" class="star" value="5" />
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" class="star" value="4" />
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" class="star" value="3" />
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" class="star" value="2" />
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" class="star" value="1" />
                    <label class="star star-1" for="star-1"></label>
                  </div>
                  <textarea class="form-control animated" cols="50" id="comment" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
              </form> 
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



