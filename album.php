<?php
include 'koneksi.php';
session_start();
if(!isset($_SESSION['Username'])){
	echo '<script>alert("Login terlebih dahulu!");document.location="login.php";</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Album</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
         <a class="navbar-brand" href="index.php">
          <span>WEB GALERI FOTO </span>
        </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="dashboard_pengguna.php">Dashboard <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="album.php">Album</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="foto.php">Foto</a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
            <div class="quote_btn-container">
              <form class="form-inline">
              </form>
              
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
	  <h2> DAFTAR ALBUM</h2>
	  

<br><br>
<form method="GET" action="album.php" style="text-align: center;">
<label>Kata Pencarian : </label>
<input type="text" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {echo $_GET['kata_cari']; } ?>" placeholder="AlbumID" />
<button type="submit">Cari</button>
</form>
<a href="tambah_album.php">+ Tambah Album</a>
<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
<thead>
<tr>
<th>ID ALBUM</th>
<th>NAMA ALBUM</th>
<th>DESKRIPSI</th>
<th>TANGGAL DIBUAT</th>
<th>ID USER</th>
<th>AKSI</th>
</tr>
</thead>
<tbody>
<?php
include('koneksi.php');
if(isset($_GET['kata_cari'])) {
$kata_cari = $_GET['kata_cari'];
$query = "SELECT * FROM album WHERE AlbumID like '%".$kata_cari."%' ORDER BY AlbumID ASC";
} else {
$query = "SELECT * FROM album WHERE UserID='$_SESSION[UserID]'ORDER BY AlbumID ASC";
}
$result = mysqli_query($koneksi, $query);
if(!$result) {
die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
}
while ($data = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $data['AlbumID'];?></td>
<td><?php echo $data['NamaAlbum'];?></td>
<td><?php echo $data['Deskripsi'];?></img></td>
<td><?php echo $data['TanggalDibuat'];?></td>
<td><?php echo $data['UserID'];?></td>
<td><?php echo '
<a href="edit_album.php?AlbumID='.$data['AlbumID'].'" class="badge badge-warning">Edit</a>
<a href="delete_album.php?AlbumID='.$data['AlbumID'].'" class="badge badge-danger"onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>  
';?>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
            <form action="login_cek3.php" method="post">
	
</div>
</form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- end contact section -->

  <!-- info section -->


  <!-- end info section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Devina</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>