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

  <title>Tambah Registrasi</title>


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
        <form action="simpan_registrasi.php" method="post">
		<div class="form-group has-feedback">
<div class="form-group has-feedback">
<label>Username :</label>
<input type="text" name="Username" class="form-control" placeholder="Username">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label>Password :</label>
<input type="password" name="Password" class="form-control" placeholder="Password">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label>Email :</label>
<input type="text" name="Email" class="form-control" placeholder="Email">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label>Nama Lengkap :</label>
<input type="text" name="NamaLengkap" class="form-control" placeholder="NamaLengkap">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label>Alamat :</label>
<input type="text" name="Alamat" class="form-control" placeholder="Alamat">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="input-group mb-3">
<button type="submit" class="btn btn-block btn-primary">
<i class=""></i>simpan
</button>
</div>
<div class="input-group mb-3">
<button type="reset" class="btn btn-block btn-primary">
<i class=""></i>hapus
</button>
</div>
</form>
<div class="card-footer text-center py-3">
	<div class="small"><a href="login.php">Sudah punya akun? Login di sini!</a></div>

          </div>
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
