<?php
include'koneksi.php';

$AlbumID 	= $_POST['AlbumID'];
$Konfirmasi = $_POST['Konfirmasi'];

//update data ke tabel AlbumID
mysqli_query($koneksi,"update album set AlbumID='$AlbumID', Konfirmasi='$Konfirmasi' where AlbumID='$AlbumID'");

//mengalihkan ke halaman index setelah berhasil mengupdate
header("location:data_album.php");
?>