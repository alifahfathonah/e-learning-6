<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Belajar</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Materi</th>
        <th>Modul</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_belajar as $value) {
          $no++;

        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->modul;?></td>
        <td>
          <?php if($value->status_clear == 0){ ?>
          <a class="btn btn-success" href="<?php echo base_url()?>murid/belajar/pembelajaran/<?=$value->id; ?>">Belajar</a><?php }else{ ?><a class="btn btn-primary" href="<?php echo base_url()?>murid/belajar/pembelajaran/<?=$value->id; ?>">Lihat Modul</a> <?php } ?>
        </td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
</div>