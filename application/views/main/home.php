<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rumah Pengembangan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/starr.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/image-picker.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  if(isset($this->session->userdata('data')['foto'])){
    if($this->session->userdata('data')['foto'] != "" || $this->session->userdata('data')['foto'] != null){
      $urlImage = base_url()."assets/file/guru/".$this->session->userdata('data')['foto'];
    }else{
      $urlImage = base_url()."assets/image/avatar5.png";
    }
  }else{
    $urlImage = base_url()."assets/image/avatar5.png";
  }
?>
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h4>Rumah Pengembangan</h4></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$urlImage ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('data')['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=$urlImage ?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('data')['nama']; ?>
                  <small><?=$this->session->userdata('data')['type']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php 
                    $id_session = $this->session->userdata('data')['id'];
                    $url = "murid/profile/data/".$id_session;
                    if($this->session->userdata('data')['type'] == "instruktur"){
                      $url = "guru/profile/data/".$id_session;
                    }
                  ?>
                  <?php
                    if($this->session->userdata('data')['type'] != "admin"){
                  ?>
                  <a href="<?php echo base_url() ?><?php echo $url;?>" class="btn btn-default btn-flat">Profile</a>
                  <?php }?>

                </div>
                <div class="pull-right">
                  <?php 
                    $url = "setup/login/log_out";
                    if($this->session->userdata('data')['type'] == "admin"){
                      $url = "admin/log_out";
                    }
                  ?>
                  <a href="<?php echo base_url().$url ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$urlImage ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('data')['nama']; ?></p>
          <a href="#"><?=$this->session->userdata('data')['type']; ?></a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if($this->session->userdata('data')['type'] == "admin"){ ?>
          <li>
            <a href="<?php echo base_url() ?>administrator/data/guru">
              <i class="fa fa-user-md"></i> <span>Data Guru</span>
              <?php if(isset($notif_admin_guru) && $notif_admin_guru > 0){ ?>
              <span class="pull-right-container">
                <small class="label pull-right bg-blue" title="Verifikasi Guru"><?=$notif_admin_guru ?></small>
              </span>
              <?php } ?>
            </a>
          </li>
          <li><a href="<?php echo base_url() ?>administrator/data/murid"><i class="fa fa-graduation-cap"></i> <span>Data Murid</span></a></li>
          <li>
            <a href="<?php echo base_url() ?>administrator/data/transaction">
              <i class="fa fa-bank"></i> <span>Transaksi</span>
              <span class="pull-right-container">
              <?php if(isset($notif_admin_tx_verf) && $notif_admin_tx_verf > 0){ ?>
                <small class="label pull-right bg-green" title="Verifikasi Transaksi"><?=$notif_admin_tx_verf ?></small>
              <?php } ?>
              <?php if(isset($notif_admin_tx_clear) && $notif_admin_tx_clear > 0){ ?>
                <small class="label pull-right bg-yellow" title="Konfirmasi Transaksi"><?=$notif_admin_tx_clear ?></small>
              <?php } ?>
              </span>
              
            </a>
          </li>
        <?php }elseif($this->session->userdata('data')['type'] == "instruktur"){ ?>
          <?php if($this->session->userdata('data')['status'] == 1){?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Modul</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url() ?>guru/modul"><i class="fa fa-circle-o"></i> <span>Modul</span></a></li>
              <li><a href="<?php echo base_url() ?>guru/file_modul"><i class="fa fa-circle-o"></i> <span>File Modul</span></a></li>

              <li>
                <a href="<?php echo base_url() ?>guru/soal"><i class="fa fa-bank"></i> <span>Soal</span>
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="<?php echo base_url() ?>guru/pengajaran"><i class="fa fa-graduation-cap"></i> <span>Pengajaran</span>
            <span class="pull-right-container">
              <?php if(isset($notif_guru_murid_baru) && $notif_guru_murid_baru > 0){ ?>
                <small class="label pull-right bg-blue" title="Murid Baru"><?=$notif_guru_murid_baru ?></small>
              <?php } ?>
              <?php if(isset($notif_guru_murid_belajar) && $notif_guru_murid_belajar > 0){ ?>
                <small class="label pull-right bg-green" title="Belajar"><?=$notif_guru_murid_belajar ?></small>
              <?php } ?>
              <?php if(isset($notif_guru_murid_nilai) && $notif_guru_murid_nilai > 0){ ?>
                <small class="label pull-right bg-green" title="Nilai & Sertifikat"><?=$notif_guru_murid_nilai ?></small>
              <?php } ?>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url() ?>guru/transaksi"><i class="fa fa-bank"></i> <span>Transaksi</span>
          <?php if(isset($notif_guru_tx) && $notif_guru_tx > 0){ ?>
              <span class="pull-right-container">
                <small class="label pull-right bg-red" title="Menunggu Transaksi"><?=$notif_guru_tx ?></small>
              </span>
              <?php } ?>
            </a>
          </li>

          <?php }?>
        <?php }else{ ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-graduation-cap"></i> <span>Materi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url() ?>murid/pelajaran"><i class="fa fa-circle-o"></i> <span>Pilih Instruktur</span></a></li>
              <li><a href="<?php echo base_url() ?>murid/belajar"><i class="fa fa-circle-o"></i> <span>Daftar Materi</span></a></li>
              <li><a href="<?php echo base_url() ?>murid/belajar/result"><i class="fa fa-circle-o"></i> <span>Hasil Materi</span></a></li>
              
            </ul>
          </li>
          <li><a href="<?php echo base_url() ?>murid/verifikasi"><i class="fa fa-bank"></i> <span>Verifikasi</span>
          <?php if(isset($notif_murid_verf) && $notif_murid_verf > 0){ ?>
              <span class="pull-right-container">
                <small class="label pull-right bg-green" title="Verifikasi Belajar"><?=$notif_murid_verf ?></small>
              </span>
            <?php } ?>
          </a></li>
        <?php } ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: 1%;">
      <?php if(isset($title)){ ?>
      <h1>
        <?=$title ?>
        <small>Control panel</small>
      </h1>
      <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?=base_url().$url_home ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$href ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->load->view($content); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/morris.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/js/raphael.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/image-picker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/starr.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
     $(".alert").hide(5000);
  })
  $(document).on("click", ".open-AddBookDialog", function () {
     var src = $(this).data('id');
     document.getElementById("conf").src = "<?php echo base_url() ?>assets/file/verifikasi/" + src;
     // $(".modal-body #bookId").val(src);
  });

</script>

</body>
</html>
