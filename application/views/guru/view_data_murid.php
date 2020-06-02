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
        <th>Nama</th>
        <th>Mata Pelajaran</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_guru as $key => $value) {
          $no++;
        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->nama;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>