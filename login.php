<?php
session_start();
if(isset($_SESSION["login"])) {
	header("Location:index1.php");
	exit;
}


require 'functions.php';

if(isset($_POST["login"])){
	$username =$_POST["username"];
	$password =$_POST["password"];
$result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
//cek username
if(mysqli_num_rows($result) === 1) {
	//cek password
	$row=mysqli_fetch_assoc($result);
	if(password_verify($password, $row["password"]) ) {
		//se session
		$_SESSION["login"] = true;
		header("Location: index1.php");
		exit;
	}

}
$error = true;
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
<h1>Halaman Login</h1>

<?php if(isset($error) ) : ?>
	<p  style="color:red; font-style: italic;">Ussername/Password Salah</p>
<?php endif; ?>

<form action="" method="post">
<ul>
	<li>
	<label for="username">Ussername :</label>
	<input type="text" name="username" id="username">
	</li>
	<br><br>
	<li>
	<label for="password">Password :</label>
	<input type="password" name="password" id="password">
</li>
	<br><br>
	<li>
	<button type="submit" name="login">Login</button>
</li>
</ul>
</form>
</body>
</html>
