<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Rumah Pengembangan</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo $this->session->flashdata("k") ?>
    <p class="login-box-msg">Form Login</p>
    <?php
      $url = "admin/login";
      if($role == 'user'){
        $url = 'setup/login/login';
      }
    ?>

    <form action="<?php echo base_url().$url ?>" method="post">
      <?php 
      if($role == 'user') { 
      ?>
      <div class="form-group">
        <div class="btn-group btn-group-justified">
          <div class="col-xs-6">
            <input type="radio" name="type" id="type" value="member" checked="checked">
            Member
          </div>
          <div class="col-xs-6">
            <input type="radio" name="type" id="type" value="instruktur">
            Instruktur
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  <?php 
      if($role == 'user') { 
      ?>
    <a onclick="forgotPass()" href="javascript:void(0)" class="text-center">I forgot my password</a>
    <br>
    <a href="<?php echo base_url() ?>setup/register" class="text-center">Register a new membership</a>

    <?php }?>

  </div>
  <!-- /.login-box-body -->
</div>

<script type="text/javascript">
  function forgotPass() {
    // var type = $('#type').is(":checked");
    var base_url = "<?=base_url() ?>";
    // if(type==true){
    //   var paramForgot = 1;
    // }else{
    //   var paramForgot = 2;
    // }
    window.location.href = base_url + 'setup/forgot' ;
    // window.location.href = base_url + 'setup/forgot?forgot_password=' + paramForgot;
  }
</script>

