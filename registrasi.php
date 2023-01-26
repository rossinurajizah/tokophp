<?php
require 'functions.php';


if (isset($_POST["registrasi"])) {
	if (registrasi($_POST) > 0 ) {
		echo "<script>
				alert('User baru berhasil Ditambahkan !');
				</script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
</head>
<body>

<h1>Registrasi</h1>

<form action="" method="post">
	<label for="username">Username :</label>
	<input type="text" name="username" id="username">
	<br><br>
	<label for="password">Password :</label>
	<input type="password" name="password" id="password">
	<br><br>
	<label for="password2">Konfirmasi Password :</label>
	<input type="password" name="password2" id="password2">
	<br><br>
	<button type="submit" name="registrasi">Kirim</button>
</form>
</body>
</html>
