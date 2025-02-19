<?php
	include('koneksi.php');
	$FotoID				=	$_POST['FotoID'];
	$UserID				=	$_POST['UserID'];
	$TanggalLike	   	=	date('Y-m-d');
	
	$sql = mysqli_query($koneksi, "INSERT INTO likefoto (FotoID, UserID, TanggalUnggah) VALUES('$FotoID', '$UserID', '$TanggalLike')") or die (mysqli_error($koneksi)); //GANTI
if($sql) //jika data berhasil ditambahkan
{
	echo '<script>alert("Berhasil menambahkan data.");
	document.location="foto.php";</script>';
}
else  //jika tidak berhasil ditambahkan ke database
{
	echo '<script>alert("Gagal melakukan proses tambah data")
	document.location="like_foto.php";</script>';
}
?>