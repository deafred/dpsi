<?php require_once('maj_files/config.php'); ?>
<?php
// On d&eacute;marre la session (ceci est indispensable dans toutes les pages de notre section membre
session_start ();
// On r&eacute;cup&egrave;re nos variables de session
//if (isset($_SESSION['MM_Adminname']) && isset($_SESSION['MM_Admincode'])) {
//    $Admin	     	=   $_SESSION['MM_Adminname'];
//    $Password   	=   $_SESSION['MM_Admincode'];

//Declaration des variables globales
            $Fonctionnel    =   FCT;
            $Non_Fct        =   NON_FCT;
            $Oui            =   OUI;
            $Non            =   NON;
            $Annee          =   ANNEE_SCO;
            $Public         =   PUBLICS;
            $Technique      =   TECH;
            $Professionnel  =   PROF;
            $Tech_Prof      =   TECH_PROF;
            $Num_Tab        =   0;
    

            $query_DR        = "SELECT * FROM direction_regionale order by Region_DR ";
            $Liste_DR         =  $idcom->query($query_DR);
           //$row_Liste_Tableau1     =  $Liste_Tableau1->fetchObject();

//Liste de tous les établissement
    $query_Liste_Etablissement      =   "SELECT * FROM etablissement";
    $Liste_Etablissement            =   $idcom->query($query_Liste_Etablissement);
    $totalRows_Liste_Etablissement  =   $Liste_Etablissement->rowCount();		

//Liste de tous les Publics
    $query_Liste_Public             =   "SELECT * FROM etablissement where Statut_Etablissement='$Public'";
    $Liste_Public                   =   $idcom->query($query_Liste_Public);
    $totalRows_Liste_Public         =   $Liste_Public->rowCount();	

//Liste de tous les Prives
//    $query_Liste_Prive              =   "SELECT * FROM etablissement where Statut_Etablissement='$Public'";
//    $Liste_Prive                    =   $idcom->query($query_Liste_Prive);
//    $totalRows_Liste_Prive          =   $Liste_Prive->rowCount();	
    $totalRows_Liste_Prive          =     $totalRows_Liste_Etablissement - $totalRows_Liste_Public ;

//Liste de tous etablissents Avec apprenants
    $query_Liste_Fct                =  "SELECT * FROM etablissement where Situation_Etablissement = '$Fonctionnel'";
    $Liste_Fct                      =   $idcom->query($query_Liste_Fct);
    $totalRows_Liste_Fct            =   $Liste_Fct->rowCount();	

//Liste de tous etablissents Sans apprenants
//    $query_Liste_Non_Fct            =  "SELECT * FROM etablissement where Situation_Etablissement <> '$Fonctionnel' OR Situation_Etablissement is null ";
//    $Liste_Non_Fct                  =   $idcom->query($query_Liste_Non_Fct);
//    $totalRows_Liste_Non_Fct        =   $Liste_Non_Fct->rowCount();	
    $totalRows_Liste_Non_Fct        =   $totalRows_Liste_Etablissement - $totalRows_Liste_Fct ;
        
        
//Liste de tous les Publics avec Apprenants
    $query_Liste_Public_Fct         =   "SELECT * FROM etablissement where Statut_Etablissement='$Public' AND  Situation_Etablissement = '$Fonctionnel'";
    $Liste_Public_Fct               =   $idcom->query($query_Liste_Public_Fct);
    $totalRows_Liste_Public_Fct     =   $Liste_Public_Fct->rowCount();

//Liste de tous les Publics Sans Apprenants
//    $query_Liste_Public_Non_Fct     =   "SELECT * FROM etablissement where Statut_Etablissement='$Public' AND   (Situation_Etablissement <> '$Fonctionnel' OR Situation_Etablissement is null ) ";
//    $Liste_Public_Non_Fct           =   $idcom->query($query_Liste_Public_Non_Fct);
//    $totalRows_Liste_Public_Non_Fct =   $Liste_Public_Non_Fct->rowCount();
$totalRows_Liste_Public_Non_Fct     =   $totalRows_Liste_Public - $totalRows_Liste_Public_Fct;
    
    
//Liste de tous les Prives avec Apprenants
    $query_Liste_Prive_Fct         =   "SELECT * FROM etablissement where ( Statut_Etablissement<>'$Public' OR Statut_Etablissement is null ) AND  (Situation_Etablissement = '$Fonctionnel' )";
    $Liste_Prive_Fct               =   $idcom->query($query_Liste_Prive_Fct);
    $totalRows_Liste_Prive_Fct     =   $Liste_Prive_Fct->rowCount();

//Liste de tous les Prives Sans Apprenants
//    $query_Liste_Prive_Non_Fct     =   "SELECT * FROM etablissement where ( Statut_Etablissement<>'$Public' OR Statut_Etablissement is null ) AND  ( Situation_Etablissement <> '$Fonctionnel' OR Situation_Etablissement is null ) ";
//    $Liste_Prive_Non_Fct           =   $idcom->query($query_Liste_Prive_Non_Fct);
//    $totalRows_Liste_Prive_Non_Fct =   $Liste_Prive_Non_Fct->rowCount();
    $totalRows_Liste_Prive_Non_Fct  =   $totalRows_Liste_Prive - $totalRows_Liste_Prive_Fct ;

//Liste de tous les etablissements public collectés
    $query_Liste_Collect_Public        =   "SELECT * FROM etablissement where valider='1' AND Statut_Etablissement = '$Public' ";
    $Liste_Collect_Public              =   $idcom->query($query_Liste_Collect_Public);
    $totalRows_Liste_Collect_Public    =   $Liste_Collect_Public->rowCount();

//Liste de tous les etablissements public non collectés
    $totalRows_Liste_Non_Collect_Public     =  $totalRows_Liste_Public -  $totalRows_Liste_Collect_Public ;



//Liste de tous les etablissements Prive collectés
    $query_Liste_Collect_Prive        =   "SELECT * FROM etablissement where valider='1' AND ( Statut_Etablissement <> '$Public' OR Statut_Etablissement is null ) ";
    $Liste_Collect_Prive              =   $idcom->query($query_Liste_Collect_Prive);
    $totalRows_Liste_Collect_Prive    =   $Liste_Collect_Prive->rowCount();

//Liste de tous les etablissements Prive non collectés
    $totalRows_Liste_Non_Collect_Prive     =  $totalRows_Liste_Prive -  $totalRows_Liste_Collect_Prive ;

//Liste de tous les etablissements collectés
$totalRows_Liste_Collect     =   $totalRows_Liste_Collect_Public + $totalRows_Liste_Collect_Prive;

//Liste de tous les etablissements collectés
$totalRows_Liste_Non_Collect     =   $totalRows_Liste_Non_Collect_Public + $totalRows_Liste_Non_Collect_Prive;


//Liste de tous les etablissements Techniques
    $query_Liste_Technique        =   " SELECT * FROM etablissement where Ordre_Formation ='$Technique' ";
    $Liste_Technique              =   $idcom->query($query_Liste_Technique);
    $totalRows_Liste_Technique    =   $Liste_Technique->rowCount();
        
//Liste de tous les etablissements Techniques Collectés
    $query_Liste_Technique_Collect        =   "SELECT * FROM etablissement where Ordre_Formation ='$Technique' AND Valider='1'  ";
    $Liste_Technique_Collect              =   $idcom->query($query_Liste_Technique_Collect);
    $totalRows_Liste_Technique_Collect    =   $Liste_Technique_Collect->rowCount();

//Liste de tous les etablissements Techniques Collectés
    $totalRows_Liste_Technique_Non_Collect = $totalRows_Liste_Technique - $totalRows_Liste_Technique_Collect;


//Liste de tous les etablissements Professionnel
    $query_Liste_Professionnel    =   "SELECT * FROM etablissement where Ordre_Formation ='$Professionnel' OR Ordre_Formation is null OR Ordre_Formation='' ";
    $Liste_Professionnel          =   $idcom->query($query_Liste_Professionnel);
    $totalRows_Liste_Professionnel  =   $Liste_Professionnel->rowCount();

//Liste de tous les etablissements Professionnels Collectés
    $query_Liste_Professionnel_Collect        =   "SELECT * FROM etablissement where Ordre_Formation ='$Professionnel' AND Valider='1'  ";
    $Liste_Professionnel_Collect              =   $idcom->query($query_Liste_Professionnel_Collect);
    $totalRows_Liste_Professionnel_Collect    =   $Liste_Professionnel_Collect->rowCount();

//Liste de tous les etablissements Professionnels Non Collectés
$totalRows_Liste_Professionnel_Non_Collect = $totalRows_Liste_Professionnel - $totalRows_Liste_Professionnel_Collect;


//Liste de tous les etablissements TTech_Prof
    $query_Liste_Tech_Prof    =   "SELECT * FROM etablissement where Ordre_Formation ='$Tech_Prof' ";
    $Liste_Tech_Prof          =   $idcom->query($query_Liste_Tech_Prof);
    $totalRows_Liste_Tech_Prof  =   $Liste_Tech_Prof->rowCount();


//Liste de tous les etablissements Tech_Prof Collectés
    $query_Liste_Tech_Prof_Collect        =   "SELECT * FROM etablissement where Ordre_Formation ='$Tech_Prof' AND Valider='1'  ";
    $Liste_Tech_Prof_Collect              =   $idcom->query($query_Liste_Tech_Prof_Collect);
    $totalRows_Liste_Tech_Prof_Collect    =   $Liste_Tech_Prof_Collect->rowCount();

//Liste de tous les etablissements Tech_Prof Non Collectés
    $totalRows_Liste_Tech_Prof_Non_Collect = $totalRows_Liste_Tech_Prof - $totalRows_Liste_Tech_Prof_Collect;


//}else{
//
//    header("Location: ". 'admin.php' );
//}

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
            
            <li><a class="nav-link scrollto" href="index.php#team">Annuaire</a></li>
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
            <li><a class="nav-link scrollto " href="connexion.php">Enqu&ecirc;te</a></li>  
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
          <h2>Annuaire</h2><span></span>
        </div>
        
          

<div class="table-responsive">
<strong>Tableau <?php echo $Num_Tab++; ?> : Taux de r&eacute;ponse par statut et selon l&lsquo;&eacute;tat de l&lsquo;&eacute;tablissement.</strong>   

<table  border="3" class="table table-bordered border-primary mt-3">
  <tr>
    <th scope="col"><div align="center">Statut</div></th>
    <th scope="col"><div align="center">Total</div></th>  
    <th scope="col"><div align="center">Collect&eacute;s</div></th>
    <th scope="col"><div align="center">Non Collect&eacute;s</div></th>
    <th scope="col"><div align="center">Taux de reponse</div></th>  
  </tr>

    <tr>
        
      <td>PUBLIC</td>
      <td class="text-center"><?php echo $totalRows_Liste_Public; ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Collect_Public;  ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Non_Collect_Public; ?> </td>
      <td class="text-center"><?php echo (round((($totalRows_Liste_Collect_Public/$totalRows_Liste_Public)*100),2))." %"; ?> </td>  
    </tr>
    
    <tr>
        
      <td>PRIVE</td>
      <td class="text-center"><?php echo $totalRows_Liste_Prive; ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Collect_Prive;  ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Non_Collect_Prive; ?> </td>
      <td class="text-center"><?php echo (round((($totalRows_Liste_Collect_Prive/$totalRows_Liste_Prive)*100),2))." %"; ?> </td>  
    </tr>
    
    <tr>
        
      <th>ENSEMBLE</th>
      <th class="text-center"><?php echo $totalRows_Liste_Etablissement; ?></th>
      <th class="text-center"><?php echo $totalRows_Liste_Collect;  ?></th>
      <th class="text-center"><?php echo $totalRows_Liste_Non_Collect; ?> </th>
      <th class="text-center"><?php echo (round((($totalRows_Liste_Collect/$totalRows_Liste_Etablissement)*100),2))." %"; ?> </th>  
    </tr>
    
</table>
</div>          

          
<div class="table-responsive mt-3">
<strong>Tableau <?php echo $Num_Tab++; ?> : Taux de r&eacute;ponse par ordre d&lsquo;enseinseignement.</strong>   

<table  border="3" class="table table-bordered border-primary mt-3">
  <tr>
    <th scope="col"><div align="center">Ordre Enseignement</div></th>
    <th scope="col"><div align="center">Total</div></th>  
    <th scope="col"><div align="center">Collect&eacute;s</div></th>
    <th scope="col"><div align="center">Non Collect&eacute;s</div></th>
    <th scope="col"><div align="center">Taux de reponse</div></th>  
  </tr>

    <tr>
        
      <td>Tehnique</td>
      <td class="text-center"><?php echo $totalRows_Liste_Technique; ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Technique_Collect;  ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Technique_Non_Collect; ?> </td>
      <td class="text-center"><?php echo (round((($totalRows_Liste_Technique_Collect/$totalRows_Liste_Technique)*100),2))." %"; ?> </td>  
    </tr>
    
    <tr>
        
      <td>Professionnel</td>
      <td class="text-center"><?php echo $totalRows_Liste_Professionnel; ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Professionnel_Collect;  ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Professionnel_Non_Collect; ?> </td>
      <td class="text-center"><?php echo (round((($totalRows_Liste_Professionnel_Collect/$totalRows_Liste_Professionnel)*100),2))." %"; ?> </td>  
    </tr>
 
    <tr>
        
      <td>Technique et Professionnel</td>
      <td class="text-center"><?php echo $totalRows_Liste_Tech_Prof; ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Tech_Prof_Collect;  ?></td>
      <td class="text-center"><?php echo $totalRows_Liste_Tech_Prof_Non_Collect; ?> </td>
      <td class="text-center"><?php echo (round((($totalRows_Liste_Tech_Prof_Collect/$totalRows_Liste_Tech_Prof)*100),2))." %"; ?> </td>  
    </tr>
    
    <tr>
        
      <th>ENSEMBLE</th>
      <th class="text-center"><?php echo $totalRows_Liste_Etablissement; ?></th>
      <th class="text-center"><?php echo $totalRows_Liste_Collect;  ?></th>
      <th class="text-center"><?php echo $totalRows_Liste_Non_Collect; ?> </th>
      <th class="text-center"><?php echo (round((($totalRows_Liste_Collect/$totalRows_Liste_Etablissement)*100),2))." %"; ?> </th>  
    </tr>
    
</table>
</div>          
          
          
          
          
<div class="table-responsive mt-3">
<?php
            $query_DR        = "SELECT * FROM direction_regionale order by Region_DR ";
            $Liste_DR         =  $idcom->query($query_DR);
?>    
    <strong>Tableau <?php echo $Num_Tab++; ?> : R&eacute;partition des &eacute;tablissements  par DRETFPA selon le statut </strong>
<table  border="3" class="table table-bordered border-primary mt-3">
  <tr>
    <th scope="col"><div align="center">Direction R&eacute;gionale</div></th>
    <th scope="col"><div align="center">Public</div></th>
    <th scope="col"><div align="center">Priv&eacute;</div></th>
    <th scope="col"><div align="center">Ensemble</div></th>  
  </tr>

  <?php while ($row_Liste_DR = $Liste_DR->fetchObject()) { ?>
    <tr class="">
        
      <td><?php $Region=$row_Liste_DR->Region_DR; echo $Region; ?></td>
      <td class="text-center">
          <?php  
                    $Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND Statut_Etablissement = '$Public'"; 
                    $Nbre_Publique          =  $idcom->query($Publique);
                    $row_Nbre_Publique      =  $Nbre_Publique->fetchObject();
                    echo   $row_Nbre_Publique->Nbre;                                                
          ?>
     </td>
      <td class="text-center">
          <?php  
                    $Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND (Statut_Etablissement <> '$Public' OR Statut_Etablissement is null) "; 
                    $Nbre_Prive          =  $idcom->query($Prive);
                    $row_Nbre_Prive   =  $Nbre_Prive->fetchObject();
                    echo   $row_Nbre_Prive->Nbre;                                                
          ?>
          
      </td>
        <td class="text-center">
           <?php  
                    $Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' "; 
                    $Nbre_Ensemble          =  $idcom->query($Ensemble);
                    $row_Nbre_Ensemble     =  $Nbre_Ensemble->fetchObject();
                    echo   $row_Nbre_Ensemble->Nbre;                                                
          ?>           
        </td>    
    </tr>
    <?php }  ?>
    <tr>
        <th>Ensemble</th>
        <th class="text-center">
          <?php  
                    $Total_Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE Statut_Etablissement = '$Public'"; 
                    $Nbre_Total_Publique          =  $idcom->query($Total_Publique);
                    $row_Nbre_Total_Publique      =  $Nbre_Total_Publique->fetchObject();
                    echo   $row_Nbre_Total_Publique->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE Statut_Etablissement <>'$Public' or Statut_Etablissement is null"; 
                    $Nbre_Total_Prive          =  $idcom->query($Total_Prive);
                    $row_Nbre_Total_Prive      =  $Nbre_Total_Prive->fetchObject();
                    echo   $row_Nbre_Total_Prive->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement "; 
                    $Nbre_Total_Ensemble          =  $idcom->query($Total_Ensemble);
                    $row_Nbre_Total_Ensemble      =  $Nbre_Total_Ensemble->fetchObject();
                    echo   $row_Nbre_Total_Ensemble->Nbre;                                                
          ?>        
        </th>
    </tr>
</table>
</div>
       
          
<div class="table-responsive mt-3">
<?php
            $query_DR        = "SELECT * FROM direction_regionale order by Region_DR ";
            $Liste_DR         =  $idcom->query($query_DR);
?>    
    <strong>Tableau <?php echo $Num_Tab++; ?>  : R&eacute;partition des &eacute;tablissements avec apprenants par DRETFPA selon le statut.</strong>
<table  border="3" class="table table-bordered border-primary mt-3">
  <tr>
    <th scope="col"><div align="center">Direction R&eacute;gionale</div></th>
    <th scope="col"><div align="center">Public</div></th>
    <th scope="col"><div align="center">Priv&eacute;</div></th>
    <th scope="col"><div align="center">Ensemble</div></th>  
  </tr>

  <?php while ($row_Liste_DR = $Liste_DR->fetchObject()) { ?>
    <tr class="">
        
      <td><?php $Region=$row_Liste_DR->Region_DR; echo $Region; ?></td>
      <td class="text-center">
          <?php  
                    $Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND Statut_Etablissement = '$Public' AND Situation_Etablissement ='$Fonctionnel' "; 
                    $Nbre_Publique          =  $idcom->query($Publique);
                    $row_Nbre_Publique      =  $Nbre_Publique->fetchObject();
                    echo   $row_Nbre_Publique->Nbre;                                                
          ?>
     </td>
      <td class="text-center">
          <?php  
                    $Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND (Statut_Etablissement <> '$Public' OR Statut_Etablissement is null) AND  Situation_Etablissement ='$Fonctionnel' "; 
                    $Nbre_Prive          =  $idcom->query($Prive);
                    $row_Nbre_Prive   =  $Nbre_Prive->fetchObject();
                    echo   $row_Nbre_Prive->Nbre;                                                
          ?>
          
      </td>
        <td class="text-center">
           <?php  
                    $Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND  Situation_Etablissement ='$Fonctionnel' "; 
                    $Nbre_Ensemble          =  $idcom->query($Ensemble);
                    $row_Nbre_Ensemble     =  $Nbre_Ensemble->fetchObject();
                    echo   $row_Nbre_Ensemble->Nbre;                                                
          ?>           
        </td>    
    </tr>
    <?php }  ?>
    <tr>
        <th>Ensemble</th>
        <th class="text-center">
          <?php  
                    $Total_Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE Statut_Etablissement = '$Public' AND  Situation_Etablissement ='$Fonctionnel' "; 
                    $Nbre_Total_Publique          =  $idcom->query($Total_Publique);
                    $row_Nbre_Total_Publique      =  $Nbre_Total_Publique->fetchObject();
                    echo   $row_Nbre_Total_Publique->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE   Situation_Etablissement ='$Fonctionnel' AND (Statut_Etablissement <>'$Public' or Statut_Etablissement is null)"; 
                    $Nbre_Total_Prive          =  $idcom->query($Total_Prive);
                    $row_Nbre_Total_Prive      =  $Nbre_Total_Prive->fetchObject();
                    echo   $row_Nbre_Total_Prive->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE   Situation_Etablissement ='$Fonctionnel' "; 
                    $Nbre_Total_Ensemble          =  $idcom->query($Total_Ensemble);
                    $row_Nbre_Total_Ensemble      =  $Nbre_Total_Ensemble->fetchObject();
                    echo   $row_Nbre_Total_Ensemble->Nbre;                                                
          ?>        
        </th>
    </tr>
</table>
</div>          
        

<div class="table-responsive mt-3">
<?php
            $query_DR        = "SELECT * FROM direction_regionale order by Region_DR ";
            $Liste_DR         =  $idcom->query($query_DR);
?>    
    <strong>Tableau <?php echo $Num_Tab++; ?>  : R&eacute;partition des &eacute;tablissements sans apprenants par DRETFPA selon le statut en <?php echo $Annee; ?></strong>
<table  border="3" class="table table-bordered border-primary mt-3">
  <tr>
    <th scope="col"><div align="center">Direction R&eacute;gionale</div></th>
    <th scope="col"><div align="center">Public</div></th>
    <th scope="col"><div align="center">Priv&eacute;</div></th>
    <th scope="col"><div align="center">Ensemble</div></th>  
  </tr>

  <?php while ($row_Liste_DR = $Liste_DR->fetchObject()) { ?>
    <tr class="">
        
      <td><?php $Region=$row_Liste_DR->Region_DR; echo $Region; ?></td>
      <td class="text-center">
          <?php  
                    $Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND Statut_Etablissement = '$Public' AND  (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null)"; 
                    $Nbre_Publique          =  $idcom->query($Publique);
                    $row_Nbre_Publique      =  $Nbre_Publique->fetchObject();
                    echo   $row_Nbre_Publique->Nbre;                                                
          ?>
     </td>
      <td class="text-center">
          <?php  
                    $Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND (Statut_Etablissement <> '$Public' OR Statut_Etablissement is null) AND  (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null) "; 
                    $Nbre_Prive          =  $idcom->query($Prive);
                    $row_Nbre_Prive   =  $Nbre_Prive->fetchObject();
                    echo   $row_Nbre_Prive->Nbre;                                                
          ?>
          
      </td>
        <td class="text-center">
           <?php  
                    $Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE direction_regionale = '$Region' AND  (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null) "; 
                    $Nbre_Ensemble          =  $idcom->query($Ensemble);
                    $row_Nbre_Ensemble     =  $Nbre_Ensemble->fetchObject();
                    echo   $row_Nbre_Ensemble->Nbre;                                                
          ?>           
        </td>    
    </tr>
    <?php }  ?>
    <tr>
        <th>Ensemble</th>
        <th class="text-center">
          <?php  
                    $Total_Publique ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE Statut_Etablissement = '$Public' AND  (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null) "; 
                    $Nbre_Total_Publique          =  $idcom->query($Total_Publique);
                    $row_Nbre_Total_Publique      =  $Nbre_Total_Publique->fetchObject();
                    echo   $row_Nbre_Total_Publique->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Prive ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE   (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null) AND (Statut_Etablissement <>'$Public' or Statut_Etablissement is null)"; 
                    $Nbre_Total_Prive          =  $idcom->query($Total_Prive);
                    $row_Nbre_Total_Prive      =  $Nbre_Total_Prive->fetchObject();
                    echo   $row_Nbre_Total_Prive->Nbre;                                                
          ?>        
        </th>
        <th class="text-center">
          <?php  
                    $Total_Ensemble ="SELECT direction_regionale, COUNT( direction_regionale ) AS Nbre FROM etablissement WHERE   (Situation_Etablissement <> '$Fonctionnel' or Situation_Etablissement is null) "; 
                    $Nbre_Total_Ensemble          =  $idcom->query($Total_Ensemble);
                    $row_Nbre_Total_Ensemble      =  $Nbre_Total_Ensemble->fetchObject();
                    echo   $row_Nbre_Total_Ensemble->Nbre;                                                
          ?>        
        </th>
    </tr>
</table>
</div> 
          

          

<div class="table-responsive mt-3">
<?php
            $query_DR        = "SELECT * FROM Region order by Nom_Region ";
            $Liste_DR         =  $idcom->query($query_DR);
?>    
    <strong>Tableau <?php echo $Num_Tab++; ?>  : R&eacute;partition Détaillée <?php echo $Annee; ?></strong>
<table  border="3" class="table table-bordered border-primary mt-3">
  <tr class="table-primary">
    <th scope="row"><div align="center">R&eacute;gion</div></th>
    <th ><div align="center">Statut</div></th>
    <th ><div align="center">Etablissement</div></th>
    <th ><div align="center">Technique</div></th>
    <th ><div align="center">Professionnel</div></th>
    <th ><div align="center">Tech. et Prof.</div></th>  
  </tr>

  <?php while ($row_Liste_DR = $Liste_DR->fetchObject()) { ?>
    <tr>
        
      <th rowspan="3" scope="row"><?php $Region=$row_Liste_DR->Nom_Region; echo $Region; ?></th>
      <td>Public</td>
      <td class="text-center"></td>
      <td class="text-center"></td>
      <td class="text-center"></td>
      <td class="text-center"></td>        
    </tr>

      <tr>
        <td>Priv&eacute;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th class="table-active">Total</th>
        <td class="table-active">&nbsp;</td>
        <td class="table-active">&nbsp;</td>
        <td class="table-active">&nbsp;</td>
        <td class="table-active">&nbsp;</td>
      </tr>
    
    <?php }  ?>
    <tr class="table-primary">
        <th >Ensemble</th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
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