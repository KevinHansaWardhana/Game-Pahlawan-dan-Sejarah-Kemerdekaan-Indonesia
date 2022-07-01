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
<center>
<h1> Selamat Datang <h1>
<center>
</body>
</html>