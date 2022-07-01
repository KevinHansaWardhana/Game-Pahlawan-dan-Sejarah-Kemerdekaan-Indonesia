<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
	if (isset($_REQUEST['simpan'])) {
		$kode_obat   = $_REQUEST['kode_obat'];
		$nama_obat  = $_REQUEST['nama_obat'];
		$jenis_obat = $_REQUEST['jenis_obat'];

		$result = mysqli_query($conn,"INSERT INTO obat  (kode_obat,nama_obat ,jenis_obat ) 
									  values ('$kode_obat','$nama_obat ','$jenis_obat')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:obat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:obat.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$kode_obat   = $_REQUEST['kode_obat'];
		$nama_obat  = $_REQUEST['nama_obat'];
		$jenis_obat = $_REQUEST['jenis_obat'];
		
		$result = mysqli_query($conn,"UPDATE obat SET 
									  nama_obat ='$nama_obat', 
									  jenis_obat='$jenis_obat' 
									  WHERE kode_obat  ='$kode_obat'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location: obat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location: obat.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$kode_obat  =$_REQUEST['kode_obat'];

		$result = mysqli_query($conn,"DELETE FROM obat  WHERE kode_obat  ='$kode_obat'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:obat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:obat.php');
		}
	}
	?>