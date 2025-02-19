<?php
	include 'koneksi.php';
	session_start();

	if(!isset($_SESSION['Username'])){
		echo '<script>alert("Login terlebih dahulu!"); 
		document.location="login.php";</script>';
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

  <title>EDIT Foto</title>


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
                <a class="nav-link" href="foto.php"> Foto</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
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
        <h2>
          EDIT FOTO
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
		  <?php
			include('koneksi.php');
			$FotoID = $_GET['FotoID'];
			$select = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'" ) or die(mysqli_error($koneksi)); //GANTI
			$data = mysqli_fetch_assoc($select);
		  ?>
			<form action="update_foto.php" method="post">
			<div class="form-group has-feedback">
				<label>Foto ID :</label>
				<input type="text" name="FotoID" class="form-control" placeholder="FotoID" value="<?php echo $data ['FotoID']?>" readonly>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Judul Foto :</label>
				<input type="text" name="JudulFoto" class="form-control" placeholder="JudulFoto" value="<?php echo $data ['JudulFoto']?>" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			   <div class="form-group has-feedback">
				<label>Deskripsi Foto :</label>
				<input type="text" name="DeskripsiFoto" class="form-control" placeholder="DeskripsiFoto" value="<?php echo $data['DeskripsiFoto']?>" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Tanggal Unggah :</label>
				<input type="date" name="TanggalUnggah" class="form-control" placeholder="TanggalUnggah" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Lokasi File :</label>
				<input type="file" name="LokasiFile" class="form-control" placeholder="LokasiFile" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			 <div class="form-group has-feedback">
				<label>Album ID :</label>
				<select class="form-control select2" name="AlbumID">
				<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from album where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				?> 
				<?php
				if ($data['Konfirmasi'] == 1) { ?>
				<!-- Album yang belum dikonfirmasi tidak ditampilkan -->
				&nbsp;
				<?php } else { ?>
				<option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
				<?php } ?>
				<?php
				}
				?>
				</select>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>	
			  <div class="form-group has-feedback">
				<label>User ID :</label>
				<?php
				include 'koneksi.php';
				$UserID=$_SESSION['UserID'];
				$sql=mysqli_query($koneksi, "select * from user where UserID='$UserID'");
				while($data=mysqli_fetch_array($sql)){
					?>
				<input type="text" name="UserID" class="form-control" placeholder="UserID" value="<?=$data['UserID']?>">
				<?php
				}
				?>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			   <div class="form-group has-feedback">
				<div class="col-xs-12">
				<button type="submit" name="" class="btn btn-primary btn-block btn-flat">Simpan Perubahan</button>
				<button type="reset" name="hapus" class="btn btn-primary btn-block btn-flat">Hapus</button>
				</div>
			  </div>
			</form> 
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Login</a>
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