<style type="text/css">
 .pointer :hover{
      cursor :pointer;
      background-color: #F3f3f3;
  }
</style>

<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Materi</h1>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Materi</th>
        <th>Guru</th>
        <th>Nilai</th>
        <th>Sertifikat</th>
        <th width="5%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_belajar as $value) {
          $no++;

          if($value->nilai <= 75){
            $ket_nilai = $value->nilai." ( BK )";
          }else{
            $ket_nilai = $value->nilai;
          }
        ?>

      <tr >
        <td><?php echo $no;?></td>
        <td><?php echo $value->mata_pelajaran;?></td>
        <td><?php echo $value->nama;?></td>
        <td><?php echo $ket_nilai;?></td>
        <td>
          <?php if($value->nilai > 75){?>
          <a href="" class="text-primary" onclick="sertifikat('<?=$value->id ?>')">View</a>
          <?php }?>
        </td>
        <td><span class="btn btn-primary" onclick="profile('<?= $value->guru_id;?>')" class="pointer">View Profile</span></td>
        
      </tr>

      <?php }?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">

  function profile(value)
  {
    window.location.href='<?= base_url()?>murid/belajar/profile_guru/'+value;
  }

  function sertifikat(value) {
    var share_link = $(this).prop('href');
     window.open("<?= base_url()?>murid/belajar/sertifikat?property="+value, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=300,width=800,height=500");
  };
</script>

