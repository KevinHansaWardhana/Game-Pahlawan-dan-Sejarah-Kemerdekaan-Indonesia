<?php 
$conn = mysqli_connect("localhost","root","","rumah_sakit");
session_start();
if (!isset($_SESSION["username"])) {
	echo "<center>Anda harus login dulu <br><a href='login.php'>Klik disini</a></center>";
	exit;
}
$username=$_SESSION["username"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rumah Sakit</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="dataTables.bootstrap.min.css">
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="pasien.php">Data Pasien</a></li>
  <li><a href="dokter.php">Data Dokter</a></li>
  <li><a href="perawat.php">Data Perawat</a></li>
  <li><a href="obat.php">Data Obat</a></li>
  <li><a href="kamar.php">Data Kamar</a></li>
  <a href="logout.php" class="btn btn-danger" role="button">Logout</a></li>
</ul>
<br>

<div class="wrapper">	
   &nbsp &nbsp<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahData">Tambah</button>
   <button onclick="window.print()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>	
   <!-- Modal Tambah Data -->
   <div class="modal fade bs-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tambahDataLabel">Tambah Pasien</h4>
	      </div>
	      <div class="modal-body">
	       	<form class="form-horizontal" action="functionpasien.php" method="POST">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Id Pasien</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="inputEmail3" name="id_pasien" placeholder="Id Pasien" required>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Dokter</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="id_dokter">
				  <option>Pilih Nama Dokter</option>
			      	<?php 
$sql ="select *from dokter";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[id_dokter]'>$row[nama_dokter]</option>";
}
	?>
			      </select>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Obat</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="kode_obat">
				  <option>Pilih Obat</option>
			      	<?php 
$sql ="select *from obat";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[kode_obat]'>$row[nama_obat]</option>";
}
	?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pasien</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="nama_pasien" placeholder="Nama Pasien" required>
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="alamat_pasien" placeholder="Alamat" required>
			    </div>
			  </div>
			  <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="jenkel_pasien">
			      	<option>Pilih Jenis Kelamin</option>
			      	<option value="Laki-Laki">Laki-Laki</option>
			      	<option value="Perempuan">Perempuan</option>
			      </select>
			  </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="tgl_lahir_pasien" placeholder="yyyy-mm-dd" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Agama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="agama_pasien" placeholder="Agama" required>
			    </div>
			  </div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="no_telp_pasien" placeholder="No Telepon" required>
			    </div>
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
	        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
	       </form>
	      </div>
	    </div>
	  </div>
	</div>
   <br>
   <br>

 <!-- Menampilkan data  -->
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id Pasien</th>
				<th>Nama Dokter</th>
				<th>Obat</th>
				<th>Nama Pasien</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Agama</th>
				<th>No Telp</th>
				<th>AKSI</th>
			</tr>
		</thead>
		 <tbody>
		<?php 
		  $query = mysqli_query($conn,"SELECT id_pasien, dokter.nama_dokter, obat.nama_obat,nama_pasien,alamat_pasien,jenkel_pasien,tgl_lahir_pasien,agama_pasien,no_telp_pasien from pasien, dokter, obat where pasien.id_dokter=dokter.id_dokter AND pasien.kode_obat=obat.kode_obat ORDER BY id_pasien DESC");
		  while ($data=mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $data['id_pasien']; ?></td>
			<td><?php echo $data['nama_dokter']; ?></td>
			<td><?php echo $data['nama_obat']; ?></td>
			<td><?php echo $data['nama_pasien']; ?></td>
			<td><?php echo $data['alamat_pasien']; ?></td>
			<td><?php echo $data['jenkel_pasien']; ?></td>
			<td><?php echo $data['tgl_lahir_pasien']; ?></td>
			<td><?php echo $data['agama_pasien']; ?></td>
			<td><?php echo $data['no_telp_pasien']; ?></td>
			<td>
			
			    <!-- Edit Data -->
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['id_pasien']; ?>">edit</a>

				<div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['id_pasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog  modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Edit Data barang</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" action="functionpasien.php" method="POST">
				          <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Id Barang</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputEmail3" name="id_pasien" placeholder="Id Barang" value="<?php echo $data['id_pasien']; ?>" readonly>
						    </div>
						  </div>
						  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Dokter</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="id_dokter">
				  <option>Pilih Nama Dokter</option>
			      	<?php 
$sql ="select *from dokter";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[id_dokter]'>$row[nama_dokter]</option>";
}
	?>
			      </select>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Obat</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="kode_obat">
				  <option>Pilih Obat</option>
			      	<?php 
$sql ="select *from obat";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[kode_obat]'>$row[nama_obat]</option>";
}
	?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pasien</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="nama_pasien" placeholder="Nama Pasien" value="<?php echo $data['nama_pasien']; ?>">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="alamat_pasien" placeholder="Alamat" value="<?php echo $data['alamat_pasien']; ?>">
			    </div>
			  </div>
			  <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="jenkel_pasien">
			      	<option>Pilih Jenis Kelamin</option>
			      	<option value="Laki-Laki">Laki-Laki</option>
			      	<option value="Perempuan">Perempuan</option>
			      </select>
			  </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="tgl_lahir_pasien" placeholder="yyyy-mm-dd" value="<?php echo $data['tgl_lahir_pasien']; ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Agama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="agama_pasien" placeholder="Agama" value="<?php echo $data['agama_pasien']; ?>">
			    </div>
			  </div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="no_telp_pasien" placeholder="No Telepon" value="<?php echo $data['no_telp_pasien']; ?>">
			    </div>
			  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
				       </form>
				      </div>
				    </div>
				  </div>
				</div>

                <!-- Hapus data -->
				<a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['id_pasien']; ?>" data-toggle="modal">delete</a>

				<div class="modal fade bs-example-modal-lg<?php echo $data['id_pasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus data</h4>
				      </div>
				      <div class="modal-body">
				        <h4>Apakah anda benar-benar ingin menghapus data ini ?</h4>
				        <form action="functionpasien.php" method="POST">
				        <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>">
				      </div>
				       <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
				       </form>
				      </div>
				    </div>
				  </div>
				</div>
			</td>
		</tr>
		<?php } ?>
		  </tbody>
	</table>
</div>

<script src="jquery.js"></script>
<script type="text/javascript" src="jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>
<script type="text/javascript" src="dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
</body>
</html>