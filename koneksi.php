<?php
$host="localhost";
$user="root";
$password="";
$db="db_galeri_foto_devina";
$koneksi= mysqli_connect($host,$user,$password,$db);
if (!$koneksi)
{
die("koneksi gagal:".mysqli_connect_error());
}
?>