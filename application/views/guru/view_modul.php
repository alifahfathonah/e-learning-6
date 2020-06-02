<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Modul</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>guru/modul/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
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
        <th>File Modul</th>
        <th>Soal</th>
        <th>Harga</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        // print_r($data_modul);
        // die();
        $no=0;
        $url_file = base_url()."guru/file_modul";
        $url_quiz = base_url()."guru/soal";
          foreach ($data_modul as $value) {
          $no++;

        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value['mata_pelajaran'];?></td>
        <td><?php echo $value['modul'];?></td>
        <td><?php  echo ($value['count_file'] <= 0) ? "<a href='$url_file'>"."Input file"."</a>" : $value['count_file'];?></td>
        <td><?php  echo ($value['count_quiz'] <= 0) ? "<a href='$url_quiz'>"."Input Soal"."</a>" : $value['count_quiz'];?></td>
        <td><?php echo $value['harga'];?></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>guru/modul/editData/<?=$value['id']; ?>"></a>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>guru/modul/deleteData/<?=$value['id']; ?>"></a>
        </td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
