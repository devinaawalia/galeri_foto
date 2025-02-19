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
<script> 
window.print();
</script>
  <title>DATA ALBUM</title>


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

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
	  <h2> DATA ALBUM</h2>
	  

<br><br>
<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
<thead>
<tr>
<th>ALBUM ID</th>
<th>NAMA ALBUM</th>
<th>DESKRIPSI</th>
<th>TANGGAL DIBUAT</th>
<th>USER ID</th>
<th>STATUS</th>
<th>
</tr>
</thead>
<tbody>
<?php
include('koneksi.php');
if(isset($_GET['kata_cari'])) {
$kata_cari = $_GET['kata_cari'];
$query = "SELECT * FROM album WHERE AlbumID like '%".$kata_cari."%' ORDER BY AlbumID ASC";
} else {
$query = "SELECT * FROM album ORDER BY AlbumID ASC";
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
<td><?php echo $data['Deskripsi'];?></td>
<td><?php echo $data['TanggalDibuat'];?></td>
<td><?php echo $data['UserID'];?></td>
<td>
<?php
if($data['Konfirmasi'] == 1){?>
<span class="badge bg-warning">Belum di Konfirmasi</span>
<?php } else {?>
<span class="badge bg-success">Sudah di Konfirmasi</span>
<?php } ?>
</td>
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
            <form action="login_cek.php" method="post">
	
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