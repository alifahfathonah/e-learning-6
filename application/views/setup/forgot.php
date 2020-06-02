<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Rumah Pengembangan</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo $this->session->flashdata("k") ?>
    <p class="login-box-msg">Form Forgot Password</p>
   
    <form action="<?php echo base_url()?>/setup/forgot/forgot" method="post">
    <!-- <form action="<?php echo base_url()?>/setup/forgot/forgot?forgot_password=<?=$this->input->get('forgot_password')?>" method="post"> -->
      <div class="form-group">
        <div class="btn-group btn-group-justified">
          <div class="col-xs-6">
            <input type="radio" name="type" value="murid" required="required">
            Member
          </div>
          <div class="col-xs-6">
            <input type="radio" name="type" value="guru" required="required">
            Instruktur
          </div>
        </div>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-4">
         <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   
    <a href="<?php echo base_url() ?>setup/login" class="text-center">Back to Login</a>

  </div>
  <!-- /.login-box-body -->
</div>

