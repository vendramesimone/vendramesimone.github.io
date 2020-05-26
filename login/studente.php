
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dokimì</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="css/nouislider.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

  <div class="main-section">

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><img src="images/dokimioriz.png" width="200px"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-facebook"></i><span class="d-lg-none ml-2">Facebook</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-twitter"></i><span class="d-lg-none ml-2">Twitter</span></a></li>
	          <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-instagram"></i><span class="d-lg-none ml-2">Instagram</span></a></li>
	          <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link icon d-flex align-items-center" data-toggle="dropdown">
                <i class="ion-ios-apps mr-2"></i>
                Components
                <b class="caret"></b>
              </a>
              <div class="dropdown-menu dropdown-menu-left">
                <a href="#" class="dropdown-item"><i class="ion-ios-apps mr-2"></i> All Components</a>
                <a href="#" class="dropdown-item"><i class="ion-ios-document mr-2"></i> Documentation</a>
              </div>
            </li>
	          <li><a href="index.php?logout='1'"><button type="submit" class="login100-form-btn" name="login_user">Logout</button></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->
  	<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	if (($ruolo=$_SESSION["ruolo"])=='DOCENTE'|| ($ruolo=$_SESSION["ruolo"])=='AMMINISTRATORE'){
		header("location: accessdan.php");
	}

?>
  	<section class="hero-wrap" style="background-image: linear-gradient(-20deg, #b721ff 0%, #21d4fd 100%);" data-stellar-background-ratio="0.5">
  		<div class="overlay"></div>
  		<div class="container">
  			<div class="row description align-items-center justify-content-center">
  				<div class="col-md-8 text-center">
  					<div class="text">
  						<?php  if (isset($_SESSION['username'])) : ?>
  						<h2 class="mb-5">BENVENUTO <?php echo $_SESSION['username']; ?></h2>
  						<div class="designed d-inline-block">
  							<d class="d-flex align-items-center">
	  							<a href="index.php?logout='1'">
	  							<div class="container-login100-form-btn">
								<button type="submit" class="login100-form-btn" name="login_user">Logout</button>
								</div>
	  							</a>
	  							<?php endif ?>

  							</d>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success" >
			<h3 align="center">
				<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

	<section class="ftco-section bg-light" id="cards">
			<div class="container card-styles">
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="icon-wrap px-4 pt-4">
								<div class="icon d-flex justify-content-center align-items-center bg-info rounded-circle">
									<span class="ion-logo-ionic text-light"></span>
								</div>
							</div>
						  <div class="card-body pb-5 px-4">
						    <h5 class="card-title">TEST D'INGRESSO</h5>
						    <p class="card-text">Qui sono contenute delle domande di prova alle quali dovrai rispondere per vedere se sei stato promosso!<br><br></p>
						    <a href="test.php" class="btn btn-info">VAI AL TEST</a>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="icon-wrap px-4 pt-4">
								<div class="icon d-flex justify-content-center align-items-center bg-success rounded-circle">
									<span class="ion-logo-ionic text-light"></span>
								</div>
							</div>
						  <div class="card-body pb-5 px-4">
						    <h5 class="card-title">Card title treatment</h5>
						    <p class="card-text">With supporting text below as a natural lead-in to additional content. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						    <a href="#" class="btn btn-success">Go somewhere</a>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="icon-wrap px-4 pt-4">
								<div class="icon d-flex justify-content-center align-items-center bg-warning rounded-circle">
									<span class="ion-logo-ionic text-light"></span>
								</div>
							</div>
						  <div class="card-body pb-5 px-4">
						    <h5 class="card-title">Card title treatment</h5>
						    <p class="card-text">With supporting text below as a natural lead-in to additional content. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						    <a href="#" class="btn btn-warning">Go somewhere</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
	  </section>
	  <!-- - - - - -end- - - - -  -->


	  <footer class="ftco-section ftco-section-2 bg-light">
	  	<div class="col-md-12 text-center">
          <p class="mb-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());

            </script> All rights reserved | Site made by Simone Vendrame
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
	  </footer>

  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/nouislider.min.js"></script>
  <script src="js/moment-with-locales.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/main2.js"></script>

  </body>
</html>
