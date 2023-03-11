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

            

            $Liste_Indicateur_C1  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C1' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C1->execute();
            
            $Liste_Indicateur_C2  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C2' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C2->execute();

            $Liste_Indicateur_C3  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C3' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C3->execute();
            
            $Liste_Indicateur_C4  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C4' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C4->execute();            
            
            $Liste_Indicateur_C5  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C5' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C5->execute();
            
            $Liste_Indicateur_C6  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C6' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C6->execute();
            
            $Liste_Indicateur_C7  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C7' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C7->execute();
            
            $Liste_Indicateur_C8  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C8' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C8->execute();
            
            $Liste_Indicateur_C9  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C9' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C9->execute();             

            $Liste_Indicateur_C10  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='C10' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C10->execute();         
//            $query_Liste_Indicateur = "SELECT * FROM Indicateur ";
//            $Liste_Indicateur           =   $idcom->query($query_Liste_Indicateur);
////            $donnee = $Liste_Indicateur->fetchAll(PDO::FETCH_ASSOC);
//            $totalRows_Liste_Indicateur =   $Liste_Indicateur->rowCount();           
            
        }else{
            $Liste_Indicateur_C1  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C1->execute();
            
            $Liste_Indicateur_C2  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C2->execute();

            $Liste_Indicateur_C3  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C3->execute();
            
            $Liste_Indicateur_C4  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C4->execute();            
            
            $Liste_Indicateur_C5  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C5->execute();
            
            $Liste_Indicateur_C6  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C6->execute();
            
            $Liste_Indicateur_C7  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C7->execute();
            
            $Liste_Indicateur_C8  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C8->execute();
            
            $Liste_Indicateur_C9  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C9->execute();             

            $Liste_Indicateur_C10  =   $idcom->prepare("SELECT * FROM Liste_Indicateur Where Code_Categorie ='XXX' AND Actif ='1' Order by Ordre");
            $Liste_Indicateur_C10->execute();
        }


	
}else{

    header("Location: ". 'admin.php' );
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <!--meta charset="utf-8"-->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DPSI - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    
    <!-- JQuery -->
  <script src="assets/vendor/jquery-3.6.0.min.js"></script>
    
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
  <link href="assets/css/style.css" rel="stylesheet">
    
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
          <div class="col-lg-3" data-aos="fade-right">
            <div class="section-title">
              <h2>Enqu&ecirc;te</h2>
                      
                <div class="text-center">
                    <h4></h4>
                       <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_etape1"  name="bt_etape1">Indicateurs <p></p>d'acc&egrave;s<i class="bi bi-caret-right" ></i></button></a></div>
                    
                       <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_etape2" name="bt_etape2">Indicateurs de participation<i class="bi bi-caret-right" ></i></button></a></div>
                    
                       <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_etape3"  name="bt_etape3"> Indicateurs de flux ou d'&eacute;fficacit&eacute; interne<i class="bi bi-caret-right" ></i></button></a></div>
                    
                        <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_etape4" name="bt_etape4">Enseignants et Encadreurs<i class="bi bi-caret-right"></i></button></a></div>
                    
                       <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_etape5" name="bt_etape5">Infrastructures<i class="bi bi-caret-right"></i></button></a></div>
                    
                       <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_etape6" name="bt_etape6">Formations<i class="bi bi-caret-right"></i></button></a></div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_etape7" name="bt_etape7">Services sociaux<i class="bi bi-caret-right"></i></button></a></div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_etape8" name="bt_etape8">Normes UNESCO et autres<i class="bi bi-caret-right"></i></button></a></div>

                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_etape9" name="bt_etape9">Orientation dans les fili&egrave;res de formation<i class="bi bi-caret-right"></i></button></a></div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_etape10" name="bt_etape10">Indicateurs d'&eacute;fficacit&eacute; externe<i class="bi bi-caret-right"></i></button></a></div>

               </div> 
            </div>
          </div>
          
          
          
          <div class="col-lg-9" data-aos="" data-aos-delay="100" id="debut">
              <div id="lycee"><h2>Indicateurs</h2></div>
<!--ETAPE1-->
              <div class="info" id="etape1">
              
              <h3 class="btn-etape1">Composante : Indicateurs d'acc&egrave;s</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C1 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table>

                     
            </div> <!--Fin etape1-->
    
              
              
              
              
              
<!--ETAPE2  Infrastructures --> 
              <div class="info" id="etape2">
              <h3 class="btn-etape2">Composante : Indicateurs de participation</h3>

            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C2 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table>               
            </div> <!--Fin etape2-->
              

              
              
              
 <!--ETAPE3 Commodit&eacute;s et Services --> 
              <div class="info" id="etape3">
              <h3 class="btn-etape1">Composante : Indicateurs de flux ou d'&eacute;fficacit&eacute; interne</h3>

            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C3 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table>                          
            </div> <!--Fin etape3-->             
              
              
 <!--ETAPE4 Pertubation & Personnes vulnérables--> 
              <div class="info" id="etape4">
              <h3 class="btn-etape2">Composante : Enseignants et Encadreurs</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C4 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 

              
            </div> <!--Fin etape4-->             

              
              
              
              
<!--ETAPE5 Partenariats--> 
              <div class="info" id="etape5">
              <h3 class="btn-etape1">Composante : Infrastructures </h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C5 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 
               
            </div> <!--Fin etape5-->             

              
              
              
              
<!--ETAPE6--> 
              <div class="info" id="etape6">
              <h3 class="btn-etape2">Composante : Formations</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C6 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 
              
            </div> <!--Fin etape6-->             

              
              
              
              
<!--ETAPE7--> 
              <div class="info" id="etape7">
              <h3 class="btn-etape1">Composante : Services sociaux</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C7 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table>                 
                  
            </div> <!--Fin etape7-->             
            
              
              
              
 <!--etape8-->             
              <div class="info" id="etape8">
              <h3 class="btn-etape2">Composante : Normes UNESCO et autres</h3>

            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C8 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 
               
            </div> <!--Fin etape8-->               
            
              
              
  <!--ETAPE9--> 
              <div class="info" id="etape9">
              <h3 class="btn-etape1">Composante : Orientation dans les fili&egrave;res de formation</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C9 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 
             
            </div> <!--Fin etape9-->             
             
              
              
              
              
  <!--ETAPE10--> 
              <div class="info" id="etape10">
              <h3 class="btn-etape2">Composante : Indicateurs d'&eacute;fficacit&eacute; externe</h3>
            <table  border="3" class="table table-bordered border-primary mt-3">
              <tr>
                <th scope="col"><div align="center">Indicateurs</div></th>
                <th scope="col"><div align="center">Valeur</div></th>
                <th scope="col"><div align="center">Valeur R&eacute;f</div></th> 
              </tr>

              <?php foreach ($Liste_Indicateur_C10 as $row_Indicateur) {  ?>
                <tr class="">

                  <td class=""><?php  echo htmlentities ($row_Indicateur["Indicateur"]); ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur"]; ?></td>
                  <td class="text-center"> <?php echo $row_Indicateur["Valeur_Reference"]; ?></td>    
                </tr>
                <?php }   ?>

            </table> 
             
            </div> <!--Fin etape10-->             
             
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              

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
 
  <script src="assets/js/tools.js"></script>  
    
 <script src="assets/vendors/jquery-3.6.0.min.js"></script>
    
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 
   <!-- TRAITEMENT -->   
       <script type="text/javascript">
           
    $(document).ready(function(){
        
        function CacherBouttons(){
            $("#etape1").hide();
            $("#etape2").hide();
            $("#etape3").hide();
            $("#etape4").hide();
            $("#etape5").hide();
            $("#etape6").hide();
            $("#etape7").hide();
            $("#etape8").hide();
            $("#etape9").hide();
            $("#etape10").hide();
        
                       
            
        }
        
        
        
        		
        
  


        
//---------------BOUTONS DES ETAPES-----------//
//---------------BOUTONS DES ETAPES-----------//
        
            CacherBouttons();
            $("#etape1").show();
        
        
        $("#bt_etape1").click(function(){
            
            CacherBouttons();
           // Maj_Etp1();
            $("#etape1").show();
            
           
            
        });
        
         $("#bt_etape2").click(function(){

            CacherBouttons();
            $("#etape2").show();
             
            
        });
        
        
        
          $("#bt_etape3").click(function(){

            CacherBouttons();
            $("#etape3").show();
             
            
        }); 
        
        
        
         $("#bt_etape4").click(function(){
            CacherBouttons();
            $("#etape4").show();
             
            
        });        
        
        
          $("#bt_etape5").click(function(){
            CacherBouttons();
            $("#etape5").show();
             
            
        });        
        
        
          $("#bt_etape6").click(function(){
            CacherBouttons();
            $("#etape6").show();
             
            
        }); 
        
           $("#bt_etape7").click(function(){
            CacherBouttons();
            $("#etape7").show();
             
            
        });        
        
        
          $("#bt_etape8").click(function(){
            CacherBouttons();
            $("#etape8").show();
             
            
        });       
        
           $("#bt_etape9").click(function(){
            CacherBouttons();
            $("#etape9").show();
             
            
        });        
        
        
          $("#bt_etape10").click(function(){
            CacherBouttons();
            $("#etape10").show();
             
            
        });
        

        
//-----------RECUPERER PARAMETRES URL-----------
   let searchParams = new URLSearchParams(window.location.search)
searchParams.has('etape') 
let etape = searchParams.get('etape')
//alert(etape);        
      
             if ( etape === '1') { 
                CacherBouttons();
                 $("#etape1").show();
                
            }
              if ( etape === '2') { 
                CacherBouttons();
                 $("#etape2").show();
                
            }       
             if ( etape === '3') { 
                CacherBouttons();
                 $("#etape3").show();
                
            }
              if ( etape === '4') { 
                CacherBouttons();
                 $("#etape4").show();
                
            }        
                if ( etape === '5') { 
                CacherBouttons();
                 $("#etape5").show();
                
            }
              if ( etape === '6') { 
                CacherBouttons();
                 $("#etape6").show();
                
            }     

               if ( etape === '7') { 
                CacherBouttons();
                 $("#etape7").show();
                
            }        
                if ( etape === '8') { 
                CacherBouttons();
                 $("#etape8").show();
                
            }
              if ( etape === '9') { 
                CacherBouttons();
                 $("#etape9").show();
                
            }         
        
              if ( etape === '10') { 
                CacherBouttons();
                 $("#etape10").show();
                
            }   
            if ( $("input[name='SituationE']:checked").val() === 'Non Fonctionnel') {
                CacherBouttons();
                 $("#etape1").show();                
            }        
//-----------BOUTONS DES MISE A JOUR-----------
        
        
        /*INFRASTRUCTURE*/
           $("#btn_cons_mobilier").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_infras").click(function(){
               //alert ('data');
               Maj_Etp7_Infras_sucess();
             
            
        });        
        
            $("#btn_supp_infras").click(function(){
               
               Maj_Etp7_Infras_delete();
             
            
        });
        
        
        
        
            /*MOBILIER*/
        
             $("#btn_cons_mobilier").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_mobilier").click(function(){
               
               if ($("#Nbre_Mobilier").val()>0){
                    Maj_Etp7_Mobilier_sucess();
                   $("#Nbre_Mobilier").val('0');
                   }else{alert('Le nombre du mobilier doit être supérieur à 0');}
               
             
            
        });        
        
            $("#btn_supp_mobilier").click(function(){
               
               Maj_Etp7_Mobilier_delete();
             
            
        });      
        
        
        
             /*RECAPITULATIF*/
        
             $("#btn_cons_recap").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_recap").click(function(){
               //alert('aj');
               if ($('#Filiere').val()==''){
                   alert('Veuillez renseigner la filière');
               } else{
                Maj_Etp8_Recap_sucess();   
               }
               
             
            
        });        
        
            $("#btn_supp_recap").click(function(){
               alert('supp');
               Maj_Etp8_Recap_delete();
             
            
        });        
        
        //SUIVI
        
            $("#btn_aj_suivi").click(function(){
               //alert('aj suivi');
               Maj_Etp9_Suivi_sucess();
             
            
        });        
        
              $("#btn_supp_suivi").click(function(){
               //alert('supp demande');
               Maj_Etp9_Suivi_delete();
             
            
        });      
               
        
        //DEMANDE
   
           $("#btn_aj_demande").click(function(){
               //alert('aj demande');
               Maj_Etp10_Demande_sucess();
             
            
        });        
        
              $("#btn_supp_demande").click(function(){
               //alert('supp demande');
               Maj_Etp10_Demande_delete();
             
            
        });      
        
        
        
        
        
    });
           
           
    
    </script> 

</body>

</html>