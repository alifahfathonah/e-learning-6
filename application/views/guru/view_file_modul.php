<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar File Modul</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>guru/file_modul/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
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
        <th>Modul</th>
        <th>File</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_modul as $key => $value) {
          $no++;

        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->modul;?></td>
        <td><a href="<?=base_url()?>assets/file/modul/<?=$value->file; ?>"><?php echo $value->file;?></a></td>
        <td>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>guru/file_modul/deleteData/<?=$value->id; ?>"></a>
        </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>