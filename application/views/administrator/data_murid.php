<style type="text/css">
  table tbody :hover{
      cursor :pointer;
      background-color: #F3f3f3;
  }
</style>

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Data Murid</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Nama murid</th>
        <th>Email</th>
        <th>Handphone</th>
        <th>Tgl Registrasi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($user as $key => $value) {
          $no++;
        ?>
      <tr onclick="profile('<?= $value->id;?>')" class="pointer">
        <td><?php echo $no;?></td>
        <td><?php echo $value->nama;?></td>
        <td><?php echo $value->email;?></td>
        <td><?php echo $value->telp;?></td>
        <td><?php echo $value->created_at;?></td>
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
    window.location.href='<?= base_url()?>administrator/data/profile_murid/'+value;
  }
</script>