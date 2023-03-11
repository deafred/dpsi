<?php require_once('maj_files/config.php'); ?>
<?php
// On d&eacute;marre la session (ceci est indispensable dans toutes les pages de notre section membre
session_start ();
// On r&eacute;cup&egrave;re nos variables de session
if (isset($_SESSION['MM_Adminname']) && isset($_SESSION['MM_Admincode'])) {
    $Admin	     	=   $_SESSION['MM_Adminname'];
    $Password   	=   $_SESSION['MM_Admincode'];

		$currentPage = $_SERVER["PHP_SELF"];



		//mysql_select_db($database_cnx, $cnx);
        if($Admin=="admin"){
            $query_ListeEtb_encours 			= "SELECT * FROM etablissement where Etape_Identification=0 OR Etape_Infrastructures=0 OR Etape_Commodites=0 OR Etape_Personnel=0 OR Etape_Vulnerabilites=0 OR Etape_Partenariats=0 OR Etape_Eleves_Filiere=0 OR Etape_Immobiliers=0 OR Etape_Mobiliers=0 OR Etape_Suivi=0 OR Etape_Demande=0 order by Nom_Etablissement";
            
			$query_ListeEtb_termines 			= "SELECT * FROM etablissement where Etape_Identification=1 AND Etape_Infrastructures=1 AND Etape_Commodites=1 AND Etape_Personnel=1 AND Etape_Vulnerabilites=1 AND Etape_Partenariats=1 AND Etape_Eleves_Filiere=1 AND Etape_Immobiliers=1 AND Etape_Mobiliers=1 AND Etape_Suivi=1 AND Etape_Demande=1  order by Nom_Etablissement";
            
			$query_ListeEtb_all					= "SELECT * FROM etablissement order by Nom_Etablissement";

        }else{
            $query_ListeEtb_encours				= "SELECT * FROM etablissement where Agent_Respo='$Admin' AND (Etape_Identification=0 OR Etape_Infrastructures=0 OR Etape_Commodites=0 OR Etape_Personnel=0 OR Etape_Vulnerabilites=0 OR Etape_Partenariats=0 OR Etape_Eleves_Filiere=0 OR Etape_Immobiliers=0 OR Etape_Mobiliers=0 OR Etape_Suivi=0 OR Etape_Demande=0) order by Nom_Etablissement";
            
			$query_ListeEtb_termines 			= "SELECT * FROM etablissement where Agent_Respo='$Admin' AND (Etape_Identification=1 AND Etape_Infrastructures=1 AND Etape_Commodites=1 AND Etape_Personnel=1 AND Etape_Vulnerabilites=1 AND Etape_Partenariats=1 AND Etape_Eleves_Filiere=1 AND Etape_Immobiliers=1 AND Etape_Mobiliers=1 AND Etape_Suivi=1 AND Etape_Demande=1  ) order by Nom_Etablissement";
            
			$query_ListeEtb_all 				= "SELECT * FROM etablissement where Agent_Respo='$Admin' order by Nom_Etablissement";
        }

			$all_ListeEtb_encours 		     = $idcom->query($query_ListeEtb_encours);
			$totalRows_ListeEtb_encours 	 = $all_ListeEtb_encours->rowCount(); 

			
			$all_ListeEtb_all 				= $idcom->query($query_ListeEtb_all);
			$totalRows_ListeEtb_all 		= $all_ListeEtb_all->rowCount();
			
			$all_ListeEtb_termines 			= $idcom->query($query_ListeEtb_termines);
			$totalRows_ListeEtb_termines 	= $all_ListeEtb_termines->rowCount();
    
			$taux_Remplissage				= 0;
			if ($totalRows_ListeEtb_all >0 ){ $taux_Remplissage =  round( ( ( ( $totalRows_ListeEtb_termines)  / $totalRows_ListeEtb_all ) )*100,2)  ; }
	
}else{

    header("Location: ". 'admin.php' );
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DPSI - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>  
    
    <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.7.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span>DPSI</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="index.html#hero">Accueil</a></li>
            <li><a class="nav-link scrollto" href="index.html#about">Missions</a></li>
            <li><a class="nav-link scrollto" href="index.html#services">Sous-Directions</a></li>
            
            <li><a class="nav-link scrollto" href="annuaire.php">Annuaire</a></li>
            <li class="dropdown"><a href="index.html#testimonials"><span>Rapports</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#testimonials">2023</a></li>

                <li><a href="#">2022</a></li>
                <li><a href="#">2021</a></li>
                <li><a href="#">2020</a></li>
                 <li class="dropdown"><a href="#"><span>2010-2019</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">2020</a></li>
                    <li><a href="#">2019</a></li>
                    <li><a href="#">2018</a></li>
                    <li><a href="#">2019</a></li>
                    <li><a href="#">2018</a></li>
                  </ul>
                </li>                 
              </ul>
            </li>
            <li><a class="nav-link scrollto " href="menu.php">Enqu&ecirc;te</a></li>  
            <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="index.html#about">Demarrer</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 <p>&nbsp;</p>
<!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
<!-- End Clients Section -->

    <!-- ======= About Section ======= -->
<!-- End About Section -->

    <!-- ======= Counts Section ======= -->
<!-- End Counts Section -->

      
    <!-- ======= Why Us Section ======= -->
    <!-- End Why Us Section -->

      
    <!-- ======= Cta Section ======= -->
    <!-- End Cta Section -->

      
    <!-- ======= Services Section ======= -->
 <!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <!-- End Services Section -->
    
      
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

          <div class="section-title" data-aos="fade-left">
            <h2>Monitoring</h2>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <span><h4><?php echo strtoupper($Admin) . " -- $totalRows_ListeEtb_all &eacute;tablissements."; ?></h4></span>
                </div>
                <div class="col-lg-6 text-end" data-aos="fade-right">
                    Filtre&nbsp;:&nbsp; <select class="mb-3" onChange="location.href=''+this.options[this.selectedIndex].value+'';">
                                <option value=""></option>
                                <option value="monitoring_all.php">Tous</option>
                                <option value="monitoring_encours.php">En cours</option>
                                <option value="monitoring_termines.php">Termin&eacute;s</option>
                                <option value="#" selected>Statistiques</option>
                                <option value="annuaire.php">Annuaire</option>
                                <option value="indicateurs.php">Indicateurs</option>
                            </select>
                </div>
            </div>
          
        </div>
        
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Statistiques</li>
   
            </ul>
          </div>
        </div>


        
          
			<div >
              <div class="row text-center">
                <div class="col-md-4 form-group">
                    <div class="p-3 mb-2 bg-warning text-dark">En Cours</div>
					<div class="p-3 mb-2 bg-secondary text-white"><?php echo $totalRows_ListeEtb_encours ; ?></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <div class="p-3 mb-2 bg-warning text-dark">Termin&eacute;s</div>
					<div class="p-3 mb-2 bg-secondary text-white"><?php echo $totalRows_ListeEtb_termines ; ?></div>
                </div>
                <div class="col-md-4 form-group">
                  <div class="p-3 mb-2 bg-warning text-dark">Total</div>
				  <div class="p-3 mb-2 bg-secondary text-white"><?php echo $totalRows_ListeEtb_all ; ?></div>
                </div>
              </div>   

			</div>
      
               
                <div class="p-3 mb-2 bg-success text-white text-center"><h3>Taux de remplissage : <?php echo " ".$taux_Remplissage."%" ; ?></h3></div>
                        
          <div>
              
              
              <div class="col-md-6 form-group"><span>abc</span><span>      
          <select class="selectpicker  mb-3" data-live-search="true">
  <option data-tokens="ketchup mustard">Hot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a SodaHot Dog, Fries and a Soda</option>
  <option data-tokens="mustard">Burger, Shake and a Smile</option>
  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
</select>
        </span>
</div>
              
          </div>
          
          

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
  <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
   <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
 <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>DPSI</h3>
            <p>
              C&ocirc;te d'Ivoire, Abidjan <br>
              Cocody Danga<br>
              Pr&egrave;s du Lyc&eacute;e tehnique de Cocody <br><br>
              <strong>Phone:</strong> (+225) 22  48  72  76<br>
              <strong>Email:</strong> info@dpsi-ci.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liens Utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Missions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sous-Direction</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Annuaire</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Statistiques</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">2022-2021</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">2021-2020</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">2020-2019</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">2019-2018</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">2018-2017</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Rejoindre la Newsletter</h4>
            <p>Restez informer r&eacute;guli&egrave;rement sur nos activit&eacute;s en nous envoyant votre e-mail.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Soumettre">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>DPSI</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Dea Arnaud +225 0708414048</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>