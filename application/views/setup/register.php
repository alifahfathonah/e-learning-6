<div class="register-box">
  <?php echo $this->session->flashdata("k") ?>
  <div class="register-logo">
    <a href="#"><b>Rumah Pengembangan</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?php echo base_url() ?>setup/register/saveData" method="post">
      <div class="form-group">
        <div class="btn-group btn-group-justified">
          <div class="col-xs-6">
            <input type="radio" name="type" value="murid" checked="checked">
            Member
          </div>
          <div class="col-xs-6">
            <input type="radio" name="type" value="guru">
            Instruktur
          </div>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="nama" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Handphone" name="telp" required>
        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback" ></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required="required"> I agree to the <a href="<?php echo base_url()?>setup/terms">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo base_url() ?>setup/login" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>