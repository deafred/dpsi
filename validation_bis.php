<?php require_once('maj_files/config.php'); ?>
<?php require_once('maj_files/mesfonctions.php'); ?>

<?php
session_start ();
//Chargement des Listes deroulantes

// On r&eacute;cup&egrave;re nos variables de session
if (isset($_SESSION['MM_drname']) && isset($_POST["CodeEtb"])) {

$CodeEtb        =   $_POST["CodeEtb"];

            $Fonctionnel    =   FCT;
            $Non_Fct        =   NON_FCT;
            $Oui            =   OUI;
            $Non            =   NON;
            $Annee          =   ANNEE_SCO;
            $Public         =   PUBLICS;
            $Technique      =   TECH;
            $Professionnel  =   PROF;
            $Tech_Prof      =   TECH_PROF;
//            $Qualifiante    =   QUALIFIANTE;
            $Num_Tab        =   0;
    

$Page_Precedente = $_SERVER['HTTP_REFERER'];
    

//Liste de tous les établissement
    $query_Liste_Etablissement      =   "SELECT * FROM etablissement where Code_dspss1='$CodeEtb' ";
    $Liste_Etablissement            =   $idcom->query($query_Liste_Etablissement);
    $row_Liste_Etablissement        =   $Liste_Etablissement->fetchObject();
    $totalRows_Liste_Etablissement  =   $Liste_Etablissement->rowCount();
    
    $Nom_Etablissement              =   $row_Liste_Etablissement->Nom_Etablissement;

    
//Liste de tous les établissement
    $query_Liste_Effectif      =   "SELECT * FROM eleves_filiere where Code_dspss_R='$CodeEtb' Order By Formation, Diplome,Filiere,Annee_Etude";
    $Liste_Effectif                 =   $idcom->query($query_Liste_Effectif );   
    $totalRows_Liste_Effectif       =   $Liste_Effectif ->rowCount();

//INFOS SYSPAS    
    $Technique_SYSPAS                      =   eleves_filiere_BAC_reporting_validation($idcom,$CodeEtb,TECH);
    $Effectif_Technique_SYSPAS             =   (int)$Technique_SYSPAS[0];
    $Filiere_Technique_SYSPAS              =   $Technique_SYSPAS[1];
        
    $Professionnel_SYSPAS                  =   eleves_filiere_reporting_validation($idcom,$CodeEtb,PROF);
    $Effectif_Professionnel_SYSPAS         =   (int)$Professionnel_SYSPAS[0];
    $Filiere_Professionnel_SYSPAS          =   $Professionnel_SYSPAS[1];
    
    $Apprentissage_SYSPAS           =   eleves_filiere_reporting_validation($idcom,$CodeEtb,APPRENTISSAGE);
    $Effectif_Apprentissage_SYSPAS         =   (int)$Apprentissage_SYSPAS[0];
    $Filiere_Apprentissage_SYSPAS          =   $Apprentissage_SYSPAS[1];   
    
    
    $Qualifiante_SYSPAS             =   eleves_filiere_reporting_validation($idcom,$CodeEtb,QUALIFIANTE);
    $Effectif_Qualifiante_SYSPAS           =   (int)$Qualifiante_SYSPAS[0];
    $Filiere_Qualifiante_SYSPAS            =   $Qualifiante_SYSPAS[1];   
    
    $Effectif_Total_SYSPAS                 =   0;
    $Effectif_Total_SYSPAS                 = $Effectif_Technique_SYSPAS + $Effectif_Professionnel_SYSPAS + $Effectif_Apprentissage_SYSPAS + $Effectif_Qualifiante_SYSPAS;

//INFOS ERSYS 
    $Technique_ERSYS                      =   ERSYS_effectif_BAC_reporting_validation($idcom,$Nom_Etablissement,TECH);
    $Effectif_Technique_ERSYS             =   (int)$Technique_ERSYS[0];
    $Filiere_Technique_ERSYS              =   $Technique_ERSYS[1];
        
    $Professionnel_ERSYS                  =   ERSYS_effectif_reporting_validation($idcom,$Nom_Etablissement,PROF);
    $Effectif_Professionnel_ERSYS         =   (int)$Professionnel_ERSYS[0];
    $Filiere_Professionnel_ERSYS          =   $Professionnel_ERSYS[1];
    
    $Apprentissage_ERSYS           =   ERSYS_effectif_reporting_validation($idcom,$Nom_Etablissement,APPRENTISSAGE);
    $Effectif_Apprentissage_ERSYS         =   (int)$Apprentissage_ERSYS[0];
    $Filiere_Apprentissage_ERSYS          =   $Apprentissage_ERSYS[1];   
    
    
    $Qualifiante_ERSYS             =   ERSYS_effectif_reporting_validation($idcom,$Nom_Etablissement,QUALIFIANTE);
    $Effectif_Qualifiante_ERSYS           =   (int)$Qualifiante_ERSYS[0];
    $Filiere_Qualifiante_ERSYS            =   $Qualifiante_ERSYS[1];   
    
    $Effectif_Total_ERSYS                 =   0;
    $Effectif_Total_ERSYS                 = $Effectif_Technique_ERSYS + $Effectif_Professionnel_ERSYS + $Effectif_Apprentissage_ERSYS + $Effectif_Qualifiante_ERSYS;    
    
//INFOS SUR LE MOBILIER    
    $query_Liste_Mobilier      =   "SELECT * FROM Mobilier where Code_dspss_M='$CodeEtb' ";
    $Liste_Mobilier            =   $idcom->query($query_Liste_Mobilier);
//    $row_Liste_Immobilier        =   $Liste_Immobilier->fetchObject();
    $totalRows_Liste_Mobilier  =   $Liste_Mobilier->rowCount(); 
    
        $Nbre_Table_Banc        =   0;
        $Nbre_Ordinateur        =   0;
        if ($totalRows_Liste_Mobilier >0 ){
            while ($row_Liste_Mobilier          =   $Liste_Mobilier->fetchObject()){
                
                  $Nom_Mobilier                 =   htmlentities($row_Liste_Mobilier->Nom_Mobilier);
                  $Nbre_Mobilier                =   $row_Liste_Mobilier->Nbre_Mobilier;
                
                if($Nom_Mobilier          ==  'Tables-banc'){
                    $Nbre_Table_Banc            =   $Nbre_Mobilier;
                }
                else if($Nom_Mobilier     ==  'Ordinateurs salle info'){
                    $Nbre_Ordinateur            =   $Nbre_Mobilier;
                }
            }
        }   

//INFOS IMMOBILIER    
    $query_Liste_Immobilier      =   "SELECT * FROM Immobilier where Code_dspss_I='$CodeEtb' order by Nom_Infrastructure desc ";
    $Liste_Immobilier            =   $idcom->query($query_Liste_Immobilier);
    $totalRows_Liste_Immobilier  =   $Liste_Immobilier->rowCount(); 

        $Nbre_Salle_Classe      =   0;
        $Nbre_Salle_Multimedia  =   0;
        $Nbre_Salle_Info        =   0;
        $Nbre_Salle_Prof        =   0;
        $Nbre_Biblio            =   0;
        $Nbre_Labo              =   0;
        $Nbre_Atelier           =   0;
    
    
    
        if ($totalRows_Liste_Immobilier >0 ){
            while ($row_Liste_Immobilier        =   $Liste_Immobilier->fetchObject()){
                  $Nom_Infrastructure           =   htmlentities($row_Liste_Immobilier->Nom_Infrastructure);
                $Nbre_Immobilier                  =   $row_Liste_Immobilier->Nbre_Bon_Etat;

                if($Nom_Infrastructure          ==  'Salle de classe'){
                    $Nbre_Salle_Classe          =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Salle multimédia'){
                    $Nbre_Salle_Multimedia      =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Salle informatique'){
                    $Nbre_Salle_Info            =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Salle des profs'){
                    $Nbre_Salle_Prof            =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Biblioth&egrave;que'){
                    $Nbre_Biblio                =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Laboratoire'){
                    $Nbre_Labo                  =   $Nbre_Immobilier;
                }else if($Nom_Infrastructure    ==  'Atelier'){
                    $Nbre_Atelier               =   $Nbre_Immobilier;
                }            

            }
        }    
    


}
else{

    header("Location: ". 'dr.php' );
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
              <h2>Validation</h2>
                      
                <div class="text-center">

                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_infos_gnles"  name="bt_infos_gnles">1. Infos. Gnles.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right" ></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_effectifs_syspas" name="bt_effectifs_syspas">2. Effectifs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right" ></i></button></a>
                    </div>
                    
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_salles" name="bt_salles">4. Salles&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>                    

                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape10 btn-taille" id="bt_recapitulatif" name="bt_recapitulatif">R&eacute;capitulatif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>                    

               </div> 
            </div>
          </div>
          
          
          
          <div class="col-lg-9" data-aos="" data-aos-delay="100" id="debut">
              <div id="lycee"><h2><?php echo $row_Liste_Etablissement->Nom_Etablissement  ?><a href="param.php"> <i class="bi bi-wrench"></i></a></h2></div>
              
            
 <!--ETAPE INFOS GNLES-->           
        <div class="info" id="etape_infos_gnles">
            <h3 class="btn-etape1">Informations G&eacute;n&eacute;rales</h3>
            <div class="table-responsive">  

                <table  border="0" class="table table-light table-striped mt-3">
    
                <!-- Infos Generales-->    
                  <tr>
                    <th colspan="3" class="text-center table-danger">INFORMATIONS GENERALES</th>
                  </tr>

                  <tr>
                    <th colspan="1">Contacts</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Contact_Fondateur." / ".$row_Liste_Etablissement->Contact_DE1  ?>
                    </td>
                  </tr>

                  <tr>
                    <th colspan="1">Agr&eacute;ment</th>
                    <td colspan="2" class="text-center"><?php 
                            $Ordre = $row_Liste_Etablissement->Ordre_Formation;
                            if ($Ordre==$Technique) {echo "Technique";}
                            else if ($Ordre==$Professionnel) {echo "Professionnel";}
                              else if ($Ordre==$Tech_Prof) {echo "Technique et Professionnel" ;}
                              else   {echo "Erreur";}
                        ?>
                      </td>
                  </tr>

                  <tr>
                    <th colspan="1">Statut</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->	Statut_Etablissement  ?></td>
                  </tr>    

                  <tr>
                    <th colspan="1">Electricit&eacute;</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Electricite  ?></td>
                  </tr>

                  <tr>
                    <th colspan="1">Eau potable / Nombre</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Eau_Potable." / ".$row_Liste_Etablissement->Nbre_Eau_Potable  ?></td>
                  </tr>

                  <tr>
                    <th colspan="1">Latrines / fonctionnelle</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Latrine." / "  ?></td>
                  </tr>    

                  <tr>
                    <th colspan="1">Espace de sport / int&eacute;rieur</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Espace_Sport." / ".$row_Liste_Etablissement->Espace_Sport_Interieur  ?></td>
                  </tr>

                  <tr>
                    <th colspan="1">Infirmerie / fonctionnelle</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Infirmerie." / ".$row_Liste_Etablissement->Infirmerie_Fonctionnelle  ?></td>
                  </tr> 

                  <tr>
                    <th colspan="1">Cantine / fonctionnelle</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Cantine." / ".$row_Liste_Etablissement->Cantine_Fonctionnelle  ?></td>
                  </tr>

                  <tr>
                    <th colspan="1">Cl&ocirc;ture / Etat</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Cloture." / ".$row_Liste_Etablissement->Etat_Cloture  ?></td>
                  </tr>

                  <tr>
                    <th colspan="1">Rampe d'acc&egrave;s handicap&eacute;s</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Rampe  ?></td>
                  </tr><!-- Fin Infos Generales-->
   
                </table>
            </div>   
        </div>

 <!--ETAPE EFFECTIFS SYSPAS / ERSYS-->              
         <div class="info" id="etape_effectifs_syspas">
            <h3 class="btn-etape2">Effectifs SYSPAS</h3>
            <div class="table-responsive">  

                <table  border="0" class="table table-light table-striped mt-3">

                <!-- Effectifs -->    
                  <tr>
                    <th colspan="2" class="text-center table-success">EFFECTIFS</th>
                  </tr>

                   <tr>
                    <th class="text-center">SYSPAS <?php echo " ~ ".$Effectif_Total_SYSPAS;  ?></th>
                    <th class="text-center">ERSYS <?php echo " ~ ".$Effectif_Total_ERSYS;  ?></th>
                  </tr> 

                   <tr class="table-danger text-center">
                    <th >Effectif du Technique (<?php echo $Effectif_Technique_SYSPAS;  ?>)</th>
                     <th >Effectif du Technique (<?php echo $Effectif_Technique_ERSYS;  ?>)</th>
                  </tr>
                    
                   <tr>
                    <td><?php echo $Filiere_Technique_SYSPAS ;  ?></td>
                     <td><?php echo $Filiere_Technique_ERSYS ;  ?></td>
                  </tr>

                   <tr class="table-danger text-center">
                    <th >Effectif du Professionnel (<?php echo $Effectif_Professionnel_SYSPAS;  ?>)</th>
                     <th >Effectif du Professionnel (<?php echo $Effectif_Professionnel_ERSYS;  ?>)</th>
                  </tr>
                    
                   <tr>
                    <td><?php echo $Filiere_Professionnel_SYSPAS ;  ?></td>
                     <td><?php echo $Filiere_Professionnel_ERSYS ;  ?></td>
                  </tr>                    

                   <tr class="table-danger text-center">
                    <th >Effectif Apprentissage (<?php echo $Effectif_Apprentissage_SYSPAS;  ?>)</th>
                     <th >Effectif du Apprentissage (<?php echo $Effectif_Apprentissage_ERSYS;  ?>)</th>
                  </tr>
                    
                   <tr>
                    <td><?php echo $Filiere_Apprentissage_SYSPAS ;  ?></td>
                     <td><?php echo $Filiere_Apprentissage_ERSYS ;  ?></td>
                  </tr>                          
 
                   <tr class="table-danger text-center">
                    <th >Effectif Qualifiante (<?php echo $Effectif_Qualifiante_SYSPAS;  ?>)</th>
                     <th >Effectif Qualifiante (<?php echo $Effectif_Qualifiante_ERSYS;  ?>)</th>
                  </tr>
                    
                   <tr>
                    <td><?php echo $Filiere_Qualifiante_SYSPAS ;  ?></td>
                     <td><?php echo $Filiere_Qualifiante_ERSYS ;  ?></td>
                  </tr>                      
                    
                    <!--Fin Effectifs-->    
    
                </table>
            </div>                
        </div>  
              
  
              
<!--ETAPE SALLE -->              
         <div class="info" id="etape_salles">
            <h3 class="btn-etape2">Salles - Tables - Ordinateurs</h3>
            <div class="table-responsive">  

                <table  border="0" class="table table-light table-striped mt-3">
   
                <!-- Salles-->    
                 <tr>
                    <th colspan="3" class="text-center table-success">SALLES - TABLES BANCS - ORDINATEURS</th>
                  </tr>

                <tr >
                    <th>Salle de classe</th>
                    <td class="text-center" colspan="2"><?php echo $Nbre_Salle_Classe; ?></td>
                  </tr>    

                 <tr>
                    <th>Tables - Bancs</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Table_Banc; ?></td>
                  </tr>

                 <tr>
                    <th>Salle Multim&eacute;dia</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Salle_Multimedia; ?></td>
                  </tr>

                 <tr>
                    <th>Salle Informatique</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Salle_Info; ?></td>
                  </tr>

                 <tr>
                    <th>Nombre d'ordinateurs</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Ordinateur; ?></td>
                  </tr>

                 <tr>
                    <th>Salle des profs.</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Salle_Prof; ?></td>
                  </tr>

                 <tr>
                    <th>Biblioth&egrave;que</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Biblio; ?></td>
                  </tr>

                 <tr>
                    <th>Laboratoire</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Labo; ?></td>
                  </tr>    

                 <tr>
                    <th>Atelier</th>
                    <td colspan="2" class="text-center"><?php echo $Nbre_Atelier; ?></td>
                  </tr>    

                 <tr>
                    <th colspan="3" class="text-center table-success">PARTENARIATS</th>
                  </tr><!-- Fin Salle-->

                <!-- Partenariats-->    
                  <tr>
                    <th>En relation avec le milieu professionnel</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Relation_Entreprise; ?></td>
                  </tr>

                  <tr>
                    <th>Suivi des apprenants</th>
                    <td colspan="2" class="text-center"><?php echo $row_Liste_Etablissement->Suivi_Apprenant; ?></td>
                  </tr> 

                    <!-- Fin Partenariats-->
    
                </table>
            </div>                
        </div>             
                           
             
 <!--ETAPE Recapitulatif--> 
        <div class="info" id="etape_recapitulatif">
            <h3 class="btn-etape2">R&eacute;capitulatif</h3> 
                <table  border="0" class="table table-light table-striped mt-3 text-center">
    
                <!-- Infos Generales-->    
                  <tr>
                    <th colspan="4" class="text-center table-danger">RECAPITULATIF</th>
                  </tr>

                  <tr class="text-start">
                    <th class="text-start">Contacts</th>
                    <td><?php echo $row_Liste_Etablissement->Contact_DE1;  ?></td>                   
                    <td><?php echo $row_Liste_Etablissement->Contact_Fondateur; ?></td>
                    <td><?php echo $row_Liste_Etablissement->Contact_DE1;  ?></td>
                  </tr>

                  <tr class="text-start">
                    <th class="text-start">Statut / Agr&eacute;ment</th>
                    <td><?php echo $row_Liste_Etablissement->Statut_Etablissement;  ?></td>
                      <td colspan="2">
                        <?php 
                            $Ordre = $row_Liste_Etablissement->Ordre_Formation;
                            if ($Ordre==$Technique) {echo "Technique";}
                            else if ($Ordre==$Professionnel) {echo "Professionnel";}
                              else if ($Ordre==$Tech_Prof) {echo "Technique et Professionnel" ;}
                              else   {echo "Erreur";}
                        ?>                        
                      </td>
                      
                  </tr>  
                    
                  <tr class="text-start">
                    <th>Capacit&eacute; accueil / Situation</th>
                    <td class="text-center"><?php echo $row_Liste_Etablissement->Capacite_Accueil;  ?></td>
                    <td colspan="2"><?php echo $row_Liste_Etablissement->Situation_Etablissement;  ?></td>
                  </tr>                     

                  <tr>
                    <th class="text-start">Electricit&eacute; / Eau potable / Latrines</th>
                    <td ><?php yes_or_no ($row_Liste_Etablissement->Electricite) ; ?> </td>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Eau_Potable); ?></td>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Latrine);  ?></td>
                  </tr>    

                  <tr>
                    <th class="text-start">Espace de sport / Infirmerie / Cantine</th>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Espace_Sport_Interieur);  ?></td>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Infirmerie_Fonctionnelle);  ?></td>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Cantine_Fonctionnelle);  ?></td>
                  </tr>

                  <tr>
                    <th class="text-start">Cl&ocirc;ture / Rampe d'acc&egrave;s handicap&eacute;s</th>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Cloture);  ?></td>
                    <td><?php yes_or_no ($row_Liste_Etablissement->Rampe);  ?></td>
                    <td></td>
                  </tr>                   
                    
                  <tr>
                    <th class="text-start">Effectif SYSPAS / ERSYS</th>
                    <td><?php echo $Effectif_Total_SYSPAS; ?></td>
                    <td><?php echo $Effectif_Total_ERSYS; ?></td>
                    <td><?php yes_or_no3 ($Effectif_Total_SYSPAS,$Effectif_Total_ERSYS); ?></td>                      
                  </tr>    
                    
                  <tr>
                    <td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Technique SYSPAS / ERSYS</td>
                    <td><?php echo $Effectif_Technique_SYSPAS; ?></td>
                    <td><?php echo $Effectif_Technique_ERSYS; ?></td>
                    <td><?php yes_or_no3 ($Effectif_Technique_SYSPAS,$Effectif_Technique_ERSYS); ?></td>                      
                  </tr>  
                    
                  <tr>
                    <td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Professionnel SYSPAS / ERSYS</td>
                    <td><?php echo $Effectif_Professionnel_SYSPAS; ?></td>
                    <td><?php echo $Effectif_Professionnel_ERSYS; ?></td>
                    <td><?php yes_or_no3 ($Effectif_Professionnel_SYSPAS,$Effectif_Professionnel_ERSYS); ?></td>                      
                  </tr> 
                    
                  <tr>
                    <td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apprentissage SYSPAS / ERSYS</td>
                    <td><?php echo $Effectif_Apprentissage_SYSPAS; ?></td>
                    <td><?php echo $Effectif_Apprentissage_ERSYS; ?></td>
                    <td><?php yes_or_no3 ($Effectif_Apprentissage_SYSPAS,$Effectif_Apprentissage_ERSYS); ?></td>                      
                  </tr> 
                    
                  <tr>
                    <td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qualifiante SYSPAS / ERSYS</td>
                    <td><?php echo $Effectif_Qualifiante_SYSPAS; ?></td>
                    <td><?php echo $Effectif_Qualifiante_ERSYS; ?></td>
                    <td><?php yes_or_no3 ($Effectif_Qualifiante_SYSPAS,$Effectif_Qualifiante_ERSYS); ?></td>                      
                  </tr>                      

                  <tr>
                    <th class="text-start"> Salles classe / Tables bancs</th>
                    <td><?php echo $Nbre_Salle_Classe; ?></td>
                    <td><?php echo $Nbre_Table_Banc;  ?></td>
                    <td></td>                      
                  </tr>    
                    
                  <tr>
                    <th class="text-start">Salle Info. / Nbre Ordinateurs</th>
                    <td><?php echo $Nbre_Salle_Info; ?></td>
                    <td><?php echo $Nbre_Ordinateur; ?></td>
                    <td></td>                      
                  </tr>
                    
                  <tr>
                    <form action="<?php echo $Page_Precedente; ?>" method="post">
                    <th colspan="1" class="text-end">
                        
                        <input type="hidden" name="Hidden_Code_Validation" value="<?php echo $CodeEtb; ?>">
                        <button name="Annuler" type="submit" value="Annuler" class="btn btn-primary " onclick="javascript:history.go(-1)">Annuler</button>
                    </th>
                    <th colspan="2" class="text-center">    
                        <button name="btn_validation" type="submit" value="Valider" class="btn btn-success " >Valider</button>
                    </th>
                    <th colspan="1" class="text-center">
                        <button name="Rejeter" type="submit" value="Rejeter" class="btn btn-danger " onclick="javascript:history.go(-1)">Rejeter</button>             
                     </th>   
                    
                    </form>    
                  </tr>                    
                    <!-- Fin Infos Generales-->
   
                </table>            
        </div> <!--Fin Recapitulatif-->                   

              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              

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
            $("#etape_infos_gnles").hide();
            $("#etape_effectifs_syspas").hide();
            $("#etape_effectifs_ersys").hide();
            $("#etape_salles").hide();
            $("#etape_recapitulatif").hide();
        
                       
            
        }
        
        

                   
        

    
        

        

        
//---------------BOUTONS DES ETAPES-----------//
//---------------BOUTONS DES ETAPES-----------//
        
            CacherBouttons();
            
        
        
        $("#bt_infos_gnles").click(function(){
            
            CacherBouttons();
            $("#etape_infos_gnles").show();
            
        });
        
        $("#bt_effectifs_syspas").click(function(){
            CacherBouttons();
            $("#etape_effectifs_syspas").show();   
        });
            
        $("#bt_effectifs_ersys").click(function(){
            CacherBouttons();
            $("#etape_effectifs_ersys").show();
        }); 
          
        $("#bt_salles").click(function(){
            CacherBouttons();
            $("#etape_salles").show();
        });        
              
        $("#bt_recapitulatif").click(function(){
            CacherBouttons();
            $("#etape_recapitulatif").show();
             
            
        });
        
        
//-----------RECUPERER PARAMETRES URL-----------
   let searchParams = new URLSearchParams(window.location.search)
searchParams.has('etape') 
let etape = searchParams.get('etape')
//alert(etape);        
      
             if ( etape === 'infos_gnles') { 
                CacherBouttons();
                 $("#etape_infos_gnles").show();
                
            }else {
        
                  if ( etape === 'effectifs_syspas') { 
                    CacherBouttons();
                     $("#etape_effectifs_syspas").show();

                    }
                    else{
                         if ( etape === 'effectifs_ersys') { 
                            CacherBouttons();
                            $("#etape_effectifs_ersys").show();

                        }
                        else{
                            if ( etape === 'salles') { 
                                CacherBouttons();
                                $("#etape_salle").show();

                            }
                            else{
                                if ( etape === 'recapitulatif') { 
                                    CacherBouttons();
                                    $("#etape_recapitulatif").show();

                                }
                                else{
                                     CacherBouttons();
                                    $("#etape_infos_gnles").show();                               
                                   
                                }
                            }
                        }

                    }
                
            }
        
        
        
        
        
        
       
        
    });
           
           
    
    </script> 

</body>

</html>