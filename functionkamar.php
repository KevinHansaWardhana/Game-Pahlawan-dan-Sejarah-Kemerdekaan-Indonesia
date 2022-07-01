<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
	if (isset($_REQUEST['simpan'])) {
		$kode_kamar    = $_REQUEST['kode_kamar'];
		$jenis_kamar  = $_REQUEST['jenis_kamar'];
		$status = $_REQUEST['status'];

		$result = mysqli_query($conn,"INSERT INTO kamar  (kode_kamar ,jenis_kamar ,status ) 
									  values ('$kode_kamar','$jenis_kamar','$status')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:kamar.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:kamar.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$kode_kamar    = $_REQUEST['kode_kamar'];
		$jenis_kamar  = $_REQUEST['jenis_kamar'];
		$status = $_REQUEST['status'];
		
		$result = mysqli_query($conn,"UPDATE kamar SET 
									  jenis_kamar ='$jenis_kamar', 
									  status='$status' 
									  WHERE kode_kamar='$kode_kamar'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location: kamar.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location: kamar.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$kode_kamar   =$_REQUEST['kode_kamar'];

		$result = mysqli_query($conn,"DELETE FROM kamar  WHERE kode_kamar   ='$kode_kamar '");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:kamar.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:kamar.php');
		}
	}
	?>