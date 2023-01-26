<?php 
require 'functions.php';

//ambil data

$id=$_GET["id"];
//query data bunga berdasarkan id
$bga = query("SELECT * FROM bunga WHERE id =$id")[0];
 

//apakah tombol submit sudah di click atau belum
if (isset($_POST["submit"])){


	//apakah data berhasil di ubah atau tidak
	if(ubah($_POST) > 0 ){
		echo "
		<script>
		alert('data berhasil diubah!');
		document.location.href = 'index1.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('data gagal diubah!');
		document.location.href = 'index1.php';
		</script>
		";
		
	}

}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Bunga</title>
</head>
<body>
<h1>Ubah Data Bunga</h1>
<form action=""method="POST"enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?=$bga["id"]; ?>">
	<input type="hidden" name="gambarLama" value="<?=$bga["gambar"]; ?>">
	<ul>
	<li>
		<label for="nama">Nama: </label>
		<input type="text" name="nama" id="nama"required value="<?= $bga["nama"]; ?>">
	</li>	


<li>
		<label for="warna">Warna: </label>
		<input type="text" name="warna" id="warna" value="<?= $bga["warna"];?>">
	</li>	
	<li>
		<label for="harga">Harga: </label>
		<input type="text" name="harga" id="harga"  value="<?= $bga["harga"];?>">
	</li>	
	<li>
		<label for="gambar">Gambar: </label><br>
		<img src="img/<?=$bga['gambar'];?>"width="40">
		<br>
		<input type="file" name="gambar" id="gambar"> 
	</li>	
	<li>
		<button type="submit" name="submit">Ubah data</button>
			</li>	
	</ul>


</form>
</body>
</html>




