<?php
include('koneksi.php');
$AlbumID = $_GET['AlbumID'];
$cek = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) > 0)
{
	$del = mysqli_query($koneksi, "DELETE FROM album WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi));
	if($del)
	{
		echo '<script>alert("Berhasil menghapus data."); document.location="album.php";</script>';
	}
	else
	{
		echo '<script>alert("Gagal menghapus data.php"); document.location="album.php";</script>';
	}
}
	else
	{
	echo '<script>alert("id tidak ditemukan di database."); document.location="album.php";</script>';
	}
	?>