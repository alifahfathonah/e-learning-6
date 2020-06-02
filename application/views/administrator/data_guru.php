<style type="text/css">
  table tbody :hover{
      cursor :pointer;
      background-color: #F3f3f3;
  }
</style>

<?php echo $this->session->flashdata('k'); ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Verifikasi Guru</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Nama guru</th>
        <th>Email</th>
        <th>Handphone</th>
        <th>Tgl Registrasi</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($user as $key => $value) {
          $no++;
        ?>
      <tr onclick="profile('<?= $value->id;?>')" class="pointer">
      <a href="<?php echo base_url()?>">
        <td><?php echo $no;?></td></a>
        <td><?php echo $value->nama;?></td>
        <td><?php echo $value->email;?></td>
        <td><?php echo $value->telp;?></td>
        <td><?php echo $value->created_at;?></td>
        <td>
          <?php if($value->status == 1){ echo "Verified"; }else{ ?>
          <a class="btn btn-success" onclick="return confirm('Apakah anda yakin verifikasi data ini?')" href="<?php echo base_url()?>administrator/data/verifikasi/<?=$value->id; ?>">Verifikasi</a>
          <?php } ?>
        </td>
      
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

<script type="text/javascript">
  function profile(value)
  {
    window.location.href='<?= base_url()?>administrator/data/profile_guru/'+value;
  }
</script>