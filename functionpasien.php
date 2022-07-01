<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
	if (isset($_REQUEST['simpan'])) {
		$id_pasien = $_REQUEST['id_pasien'];
		$id_dokter  = $_REQUEST['id_dokter'];
		$kode_obat  = $_REQUEST['kode_obat'];
		$nama_pasien = $_REQUEST['nama_pasien'];
		$alamat_pasien   = $_REQUEST['alamat_pasien'];
		$jenkel_pasien  = $_REQUEST['jenkel_pasien'];
		$tgl_lahir_pasien  = $_REQUEST['tgl_lahir_pasien'];
		$agama_pasien = $_REQUEST['agama_pasien'];
		$no_telp_pasien   = $_REQUEST['no_telp_pasien'];
		$result = mysqli_query($conn,"INSERT INTO pasien (id_pasien,id_dokter ,kode_obat ,nama_pasien,alamat_pasien,jenkel_pasien,tgl_lahir_pasien,agama_pasien,no_telp_pasien) 
									  values ('$id_pasien','$id_dokter ','$kode_obat ','$nama_pasien','$alamat_pasien','$jenkel_pasien','$tgl_lahir_pasien','$agama_pasien','$no_telp_pasien')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:pasien.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:pasien.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_pasien = $_REQUEST['id_pasien'];
		$id_dokter  = $_REQUEST['id_dokter'];
		$kode_obat  = $_REQUEST['kode_obat'];
		$nama_pasien = $_REQUEST['nama_pasien'];
		$alamat_pasien   = $_REQUEST['alamat_pasien'];
		$jenkel_pasien  = $_REQUEST['jenkel_pasien'];
		$tgl_lahir_pasien  = $_REQUEST['tgl_lahir_pasien'];
		$agama_pasien = $_REQUEST['agama_pasien'];
		$no_telp_pasien   = $_REQUEST['no_telp_pasien'];
		$result = mysqli_query($conn,"UPDATE pasien SET 
									  id_dokter ='$id_dokter', 
									  kode_obat ='$kode_obat', 
									  nama_pasien='$nama_pasien', 
									  alamat_pasien='$alamat_pasien',
									  jenkel_pasien ='$jenkel_pasien ', 
									  tgl_lahir_pasien ='$tgl_lahir_pasien ', 
									  agama_pasien='$agama_pasien', 
									  no_telp_pasien='$no_telp_pasien'
									  WHERE id_pasien='$id_pasien'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:pasien.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:pasien.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_pasien=$_REQUEST['id_pasien'];

		$result = mysqli_query($conn,"DELETE FROM pasien WHERE id_pasien='$id_pasien'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:pasien.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:pasien.php');
		}
	}
	?>