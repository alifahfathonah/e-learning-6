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
        <th>No.</th>
        <th>Mata Pelajaran</th>
        <th>Modul</th>
        <th>Nama Murid</th>
        <th>Nilai</th>
        <!-- <th width="5%">Aksi</th> -->
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_pengajaran as $key => $value) {
          $no++;
        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->modul;?></td>
        <td><?php echo $value->nama;?></td>
        <td <?=($value->status_clear > 0)? "" : "colspan='3'" ?> <?=($value->status_verf == 2 && $value->status_clear == 0)? "colspan='3'" : "" ?>>
          
          <?php
            if($value->status_clear > 0){
              if($value->nilai == "" || $value->nilai == null){
                echo '<span style=color:red;>Sedang Tes</span>';
              }else{
                echo $value->nilai;
              }
            }else{
              if($value->status_verf > 1){
                echo '<span style=color:green;>Proses Belajar</span>';
              }else{
                echo '<span style=color:blue;>Add Anda untuk menjadi guru</span>';
              }
            }
          ?>
        </td>
        <?php if($value->status_clear > 0 && $value->status_verf > 1){ ?>
        <!-- <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>guru/pengajaran/editData/<?=$value->id; ?>"></a>
        </td>   --> 
        <?php } ?>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>