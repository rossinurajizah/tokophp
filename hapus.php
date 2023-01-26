<?php 
<?php 	
session_start();

if(!isset($_session["login"])) {
	header("Locaion: login.php");
	exit;
}
require 'functions.php';

$id=$_GET ["id"];

if (hapus($id) >0 ){
	echo"
	<script>
	alert ('data berhasil dihapus!');
	document.location.href='index1.php';
	</script>
	";

	
}else{
	echo"
	<script>
	alert ('data gagal dihapus!');
	document.location.href='index1.php';
	</script>
	";
}
