<?php 	
$conn=mysqli_connect("localhost","root","","tkbunga");


function query($query) {

	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
return $rows;

}

 



function tambah($data) {
		global $conn;

	$nama = htmlspecialchars($data["nama"]);
    $warna =htmlspecialchars( $data["warna"]);
	$harga = htmlspecialchars($data["harga"]);


//upload gambar
	$gambar =upload();
	if(!$gambar ) {
		return false;
	}


	$query = "INSERT INTO bunga 
			VALUES
			('','$nama','$warna','$harga','$gambar')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {
	//return false;
	$namaFile=$_FILES['gambar']['name'];
	$ukuranFile=$_FILES['gambar']['size'];
	$errorFile=$_FILES['gambar']['error'];
	$tmpNameFile=$_FILES['gambar']['tmpName'];


//cek apakah tidak ada gambar yang diupload
	if($error === 4){
		echo"
		<script>
		alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}
	//cek apakah yang di upload adalah gambar 
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.',$namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar,$ekstensiGambarValid)) {
		echo"<script>
		alert('yang anda upload bukan gambar!');
		</script>";
		return false;
	}
//jika ukuran terlalu besar
	if($ukuranFile > 1000000) {
		echo"
		<script>
		alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos cek, siap di upload
	//generet name baru
	$namaFileBaru = uniqid();
	$namaFileBaru.='.';
	$namaFileBaru.= $ekstensiGambar;
	move_uploaded_file($tmpName,'img/'.$namaFileBaru);

	return $namaFileBaru;
}
function hapus($id) {

	global $conn;
	mysqli_query($conn,"DELET FROM bunga WHERE id=$id");

	return mysqli_affected_rows($conn);
}




function ubah($data) {
	global $conn;
	$id=$data["id"];
	$nama = htmlspecialchars($data["nama"]);
    $warna =htmlspecialchars($data["warna"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambarLama=htmlspecialchars($data["gambarLama"]);
//user apakah usr pilih gambar baru
	if($_FILES['gambar']['error']===4) {
		$gambar=$gambarLama;
	}else{
		$gambar= upload();
	}
	$gambar = htmlspecialchars($data["gambar"]);



	$query = "UPDATE bunga SET
				nama='$nama',
				warna='$warna',
				harga='$harga',
				gambar='$gambar'
				WHERE id =$id
				";





	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query="SELECT *FROM bunga
			WHERE
			nama LIKE'%$keyword%' OR
			warna LIKE'%$keyword%' OR
			harga LIKE'%$keyword%'
			";

return query($query);
}

function registrasi($data) {
	global $conn;
		$username = strtolower(stripslashes($data["username"]));

	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	 if( mysqli_fetch_assoc($result) ) {
	 	echo "<script>
	 			alert('username yang anda masukan sudah terdaftar')
	 			</script>";
	 			return false;
	 }

	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi tidak sesuai!');
			</script>";

			return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);


}

?>




