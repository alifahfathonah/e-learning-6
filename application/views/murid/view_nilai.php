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
<section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Nilai</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
              <input type="hidden" id="id" name="id" value="<?=$id; ?>">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                      <span class="username text-center" style="margin-left: 0px;font-size: 200px;">
                      <?=$nilai; ?>
                      </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <span class="text-center" style="color: <?=$color; ?>"><?=$msg; ?></span>
                  </p>
                </div>
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Rating</h3>
            </div>
            <div class="modal-body form">
              
                <form action="" method="post">
                  <input type="hidden" id="id_guru" value="<?=$guru ?>">
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
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
function myFunction(param) {
    var txt;
    var r = confirm("Apakah Anda Yakin akan Belajar dengan " + param + " ?");
    if (r == true) {
        $('#ff').submit();
    }
}

setTimeout(function(){ 
  var nilai = "<?=$nilai;?>";
  var base_url = "<?=base_url(); ?>";
  if(nilai < 75){
    window.location.replace(base_url + "murid/soal/index/<?=$id;?>");
  }else{
    $('#myModal').modal({backdrop:"static",keyword:false});
    $('#myModal').modal('show'); 
  } 
}, 3000);

function save() {
    var star = $('input[name="star"]:checked').val();
    var comment = $('#comment').val();
    var id_guru = $('#id_guru').val();
    var id_murid = $('#id_murid').val();
    var id_belajar = "<?=$id; ?>";
    var url = "<?php echo base_url() ?>murid/belajar/saveRating";
    if(star != "" && comment != ""){
      $.ajax({
        url: url,
        method : 'POST',
        data: {
          id_guru : id_guru,
          id_murid : id_murid,
          rating : star,
          deskripsi : comment,
          id_belajar : id_belajar
        },
        success: function(data){
          var t = JSON.parse(data);
          if(t['success']){
            alert(t['message']);
            window.location.href="<?php echo base_url() ?>murid/belajar/result";
          }else{
            alert(t['message']);
          }
        }
      });
    }else{
      alert('Rating atau Deskripsi tidak boleh kosong !');
    }
  }
</script>

<style type="text/css">
.list_modul{
  overflow: hidden;
}
</style>