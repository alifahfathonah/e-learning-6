<h1>Welcome <?php echo $this->session->userdata('data')['nama']; ?></h1>
<h3>
	<?php 
		if($this->session->userdata('data')['type'] == 'guru'){

			if($this->session->userdata('data')['status'] == 0){
				echo "<span style='color:red;'>Silahkan Lengkapi Data Profile Anda, Untuk Proses Aktifasi Akun oleh Admin.</span>";
				echo "<hr>";
				echo "Silahkan tunggu 1-3 hari jam kerja, untuk proses Aktifasi Akun.";
			}
		}
	?>
</h3>
