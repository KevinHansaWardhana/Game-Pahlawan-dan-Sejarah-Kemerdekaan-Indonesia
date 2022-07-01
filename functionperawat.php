<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
	if (isset($_REQUEST['simpan'])) {
		$id_perawat  = $_REQUEST['id_perawat'];
		$nama_perawat = $_REQUEST['nama_perawat'];
		$alamat_perawat = $_REQUEST['alamat_perawat'];
		$jenkel = $_REQUEST['jenkel'];
		$agama = $_REQUEST['agama'];
		$no_telp   = $_REQUEST['no_telp'];
		$result = mysqli_query($conn,"INSERT INTO perawat (id_perawat ,nama_perawat,alamat_perawat, jenkel,agama,no_telp) 
									  values ('$id_perawat','$nama_perawat','$alamat_perawat','$jenkel','$agama','$no_telp')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:perawat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:perawat.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_perawat  = $_REQUEST['id_perawat'];
		$nama_perawat = $_REQUEST['nama_perawat'];
		$alamat_perawat = $_REQUEST['alamat_perawat'];
		$jenkel = $_REQUEST['jenkel'];
		$agama = $_REQUEST['agama'];
		$no_telp   = $_REQUEST['no_telp'];

		$result = mysqli_query($conn,"UPDATE perawat SET 
									  nama_perawat='$nama_perawat', 
									  alamat_perawat='$alamat_perawat', 
									  jenkel='$jenkel',
									  agama='$agama', 
									  no_telp='$no_telp'
									  WHERE id_perawat ='$id_perawat'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:perawat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:perawat.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_perawat =$_REQUEST['id_perawat'];

		$result = mysqli_query($conn,"DELETE FROM perawat WHERE id_perawat ='$id_perawat'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:perawat.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:perawat.php');
		}
	}
	?>