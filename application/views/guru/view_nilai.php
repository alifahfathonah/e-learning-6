<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Nilai Pelajaran</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Mata Pelajaran</th>
        <th>Nama Murid</th>
        <th>Nilai</th>
        <th width="5%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_nilai_pelajaran as $key => $value) {
          $no++;
        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->nama;?></td>
        <td><?php echo $value->nilai;?></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>guru/nilai/editData/<?=$value->id; ?>"></a>
        </td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>