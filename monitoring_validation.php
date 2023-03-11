<?php 
require_once('maj_files/config.php'); 
require_once('maj_files/mesfonctions.php'); 
?>


<?php

    if ( isset($_POST['btn_validation'])) {
        $Hidden_Code_Validation =$_POST['Hidden_Code_Validation'];

         $sql	=	"UPDATE etablissement SET valider = '1' 
          WHERE etablissement.code_dspss1 = '$Hidden_Code_Validation'";

            $req   =   $idcom->exec($sql);       
    }
// On d&eacute;marre la session (ceci est indispensable dans toutes les pages de notre section membre
session_start ();
// On r&eacute;cup&egrave;re nos variables de session
if (isset($_SESSION['MM_drname']) && isset($_SESSION['MM_drcode'])) {
    

    
    $Admin	     	=   $_SESSION['MM_drname'];
    $Password   	=   $_SESSION['MM_drcode'];

		$currentPage = $_SERVER["PHP_SELF"];

    //Debut de tous les etablissements
		$maxRows_ListeEtb = 25;
		$pageNum_ListeEtb = 0;
		if (isset($_GET['pageNum_ListeEtb'])) {
		  $pageNum_ListeEtb = $_GET['pageNum_ListeEtb'];
		}
		$startRow_ListeEtb = $pageNum_ListeEtb * $maxRows_ListeEtb;
        


            $query_ListeEtb = "SELECT * FROM etablissement where Direction_Regionale ='$Admin' AND Valider = '0' AND Etape_Identification=1 AND Etape_Infrastructures=1 AND Etape_Commodites=1 AND Etape_Personnel=1 AND Etape_Vulnerabilites=1 AND Etape_Partenariats=1 AND Etape_Eleves_Filiere=1 AND Etape_Immobiliers=1 AND Etape_Mobiliers=1 AND Etape_Suivi=1 AND Etape_Demande=1 order by Nom_Etablissement";

		
		$query_limit_ListeEtb = sprintf("%s LIMIT %d, %d", $query_ListeEtb, $startRow_ListeEtb, $maxRows_ListeEtb);
		$ListeEtb         = $idcom->query($query_limit_ListeEtb);
//		$row_ListeEtb     = $ListeEtb->fetchObject(); 

		if (isset($_GET['totalRows_ListeEtb'])) {
		  $totalRows_ListeEtb = $_GET['totalRows_ListeEtb'];
		} else {
		  $all_ListeEtb       = $idcom->query($query_ListeEtb);
		  $totalRows_ListeEtb = $all_ListeEtb->rowCount();
		}
		$totalPages_ListeEtb = ceil($totalRows_ListeEtb/$maxRows_ListeEtb)-1;

		$queryString_ListeEtb = "";
		if (!empty($_SERVER['QUERY_STRING'])) {
		  $params = explode("&", $_SERVER['QUERY_STRING']);
		  $newParams = array();
		  foreach ($params as $param) {
			if (stristr($param, "pageNum_ListeEtb") == false && 
				stristr($param, "totalRows_ListeEtb") == false) {
			  array_push($newParams, $param);
			}
		  }
		  if (count($newParams) != 0) {
			$queryString_ListeEtb = "&" . htmlentities(implode("&", $newParams));
		  }
		}
		$queryString_ListeEtb = sprintf("&totalRows_ListeEtb=%d%s", $totalRows_ListeEtb, $queryString_ListeEtb);


	
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
          <h2><?php echo "DR ".$Admin ; ?></h2>
      
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <span><h5><?php echo "" . "$totalRows_ListeEtb &eacute;tablissements."; ?></h5></span>
                </div>
                <div class="col-lg-6 text-end" data-aos="fade-right">
                     Filtre : &nbsp;<select class="form-select-sm " style='width: 25%;display: inline;' onchange="location.href=''+this.options[this.selectedIndex].value+'';">
                                <option value="monitoring_validation.php" selected>A valider</option>
                                <option value="monitoring_approuves.php"> Approuv&eacute;s</option>
                                <option value="monitoring_relance.php"> Relance</option>                    
                            </select>
                </div>
            </div>
          </div>       
            

       <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">A VALIDER</li>
   
            </ul>
          </div>
        </div>
          
<div class="table-responsive">  
<table border="0"  align="center">
    <tr  class="text-center">
        <td>
            Pages >>&nbsp;&nbsp;
        </td>
        <?php for ($i=0; $i <= $totalPages_ListeEtb ; $i++) { $j = $i + 1 ; ?>
        
        <td>
            <a href="<?php printf("%s?pageNum_ListeEtb=%d&totalRows_ListeEtb=%d", $currentPage, $i, $totalRows_ListeEtb); ?>"><?php echo $j ;?></a>
        </td>
        <td>
            &nbsp;&nbsp;
        </td>
        
        <?php } ?>
        

    </tr>   
</table> 
    
</div>         
          
<div class="table-responsive">
<table  border="0" class="table  table-striped">
  <tr div class="table-primary text-center">
    
    <th scope="col" >Etasblissement</th>
    <th scope="col" >Contact1</th>
    <th scope="col" >Contact2</th>
    <th scope="col" >Mail</th>
    <th scope="col" >Status</th>
  </tr>

  <?php while ($row_ListeEtb = $ListeEtb->fetchObject()) { ?>
    <tr>
            <?php 
    
            $Resulat        =   recap_etapes_html($row_ListeEtb);
            $Status         =   $Resulat[0];
            $Total          =   $Resulat[1];
            $Etape_Restante  = $Resulat[2]; 
            
            $i++;
            $target1= "#exampleModal".$i;
            $target2= "exampleModal".$i;
    
            ?>         
    
      <td><form action="validation_bis.php" method="post"><button name="CodeEtb" type="submit" value="<?php echo $row_ListeEtb->Code_dspss1; ?>" class="btn btn-link text-start"><?php echo htmlentities($row_ListeEtb->Nom_Etablissement); ?></button></form></td>
      <td><?php echo $row_ListeEtb->Contact_Chef_Ecole; ?></td>
      <td><?php echo $row_ListeEtb->Contact_DE1; ?></td>
      <td><?php echo $row_ListeEtb->Email_etablissement; ?></td>
      <td class="text-end">
          
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="<?php echo $target1; ?>">
              <?php echo $Status."/".$Total; ?>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="<?php echo $target2; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Etapes restantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-start">
                    <?php echo $Etape_Restante; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>


      </td>
    </tr>
    <?php }  ?>
</table>
</div>
<div class="table-responsive">  
<table border="0"  align="center" >
    <tr  class="text-center">
        <td>
            Pages >>&nbsp;&nbsp;
        </td>
        <?php for ($i=0; $i <= $totalPages_ListeEtb ; $i++) { $j = $i + 1 ; ?>
        
        <td>
            <a href="<?php printf("%s?pageNum_ListeEtb=%d&totalRows_ListeEtb=%d", $currentPage, $i, $totalRows_ListeEtb); ?>"><?php echo $j ;?></a>
        </td>
        <td>
            &nbsp;&nbsp;
        </td>
        
        <?php } ?>
        

    </tr>   
</table> 
    
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