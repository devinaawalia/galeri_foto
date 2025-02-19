<?php
include('koneksi.php');
$Username	 = strtolower($_POST['Username']);
$Password	 = MD5($_POST['Password']);
$Email 	  	 = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat      = $_POST['Alamat'];

//cek Username sudah ada atau belum
$result = mysqli_query($koneksi, "SELECT Username FROM user WHERE Username = '$Username'");
if (mysqli_fetch_assoc($result)) {
	echo "<script>
	alert('Username sudah digunakan');
	</script>";
	return false;
}

$sql = mysqli_query($koneksi, "INSERT INTO user(Username,Password,Email,NamaLengkap,Alamat,Level,Konfirmasi) VALUES('$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat', 'pengguna', '1')") or die(mysqli_error($koneksi));
if($sql) //jika data berhasil ditambahkan, maka halaman yang akan terbuka adalah halaman login
{
	echo'<script>alert("Berhasil melakukan registrasi.");document.location="login.php";</script>';
}
else //jika tidak berhasil ditambahkan ke database, maka halaman yang akan terbuka adalah halaman registrasi
{
	echo'<script>alert("Gagal melakukan proses registrasi");document.location="registrasi.php";</script>';
}
?>