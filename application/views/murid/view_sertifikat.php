<style>
.container {
    position: relative;
    text-align: center;
    color: white;
}

.no {
    position: absolute;
    top: 32.5%;
    left: 44%;
    transform: translate(-32.5%, -44%);
    font-size: 70%;
    color: #2E1563;
    font-family: Tahoma, sans-serif;
    font-weight: 900;
}

.nama {
    position: absolute;
    top: 42%;
    left: 50%;
    transform: translate(-42%, -50%);
    font-size: 190%;
    color: #2E1563;
    font-family: Tahoma, sans-serif;
    font-weight: 900;
}

.materi {
    position: absolute;
    top: 57%;
    left: 50%;
    transform: translate(-57%, -50%);
    font-size: 130%;
    color: #2E1563;
    font-family: Tahoma, sans-serif;
    font-weight: 900;
}

.date {
    position: absolute;
    bottom: 14%;
    left: 22%;
    transform: translate(-14%, -22%);
    font-size: 80%;
    color: #2E1563;
    font-family: Tahoma, sans-serif;
    font-weight: 900;
}
</style>

<?php
	$ex = explode("-", $data_belajar->date);
	$no = $this->input->get('property').".LIMA.".$ex[1].".".substr($ex[0],2,2);

	$date=date_create($data_belajar->date);
?>
<div class="container">
  <img src="<?=base_url()?>assets/image/draft sertifikat lpm-001.jpg" alt="Norway" style="width:100%;">
  <div class="no"><?=$no ?></div>
  <div class="nama"><?=$data_belajar->murid ?></div>
  <div class="materi"><?php echo $data_belajar->modul." (".$data_belajar->mata_pelajaran.")"; ?></div>
  <div class="date"><?php echo date_format($date,"d M Y"); ?></div>
</div>