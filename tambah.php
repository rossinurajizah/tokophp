<?php 
<?php 	
session_start();

if(!isset($_session["login"])) {
	header("Locaion: login.php");
	exit;
}
require 'functions.php';

//apakah tombol submit sudah di click atau belum
if (isset($_POST["submit"])){


	//apakah data berhasil di tambahkan
	if(tambah($_POST) > 0 ){
		echo "
		<script>
		alert('data berhasil ditambahkan!');
		document.location.href = 'index1.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('data gagal ditambahkan!');
		document.location.href = 'index1.php';
		</script>
		";
		
	}

}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Bunga</title>
</head>
<body>
<h1>Tambah Data Bunga</h1>
<form action=""method="POST" enctype="multipart/form-data">
	<ul>
	<li>
		<label for="nama">Nama: </label>
		<input type="text" name="nama" id="nama">
	</li>	


<li>
		<label for="warna">Warna: </label>
		<input type="text" name="warna" id="warna">
	</li>	
	<li>
		<label for="harga">Harga: </label>
		<input type="text" name="harga" id="harga">
	</li>	
	<li>
		<label for="gambar">Gambar: </label>
		<input type="file" name="gambar" id="gambar">
	</li>	
	<li>
		<button type="submit" name="submit">Tambah data</button>
			</li>	
	</ul>


</form>
</body>
</html>