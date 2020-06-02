<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Mata Pelajaran</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>administrator/master_mata_pelajaran/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Mata Pelajaran</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($user as $key => $value) {
          $no++;
        ?>
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>administrator/master_mata_pelajaran/editData/<?=$value->id; ?>"></a>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>administrator/master_mata_pelajaran/deleteData/<?=$value->id; ?>"></a>
        </td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>