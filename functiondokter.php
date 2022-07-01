<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
	if (isset($_REQUEST['simpan'])) {
		$id_dokter   = $_REQUEST['id_dokter'];
		$nama_dokter = $_REQUEST['nama_dokter'];
		$alamat_dokter = $_REQUEST['alamat_dokter'];
		$jenkel = $_REQUEST['jenkel'];
		$agama = $_REQUEST['agama'];
		$no_telp   = $_REQUEST['no_telp'];

		$result = mysqli_query($conn,"INSERT INTO dokter (id_dokter  ,nama_dokter,alamat_dokter,jenkel,agama,no_telp) 
									  values ('$id_dokter','$nama_dokter','$alamat_dokter','$jenkel','$agama','$no_telp')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:dokter.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:dokter.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_dokter   = $_REQUEST['id_dokter'];
		$nama_dokter = $_REQUEST['nama_dokter'];
		$alamat_dokter = $_REQUEST['alamat_dokter'];
		$jenkel = $_REQUEST['jenkel'];
		$agama = $_REQUEST['agama'];
		$no_telp   = $_REQUEST['no_telp'];

		$result = mysqli_query($conn,"UPDATE dokter SET 
									  nama_dokter='$nama_dokter', 
									  alamat_dokter='$alamat_dokter', 
									  jenkel='$jenkel',  
									  agama='$agama', 
									  no_telp='$no_telp'
									  WHERE id_dokter  ='$id_dokter'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:dokter.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:dokter.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_dokter  =$_REQUEST['id_dokter'];

		$result = mysqli_query($conn,"DELETE FROM dokter WHERE id_dokter  ='$id_dokter '");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:dokter.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:dokter.php');
		}
	}
	?>