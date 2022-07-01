<?php
session_start();

$conn = mysqli_connect("localhost","root","","rumah_sakit");

$username = $_POST["username"];
$p = ($_POST["password"]);

$sql = "select * from admin where username='".$username."' and password='".$p."'";
$hasil = mysqli_query ($conn,$sql);
//$jumlah = mysqli_num_rows($hasil);


	if ($hasil>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["username"]=$row["username"];

		header("Location:index.php");
		
	}else {
		echo "Username atau password salah <br><a href='login.php'>Kembali</a>";
	}
?>