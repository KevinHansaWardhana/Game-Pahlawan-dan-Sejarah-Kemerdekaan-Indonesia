<?php
$conn=mysqli_connect('localhost', 'root', '','rumah_sakit');

///mengambil data dari form
$username  = $_POST['username'];
$password  = $_POST['password'];

//cek pengisian data
if($username=='' || $password==''){
	echo "Data tidak lengkap <a href=login.php>Back</a>";
	}else{
	$insert   = "insert into admin values ('$username', '$password')";
	$insert_query = mysqli_query($conn, $insert);

if ($insert_query) {
	echo "Daftar berhasil, silakan <a href='login.php'>login</a>";
	}else{
	echo "Daftar gagal atau username telah terdaftar silakan <a href='login.php'>Ulangi</a> atau <a href='login.php'>Login</a>";
}
}

?>