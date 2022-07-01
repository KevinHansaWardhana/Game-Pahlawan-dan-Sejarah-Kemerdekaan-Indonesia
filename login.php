<?php
$conn = mysqli_connect("localhost","root","","rumah_sakit");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Rumah Sakit</title>
    <link rel="shortcut icon" href="img/logo_ilmututorial_32x32.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <link href="style.css" rel="stylesheet">
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>


    <div class="container">
        <div class="jumbotron text-center">
				<h1>Selamat Datang</h1>
                <h2>Login User</h2><br>
            <form method="post" action="login_action.php">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan Username">
            </div>
            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password">
            </div>
            
            <div class="form-group">
                <input type="submit"  class="btn btn-primary"  value="Login">
				<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahData">Register</a>
            </div>
        </div>
        </form>
    </div>
<div class="modal fade bs-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tambahDataLabel">Tambah User</h4>
	      </div>
	      <div class="modal-body">
	       	<form class="form-horizontal" action="cek_regis.php" method="POST">
			<pre><h2>Form Pendaftaran</h2>
			Username <input name="username" type="text">
			Password <input name="password" type="password">
			</pre>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
			<input name="submit" class="btn btn-primary" value="Daftar" type="submit">
	       </form>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>