<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Transaksi</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Tgl Mulai</th>
        <th>Tgl Selesai</th>
        <th>Murid</th>
        <th>Guru</th>
        <th>Total Harga</th>
        <th>File</th>
        <th width="7%">Verifikasi</th>
        <th width="7%">Proses</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data as $value) {
          $no++;
        ?>
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->created_at;?></td>
        <td><?php if($value->status_clear == 0){echo "Progress";}else{ echo $value->updated_at; }?></td>
        <td><?php echo $value->nama_murid;?></td>
        <td><?php echo $value->nama_guru;?></td>
        <td><?php echo $value->total_harga;?></td>
        <td>
          <?php 
            if($value->file==""){ echo "Belum Komfirmasi"; }else{ ?>
              <a data-toggle="modal" data-id="<?=$value->file?>" class="open-AddBookDialog" href="#myModal">
                <img class="img-responsive" src="<?=base_url(); ?>assets/file/verifikasi/<?=$value->file; ?>" width="100px;">
              </a>
          <?php } ?>
        </td>
        <td>
          <?php if($value->status_verf == 0){ echo "Belum Komfirmasi"; }elseif($value->status_verf == 1){ ?>
          <a class="btn btn-success" onclick="return confirm('Apakah anda yakin verifikasi data ini?')" href="<?php echo base_url()?>administrator/data/verifikasi_transaction/<?=$value->id; ?>">Verifikasi</a>
          <?php }else{ echo "verified at ".$value->tgl_verified; } ?>
        </td>
         <td>
          <?php 
            if($value->status_verf <> 2){ 
              echo "Belum Komfirmasi"; 
            }else{ 
              if($value->status_clear == 0){
                echo "Progress";
              }elseif($value->status_clear == 1){
                echo "Waiting Result From Teacher";
              }elseif($value->status_clear == 2){
          ?>
                  <a class="btn btn-warning" onclick="return confirm('Apakah anda yakin transaksi ini selesai ?')" href="<?php echo base_url()?>administrator/data/komfirmasi_transaction/<?=$value->id; ?>">Komfirmasi</a>
          <?php }else{ echo "confirmation at ".$value->tgl_clear; } } ?>
        </td>
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Verification Transaction</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
       <img class="img-responsive" src="" id="conf">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
