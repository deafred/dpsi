<?php require_once('maj_files/config.php'); ?>
<?php
    //mysql_select_db($database_CnxBD, $CnxBD);
    $query_ListeEcole = "SELECT * FROM etablissement order by Nom_Etablissement";
        $ListeEcole           =   $idcom->query($query_ListeEcole);
        $row_ListeEcole       =   $ListeEcole->fetchObject();
        $totalRows_ListeEcole =   $ListeEcole->rowCount();

//    $ListeEcole = mysql_query($query_ListeEcole) or die(mysql_error());
//    $row_ListeEcole = mysql_fetch_assoc($ListeEcole);
//    $totalRows_ListeEcole = mysql_num_rows($ListeEcole);
?>

<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Code'])) {
    
  $loginUsername=$_POST['NomEtb'];
  $password=$_POST['Code'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "enquete.php";
  $MM_redirectLoginFailed = "connexion.php";
  $MM_redirecttoReferrer = false;
  
  $LoginRS__query="SELECT Nom_Etablissement, MDP , Code_dspss1 FROM ETABLISSEMENT WHERE Nom_Etablissement='".addslashes($loginUsername)."' AND MDP='".addslashes($password)."'"; 

    $LoginRS            =   $idcom->query($LoginRS__query);
    $row_LoginRS        =   $LoginRS->fetchObject();
    $loginFoundUser     =   $LoginRS->rowCount();
    
//  $LoginRS = mysql_query($LoginRS__query) or die(mysql_error());
//  $loginFoundUser = mysql_num_rows($LoginRS);
    
  if ($loginFoundUser) {
//                mysql_data_seek($LoginRS,0);
//                $row_ListeEcole = mysql_fetch_assoc($LoginRS);       
     $loginStrCode = $row_LoginRS->Code_dspss1;
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_Usercode'] = $loginStrCode;
	//$_SESSION['MM_code_dspss1'] = $loginStrCode;
      
          if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }


    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    $loginFormAction =  $MM_redirectLoginFailed ;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DPSI - Connexion</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/monstyle.css" rel="stylesheet">
    
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
            
            <li><a class="nav-link scrollto" href="index.html#team">Annuaire</a></li>
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
            <li><a class="nav-link scrollto " href="#">Enqu&ecirc;te</a></li>  
            <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="index.html#about">Demarrer</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
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
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
   <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact1" class="contact mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Guide</h2>
                 <p>Choississez votre &eacute;tablissement , puis indiquez le code &eacute;tablissement pour vous connecter. </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><a href="admin.php">Session Admin >></a></p>
                 
            </div>
          </div>
            
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
              <div><h1>Enqu&ecirc;te Statistique</h1></div>
            <div class="info" >
              <i class="bi bi-person-badge"></i>
              <h4>Authentification</h4>
                <p>Connectez vous! --- (Call center : 00-00-00-00-00)</p>
            <form action="<?php echo $loginFormAction; ?>" method="post" role="form" class="form-horizontal mt-4">
              
                <div class="form-group ">
                    <label class="control-label">Etablissement</label>
                    
                    
                        <div class="input-group">
                            <i class="bi bi-mortarboard-fill"></i>                  
                            <select  name="NomEtb" class="form-control form-select" data-live-search="true">
                                <?php
                            do {  
                            ?>
                                <option value="<?php echo htmlentities($row_ListeEcole->Nom_Etablissement)?>"><?php echo htmlentities($row_ListeEcole->Nom_Etablissement)?></option>
                                <?php
                            } while ($row_ListeEcole   =   $ListeEcole->fetchObject());
//                              $rows = mysql_num_rows($ListeEcole);
//                              if($rows > 0) {
//                                  mysql_data_seek($ListeEcole, 0);
//                                  $row_ListeEcole = mysql_fetch_assoc($ListeEcole);
//                              }
                                
                                 if (isset($_POST['Code'])) { 
                                    echo " <option value='$loginUsername' selected>$loginUsername</option> " ;
                                } 
                                


                            ?>
                            </select>
                            
                            
                            
                            
                            
                            
                            
                        </div>
                    
                   
                </div>
                <div>--</div>
                <div class="form-group">
                    <label class="control-label">Code</label>
                    
                        <div class="input-group">
                            <i class="bi bi-key-fill"></i>
                            <input name="Code" placeholder="Code" class="form-control" type="password">           
                        </div>
                    
                    
                </div>


                <div class="text-center" ><button type="submit" class="btn btn-primary"  style="margin-top: 30px;">Connexion</button>
                </div>

            </form>
                
            </div>


          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>DPSI</h3>
            <p>
              Côte d'Ivoire, Abidjan <br>
              Cocody Danga<br>
              Près du Lyc&eacute;e tehnique de Cocody <br><br>
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
            <p>Restez informer r&eacute;gulièrement sur nos activit&eacute;s en nous envoyant votre e-mail.</p>
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