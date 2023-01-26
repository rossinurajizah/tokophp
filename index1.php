<?php 	
session_start();

if(!isset($_SESSION["login"])) {
	header("Locaion: login.php");
	exit;
}

require 'functions.php';
$bunga = query("SELECT * FROM bunga ORDER BY id ASC");
//tombol cari ditekan
if(isset($_POST["cari"])) {
	$bunga=cari($_POST["keyword"]);

}
 ?>


<!DOCTYPE html>

<html>
<head>
	<title>	Halaman Admin</title>

</head>
<body>
<a href="logout.php">logout!</a>


	<h1>Daftar bunga</h1>


<a href="tambah.php">Tambah Data Bunga</a>
<br><br>	
<form action="" method="POST">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..."autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>

	<table border ="1"cellpading="10"cellspacing="0">	

<tr>	

<th>No.</th>
<th>Aksi</th>
<th>Gambar</th>
<th>Nama</th>
<th>Warna</th>
<th>harga</th>
</tr>


<?php 	$i = 1; ?>
<?php 	foreach($bunga as $row ) : ?>
	<tr>	
<td><?= $i;?></td>

<td>	
<a href="ubah.php?id=<?=$row["id"]; ?>">ubah</a> |
<a href="hapus.php?id=<?=$row["id"];?>"onclick="return confirm ('yakin?');">hapus</a>
</td>

<td><img src="img/<?php echo $row ["gambar"];?>"width="50">
<td><?= $row["nama"]; ?></td>
<td><?= $row["warna"]; ?></td>
<td><?= $row["harga"]; ?></td>
</tr>
<?php $i++ ?>
<?php 	endforeach; ?>



	</table>

</body>
</html>