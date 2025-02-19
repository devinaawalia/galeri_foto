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

  <title>Dashboard Admin</title>


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
                <a class="nav-link" href="dashboard_admin.php">Dashboard <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="data_album.php">Album </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="data_foto.php">Foto</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="data_user.php">Data User</a>
              </li>
			   <li class="nav-item">
                <a class="nav-link" href="data_like.php">Data Like</a>
              </li>
			   <li class="nav-item">
                <a class="nav-link" href="data_komentar.php">Data Komentar</a>
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
<div class="row">
<div class="col-md-12">
<form method="GET" action="data_foto.php" style="text-align:center;">
<label>Kata Pencarian : </label>
<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])){ echo $_GET['kata_cari'];}?>" placeholder="FotoID"/>
<button type="submit">Cari</button>
</form>
<a href="print_data_foto.php">Print</a>
<br>
<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
<thead align="center">
<tr>
<th>FOTO ID</th>
<th>JUDUL FOTO</th>
<th>DESKRIPSI FOTO</th>
<th>TANGGAL UNGGAH</th>
<th>LOKASI FILE</th>
<th>ALBUM ID</th>
<th>USER ID</th>
<TH>STATUS</th>
<th>AKSI</th>
</tr>
</thead>
<tbody align="center">
<?php
include('koneksi.php');
if(isset($_GET['kata_cari'])){
	$kata_cari = $_GET['kata_cari'];
	$query = "SELECT * FROM foto WHERE FotoID like'%".$kata_cari."%' ORDER BY FotoID ASC";
} else {
	$query = "SELECT * FROM foto ORDER BY FotoID ASC";
}

$result = mysqli_query($koneksi,$query);
	
	if(!$result) {
		die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
	}
	while($data = mysqli_fetch_assoc($result)){
		?>
<tr>
<td><?php echo $data['FotoID'];?></td>
<td><?php echo $data['JudulFoto'];?></td>
<td><?php echo $data['DeskripsiFoto'];?></td>
<td><?php echo $data['TanggalUnggah'];?></td>
<td><img src="images/<?php echo $data['LokasiFile'];?>" width="200px"></img></td>
<td><?php echo $data['AlbumID'];?></td>
<td><?php echo $data['UserID'];?></td>
<td><?php echo '
<a href="delete_data_foto.php?FotoID='.$data['FotoID'].'" class="badge badge-danger"onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>  
';?>
</td>
<td>
<?php
if($data['Konfirmasi'] == 1){?>
<span class="badge bg-warning">Belum di Konfirmasi</span>
<?php } else {?>
<span class="badge bg-success">Sudah di Konfirmasi</span>
<?php } ?>
</td>
<td>
<?php
if ($data['Konfirmasi'] == 1){?>
<form action="konfirmasi_foto.php" method="POST">
<input type="hidden" name="FotoID" value="<?php echo $data['FotoID'];?>">
<input type="hidden" name="Konfirmasi" value="2">
<button class="btn btn-sm btn-primary">Konfirmasi</button>
</form>
<?php } else {?>
<span class="">-</span>
<?php } ?>
</td>
</tr>
<?php
	}
	?>
	</tbody>
	</table>
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