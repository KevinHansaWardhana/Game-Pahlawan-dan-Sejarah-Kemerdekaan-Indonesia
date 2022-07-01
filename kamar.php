<?php 
$conn = mysqli_connect("localhost","root","","rumah_Sakit");
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
   <!-- Modal Tambah Data -->
   <div class="modal fade bs-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tambahDataLabel">Tambah Obat</h4>
	      </div>
	      <div class="modal-body">
	       	<form class="form-horizontal" action="functionkamar.php" method="POST">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Id Kamar</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="inputEmail3" name="kode_kamar" placeholder="Kode Kamar" required>
			    </div>
			  </div>
			 <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kamar</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="jenis_kamar">
			      	<option>Pilih Jenis Kamar</option>
			      	<option value="kamar VIP">kamar VIP</option>
			      	<option value="kamar kelas 1">kamar kelas 1</option>
					<option value="kamar VVIP">kamar VVIP</option>
			      </select>
			  </div>
			  </div>
			   <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="status">
			      	<option>Pilih Status Kamar</option>
			      	<option value="Ditempati">Ditempati</option>
			      	<option value="Kosong">Kosong</option>
			      </select>
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
				<th>Kode kamar</th>
				<th>Jenis kamar</th>
				<th>Status</th>
				<th>AKSI</th>
			</tr>
		</thead>
		 <tbody>
		<?php 
		  $query = mysqli_query($conn,"SELECT *from kamar");
		  while ($data=mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $data['kode_kamar']; ?></td>
			<td><?php echo $data['jenis_kamar']; ?></td>
			<td><?php echo $data['status']; ?></td>
			<td>
			    <!-- Edit Data -->
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['kode_kamar']; ?>">edit</a>

				<div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['kode_kamar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog  modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Edit Data Obat</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" action="functionkamar.php" method="POST">
				          <input type="hidden" name="kode_kamar" value="<?php echo $data['kode_kamar']; ?>">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Kode Kamar</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputEmail3" name="kode_kamar" placeholder="Kode Kamar" value="<?php echo $data['kode_kamar']; ?>" readonly>
						    </div>
						  </div>
			  <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kamar</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="jenis_kamar">
			      	<option>Pilih Jenis Kamar</option>
			      	<option value="kamar VIP">kamar VIP</option>
			      	<option value="kamar kelas 1">kamar kelas 1</option>
					<option value="kamar VVIP">kamar VVIP</option>
			      </select>
			  </div>
			  </div>
			   <div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			   <select class="form-control" name="status">
			      	<option>Pilih Status Kamar</option>
			      	<option value="Ditempati">Ditempati</option>
			      	<option value="Kosong">Kosong</option>
			      </select>
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
				<a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['kode_kamar']; ?>" data-toggle="modal">delete</a>

				<div class="modal fade bs-example-modal-lg<?php echo $data['kode_kamar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus data</h4>
				      </div>
				      <div class="modal-body">
				        <h4>Apakah anda benar-benar ingin menghapus data ini ?</h4>
				        <form action="functionkamar.php" method="POST">
				        <input type="hidden" name="kode_kamar" value="<?php echo $data['kode_kamar']; ?>">
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