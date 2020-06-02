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
        <th>Guru</th>
        <th>Mata Pelajaran</th>
        <th>Modul</th>
        <th>Harga</th>
        <th width="10%">Keterangan</th>
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
        <td><?php echo $value->nama;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->modul;?></td>
        <td><?php echo $value->harga;?></td>
        <td><?php echo ($value->status_clear==3)? "Transaksi sudah selesai, transaksi sudah di kirim saat ".$value->tgl_clear : "Transaksi Belum dikirim oleh Pihak Rumah Pengembangan"; ?></td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
</div>