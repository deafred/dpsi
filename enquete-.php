<?php require_once('maj_files/config.php'); ?>

<?php
session_start ();
//Chargement des Listes deroulantes
$query_Liste_Filiere = "SELECT * FROM filiere order by Nom_Filiere";
    $Liste_Filiere   =   $idcom->query($query_Liste_Filiere);


//
//$query_Liste_Diplome         = "SELECT * FROM diplome";
//    $Liste_Diplome           =   $idcom->query($query_Liste_Diplome);
//    $Liste_DiplomeBis        =   $idcom->query($query_Liste_Diplome);
////    $row_Liste_Diplome       =   $Liste_Diplome->fetchObject();
//    $totalRows_Liste_Diplome =   $Liste_Diplome->rowCount();




//$query_Liste_Annee = "SELECT * FROM annee_etude";
//    $Liste_Annee           =   $idcom->query($query_Liste_Annee);
//    $Liste_AnneeBis        =   $idcom->query($query_Liste_Annee);
////    $row_Liste_Annee       =   $Liste_Annee->fetchObject();
//    $totalRows_Liste_Annee =   $Liste_Annee->rowCount();



$Password='';
if (isset($_SESSION['MM_Username']) && isset($_SESSION['MM_Usercode'])) {
    $Password   =   $_SESSION['MM_Usercode'];
}

$query_Liste_Mobilier = "SELECT * FROM Mobilier where Code_dspss_M='$Password' order by Etat_Mobilier ";

    $Liste_Mobilier          = $idcom->query($query_Liste_Mobilier);
    $totalRows_Liste_Mobilier=$Liste_Mobilier->rowCount();

$query_Liste_Infrastructure = "SELECT * FROM Immobilier where Code_dspss_I='$Password'  ";

    $Liste_Infrastructure           =   $idcom->query($query_Liste_Infrastructure);
    $totalRows_Liste_Infrastructure =   $Liste_Infrastructure->rowCount();

$query_Liste_Recap = "SELECT * FROM eleves_filiere where Code_dspss_R='$Password'  ORDER BY Diplome,Annee_Etude,Filiere ";

    $Liste_Recap                    =   $idcom->query($query_Liste_Recap);
    $totalRows_Liste_Recap          =   $Liste_Recap->rowCount();

$query_Liste_Demande = "SELECT * FROM Demande where Code_dspss_D='$Password'  ORDER BY Diplome_Demande,Filiere_Demande ";

    $Liste_Demande                  =   $idcom->query($query_Liste_Demande);
    $totalRows_Liste_Demande        =   $Liste_Demande->rowCount();


$query_Liste_Suivi = "SELECT * FROM Suivi where Code_dspss_S='$Password'  ORDER BY Diplome_Suivi,Filiere_Suivi ";

    $Liste_Suivi                  =   $idcom->query($query_Liste_Suivi);
    $totalRows_Liste_Suivi        =   $Liste_Suivi->rowCount();
?>

<?php
// On d&eacute;marre la session (ceci est indispensable dans toutes les pages de notre section membre

// On r&eacute;cup&egrave;re nos variables de session
if (isset($_SESSION['MM_Username']) && isset($_SESSION['MM_Usercode'])) {
    $NomEtb     =   $_SESSION['MM_Username'];
    $Password   =   $_SESSION['MM_Usercode'];
    $query_ListeEtb = "SELECT * FROM ETABLISSEMENT WHERE Nom_Etablissement='".addslashes($NomEtb)."' AND Code_dspss1='".addslashes($Password)."'";
    
    $ListeEtb             =   $idcom->query($query_ListeEtb);
    $row_ListeEtb         =   $ListeEtb->fetchObject();
    $totalRows_ListeEtb  =   $ListeEtb->rowCount();
        
 
    
        if ($totalRows_ListeEtb){
//                mysql_data_seek($ListeEcole,0);
//                $row_ListeEtb = mysql_fetch_assoc($ListeEcole);   
//            echo $row_ListeEtb->Nom_Etablissement; 
        }else{
            
            echo("La requ&ecirc;te n'a pas retourn&eacute;e de ligne!!!");
            header("Location: ". 'connexion.php' );//****** redirig&eacute;e vers une page erreur
        }

     
}else{

    header("Location: ". 'connexion.php' );
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
                    <h4>
                       
             <?php 
            $Status =   0;
            //$Total  =   8;
            $Etape_Restante  =   '';
 
    if ($row_ListeEtb->Situation_Etablissement == FCT) {
                if ($row_ListeEtb->Etape_Identification==1) {$Status++;} else{$Etape_Restante = "1.Identification  ";}
        
                if ($row_ListeEtb->Etape_Infrastructures==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "2.Infrastructures  ";}
        
                if ($row_ListeEtb->Etape_Commodites==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "3.Commodites  ";}
        
                if ($row_ListeEtb->Etape_Personnel==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "4.Personnel  ";}
        
                if ($row_ListeEtb->Etape_Vulnerabilites==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "5.Vulnerabilites  ";}
        
                if ($row_ListeEtb->Etape_Partenariats==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "6.Partenariats  ";}
        
                if ($row_ListeEtb->Etape_Eleves_Filiere==1) {$Status++;} else {$Etape_Restante = $Etape_Restante. "7.Eleves_Filiere  ";}
        
                if ($row_ListeEtb->Etape_Immobiliers==0) {$Etape_Restante = $Etape_Restante. "8.1Equipements  ";} 
                if ($row_ListeEtb->Etape_Mobiliers==0) {$Etape_Restante = $Etape_Restante. "8.2Equipements  ";}
                if ($row_ListeEtb->Etape_Immobiliers==1 && $row_ListeEtb->Etape_Mobiliers==1) {$Status++;}
        
                if ($row_ListeEtb->Etape_Suivi==1) {$Status++;} else {$Etape_Restante = $Etape_Restante. "9.Etape_Suivi  ";}
        
                if ($row_ListeEtb->Etape_Demande==1) {$Status++;} else {$Etape_Restante = $Etape_Restante. "10.Etape_Demande ";}
        
                $Total = NOMBRE_ETAPE;
        }

    if ($row_ListeEtb->Situation_Etablissement == NON_FCT) {
                if ($row_ListeEtb->Etape_Identification==1) {$Status++;} else{$Etape_Restante = "1.Identification  ";}
        
                if ($row_ListeEtb->Etape_Infrastructures==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "2.Infrastructures  ";}


                if ($row_ListeEtb->Etape_Immobiliers==0) {$Etape_Restante = $Etape_Restante. "8.1Equipements  ";} 
                if ($row_ListeEtb->Etape_Mobiliers==0) {$Etape_Restante = $Etape_Restante. "8.2Equipements  ";}
                if ($row_ListeEtb->Etape_Immobiliers==1 && $row_ListeEtb->Etape_Mobiliers==1) {$Status++;}    

                if ($row_ListeEtb->Etape_Suivi==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "9.Suivi  ";}
        
                if ($row_ListeEtb->Etape_Demande==1) {$Status++;} else{$Etape_Restante = $Etape_Restante. "10.Demande  ";}
        

            $Total = NOMBRE_ETAPE_NFCT;
        }
            ?>                       
                        
                          
                        
                        Taux de reussite (<?php if ($row_ListeEtb->Situation_Etablissement==NON_FCT){echo  $Status."/".NOMBRE_ETAPE_NFCT;}else{echo  $Status."/".NOMBRE_ETAPE;} ?>)
                    </h4>
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_identification"  name="bt_identification">1. Identification&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right" ></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_infrastructures" name="bt_infrastructures">2. Infrastructures&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right" ></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_commodites"  name="bt_commodites">3. Commodit&eacute;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right" ></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_personnel" name="bt_personnel">4. Personnel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>                    
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_vulnerabilites" name="bt_vulnerabilites">5. Pertubations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_partenariats" name="bt_partenariats">6. Partenariats&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_eleves_filiere" name="bt_eleves_filiere">7. El&egrave;ves / Fili&egrave;re&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_equipements" name="bt_equipements">8. Equipements&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    


                    <div> <a href="#debut"><button type="button" class="btn btn-etape1 btn-taille" id="bt_suivi" name="bt_suivi">9. Suivi diplom&eacute;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape2 btn-taille" id="bt_demande" name="bt_demande">10.Demande /Fili&egrave;re<i class="bi bi-caret-right"></i></button></a>
                    </div>
                    
                    <div> <a href="#debut"><button type="button" class="btn btn-etape10 btn-taille" id="bt_demande" name="bt_demande">R&eacute;cap. des &eacute;tapes&nbsp;&nbsp;&nbsp;<i class="bi bi-caret-right"></i></button></a>
                    </div>                    

               </div> 
            </div>
          </div>
          
          
          
          <div class="col-lg-9" data-aos="" data-aos-delay="100" id="debut">
              <div id="lycee"><h2><?php if (isset($_SESSION['MM_Username']) ) {echo $_SESSION['MM_Username'] ;} ?><a href="param.php"> <i class="bi bi-wrench"></i></a></h2></div>
              
<!--ETAPE Identification-->
              <div class="info" id="etape_identification">
              
              <h3 class="btn-etape1">Etape1 : Identification</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_identification.php" method="post" role="form" class="mt-4 form-control">
<!--Ordre Formation-->   
             <div class="etiquette mt-3">Ordre de formation</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Enseignement" id="T" value="T" <?php if  (strtolower($row_ListeEtb->Ordre_Formation)=="t"){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="T">Ens. Technique</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Enseignement" id="P" value="P" <?php if  (strtolower($row_ListeEtb->Ordre_Formation)=="p"){echo 'Checked';} ?>>
                    <label class="form-check-label" for="P">Ens. Professionnel</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Enseignement" id="TP" value="TP" <?php if  (strtolower($row_ListeEtb->Ordre_Formation)=="tp"){echo 'Checked';} ?>>
                    <label class="form-check-label" for="TP">Ens. Prof. et Tech.</label>
                </div>
                
<!--Localisation Administrative--> 
              <div class="row">
                <div class="etiquette mt-3">Localisation Administrative</div>
                <div class="col-md-4 form-group">
                    <div>*R&eacute;gion</div>
                  <input type="text" name="Region" class="form-control" id="Region" placeholder="Lagunes" required readonly value="<?php echo $row_ListeEtb->Region; ?>">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <div>*D&eacute;partement</div>
                  <input type="text" class="form-control" name="Departement" id="Departement" placeholder="Abidjan" required readonly value="<?php echo $row_ListeEtb->Departement; ?>">
                </div>
                <div class="col-md-4 form-group">
                  <div>*Sous-Pr&eacute;fecture</div>
                  <input type="text" name="SP" class="form-control" id="SP" placeholder="Abidjan" required readonly value="<?php echo $row_ListeEtb->Sous_Prefecture; ?>">
                </div>
              </div>                


                 
              <div class="row">
                <div class="col-md-4 form-group">
                  <div>*Commune</div>
                  <input type="text" name="Commune" class="form-control majuscule" id="Commune" placeholder="Marcory" required readonly value="<?php echo $row_ListeEtb->Commune; ?>">
                </div>
                <div class="col-md-4 form-group">
                    <div>*Quartier</div>
                  <input type="text" class="form-control" name="Quartier" id="Quartier" placeholder="Remblais" required value="<?php echo $row_ListeEtb->Quartier; ?>">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <div>*Localisation</div>
                  <input type="text" class="form-control" name="Localisation" id="Localisation" placeholder="En face de..." required value="<?php echo $row_ListeEtb->Localisation; ?>">
                </div>                  
              </div> 
               
                
<!--Localisation P&eacute;dagogique-->
              <div class="row">
                <div class="etiquette mt-3">Localisation P&eacute;dagogique</div>
                <div class="col-md-6 form-group">
                    <div>*Dir.R&eacute;gionnale</div>
                  <input type="text" name="Dir_Region" class="form-control" id="Dir_Region" placeholder="Lagunes" required readonly value="<?php echo $row_ListeEtb->Direction_Regionale; ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <div>*Dir.D&eacute;partementale</div>
                  <input type="text" class="form-control" name="Dir_Depart" id="Dir_Depart" placeholder="Abidjan" required readonly value="<?php echo $row_ListeEtb->Direction_Departementale; ?>">
                </div>
              </div>                 
               
<!--Milieu-->
             <div class="etiquette mt-3">Milieu</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Milieu" id="Milieu1" value="Urbain" required <?php if  (strtolower($row_ListeEtb->Milieu)=="urbain"){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Milieu1">Urbain</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Milieu" id="Milieu2" value="Rural" <?php if  (strtolower($row_ListeEtb->Milieu)=="rural"){echo 'Checked';} ?> >
                    <label class="form-check-label" for="Milieu2">Rural</label>
                </div>                       
                
              
                <!--Statut de l'Etablissement-->
            <div id="et-statut-etablissement">    
             <div class="etiquette mt-3">Statut de l'Etablissement<input name="Hidden_Statut" type="hidden" value="<?php echo $row_ListeEtb->Statut_Etablissement ?>" id="Hidden_Statut"></div>
                
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Statut_Etablissement" id="PSC" value="Priv&eacute; sans cabinet" <?php if (utf8_encode($row_ListeEtb->Statut_Etablissement)=='Privé sans cabinet'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="PSC">Priv&eacute; sans cabinet de formation</label>
                </div>
    
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Statut_Etablissement" id="PAC" value="Priv&eacute; avec cabinet" <?php if (utf8_encode($row_ListeEtb->Statut_Etablissement)== 'Privé avec cabinet'){echo 'Checked';} ?> >
                    <label class="form-check-label" for="PAC">Priv&eacute; avec cabinet de formation</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Statut_Etablissement" id="Cabinet" value="Cabinet" <?php if ($row_ListeEtb->Statut_Etablissement=='Cabinet'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cabinet">Cabinet de formation</label>
                </div>
                </div>
                
                <!--Cr&eacute;ation Etablissement-->
              <div class="row">
                <div class="etiquette mt-3">Cr&eacute;ation Etablissement</div>
                <div class="col-md-4 form-group">
                    <div>*Num. Cr&eacute;at. Physiq.</div>
                  <input type="text" name="Num_Auto_Crea" class="form-control" id="Num_Auto_Crea"  required value="<?php echo $row_ListeEtb->Num_Autorisation_Creation; ?>">
                </div>
                <div class="col-md-4 form-group">
                    <div>Date auto. Cr&eacute;at.</div>
                  <input type="date" class="form-control" name="Date_Auto_Crea" id="Date_Auto_Crea" value="<?php echo $row_ListeEtb->Date_Autorisation_Creation; ?>">
                </div>
                <div class="col-md-4 form-group">
                    <div>Date Cr&eacute;at. Physiq.</div>
                  <input type="date" class="form-control" name="Date_Crea_Phys" id="Date_Crea_Phys"  value="<?php echo $row_ListeEtb->Date_Crea_Phys; ?>">
                </div>
              </div> 

                
                <!--Ouverture Etablissement-->
               <div class="row">
                <div class="etiquette mt-3">Ouverture Etablissement</div>
                <div class="col-md-4 form-group">
                    <div>Num. Ouv. Physiq.*</div>
                  <input type="text" name="Num_Ouv_Crea" class="form-control" id="Num_Ouv_Crea"  required value="<?php echo $row_ListeEtb->Num_Autorisation_Ouverture; ?>">
                </div>
                <div class="col-md-4 form-group">
                    <div>Date auto. Ouv.</div>
                  <input type="date" class="form-control" name="Date_Aut_Ouv" id="Date_Aut_Ouv"  value="<?php echo $row_ListeEtb->Date_Autorisation_Ouverture; ?>">
                </div>
                <div class="col-md-4 form-group">
                    <div>Date Ouv. Physiq.</div>
                  <input type="date" class="form-control" name="Date_Ouv_Phys" id="Date_Ouv_Phys"  value="<?php echo $row_ListeEtb->Date_Ouv_Phys; ?>">
                </div>
              </div>               
                
                <!--Situation Etablissement-->
              <div class="etiquette mt-3">Situation de l'&eacute;tablissement ann&eacute;e<?php echo ANNEE_SCO ; ?></div>
                <div class="form-check  form-group">
                    <input class="form-check-input" type="radio" name="Situation_Etablissement" id="Fonctionnel" value="Fonctionnel" <?php if ($row_ListeEtb->Situation_Etablissement=='Fonctionnel'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Fonctionnel">Avec des apprenants du technique ou professionnel</label>
                </div>
                 <div class="form-check ">
                    <input class="form-check-input" type="radio" name="Situation_Etablissement" id="Non-Fonctionnel" value="Non Fonctionnel" <?php if ($row_ListeEtb->Situation_Etablissement=='Non Fonctionnel'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Non-Fonctionnel"> Sans apprenants du technique ou professionnel</label>
                     <input type="text" value="<?php echo $row_ListeEtb->Situation_Etablissement; ?>" name="Hidden_Situation">
                </div>
 
                
                <!--Contacts Etablissement-->
              <div class="row mt-3" >
                  <div class="etiquette">Contacts Etablissement</div>
                <div class="col-md-3 form-group">
                  <div>*T&eacute;l. 1</div>
                  <input type="text" name="Tel1" class="form-control" id="Tel1" placeholder="00 00 00 00 00" required value="<?php echo $row_ListeEtb->Tel1_Etablissement; ?>" pattern="[0-9 ]{14}">
                </div>
                <div class="col-md-3 form-group">
                  <div>T&eacute;l. 2</div>
                  <input type="text" name="Tel2" class="form-control" id="Tel2" placeholder="00 00 00 00 00" value="<?php echo $row_ListeEtb->Tel2_Etablissement; ?>" pattern="[0-9 ]{14}">
                </div>
                <div class="col-md-3 form-group mt-3 mt-md-0">
                    <div>Boite Postal</div>
                  <input type="text" class="form-control" name="BP" id="BP" placeholder="Bp" value="<?php echo $row_ListeEtb->BP_etablissement; ?>">
                </div>
                <div class="col-md-3 form-group mt-3 mt-md-0">
                    <div>*E-mail</div>
                  <input type="text" class="form-control" name="Email" id="Email" placeholder="email" required value="<?php echo $row_ListeEtb->Email_etablissement; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                </div>
              </div> 
                
               
                <!--Administratifs-->
                <div class="etiquette mt-3">Administratifs</div>
              <div class="row" id="et-fondateur">  
                <div class="col-md-6 form-group">
                    <div>*Nom Fondateur</div>
                  <input type="text" name="Nom_Fond" class="form-control" id="Nom_Fond" placeholder="Nom" required value="<?php echo htmlentities($row_ListeEtb->Nom_Fondateur); ?>">
                </div>
                <div class="col-md-6 form-group mt-6 mt-md-0">
                    <div>*Contact Fondateur</div>
                  <input type="text" class="form-control" name="Contact_Fond" id="Contact_Fond" placeholder="00 00 00 00 00" required value="<?php echo $row_ListeEtb->Contact_Fondateur; ?>" pattern="[0-9 ]{14}">
                </div>    
              </div>

              <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <div>*Chef Etablissement</div>
                  <input type="text" name="Nom_Chef_Ecole" class="form-control" id="Nom_Chef_Ecole" placeholder="Nom" required value="<?php echo htmlentities($row_ListeEtb->Nom_Chef_Ecole); ?>">
                </div>
                <div class="col-md-6 form-group mt-6 mt-md-0">
                    <div>*Contact Chef Etabl.</div>
                  <input type="text" class="form-control" name="Contact_Chef_Ecole" id="Contact_Chef_Ecole" placeholder="00 00 00 00 00" required value="<?php echo $row_ListeEtb->Contact_Chef_Ecole; ?>" pattern="[0-9 ]{14}">
                </div>
              </div>                
                
               <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <div>*Nom Censeur ou D.E (1)</div>
                  <input type="text" name="Nom_DE1" class="form-control" id="Nom_DE1" placeholder="Nom" required value="<?php echo htmlentities($row_ListeEtb->Nom_DE1); ?>">
                </div>
                <div class="col-md-6 form-group mt-6 mt-md-0">
                    <div>Contact Censeur ou DE (1)*</div>
                  <input type="text" class="form-control" name="Contact_DE1" id="Contact_DE1" placeholder="00 00 00 00 00" required value="<?php echo $row_ListeEtb->Contact_DE1; ?>" pattern="[0-9 ]{14}">
                </div>
              </div>               
                
                <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <div>Nom Censeur ou D.E (2)</div>
                  <input type="text" name="Nom_DE2" class="form-control" id="Nom_DE2" placeholder="Nom" value="<?php echo htmlentities($row_ListeEtb->Nom_DE2); ?>">
                </div>
                <div class="col-md-6 form-group mt-6 mt-md-0">
                    <div>Contact Censeur ou DE (2)</div>
                  <input type="text" class="form-control" name="Contact_DE2" id="Contact_DE2" placeholder="00 00 00 00 00" value="<?php echo $row_ListeEtb->Contact_DE2; ?>" pattern="[0-9 ]{14}">
                </div>
              </div>                
                
              <div class="my-3">
                  <div class="bdresponse" id="bdresponse" style="text-align: center; background-color: aquamarine;"></div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center "><button type="submit" name="M1" id="bt_etape1" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape1-->
    
              
              
              
              
              
<!--ETAPE Infrastructures --> 
              <div class="info" id="etape_infrastructures">
              <h3 class="btn-etape2">Etape2 : Infrastructures</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_infrastructures.php" method="post" role="form" class="mt-4 form-control">


<!--Titre foncier-->
             <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'un titre foncier ou d'un arr&ecirc;t&eacute; de concession d&eacute;finitive (ACD) ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Titre_Foncier" id="Titre_Foncier1" value="Oui" required <?php if (strtolower($row_ListeEtb->Titre_Foncier)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Titre_Foncier1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Titre_Foncier" id="Titre_Foncier2" value="Non"  <?php if (strtolower($row_ListeEtb->Titre_Foncier)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Titre_Foncier2">Non</label>
                </div>                
                
<!--Litige Foncier-->
             <div class="etiquette mt-3">L'&eacute;tablissement fait-il l'objet d'un litige foncier ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Litige_Foncier" id="Litige_Foncier1" value="Oui" required <?php if (strtolower($row_ListeEtb->Litige_Foncier)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Litige_Foncier1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Litige_Foncier" id="Lit_Foncier2" value="Non"  <?php if (strtolower($row_ListeEtb->Litige_Foncier)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Lit_Foncier2">Non</label>
                </div>
 
                
<!--Capacité Accueil-->
                <div class="row">
             <div class="etiquette mt-3">Capacit&eacute; d'accueil (&eacute;l&egrave;ves) de l'&eacute;tablissement </div>                    
                <div class="col-md-6 form-group">
                    <input class="form-control" type="number" name="Capacite_Accueil" id="Capacite_Accueil"  required value="<?php echo $row_ListeEtb->Capacite_Accueil ?>">                  
                </div>
                </div>    

                
                
<!--Electricite-->
             <div class="etiquette mt-3">L'&eacute;tablissement est-il aliment&eacute; en &eacute;lectricit&eacute;?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Electricite" id="Electricite1" value="Oui" required <?php if (strtolower($row_ListeEtb->Electricite)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Electricite1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Electricite" id="Electricite2" value="Non" <?php if (strtolower($row_ListeEtb->Electricite)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Electricite2">Non</label>
                </div>                
                
  
                
<!--Eau-->
                 <div class="etiquette mt-3">L'&eacute;tablissement est-il aliment&eacute; en eau potable?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Eau_Potable" id="Eau_Potable1" value="Oui" required <?php if (strtolower($row_ListeEtb->Eau_Potable)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Eau_Potable1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Eau_Potable" id="Eau_Potable2" value="Non" <?php if (strtolower($row_ListeEtb->Eau_Potable)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Eau_Potable2">Non</label>
                </div>                       
                <div class="row mt-3" id="et-eau">
                <div class="col-md-8 form-group">
                        Si oui, pr&eacute;ciser le nombre de points d'eau potable en dehors des latrines.
                </div>
                <div class="col-md-4 form-group">
                        <input type="number" name="Nbre_Eau_Potable" class="form-control" id="Nbre_Eau_Potable" placeholder="Nombre" value="<?php echo $row_ListeEtb->Nbre_Eau_Potable; ?>">
                </div>
              </div>
                
        
<!--Sport-->
                 <div class="etiquette mt-3">L'&eacute;tablissement dispose t-il d'un espace de sport?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Espace_Sport" id="Espace_Sport1" value="Oui" required <?php if (strtolower($row_ListeEtb->Espace_Sport)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Espace_Sport1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Espace_Sport" id="Espace_Sport2" value="Non" <?php if (strtolower($row_ListeEtb->Espace_Sport)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Espace_Sport2">Non</label>
                </div>                       
                <div class="row mt-3" id="et-sport">
                <div class="col-md-8 form-group">
                        Si oui, est-il &agrave; l'int&eacute;rieur de l'&eacute;tablissement ?
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Espace_Sport_Interieur" id="Espace_Sport_Interieur1" value="Oui"  <?php if (strtolower($row_ListeEtb->Espace_Sport_Interieur)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Espace_Sport_Interieur1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Espace_Sport_Interieur" id="Espace_Sport_Interieur2" value="Non" <?php if (strtolower($row_ListeEtb->Espace_Sport_Interieur)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Espace_Sport_Interieur2">Non</label>
                    </div>   
                </div>
              </div>                
                
  
                
<!--Cantine-->
                  <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une cantine ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cantine" id="Cantine1" value="Oui" required <?php if (strtolower($row_ListeEtb->Cantine)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cantine1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cantine" id="Cantine2" value="Non" <?php if (strtolower($row_ListeEtb->Cantine)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cantine2">Non</label>
                </div>
                <div id="et-cantine">
                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-elle fonctionnelle ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Cantine_Fonctionnelle" id="Cantine_Fonctionnelle1" value="Oui"  <?php if (strtolower($row_ListeEtb->Cantine_Fonctionnelle)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Cantine_Fonctionnelle1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Cantine_Fonctionnelle" id="Cantine_Fonctionnelle2" value="Non" <?php if (strtolower($row_ListeEtb->Cantine_Fonctionnelle)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Cantine_Fonctionnelle2">Non</label>
                        </div>   
                    </div>
                  </div>
                <div id="et-cantine-fct">
                  <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si elle est fonctionnelle, la gestion est-elle assur&eacute;e par l'&eacute;tablissement ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Cantine_Gest_Etabl" id="Cantine_Gest_Etabl1" value="Oui" <?php if (strtolower($row_ListeEtb->Cantine_Gest_Etabl)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Cantine_Gest_Etabl1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Cantine_Gest_Etabl" id="Cantine_Gest_Etabl2" value="Non" <?php if (strtolower($row_ListeEtb->Cantine_Gest_Etabl)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Cantine_Gest_Etabl2">Non</label>
                        </div>   
                    </div>
                  </div>
                
                   <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si elle est fonctionnelle, combien de jours d'ouverture dans la semaine ?
                    </div>
                    <div class="col-md-4 form-group">
                             <input type="number" name="Cantine_Jour_Ouv" class="form-control" id="Cantine_Jour_Ouv" placeholder="Nombre"  value="<?php echo $row_ListeEtb->Cantine_Jour_Ouv; ?>">  
                    </div>
                  </div>
               </div>    
            </div>   
                
<!--Cloture-->
                   <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une cl&ocirc;ture ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cloture" id="Cloture1" value="Oui" required <?php if (strtolower($row_ListeEtb->Cloture)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cloture1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cloture" id="Cloture2" value="Non" <?php if (strtolower($row_ListeEtb->Cloture)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cloture2">Non</label>
                </div>                       
                <div class="row mt-3" id="et-cloture">
                <div class="col-md-6 form-group">
                        Si oui, donnez l'&eacute;tat de la cl&ocirc;ture:
                </div>
                <div class="col-md-6 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Etat_Cloture" id="Etat_Cloture1" value="Bon"  <?php if (strtolower($row_ListeEtb->Etat_Cloture)=='bon'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Etat_Cloture1">Bon</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Etat_Cloture" id="Etat_Cloture2" value="Acceptable" <?php if (strtolower($row_ListeEtb->Etat_Cloture)=='acceptable'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Etat_Cloture2">Acceptable</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Etat_Cloture" id="Etat_Cloture3" value="Mauvais" <?php if (strtolower($row_ListeEtb->Etat_Cloture)=='mauvais'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Etat_Cloture3">Mauvais</label>
                    </div>                    
                </div>
              </div>                 
                
                
<!--Infirmerie-->
                   <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une infirmerie ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Infirmerie" id="Infirmerie1" value="Oui" <?php if (strtolower($row_ListeEtb->Infirmerie)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Infirmerie1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Infirmerie" id="Infirmerie2" value="Non" <?php if (strtolower($row_ListeEtb->Infirmerie)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Infirmerie2">Non</label>
                </div>                       
                <div class="row mt-3" id="et-infirmerie">
                <div class="col-md-8 form-group">
                        Si oui, est-elle fonctionnelle ?
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Infirmerie_Fonctionnelle" id="Infirmerie_Fonctionnelle1" value="Oui"  <?php if (strtolower($row_ListeEtb->Infirmerie_Fonctionnelle)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Infirmerie_Fonctionnelle1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Infirmerie_Fonctionnelle" id="Infirmerie_Fonctionnelle2" value="Non" <?php if (strtolower($row_ListeEtb->Infirmerie_Fonctionnelle)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Infirmerie_Fonctionnelle2">Non</label>
                    </div>                    
                </div>
              </div>                  
                

<!--Pharmacie-->
                   <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une bo&icirc;te &agrave; pharmacie ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Boite_Pharmacie" id="Boite_Pharmacie1" value="Oui" <?php if (strtolower($row_ListeEtb->Boite_Pharmacie)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Boite_Pharmacie1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Boite_Pharmacie" id="Boite_Pharmacie2" value="Non" <?php if (strtolower($row_ListeEtb->Boite_Pharmacie)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Boite_Pharmacie2">Non</label>
                </div>                       
               
                
<!--Salle Prof-->
                   <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une salle des professeurs ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Salle_Prof" id="Salle_Prof1" value="Oui" <?php if (strtolower($row_ListeEtb->Salle_Prof)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Salle_Prof1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Salle_Prof" id="Salle_Prof2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Prof)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Salle_Prof2">Non</label>
                </div>                  
                <!--div class="row mt-3" id="et-salle-prof">
                <div class="col-md-8 form-group">
                        Si oui, quels sont les &eacute;quipements de la salle des professeurs ? 
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="A FAIRE" id="" value="Oui">
                        <label class="form-check-label" for="">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" value="Non">
                        <label class="form-check-label" for="">Non</label>
                    </div>                    
                </div>
                    
                               
                    
              </div-->                
                

<!--Amenagement Rampes-->
                   <div class="etiquette mt-3">L'&eacute;tablissement a-t-il des am&eacute;nagements sp&eacute;cifiques professeurs ? (rampes d'acc&egrave;s par exemple)</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Rampe" id="Rampe1" value="Oui" <?php if (strtolower($row_ListeEtb->Rampe)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Rampe1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Rampe" id="Rampe2" value="Non" <?php if (strtolower($row_ListeEtb->Rampe)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Rampe2">Non</label>
                </div>                
                
                
<!--Internat-->
      
                       <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'un internat ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Internat" id="Internat1" value="Oui" <?php if (strtolower($row_ListeEtb->Internat)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Internat1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Internat" id="Internat2" value="Non" <?php if (strtolower($row_ListeEtb->Internat)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Internat2">Non</label>
                </div>
                <div id="et-internat">
                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-il ouvert aux apprenants cette ann&eacute;e ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Internat_Ouv" id="Internat_Ouv1" value="Oui"  <?php if (strtolower($row_ListeEtb->Internat_Ouv)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Internat_Ouv1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Internat_Ouv" id="Internat_Ouv2" value="Non" <?php if (strtolower($row_ListeEtb->Internat_Ouv)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Internat_Ouv2">Non</label>
                        </div>   
                    </div>
                  </div>                
                  <div class="row mt-3">
                    <div class="col-md-6 form-group">
                            Quel est le type d'internat ?
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Type_Internat" id="Type_Internat1" value="Garcon"  <?php if (strtolower($row_ListeEtb->Type_Internat)=='garcon'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Type_Internat1">Gar&ccedil;on</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Type_Internat" id="Type_Internat2" value="Fille" <?php if (strtolower($row_ListeEtb->Type_Internat)=='fille'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Type_Internat2">Fille</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Type_Internat" id="Type_Internat3" value="Mixte" <?php if (strtolower($row_ListeEtb->Type_Internat)=='mixte'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Type_Internat3">Mixte</label>
                        </div>                    
                    </div>
                  </div>                
                   <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Quel est le nombre de lits disponibles ?
                    </div>
                    <div class="col-md-4 form-group">
                             <input type="number" name="Nbre_Lits" class="form-control" id="Nbre_Lits" placeholder="Nombre"  value="<?php echo $row_ListeEtb->Nbre_Lits; ?>">  
                    </div>
                  </div>            
             </div>   
                
                
<!--Latrines-->
      
                <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il de latrines fonctionnelles ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Latrine" id="Latrine1" value="Oui" <?php if (strtolower($row_ListeEtb->Latrine)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Latrine1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Latrine" id="Latrine2" value="Non" <?php if (strtolower($row_ListeEtb->Latrine)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Latrine2">Non</label>
                </div>
                <div id="et-latrine">
                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui,les latrines filles et garcons sont-elles separ&eacute;es ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Latrine_Separee" id="Latrine_Separee1" value="Oui"  <?php if (strtolower($row_ListeEtb->Latrine_Separee)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Latrine_Separee1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Latrine_Separee" id="Latrine_Separee2" value="Non" <?php if (strtolower($row_ListeEtb->Latrine_Separee)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Latrine_Separee2">Non</label>
                        </div>   
                    </div>
                  </div>                

                  <div class="row mt-3">
                     <div class="col-md-4 form-group">
                      <div>Nbre Latrine Gar&ccedil;on</div>
                      <input type="number" name="Nbre_Latrine_Garcon" class="form-control" id="Nbre_Latrine_Garcon" value="<?php echo $row_ListeEtb->Nbre_Latrine_Garcon; ?>" >
                    </div>                 
                    <div class="col-md-4 form-group">
                      <div>Nbre Latrine Fille</div>
                      <input type="number" name="Nbre_Latrine_Fille" class="form-control" id="Nbre_Latrine_Fille" value="<?php echo $row_ListeEtb->Nbre_Latrine_Fille; ?>" >
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <div>Nbre Latrine Mixte</div>
                      <input type="number" class="form-control" name="Nbre_Latrine_Mixte" id="Nbre_Latrine_Mixte" value="<?php echo $row_ListeEtb->Nbre_Latrine_Mixte; ?>" >
                    </div>
                  </div>
             </div>
                
                
                
<!--Lavage Main-->                
             <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il de dispositif de lavage de main?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Lavage_Main" id="Lavage_Main1" value="Oui" <?php if (strtolower($row_ListeEtb->Lavage_Main)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Lavage_Main1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Lavage_Main" id="Lavage_Main2" value="Non" <?php if (strtolower($row_ListeEtb->Lavage_Main)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Lavage_Main2">Non</label>
                </div>                 
                
                
<!--Internet-->                
             <div class="etiquette mt-3">L'&eacute;tablisement dispose t-il d'une salle informatique ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Salle_Info" id="Salle_Info1" value="Oui" <?php if (strtolower($row_ListeEtb->Salle_Info)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Salle_Info1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Salle_Info" id="Salle_Info2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Info)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Salle_Info2">Non</label>
                </div>             
                
                <div id="et-salle-info">
                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui,la salle est-elle connect&eacute;e &agrave; internet ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Info_Connecte" id="Salle_Info_Connecte1" value="Oui"  <?php if (strtolower($row_ListeEtb->Salle_Info_Connecte)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Info_Connecte1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Info_Connecte" id="Salle_Info_Connecte2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Info_Connecte)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Info_Connecte2">Non</label>
                        </div>   
                    </div>
                  </div>                

                  <div class="row mt-3">
                     <div class="col-md-6 form-group">
                      <div>Nbre de postes disponibles </div>
                      <input type="number" name="Nbre_Ordi" class="form-control" id="Nbre_Ordi"  value="<?php echo $row_ListeEtb->Nbre_Ordi; ?>">
                    </div>                 
                    <div class="col-md-6 form-group">
                      <div>Nbre de postes fonctionnels</div>
                      <input type="number" name="Nbre_Ordi_Fonctionnel" class="form-control" id="Nbre_Ordi_Fonctionnel"  value="<?php echo $row_ListeEtb->Nbre_Ordi_Fonctionnel; ?>" >
                    </div>
                  </div>                

                <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            La salle est-elle accessible aux apprenants ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Eleve" id="Salle_Access_Eleve1" value="Oui"  <?php if (strtolower($row_ListeEtb->Salle_Access_Eleve)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Eleve1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Eleve" id="Salle_Access_Eleve2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Access_Eleve)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Eleve2">Non</label>
                        </div>   
                    </div>
                  </div>                

                <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Est-elle accessible aux scolaris&eacute;s en dehors des heures de cours ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Hors_Cours" id="Salle_Access_Hors_Cours1" value="Oui"  <?php if (strtolower($row_ListeEtb->Salle_Access_Hors_Cours)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Hors_Cours1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Hors_Cours" id="Salle_Access_Hors_Cours2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Access_Hors_Cours)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Hors_Cours2">Non</label>
                        </div>   
                    </div>
                  </div>                

                 <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            La salle est-elle accessible &agrave; tous les enseignants ?
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Prof" id="Salle_Access_Prof1" value="Oui"  <?php if (strtolower($row_ListeEtb->Salle_Access_Prof)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Prof1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Salle_Access_Prof" id="Salle_Access_Prof2" value="Non" <?php if (strtolower($row_ListeEtb->Salle_Access_Prof)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Salle_Access_Prof2">Non</label>
                        </div>   
                    </div>
                  </div>                
            </div>    
 <!--Bibliotheque-->                
             <div class="etiquette mt-3">L'&eacute;tablissement  dispose t-il d'une biblioth&egrave;que ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Bibliotheque" id="Bibliotheque1" value="Oui" <?php if (strtolower($row_ListeEtb->Bibliotheque)=='oui'){echo 'Checked';} ?> required>
                    <label class="form-check-label" for="Bibliotheque1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Bibliotheque" id="Bibliotheque2" value="Non" <?php if (strtolower($row_ListeEtb->Bibliotheque)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Bibliotheque2">Non</label>
                </div>                
                
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="M2" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape2-->
              

              
              
              
 <!--ETAPE Commodit&eacute;s et Services --> 
              <div class="info" id="etape_commodites">
              <h3 class="btn-etape1">Etape3 : Commodit&eacute;s et Services</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_commodites.php" method="post" role="form" class="mt-4 form-control">

<!--Gardiennage-->
             <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'un service de gardiennage ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gardiennage" id="Gardiennage1" value="Oui" required <?php if (strtolower($row_ListeEtb->Gardiennage)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Gardiennage1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gardiennage" id="Gardiennage2" value="Non" <?php if (strtolower($row_ListeEtb->Gardiennage)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Gardiennage2">Non</label>
                </div>                
                
                
        
<!--Commit&eacute; de Gestion -->
             <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'un comit&eacute; de gestion ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Comite_Gestion" id="Comite_Gestion1" value="Oui" required <?php if (strtolower($row_ListeEtb->Comite_Gestion)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Comite_Gestion1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Comite_Gestion" id="Comite_Gestion2" value="Non"  <?php if (strtolower($row_ListeEtb->Comite_Gestion)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Comite_Gestion2">Non</label>
                </div>  
                             
                
<!--Systeme de Gestion-->
              <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'un syst&egrave;me de gestion informatis&eacute; ? </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sys_Gest_Auto" id="Sys_Gest_Auto1" value="Oui" required <?php if (strtolower($row_ListeEtb->Sys_Gest_Auto)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Sys_Gest_Auto1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sys_Gest_Auto" id="Sys_Gest_Auto2" value="Non"  <?php if (strtolower($row_ListeEtb->Sys_Gest_Auto)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Sys_Gest_Auto2">Non</label>
                </div>                                   
                
                
<!--Connexion internet-->
              <div class="etiquette mt-3">L'&eacute;tablissement dispose-t-il d'une connexion internet ? </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Internet" id="Internet1" value="Oui" required <?php if (strtolower($row_ListeEtb->Internet)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Internet1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Internet" id="Internet2" value="Non"  <?php if (strtolower($row_ListeEtb->Internet)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Internet2">Non</label>
                </div>
    
                <div id="et-cnx-internet">
                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-elle accessible aux apprenants ? 
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Eleve" id="Access_Internet_Eleve1" value="Oui" required <?php if (strtolower($row_ListeEtb->Access_Internet_Eleve)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Eleve1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Eleve" id="Access_Internet_Eleve2" value="Non"  <?php if (strtolower($row_ListeEtb->Access_Internet_Eleve)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Eleve2">Non</label>
                        </div>   
                    </div>
                  </div> 


                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-elle accessible aux enseignants ?  
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Prof" id="Access_Internet_Prof1" value="Oui" required <?php if (strtolower($row_ListeEtb->Access_Internet_Prof)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Prof1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Prof" id="Access_Internet_Prof2" value="Non"  <?php if (strtolower($row_ListeEtb->Access_Internet_Prof)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Prof2">Non</label>
                        </div>   
                    </div>
                  </div>                


                    <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-elle accessible au personnel administratif ?  
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Admn" id="Access_Internet_Admn1" value="Oui" required <?php if (strtolower($row_ListeEtb->Access_Internet_Admn)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Admn1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Access_Internet_Admn" id="Access_Internet_Admn2" value="Non"  <?php if (strtolower($row_ListeEtb->Access_Internet_Admn)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Access_Internet_Admn2">Non</label>
                        </div>   
                    </div>
                  </div>                


                     <div class="row mt-3">
                    <div class="col-md-8 form-group">
                            Si oui, est-elle illimit&eacute;e ?  
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Internet_Illimite" id="Internet_Illimite1" value="Oui" required <?php if (strtolower($row_ListeEtb->Internet_Illimite)=='oui'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Internet_Illimite1">Oui</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Internet_Illimite" id="Internet_Illimite2" value="Non"  <?php if (strtolower($row_ListeEtb->Internet_Illimite)=='non'){echo 'Checked';} ?>>
                            <label class="form-check-label" for="Internet_Illimite2">Non</label>
                        </div>   
                    </div>
                  </div>               
             </div>   
                
                
                
<!--Service de maintenance-->
              <div class="etiquette mt-3">L'&eacute;tablissement dispose t-il d'un service de maintenance des &eacute;quipements ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sce_Maintenance" id="Sce_Maintenance1" value="Oui" required <?php if (strtolower($row_ListeEtb->Sce_Maintenance)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Sce_Maintenance1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sce_Maintenance" id="Sce_Maintenance2" value="Non"  <?php if (strtolower($row_ListeEtb->Sce_Maintenance)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Sce_Maintenance2">Non</label>
                </div>                                

             
                            
                
<!--site internet-->
                <div class="etiquette mt-3">L'&eacute;tablissement dispose t-il d'un site internet ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Site_Internet" id="Site_Internet1" value="Oui" required <?php if (strtolower($row_ListeEtb->Site_Internet)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Site_Internet1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Site_Internet" id="Site_Internet2" value="Non" required <?php if (strtolower($row_ListeEtb->Site_Internet)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Site_Internet2">Non</label>
                </div>                                

                
                 <div class="row mt-3" id="et-Nom-Site"> 
                <div class="col-md-4 form-group">
                        Si oui, pr&eacute;cisez le site internet
                </div>
                <div class="col-md-8 form-group">
                        <input type="text" name="Nom_Site" class="form-control" id="Nom_Site" placeholder="WWW...." required value="<?php echo $row_ListeEtb->Nom_Site; ?>">
                </div>
              </div> 
                

<!--activit&eacute;s pour la promotion des TIC-->
                <div class="etiquette mt-3">L'&eacute;tablissement organise t-il des activit&eacute;s pour la promotion des TIC ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="TIC" id="TIC1" value="Oui" required <?php if (strtolower($row_ListeEtb->TIC)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="TIC1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="TIC" id="TIC2" value="Non"  <?php if (strtolower($row_ListeEtb->TIC)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="TIC2">Non</label>
                </div>                                

                <div id="et-list-TIC">
                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                                Si oui, citez les
                        </div>
                        <div class="col-md-6 form-group">
                                <input type="text" name="List_Activites_TIC" class="form-control" id="List_Activites_TIC" required value="<?php echo $row_ListeEtb->List_Activites_TIC; ?>">
                        </div>
                    </div>               

                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                                Si oui, tous les apprenants en beneficient-ils ? 
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Eleve_Benef_Act_TIC" id="Eleve_Benef_Act_TIC1" value="Oui" required <?php if (strtolower($row_ListeEtb->Eleve_Benef_Act_TIC)=='oui'){echo 'Checked';} ?>>
                                <label class="form-check-label" for="Eleve_Benef_Act_TIC1">Oui</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Eleve_Benef_Act_TIC" id="Eleve_Benef_Act_TIC2" value="Non"  <?php if (strtolower($row_ListeEtb->Eleve_Benef_Act_TIC)=='non'){echo 'Checked';} ?>>
                                <label class="form-check-label" for="Eleve_Benef_Act_TIC2">Non</label>
                            </div>   
                        </div>
                  </div>                 
             </div>   
                
              
                
                
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="M3" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape3-->             
              
              
 <!--ETAPE Pertubation & Personnes vulnérables--> 
              <div class="info" id="etape_vulnerabilites">
              <h3 class="btn-etape2">Etape5 : Pertubations &amp; Personnes vuln&eacute;rables</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_vulnerabilites.php" method="post" role="form" class="mt-4 form-control">

<!--Grêve des enseignants-->
             <div class="etiquette mt-3">Gr&ecirc;ve des enseignants</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Nombre</div>
                  <input type="number" name="Nbre_Greve_Prof" class="form-control" id="Nbre_Greve_Prof" value="<?php echo $row_ListeEtb->Nbre_Greve_Prof; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Nb. Heures perdues</div>
                  <input type="number" name="Heure_Greve_Prof" class="form-control" id="Heure_Greve_Prof" value="<?php echo $row_ListeEtb->Heure_Greve_Prof; ?>" required>
                </div>
              </div>                 
                              
                
                
<!--Grêve des élève-->
             <div class="etiquette mt-3">Gr&ecirc;ve des &eacute;l&egrave;ves</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Nombre</div>
                  <input type="number" name="Nbre_Greve_Apprenant" class="form-control" id="Nbre_Greve_Apprenant" value="<?php echo $row_ListeEtb->Nbre_Greve_Apprenant; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Nb. Heures perdues</div>
                  <input type="number" name="Heure_Greve_Apprenant" class="form-control" id="Heure_Greve_Apprenant" value="<?php echo $row_ListeEtb->Heure_Greve_Apprenant; ?>" required>
                </div>
              </div>                 
                
                
<!--Autres Grêves-->
             <div class="etiquette mt-3">Autres pertubations</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Nombre</div>
                  <input type="number" name="Nbre_Autre_Greve" class="form-control" id="Nbre_Autre_Greve" value="<?php echo $row_ListeEtb->Nbre_Autre_Greve; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Nb. Heures perdues</div>
                  <input type="number" name="Heure_Autre_Greve" class="form-control" id="Heure_Autre_Greve" value="<?php echo $row_ListeEtb->Heure_Autre_Greve; ?>" required>
                </div>
              </div>
                
 
 <!--Personne vivant avec un Handicap-->
             <div class="etiquette mt-3">Apprenants vivant avec un <strong class="titre-vert">Handicap</strong></div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Gar&ccedil;on</div>
                  <input type="number" name="Garcon_Handicap" class="form-control" id="Garcon_Handicap" value="<?php echo $row_ListeEtb->Garcon_Handicap; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Fille</div>
                  <input type="number" name="Fille_Handicap" class="form-control" id="Fille_Handicap" value="<?php echo $row_ListeEtb->Fille_Handicap; ?>" required>
                </div>
              </div>
                
 <!--Personne vivant avec une maladie invalidante-->
             <div class="etiquette mt-3">Apprenants vivant avec une maladie <strong class="titre-orange">maladie invalidante </strong>(causant son abscence)</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Gar&ccedil;on</div>
                  <input type="number" name="Garcon_Maladie_Invalidante" class="form-control" id="Garcon_Maladie_Invalidante" value="<?php echo $row_ListeEtb->Garcon_Maladie_Invalidante; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Fille</div>
                  <input type="number" name="Fille_Maladie_Invalidante" class="form-control" id="Fille_Maladie_Invalidante" value="<?php echo $row_ListeEtb->Fille_Maladie_Invalidante; ?>" required>
                </div>
              </div> 
                
<!--Effectif Grossesse-->
             <div class="etiquette mt-3">Cas de <strong class="titre-rose">grossesse</strong></div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Nombre de grossesses</div>
                  <input type="number" name="Grossesse" class="form-control" id="Grossesse" value="<?php echo $row_ListeEtb->Grossesse; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <div>Nombre d'abandon</div>
                  <input type="number" name="Grossesse_Abandon" class="form-control" id="Grossesse_Abandon" value="<?php echo $row_ListeEtb->Grossesse_Abandon; ?>" required>
                </div>
              </div> 
                
        
<!--Effectif cas de violences-->
             <div class="etiquette mt-3"> Effectif des cas de <strong class="titre-rouge">violences</strong></div>
              <div class="row">
                <div class="col-md-4 form-group">
                    <div>Coups et blessures</div>
                  <input type="number" name="Blessure" class="form-control" id="Blessure" value="<?php echo $row_ListeEtb->Blessure; ?>" required>
                </div>
                <div class="col-md-4 form-group">
                    <div>Bastonnade</div>
                  <input type="number" name="Bastonnade" class="form-control" id="Bastonnade" value="<?php echo $row_ListeEtb->Bastonnade; ?>" required>
                </div>
                <div class="col-md-4 form-group">
                    <div>Corv&eacute;e</div>
                  <input type="number" name="Corvee" class="form-control" id="Corvee" value="<?php echo $row_ListeEtb->Corvee; ?>" required>
                </div>
              </div>

                
              <div class="row">                
                <div class="col-md-4 form-group">
                    <div>Attouchement</div>
                  <input type="number" name="Attouchement" class="form-control" id="Attouchement" value="<?php echo $row_ListeEtb->Attouchement ?>" required>
                </div>
                <div class="col-md-4 form-group">
                    <div>Harcelement sexuel</div>
                  <input type="number" name="Harcelement" class="form-control" id="Harcelement" value="<?php echo $row_ListeEtb->Harcelement; ?>" required>
                </div>
                 <div class="col-md-4 form-group">
                    <div>Viol</div>
                  <input type="number" name="Viol" class="form-control" id="Viol" value="<?php echo $row_ListeEtb->Viol; ?>" required>
                </div>                   
              </div>                
  
                
               <div class="row">
                <div class="col-md-4 form-group">
                    <div>Mutilation g&eacute;nitale</div>
                  <input type="number" name="Mutilation" class="form-control" id="Mutilation" value="<?php echo $row_ListeEtb->Mutilation; ?>" required>
                </div>
                <div class="col-md-4 form-group">
                    <div>Mariage forc&eacute;</div>
                  <input type="number" name="Mariage_Force" class="form-control" id="Mariage_Force" value="<?php echo $row_ListeEtb->Mariage_Force; ?>" required>
                </div>
                <div class="col-md-4 form-group">
                    <div>Intimidation</div>
                  <input type="number" name="Intimidation" class="form-control" id="Intimidation" value="<?php echo $row_ListeEtb->Intimidation; ?>" required>
                </div>
              </div>                
                
 
               <div class="row">

                <div class="col-md-4 form-group">
                    <div>Humiliation</div>
                  <input type="number" name="Humiliation" class="form-control" id="Humiliation" value="<?php echo $row_ListeEtb->Humiliation; ?>" required>
                </div>
              </div>                 
                
          
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape4-->             

              
              
              
              
<!--ETAPE6 Partenariats--> 
              <div class="info" id="etape_partenariats">
              <h3 class="btn-etape1">Etape6 : Partenariats </h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_partenariats.php" method="post" role="form" class="mt-4 form-control">

               
                
  
                
<!--SERFE-->
                 <div class="row mt-3" id="et-nbre-serf">
                <div class="col-md-6 form-group etiquette mt-3">
                        Pr&eacute;cisez le nombre de SERFE
                </div>
                <div class="col-md-6 form-group">
                        <input type="number" name="Nbre_Serfe" class="form-control" id="Nbre_Serfe" value="<?php echo $row_ListeEtb->Nbre_Serfe; ?>">
                </div>
              </div> 
                
        
<!--Cartographie-->
             <div class="etiquette mt-3">L'&eacute;tablissement dispose t-il d'une cartographie des entreprises &agrave; sa proximit&eacute; ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cartographie_Entreprise" id="Cartographie_Entreprise1" value="Oui" <?php if (strtolower($row_ListeEtb->Cartographie_Entreprise)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cartographie_Entreprise1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Cartographie_Entreprise" id="Cartographie_Entreprise2" value="Non" <?php if (strtolower($row_ListeEtb->Cartographie_Entreprise)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Cartographie_Entreprise2">Non</label>
                </div> 
  
                
<!--en relation avec le milieu professionnel-->
             <div class="etiquette mt-3">L'&eacute;tablissement est-il en relation avec le milieu professionnel ?</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Relation_Entreprise" id="Relation_Entreprise1" value="Oui" required <?php if (strtolower($row_ListeEtb->Relation_Entreprise)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Relation_Entreprise1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Relation_Entreprise" id="Relation_Entreprise2" value="Non" <?php if (strtolower($row_ListeEtb->Relation_Entreprise)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Relation_Entreprise2">Non</label>
                </div>
              
            <div id="et-rela-prof">    
                 <div class="mt-3">Pr&eacute;cisez le type de relation ?</div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Type_Relation_Entr" id="Type_Relation_Entr1" value="Formel" <?php if (strtolower($row_ListeEtb->Type_Relation_Entr)=='formel'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Type_Relation_Entr1">Formel</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Type_Relation_Entr" id="Type_Relation_Entr2" value="Non Formel" <?php if (strtolower($row_ListeEtb->Type_Relation_Entr)=='non formel'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Type_Relation_Entr2">Non Formel</label>
                    </div>                

 
                
               
                
                
                
                
                <div class="mt-3">
                        Si oui, Pr&eacute;cisez le type de partenaires concern&eacute;s
                </div>
                <div class="">
              
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="Rela_Entr_Public" id="Rela_Entr_Public" value="Oui" <?php if (strtolower($row_ListeEtb->Rela_Entr_Public)=='oui'){echo 'Checked';} ?>>
                          <label class="form-check-label" for="Rela_Entr_Public">Entreprises publiques</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="Rela_Entr_Prive_Formel" id="Rela_Entr_Prive_Formel" value="Oui" <?php if (strtolower($row_ListeEtb->Rela_Entr_Prive_Formel)=='oui'){echo 'Checked';} ?>>
                          <label class="form-check-label" for="Rela_Entr_Prive_Formel">Priv&eacute;es formelles</label>
                        </div>
                    </div>
                  </div>                   


                  <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="Rela_Entr_Prive_Non_Formel" id="Rela_Entr_Prive_Non_Formel" value="Oui" <?php if (strtolower($row_ListeEtb->Rela_Entr_Prive_Non_Formel)=='oui'){echo 'Checked';} ?>>
                          <label class="form-check-label" for="Rela_Entr_Prive_Non_Formel">Entreprises priv&eacute;es non formelles</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="Rela_Societe_Civil" id="Rela_Societe_Civil" value="Oui" <?php if (strtolower($row_ListeEtb->Rela_Societe_Civil)=='oui'){echo 'Checked';} ?>>
                          <label class="form-check-label" for="Rela_Societe_Civil">Soci&eacute;t&eacute; civile </label>
                        </div>
                    </div>
                  </div>                    


                   <div class="row mt-3">
                    <div class="col-md-6 form-group">
                            Citez autres (facultatif)...
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="Autres_Relations" class="form-control" id="Autres_Relations" value="<?php echo $row_ListeEtb->Autres_Relations; ?>" placeholder="Rela1, Rela2, Rela3...">
                    </div>
                    </div>  
                    
                </div>              
              
                
                
<!--Nature du partenariat-->
             <div class="mt-3">Pr&eacute;cisez la nature du partenariat</div>  
                
                <div class="form-group">

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Stage_Pratique_Entr" id="Stage_Pratique_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Stage_Pratique_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Stage_Pratique_Entr">Stage pratique des apprenants  en entreprise</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Appui_Financier" id="Appui_Financier" value="Oui" <?php if (strtolower($row_ListeEtb->Appui_Financier)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Appui_Financier">Appuis financiers</label>
                            </div>
                        </div>
                      </div>                    

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Projet_Technique_Entr" id="Projet_Technique_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Projet_Technique_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Projet_Technique_Entr">Projets techniques avec les entreprises</label>
                            </div> 
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Visite_Technique_Entr" id="Visite_Technique_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Visite_Technique_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Visite_Technique_Entr">Visite d&rsquo;entreprise </label>
                            </div>
                        </div>
                      </div>                    

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Formation_Continue_Pers_Entr" id="Formation_Continue_Pers_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Formation_Continue_Pers_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Formation_Continue_Pers_Entr">Formation continue des personnels d&rsquo;entreprises</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                             <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Conference" id="Conference" value="Oui" <?php if (strtolower($row_ListeEtb->Conference)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Conference">Conf&eacute;rence</label>
                            </div>
                        </div>
                      </div>                    

                       <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Professionnel_Com_Gest" id="Professionnel_Com_Gest" value="Oui" <?php if (strtolower($row_ListeEtb->Professionnel_Com_Gest)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Professionnel_Com_Gest">Professionnels dans le comit&eacute; de gestion</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Journee_Porte_Ouverte" id="Journee_Porte_Ouverte" value="Oui" <?php if (strtolower($row_ListeEtb->Journee_Porte_Ouverte)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Journee_Porte_Ouverte">Journ&eacute;es portes ouvertes </label>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Stage_Eleve_Entr" id="Stage_Eleve_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Stage_Eleve_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Stage_Eleve_Entr">Stage pratique des apprenants  en entreprise</label>
                            </div> 
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Equipement_Entr" id="Equipement_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Equipement_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Equipement_Entr">Equipements mat&eacute;riels</label>
                            </div>
                        </div>
                      </div>                    
 
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Formation_Altern_Entr" id="Formation_Altern_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Formation_Altern_Entr)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Formation_Altern_Entr">Formation altern&eacute;e en entreprise</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="Renfo_Capacites" id="Renfo_Capacites" value="Oui" <?php if (strtolower($row_ListeEtb->Renfo_Capacites)=='oui'){echo 'Checked';} ?>>
                              <label class="form-check-label" for="Renfo_Capacites">Renforcement des capacit&eacute;s </label>
                            </div>
                        </div>
                      </div>                    
 

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="Stage_Prof_Entr" id="Stage_Prof_Entr" value="Oui" <?php if (strtolower($row_ListeEtb->Stage_Prof_Entr)=='oui'){echo 'Checked';} ?>>
                      <label class="form-check-label" for="Stage_Prof_Entr">Stage  des enseignants en entreprise(immersion)</label>
                    </div>                     
             </div>


<!--Partenaires formels-->
                 <div class="row mt-3" id="et-part-formel">
                <div class="col-md-8 form-group  mt-3">
                        Pr&eacute;cisez le nombre de partenaires formels concern&eacute;s
                </div>
                <div class="col-md-4 form-group">
                        <input type="number" name="Nbre_Part_Formel" class="form-control" id="Nbre_Part_Formel" value="<?php echo $row_ListeEtb->Nbre_Part_Formel; ?>">
                </div>
               <div class="col-md-4 form-group  mt-3">
                        Citez les principaux partenaires formels concern&eacute;s
                </div>
                <div class="col-md-8 form-group">
                        <input type="text" name="List_Part_Formel" class="form-control" id="List_Part_Formel" placeholder="Partenaire1,Partenaire2,..." value="<?php echo $row_ListeEtb->List_Part_Formel; ?>">
                </div>                     
              </div> 
                
 <!--Partenaires Informels-->
                 <div class="row mt-3" id="et-part-Informel">
                <div class="col-md-8 form-group  mt-3">
                        Pr&eacute;cisez le nombre de partenaires Informels concern&eacute;s
                </div>
                <div class="col-md-4 form-group">
                        <input type="number" name="Nbre_Part_Informel" class="form-control" id="Nbre_Part_Informel" value="<?php echo $row_ListeEtb->Nbre_Part_Informel; ?>">
                </div>
               <div class="col-md-4 form-group  mt-3">
                        Citez les principaux partenaires Informels concern&eacute;s
                </div>
                <div class="col-md-8 form-group">
                        <input type="text" name="List_Part_Informel" class="form-control" id="List_Part_Informel" placeholder="Partenaire1,Partenaire2,..." value="<?php echo $row_ListeEtb->List_Part_Informel; ?>">
                </div>                     
              </div>               
                
            </div>  <!--Fin Rela Prof-->  
               
                
                
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="M5" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape5-->             

              
              
              
              
<!--ETAPE Personnel--> 
              <div class="info" id="etape_personnel">
              <h3 class="btn-etape2">Etape4 : Personnel &amp; P&eacute;dagogie</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_personnel.php" method="post" role="form" class="mt-4 form-control">

<!--Personnel enseignant permanent-->
             <div class="etiquette mt-3">Personnel enseignant  craie en main <strong class="titre-vert">"permanent"</strong></div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Effectif homme</div>
                  <input type="number" name="Eff_Homme_Prof_Permanent" class="form-control" id="Eff_Homme_Prof_Permanent" value="<?php echo $row_ListeEtb->Eff_Homme_Prof_Permanent; ?>" required >
                </div>
                <div class="col-md-6 form-group">
                    <div>Effectif femme</div>
                  <input type="number" name="Eff_Femme_Prof_Permanent" class="form-control" id="Eff_Femme_Prof_Permanent" value="<?php echo $row_ListeEtb->Eff_Femme_Prof_Permanent; ?>" required >
                </div>
              </div>                 
 
 <!--Personnel enseignant vacataire-->
             <div class="etiquette mt-3">Personnel enseignant  craie en main <strong class="titre-rouge">"vacataire"</strong></div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Effectif homme</div>
                  <input type="number" name="Eff_Homme_Prof_Vacataire" class="form-control" id="Eff_Homme_Prof_Vacataire" value="<?php echo $row_ListeEtb->Eff_Homme_Prof_Vacataire; ?>" required >
                </div>
                <div class="col-md-6 form-group">
                    <div>Effectif femme</div>
                  <input type="number" name="Eff_Femme_Prof_Vacataire" class="form-control" id="Eff_Femme_Prof_Vacataire" value="<?php echo $row_ListeEtb->Eff_Femme_Prof_Vacataire; ?>" required >
                </div>
              </div>               
                
<!--Personnel d&rsquo;encadrement-->
             <div class="etiquette mt-3">Personnel d&rsquo;<strong class="titre-gris">Encadrement</strong> (Educateur, Inspecteur d'&eacute;ducation...)</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Effectif homme</div>
                  <input type="number" name="Eff_Homme_Encadreur" class="form-control" id="Eff_Homme_Encadreur" value="<?php echo $row_ListeEtb->Eff_Homme_Encadreur; ?>" required >
                </div>
                <div class="col-md-6 form-group">
                    <div>Effectif femme</div>
                  <input type="number" name="Eff_Femme_Encadreur" class="form-control" id="Eff_Femme_Encadreur" value="<?php echo $row_ListeEtb->Eff_Femme_Encadreur; ?>" required >
                </div>
              </div>

 <!--Personnel Administratif-->
             <div class="etiquette mt-3">Personnel <strong class="titre-rose">Administratif</strong> (Directeur, Secretaire, Econome...)</div>
              <div class="row">
                <div class="col-md-6 form-group">
                    <div>Effectif homme</div>
                  <input type="number" name="Eff_Homme_Admn" class="form-control" id="Eff_Homme_Admn" value="<?php echo $row_ListeEtb->Eff_Homme_Admn; ?>" required >
                </div>
                <div class="col-md-6 form-group">
                    <div>Effectif femme</div>
                  <input type="number" name="Eff_Femme_Admn" class="form-control" id="Eff_Femme_Admn" value="<?php echo $row_ListeEtb->Eff_Femme_Admn; ?>" required>
                </div>
              </div>               
        
<!--inspection p&eacute;dagogique-->
                <div class="etiquette mt-3">L'&eacute;tablissement a-t-il fait l'objet d'une inspection p&eacute;dagogique   durant l'ann&eacute;e acad&eacute;mique ?  </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Pedagogique" id="Insp_Pedagogique1" value="Oui" required <?php if (strtolower($row_ListeEtb->Insp_Pedagogique)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Pedagogique1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Pedagogique" id="Insp_Pedagogique2" value="Non" <?php if (strtolower($row_ListeEtb->Insp_Pedagogique)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Pedagogique">Non</label>
                </div>                                

                
                 <div class="row mt-3" id="et-insp-ped">
                <div class="col-md-6 form-group">
                        Si oui, pr&eacute;cisez le nombre d'enseignants inspect&eacute;s  
                </div>
                <div class="col-md-6 form-group">
                        <input type="number" name="Nbre_Prof_Inspectes" class="form-control" id="Nbre_Prof_Inspectes" value="<?php echo $row_ListeEtb->Nbre_Prof_Inspectes; ?>">
                </div>
              </div> 
  
                
                
 
<!--inspection administrative-->
                <div class="etiquette mt-3">L'&eacute;tablissement a-t-il fait l'objet d'une inspection administrative durant l'ann&eacute;e acad&eacute;mique ?  </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Administratif" id="Insp_Administratif1" value="Oui" required <?php if (strtolower($row_ListeEtb->Insp_Administratif)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Administratif1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Administratif" id="Insp_Administratif2" value="Non" <?php if (strtolower($row_ListeEtb->Insp_Administratif)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Administratif">Non</label>
                </div> 
                
                
<!--inspection audit et finance-->
                <div class="etiquette mt-3"> L'&eacute;tablissement a-t-il fait l'objet d'une inspection audit et finance durant l'ann&eacute;e acad&eacute;mique ?  </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Audit" id="Insp_Audit1" value="Oui" required <?php if (strtolower($row_ListeEtb->Insp_Audit)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Audit1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insp_Audit" id="Insp_Audit2" value="Non" <?php if (strtolower($row_ListeEtb->Insp_Audit)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Insp_Audit2">Non</label>
                </div>           

                
                
<!--gr&egrave;ves ou de perturbations-->                
                 <div class="row mt-3 etiquette" >
                <div class="col-md-6 form-group">
                        Combien y a-t-il eu de gr&egrave;ves ou de perturbations des cours durant l'ann&eacute;e acad&eacute;mique du fait des acteurs  de  votre &eacute;tablissement ?  
                </div>
                <div class="col-md-6 form-group">
                        <input type="number" name="Nbre_Pertubation_Scol" class="form-control" id="Nbre_Pertubation_Scol" value="<?php echo $row_ListeEtb->Nbre_Pertubation_Scol; ?>" required>
                </div>
              </div>                
                
                
<!--heures de cours de perturbations-->                
                 <div class="row mt-3 etiquette">
                <div class="col-md-6 form-group">
                        Combien d'heures de cours perdues durant l'ann&eacute;e acad&eacute;mique ?  
                </div>
                <div class="col-md-6 form-group">
                        <input type="number" name="Nbre_HCours_Perdues" class="form-control" id="Nbre_HCours_Perdues" value="<?php echo $row_ListeEtb->Nbre_HCours_Perdues; ?>">
                </div>
              </div>                
                
                
<!--renforcement de capacit&eacute;-->
                <div class="etiquette mt-3">L'&eacute;tablissement a-t-il benefici&eacute; de renforcement de capacit&eacute; durant l'ann&eacute;e acad&eacute;mique ?  </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Renfo_Capacites2" id="Renfo_Capacites2_1" value="Oui" required <?php if (strtolower($row_ListeEtb->Renfo_Capacites2)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Renfo_Capacites2_1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Renfo_Capacites2" id="Renfo_Capacites2_2" value="Non" <?php if (strtolower($row_ListeEtb->Renfo_Capacites2)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Renfo_Capacites2_2">Non</label>
                </div>                                

                
                 <div class="row mt-3" id="et-renf-capacites">
                <div class="col-md-4 form-group">
                        Si oui, lesquels?
                </div>
                <div class="col-md-8 form-group">
                        <input type="text" name="List_Renfo_Capacites" class="form-control" id="List_Renfo_Capacites" value="<?php echo $row_ListeEtb->List_Renfo_Capacites; ?>">
                </div>
              </div>               
             
                
<!--quantum horaire-->
                <div class="etiquette mt-3">Au titre de l&rsquo;ann&eacute;e scolaire pr&eacute;c&eacute;dente le quantum horaire  a  t il &eacute;t&eacute; atteint ?   </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Quantum_Horaire_Atteint" id="Quantum_Horaire_Atteint1" value="Oui" required <?php if (strtolower($row_ListeEtb->Quantum_Horaire_Atteint)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Quantum_Horaire_Atteint1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Quantum_Horaire_Atteint" id="Quantum_Horaire_Atteint2" value="Non" <?php if (strtolower($row_ListeEtb->Quantum_Horaire_Atteint)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Quantum_Horaire_Atteint2">Non</label>
                </div>                                

                
                 <div class="row mt-3" id="et-quantum-horaire">
                <div class="col-md-4 form-group">
                        Si non ? justifier
                </div>
                <div class="col-md-8 form-group">
                        <input type="text" name="Justification_Quantum" class="form-control" id="Justification_Quantum" value="<?php echo $row_ListeEtb->Justification_Quantum; ?>">
                </div>
              </div>
                

                
<!--formations en entrepreunariat-->
              <div class="etiquette mt-3">L'&eacute;tablissement dispense-t-il des formations en entrepreunariat ?   </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Form_Entrepeunariat_Disp" id="Form_Entrepeunariat_Disp1" value="Oui" required <?php if (strtolower($row_ListeEtb->Form_Entrepeunariat_Disp)=='oui'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Form_Entrepeunariat_Disp1">Oui</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Form_Entrepeunariat_Disp" id="Form_Entrepeunariat_Disp2" value="Non" <?php if (strtolower($row_ListeEtb->Form_Entrepeunariat_Disp)=='non'){echo 'Checked';} ?>>
                    <label class="form-check-label" for="Form_Entrepeunariat_Disp2">Non</label>
                </div>
    
                
                <div class="row mt-3" id="et-form-entrepeunariat">
                <div class="col-md-8 form-group">
                        Si Oui, tous les apprenants en b&eacute;n&eacute;ficient-ils ?     
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Eleve_Benef_Entrepeunariat" id="Eleve_Benef_Entrepeunariat1" value="Oui" <?php if (strtolower($row_ListeEtb->Eleve_Benef_Entrepeunariat)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Eleve_Benef_Entrepeunariat1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Eleve_Benef_Entrepeunariat" id="Eleve_Benef_Entrepeunariat2" value="Non" <?php if (strtolower($row_ListeEtb->Eleve_Benef_Entrepeunariat)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Eleve_Benef_Entrepeunariat2">Non</label>
                    </div>   
                </div>
              </div>                 
                
                
                
                
                
                
                
                
<!--R&eacute;forme de la FP-->
            <div id="et-reforme-fp">
                
              <div class="etiquette mt-3"> Dans le cadre de la mise en œuvre de la R&eacute;forme de la FP (Uniquement pour les &eacute;tablissements publics) : </div>
                
                <div class="row mt-3">
                <div class="col-md-8 form-group">
                        L'&eacute;tablissement exp&eacute;rimente-t-il la nouvelle gouvernance des &eacute;tablissements ?    
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Gouvernance_Etabl" id="Exp_Gouvernance_Etabl1" value="Oui" <?php if (strtolower($row_ListeEtb->Exp_Gouvernance_Etabl)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Gouvernance_Etabl1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Gouvernance_Etabl" id="Exp_Gouvernance_Etabl2" value="Non" <?php if (strtolower($row_ListeEtb->Exp_Gouvernance_Etabl)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Gouvernance_Etabl2">Non</label>
                    </div>   
                </div>
              </div> 
                
 
                <div class="row mt-3">
                <div class="col-md-8 form-group">
                        L'&eacute;tablissement exp&eacute;rimente-t-il les Pr&eacute;pa CAP ? 
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_CAP" id="Exp_CAP1" value="Oui" <?php if (strtolower($row_ListeEtb->Exp_CAP)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_CAP1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_CAP" id="Exp_CAP2" value="Non" <?php if (strtolower($row_ListeEtb->Exp_CAP)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_CAP2">Non</label>
                    </div>   
                </div>
              </div>                
                
                
                <div class="row mt-3">
                <div class="col-md-8 form-group">
                        L'&eacute;tablissement fait-il la Formation par Apprentissage ? 
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Form_Apprentissage" id="Exp_Form_Apprentissage1" value="Oui" <?php if (strtolower($row_ListeEtb->Exp_Form_Apprentissage)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Form_Apprentissage1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Form_Apprentissage" id="Exp_Form_Apprentissage2" value="Non" <?php if (strtolower($row_ListeEtb->Exp_Form_Apprentissage)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Form_Apprentissage2">Non</label>
                    </div>   
                </div>
              </div>                
                
 
                 <div class="row mt-3">
                <div class="col-md-8 form-group">
                        L'&eacute;tablissement fait-il la Formation Par Alternance (FPA) ?  
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Form_Alternance" id="Exp_Form_Alternance1" value="Oui" <?php if (strtolower($row_ListeEtb->Exp_Form_Alternance)=='oui'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Form_Alternance1">Oui</label>
                    </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exp_Form_Alternance" id="Exp_Form_Alternance2" value="Non" <?php if (strtolower($row_ListeEtb->Exp_Form_Alternance)=='non'){echo 'Checked';} ?>>
                        <label class="form-check-label" for="Exp_Form_Alternance2">Non</label>
                    </div>   
                </div>
              </div>
                
            </div> <!--Fin Reforme FP-->
                
                
        
                
                
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Mise &agrave; jour</button></div>
            </form>                
            </div> <!--Fin etape6-->             

              
              
              
              
<!--ETAPE8--> 
              <div class="info" id="etape_equipements">
              <h3 class="btn-etape1">Etape8 : Immobiliers &amp; Mobiliers</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="maj_files/maj_etape_immobiliers.php" method="post" role="form" class="mt-4 form-control">

<!--Infrastructures-->
             <div class="text-center display-6">Immobiliers</div>

                <div id="infrastructure-success" class="msg msg-success"><span class="bi bi-check-circle"></span>Succ&egrave;s!!</div>
                
                <div id="infrastructure-warning" class="msg msg-warning"><span class="bi bi-exclamation-triangle"></span>Existe d&eacute;j&agrave;! Supprimez d'abord.</div>
                
                <div id="infrastructure-danger" class="msg msg-danger"><span class="bi bi-exclamation-octagon"></span>Suppression &eacute;ffectu&eacute;e!</div>
                
                            
                
             
            <div class="row">
                
                <div class="col-md-6 form-group">
                    <div class="etiquette mt-3">Choisir le type d'infrastructure</div>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Nom_Infrastructure" id="Nom_Infrastructure">
                        
                      <optgroup label="Cours">  
                          <option selected value="Salle de classe">Salle de classe</option>
                          <option  value="Amphith&eacute;&acirc;tre">Amphith&eacute;&acirc;tre</option>
                          <option value="Salle informatique">Salle informatique</option>
                            <option value="Salle multim&eacute;dia">Salle multim&eacute;dia</option>
                            <option value="Laboratoire">Laboratoire</option>
                          <option value="Atelier">Atelier</option>
                          <option value="Biblioth&egrave;que">Biblioth&egrave;que</option>
                        </optgroup>
                        
                      <optgroup label="Bureaux">  
                           <option value="Bureaux administratifs">Bureaux administratifs</option>
                          <option value="Salle des profs">Salle des profs</option>                         
                      </optgroup>      
                      
                     <optgroup label="Autres">    
                          <option value="Dortoir">Dortoir</option>
                          <option value="R&eacute;fectoire">R&eacute;fectoire</option>
                    </optgroup> 
                        
                    </select> 
                </div>
                <div class="col-md-6 form-group">
                    <div class="etiquette_rouge mt-3 text-end">Immobiliers ajout&eacute;s</div>
                    <div id="message_infrastructure" class="text-end">
                    
                    
                              <?php
                      
                                    $Liste="";
                                    
                                while ($row_Liste_Infrastructure  =   $Liste_Infrastructure->fetchObject()) {
                                    
                                    $Liste = $Liste."<br>".$row_Liste_Infrastructure->Nom_Infrastructure."<strong>(".$row_Liste_Infrastructure->Nbre_Bon_Etat.")</strong>";
                                }  
                      
                      echo $Liste;
                        
                        
                      ?>                    
                    
                    
                    
                    
                    </div>
                </div>
              </div>                
                
  
                <div class="row mt-3">
                 <div class="col-md-4 form-group">
                    <div>Nbre en bons &eacute;tats</div>
                    <input type="number" class="form-control" name="Nbre_Bon_Etat" id="Nbre_Bon_Etat" value="0">
                 </div>
                    
                  <div class="col-md-4 form-group">
                    <div>Capacit&eacute; / Unit&eacute; </div>
                    <input type="number" class="form-control" name="Capacite" id="Capacite" value="0">
                 </div>
                    
                 <div class="col-md-4 form-group">
                    <div>Besoins </div>
                    <input type="number" class="form-control" name="Besoins" id="Besoins" value="0">
                 </div>                    
                    

                    
              </div>  
 
                
                <div class="row mt-3">
                 <div class="col-md-4 form-group">
                    <div>Nbre &agrave; r&eacute;habiliter </div>
                    <input type="number" class="form-control" name="Nbre_A_Rehabiliter" id="Nbre_A_Rehabiliter" value="0">
                 </div>
                    
                 <div class="col-md-4 form-group">
                    <div>Nbre en r&eacute;habilitation </div>
                    <input type="number" class="form-control" name="Nbre_En_Rehabilitation" id="Nbre_En_Rehabilitation" value="0">
                 </div>

              </div> 
 
                
                
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
                
              <div class="row mt-3">
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-info" name="btn_cons_infras" id="btn_cons_infras">Consulter</button>
                 </div>
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-success" name="btn_aj_infras" id="btn_aj_infras">Ajouter</button>
                 </div >
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-danger" name="btn_supp_infras" id="btn_supp_infras">Supprimer</button>
                 </div>
                    
              </div> 
            </form>
                  
               
<!--Sous Element Mobiliers collectifs-->                  
            <form action="forms/maj_etape_mobiliers.php" method="post" role="form" class="mt-4 form-control">

<!--Mobiliers collectifs-->
            <div class="text-center display-6">Mobiliers</div>
                
                
                <div id="mobilier-success" class="msg msg-success"><span class="bi bi-check-circle"></span>Succ&egrave;s!!</div>
                
                <div id="mobilier-warning" class="msg msg-warning"><span class="bi bi-exclamation-triangle"></span>Existe d&eacute;j&agrave;! Supprimez d'abord.</div>
                
                <div id="mobilier-danger" class="msg msg-danger"><span class="bi bi-exclamation-octagon"></span>Suppression &eacute;ffectu&eacute;e!</div>                
                
                
                
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <div class="etiquette mt-3">Liste des &eacute;quipements</div>
                    <div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Nom_Mobilier" id="Nom_Mobilier">
                            
                            <optgroup label="Mobiliers collectifs">   
                                  <option value="Tables-banc">Tables-banc</option>
                                  <option value="Bancs">Bancs</option>
                                    <option value="Chaises apprenants">Chaises apprenants</option>
                                    <option value="Tables apprenants">Tables apprenants</option> 
                            </optgroup>                            
                            
                            <optgroup label="Mat&eacute;riels de bureaux">
                                  <option value="Ordinateur">Ordinateur</option>
                                  <option value="Photocopieurs">Photocopieur</option>     
                                  <option value="Imprimante">Imprimante</option>
                                  <option value="Video projecteur">Video projecteur</option>
                                    <option value="Poste t&eacute;l&eacute;phonique">Poste t&eacute;l&eacute;phonique</option>
                            </optgroup>

                        

                        </select>
                    </div>
                    <div class="etiquette mt-3">Etat du mat&eacute;riel</div>
                    <div>
                          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Etat_Mobilier" id="Etat_Mobilier">
                          <option value="Fonctionnel" selected>Fonctionnel</option>
                          <option value="Non Fonctionnel">Non Fonctionnel</option>
                        </select>                   
                    </div>
                   <div class="etiquette">Nombre</div>
                    <div><input type="number" class="form-control" name="Nbre_Mobilier" id="Nbre_Mobilier" value="0"></div>    
                </div>
                <div class="col-md-6 form-group">
                        <div class="etiquette_rouge mt-3 text-center">Mobiliers ajout&eacute;s</div>
                    <div id="message_mobilier">
                              <?php
                      
                                    $Liste="";
                                    $Categ="XXX";
                                    
                                while ($row_Liste_Mobilier  =   $Liste_Mobilier->fetchObject()) {
                                    
                                    if(strcmp($Categ, $row_Liste_Mobilier->Etat_Mobilier) !== 0){
                                    
                                        $Entete     =   $row_Liste_Mobilier->Etat_Mobilier;
                                            
                                        $Categ      =   $row_Liste_Mobilier->Etat_Mobilier;
                                        
                                        $Liste= $Liste."<br><br><strong>".$row_Liste_Mobilier->Etat_Mobilier."</strong><hr>  ".htmlentities($row_Liste_Mobilier->Nom_Mobilier)."<strong>(".$row_Liste_Mobilier->Nbre_Mobilier.")</strong>&nbsp;&nbsp;  ";
                                        
                                    }else{
                                        $Liste= $Liste.htmlentities($row_Liste_Mobilier->Nom_Mobilier)."<strong>(".$row_Liste_Mobilier->Nbre_Mobilier.")</strong>&nbsp;&nbsp;  ";
                                    }
                                        
                                                                            
                                    
                                   

                        }  
                      
                      echo $Liste;
                        
                        
                      ?>                    
                    
                    </div>
                </div>                
              </div>                
                
  
                 
 
 
                                
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
 
                 <div class="row mt-3">
                 <div class="col-md-4 form-group text-center">
                    
                        
                        <button type="button" class="btn btn-info" name="btn_cons_mobilier" id="btn_cons_mobilier">Consulter</button>
                 </div>
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-success" name="btn_aj_mobilier" id="btn_aj_mobilier">Ajouter</button>
                 </div >
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-danger" name="btn_supp_mobilier" id="btn_supp_mobilier">Supprimer</button>
                 </div>
                    
              </div>
                

                
                <div class="text-end">
                    <a href="enquete.php?etape=suivi#debut">Suivant</a>
                </div>
                
            </form>                              
                  
<!--Sous Element Mobiliers collectifs-->
                  
                  
                  
                  
            </div> <!--Fin etape7-->             
            
              
              
              
 <!--etape Eleves Filiere-->             
              <div class="info" id="etape_eleves_filiere">
              <h3 class="btn-etape2">Etape7 : Fili&egrave;res de Formation</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="forms/maj_eleves_filiere.php" method="post" role="form" class="mt-4 form-control">

<!--Mat&eacute;riels de bureaux-->            
                <div class="row mt-3">

                 <!-- Button trigger modal -->
                <button type="button" class="btn btn-etape3" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                  <h5><span class="bi bi-cursor-fill " style="color: yellow;" ></span>Consulter vos fili&egrave;res ajout&eacute;s</h5>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Liste des classes ajout&eacute;es<div><small>( <em class="titre-vert">Eff Tot</em>-<em class="titre-bleu">Affect&eacute;</em>-<em class="titre-orange">Admis</em>-<em class="titre-rose">Redoub.</em>-<em class="titre-rouge">Renvoy.</em>-<em class="titre-gris">Report</em> )</small></div></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                                    <div id="message_recap">
                                               <?php

                                                    $ListeR="";
                                                    $Categ="XXX";

                                                while ($row_Liste_Recap  =   $Liste_Recap->fetchObject()) {

                                                    if(strcmp($Categ, $row_Liste_Recap->Diplome) !== 0){

                                                        $Entete     =   $row_Liste_Recap->Diplome;

                                                        $Categ      =   $row_Liste_Recap->Diplome;

                                                        $ListeR= $ListeR."<br><br><strong>".$row_Liste_Recap->Diplome."</strong><hr>  <mark>[".$row_Liste_Recap->Annee_Etude."-".$row_Liste_Recap->Type_Cours."]</mark>".htmlentities($row_Liste_Recap->Filiere)." ( Eff : <strong class='titre-vert'>".($row_Liste_Recap->Eff_Stagiaire_Garcon + $row_Liste_Recap->Eff_Stagiaire_Fille)."</strong> - <strong class='titre-bleu'>".($row_Liste_Recap->Eff_Affecte_Garcon + $row_Liste_Recap->Eff_Affecte_Fille)."</strong> - <strong class='titre-orange'>".($row_Liste_Recap->Eff_Admis_Garcon + $row_Liste_Recap->Eff_Admis_Fille)."</strong> - <strong class='titre-rose'>".($row_Liste_Recap->Eff_Redoublant_Garcon + $row_Liste_Recap->Eff_Redoublant_Fille)."</strong> - <strong class='titre-rouge'>".($row_Liste_Recap->Eff_Renvoye_Garcon + $row_Liste_Recap->Eff_Renvoye_Fille)."</strong> - <strong class='titre-gris'>".($row_Liste_Recap->Eff_Report_Garcon + $row_Liste_Recap->Eff_Report_Fille)."</strong> )<br>  ";

                                                    }else{
                                                        $ListeR= $ListeR."<mark>[".$row_Liste_Recap->Annee_Etude."-".$row_Liste_Recap->Type_Cours."]</mark>".htmlentities($row_Liste_Recap->Filiere)." ( Eff : <strong class='titre-vert'>".($row_Liste_Recap->Eff_Stagiaire_Garcon + $row_Liste_Recap->Eff_Stagiaire_Fille)."</strong> - <strong class='titre-bleu'>".($row_Liste_Recap->Eff_Affecte_Garcon + $row_Liste_Recap->Eff_Affecte_Fille)."</strong> - <strong class='titre-orange'>".($row_Liste_Recap->Eff_Admis_Garcon + $row_Liste_Recap->Eff_Admis_Fille)."</strong> - <strong class='titre-rose'>".($row_Liste_Recap->Eff_Redoublant_Garcon + $row_Liste_Recap->Eff_Redoublant_Fille)."</strong> - <strong class='titre-rouge'>".($row_Liste_Recap->Eff_Renvoye_Garcon + $row_Liste_Recap->Eff_Renvoye_Fille)."</strong> - <strong class='titre-gris'>".($row_Liste_Recap->Eff_Report_Garcon + $row_Liste_Recap->Eff_Report_Fille)."</strong> )<br>  ";

                                                    }



                                        }

                                        if (strlen($ListeR)>=8){//A cause du retour chariot
                                          $ListeR = substr($ListeR,8,strlen($ListeR));  
                                        }


                                      echo $ListeR;


                                      ?>                    

                                    </div>          



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">Annuler</button>
                      </div>
                    </div>
                  </div>
                </div>                   

                </div>
                
              
                
             <div class="row mt-3"> 
                 <div class="col-md-4 form-group">
                     <div class="etiquette">Formation</div>
                    <select name="Formation" id="Formation"class="form-select form-select-lg" aria-label=".form-select-lg example" >
                            <option></option>
                            <option>Technique</option>
                            <option>Professionnelle</option>
                            <option>Qualifiante</option>
                            <option>Apprentissage</option>
                     </select>
                 </div>
             </div>  
                
             <div class="row">
                <div class="col-md-3 form-group">
                    <div class="etiquette mt-3">Diplome</div>
                    <select name="Diplome" id="Diplome" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                                
                        
                    </select>                    
                    
                    
                    
                </div>
                 
                 
                 
                 
                <div class="col-md-3 form-group">
                    <div class="etiquette mt-3">Ann&eacute;e</div>
                    <select name="Annee_Etude" id="Annee_Etude"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                       
                        
                    </select> 
                </div>                 
                 
                 
                 
                <div class="col-md-4 form-group">
                    <div class="etiquette mt-3">Fili&egrave;re</div>
                    <select name="Filiere" id="Filiere" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Filiere">

                           <?php
                    while ($row_Liste_Filiere       =   $Liste_Filiere->fetchObject()) {  
                    ?>
                          <option value="<?php  $Concat=$row_Liste_Filiere->Nom_Filiere."|".$row_Liste_Filiere->Metier."|".$row_Liste_Filiere->Secteur."|".$row_Liste_Filiere->Type_Filiere."|".$row_Liste_Filiere->Formation."|".$row_Liste_Filiere->CQP."|".$row_Liste_Filiere->Qualifiante."|".$row_Liste_Filiere->CAP."|".$row_Liste_Filiere->BEP."|".$row_Liste_Filiere->BP."|".$row_Liste_Filiere->BT."|".$row_Liste_Filiere->BAC."|".$row_Liste_Filiere->BTS."|"; echo htmlentities($Concat)?>"><?php  echo htmlentities($row_Liste_Filiere->Nom_Filiere)?></option>
                          <?php
                    } 
//                      $rows = mysql_num_rows($Liste_Filiere);
//                      if($rows > 0) {
//                          mysql_data_seek($Liste_Filiere, 0);
//                          $row_Liste_Filiere = mysql_fetch_assoc($Liste_Filiere);
//                      }
                    ?>                       
                        
                        
                    </select> 
                    
                    
                    
                    
 
                </div>
                 
                 
                 
                 
                 
                 

                <div class="col-md-2 form-group"> 
                <div class="form-check">
                    <div class="etiquette mt-3">Cours</div>
                    <input class="form-check-input" type="radio" name="Type_Cours" id="Type_Cours1" value="Jour" checked>
                    <label class="form-check-label" for="Jour">Jour</label><br>
                    <input class="form-check-input" type="radio" name="Type_Cours" id="Type_Cours2" value="Soir" >
                    <label class="form-check-label" for="Soir">Soir</label>                    
                </div>
                 </div>
              </div>                
                
                
                <div class="row mt-3">
                <div class="etiquette">Effectif des Apprenants Inscrits</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Stagiaire_Garcon" id="Eff_Stagiaire_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Stagiaire_Fille" id="Eff_Stagiaire_Fille" value="0">
                 </div>                    
              </div>  
 
                
 
                <div class="row mt-3" id="et-affectes">
                <div class="etiquette">Effectif des affect&eacute;s</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Affecte_Garcon" id="Eff_Affecte_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Affecte_Fille" id="Eff_Affecte_Fille" value="0">
                 </div>                    
				</div>



 
                
                <div class="row mt-3">
                <div class="etiquette">Admis en classe sup&eacute;rieur</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Admis_Garcon" id="Eff_Admis_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Admis_Fille" id="Eff_Admis_Fille" value="0">
                 </div>                    
              </div> 
                
                
                  
                <div class="row mt-3" id="et-redoublant">
                <div class="etiquette">R&eacute;doublants</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Redoublant_Garcon" id="Eff_Redoublant_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Redoublant_Fille" id="Eff_Redoublant_Fille" value="0">
                 </div>                    
              </div>              
                
                
                   
                <div class="row mt-3">
                 <div class="etiquette">Renvoy&eacute;s</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Renvoye_Garcon" id="Eff_Renvoye_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Renvoye_Fille" id="Eff_Renvoye_Fille" value="0">
                 </div>                    
              </div>
                
                   
                <div class="row mt-3">
                 <div class="etiquette">Report de scolarit&eacute;</div>
                 <div class="col-md-6 form-group">
                    <div>Gar&ccedil;ons</div>
                    <input type="number" class="form-control" name="Eff_Report_Garcon" id="Eff_Report_Garcon" value="0">
                 </div> 
                 <div class="col-md-6 form-group">
                    <div>Filles </div>
                    <input type="number" class="form-control" name="Eff_Report_Fille" id="Eff_Report_Fille" value="0">
                 </div>                    
              </div>
                
                                
 
                <div id="recap-success" class="msg msg-success"><span class="bi bi-check-circle"></span>Succ&egrave;s!!</div>
                
                <div id="recap-warning" class="msg msg-warning"><span class="bi bi-exclamation-triangle"></span>Existe d&eacute;j&agrave;! Supprimez d'abord.</div>
                
                <div id="recap-danger" class="msg msg-danger"><span class="bi bi-exclamation-octagon"></span>Suppression &eacute;ffectu&eacute;e!</div>                  
                
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>

                 <div class="row mt-3">
                 <div class="col-md-4 form-group text-center">
                    
                        
                        <button type="button" class="btn btn-success" id="btn_aj_recap">Ajouter</button>
                 </div>
                    
                 <div class="col-md-4 form-group text-center">
                        ---
                 </div >
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-danger" id="btn_supp_recap">Supprimer</button>
                 </div>
                    
              </div>                 
                <div class="text-center">
                    <a href="enquete.php?etape=equipements#debut">Suivant</a>
                </div>
                
                
            </form>                
            </div> <!--Fin etape8-->               
            
              
              
  <!--ETAPE Suivi--> 
              <div class="info" id="etape_suivi">
              <h3 class="btn-etape1">Etape9 : Suivi des diplom&eacute;s -- Ann&eacute;e pr&eacute;c&eacute;dente</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="forms/maj_etape_suivi.php" method="post" role="form" class="mt-4 form-control">

<!--Mat&eacute;riels de bureaux-->            

                <div id="suivi-success" class="msg msg-success"><span class="bi bi-check-circle"></span>Succ&egrave;s!!</div>
                
                <div id="suivi-warning" class="msg msg-warning"><span class="bi bi-exclamation-triangle"></span>Existe d&eacute;j&agrave;! Supprimez d'abord.</div>
                
                <div id="suivi-danger" class="msg msg-danger"><span class="bi bi-exclamation-octagon"></span>Suppression &eacute;ffectu&eacute;e!</div>               
  
                
                 <div class="row mt-3">
               
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-etape3" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                          <h5><span class="bi bi-cursor-fill " style="color: yellow;" ></span>Consulter vos suivis r&eacute;alis&eacute;s</h5>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">R&eacute;capitilatif des suivis  <div><small>( <em class="titre-vert">Nb suivi</em>-<em class="titre-bleu">Stage</em>-<em class="titre-orange">Empl Sp&eacute;c</em>-<em class="titre-rose">Empl Hors Sp&eacute;c</em>-<em class="titre-rouge">Auto-Empl</em>-<em class="titre-gris">Sans Empl</em> )</small></div></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">



                                            <div id="message_suivi">


                                                <?php
                                                            $Liste="";
                                                            $Categ="XXX";

                                                        while ($row_Liste_Suivi  =   $Liste_Suivi->fetchObject()) {

                                                            if(strcmp($Categ, $row_Liste_Suivi->Diplome_Suivi) !== 0){

                                                                $Entete     =   $row_Liste_Suivi->Diplome_Suivi;

                                                                $Categ      =   $row_Liste_Suivi->Diplome_Suivi;

                                                                $Liste= $Liste."<br><br><strong>".$row_Liste_Suivi->Diplome_Suivi."</strong><hr>  ".$row_Liste_Suivi->Filiere_Suivi." ( Eff :  <strong class='titre-vert'>".$row_Liste_Suivi->Nombre_Apprenant_Suivi."</strong> - <strong class='titre-bleu'>".$row_Liste_Suivi->Nombre_Suivi_Stage."</strong> - <strong class='titre-orange'>".$row_Liste_Suivi->Nombre_Emploi_Spec."</strong> - <strong class='titre-rose'>".$row_Liste_Suivi->Nombre_Emploi_Hors_Spec."</strong> - <strong class='titre-rouge'>".$row_Liste_Suivi->Nombre_Auto_Emploi."</strong> - <strong class='titre-gris'>".$row_Liste_Suivi->Nombre_Sans_Emploi. "</strong> )<br>";

                                                            }else{
                                                                $Liste= $Liste . $row_Liste_Suivi->Filiere_Suivi." ( Eff :  <strong class='titre-vert'>".$row_Liste_Suivi->Nombre_Apprenant_Suivi."</strong> - <strong class='titre-bleu'>".$row_Liste_Suivi->Nombre_Suivi_Stage."</strong> - <strong class='titre-orange'>".$row_Liste_Suivi->Nombre_Emploi_Spec."</strong> - <strong class='titre-rose'>".$row_Liste_Suivi->Nombre_Emploi_Hors_Spec."</strong> - <strong class='titre-rouge'>".$row_Liste_Suivi->Nombre_Auto_Emploi."</strong> - <strong class='titre-gris'>".$row_Liste_Suivi->Nombre_Sans_Emploi. "</strong> )<br>";
                                                            }



                                                }

                                                if (strlen($Liste)>=8){//A cause du retour chariot
                                                  $Liste = substr($Liste,8,strlen($Liste));  
                                                }


                                              echo $Liste;
                                                ?>               

                                            </div>         


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary">Annuler</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                     
 
                </div>               
                
                
                
                
                
                
             <div class="row mt-3">
                 
                  <div class="col-md-3 form-group">
                     <div class="etiquette mt-3">Formation</div>
                    <select name="Formation_Suivi" id="Formation_Suivi"class="form-select form-select-lg" aria-label=".form-select-lg example" >
                            <option></option>
                            <option>Technique</option>
                            <option>Professionnelle</option>
                            <option>Qualifiante</option>
                            <option>Apprentissage</option>
                     </select>
                 </div>                
                 
                  <div class="col-md-3 form-group">
                    <div class="etiquette mt-3">Diplome</div>
                    <select name="Diplome_Suivi" id="Diplome_Suivi"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >                       
                        
                             
                    </select> 
                </div>
                 
                 
                <div class="col-md-4 form-group">
                    <div class="etiquette mt-3">Fili&egrave;re</div>
                    <select name="Filiere_Suivi" id="Filiere_Suivi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      
                        
                        
                    </select> 
                    
                
                </div>

                
                  <div class="col-md-2 form-group">
                     <div class="etiquette_rouge mt-3">Nbre Suivi</div>
                      <input type="number" class="form-control" name="Nombre_Apprenant_Suivi" id="Nombre_Apprenant_Suivi" value="0">
                  </div> 
                 
                 
              </div>                
                

                
             <div class="row mt-3">
                 <div class="etiquette mt-3">Nombre des diplom&eacute;s ayant eu un :</div> 
                  <div class="col-md-4 form-group">
                     <div class="">Stage</div>
                      <input type="number" class="form-control" name="Nombre_Suivi_Stage" id="Nombre_Suivi_Stage" value="0" >
                  </div>
                  <div class="col-md-4 form-group">
                     <div class="">Emploi dans la Sp&eacute;cialit&eacute;</div>
                      <input type="number" class="form-control" name="Nombre_Emploi_Spec" id="Nombre_Emploi_Spec" value="0">
                  </div> 
                  <div class="col-md-4 form-group">
                     <div class="">Emploi hors Sp&eacute;cialit&eacute; &nbsp;&nbsp;</div>
                      <input type="number" class="form-control" name="Nombre_Emploi_Hors_Spec" id="Nombre_Emploi_Hors_Spec" value="0">
                  </div> 
                 
            </div>
                
            <div class="row mt-3">
                  <div class="col-md-4 form-group">
                     <div class="">Auto-Emploi</div>
                      <input type="number" class="form-control" name="Nombre_Auto_Emploi" id="Nombre_Auto_Emploi" value="0">
                  </div> 
                  <div class="col-md-4 form-group">
                     <div class="">Sans Emploi</div>
                      <input type="number" class="form-control" name="Nombre_Sans_Emploi" id="Nombre_Sans_Emploi" value="0">
                  </div>                 
            </div> 
                
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
 
                 <div class="row mt-3">
                 <div class="col-md-4 form-group text-center">
                    
                        
                        <button type="button" class="btn btn-success" name="btn_aj_suivi" id="btn_aj_suivi">Ajouter</button>
                 </div>
                    
                 <div class="col-md-4 form-group text-center">
                        ---
                 </div >
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-danger" name="btn_supp_suivi" id="btn_supp_suivi">Supprimer</button>
                 </div>
                    
              </div>
                <div class="text-center">
                    <a href="enquete.php?etape=demande#debut">Suivant</a>
                </div>
                
                
            </form>                
            </div> <!--Fin etape9-->             
             
              
              
              
              
  <!--ETAPE Demande--> 
              <div class="info" id="etape_demande">
              <h3 class="btn-etape2">Etape10 : Formulation de Demande d'Affect&eacute;s</h3>
              <div class="obligatoire">Tous les champs pr&eacute;c&eacute;d&eacute;s de (*) sont obligatoires</div>


            <form action="forms/maj_etape_demande.php" method="post" role="form" class="mt-4 form-control">

<!--Mat&eacute;riels de bureaux-->            

                <div id="demande-success" class="msg msg-success"><span class="bi bi-check-circle"></span>Succ&egrave;s!!</div>
                
                <div id="demande-warning" class="msg msg-warning"><span class="bi bi-exclamation-triangle"></span>Existe d&eacute;j&agrave;! Supprimez d'abord.</div>
                
                <div id="demande-danger" class="msg msg-danger"><span class="bi bi-exclamation-octagon"></span>Suppression &eacute;ffectu&eacute;e!</div>               
  
                
                 <div class="row mt-3">
               
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-etape3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          <h5><span class="bi bi-cursor-fill " style="color: yellow;" ></span>Consulter vos demandes exprim&eacute;s</h5>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">R&eacute;capitilatif de vos demandes </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">



                                            <div id="message_demande">


                                                <?php
                                                            $Liste="";
                                                            $Categ="XXX";

                                                        while ($row_Liste_Demande  =   $Liste_Demande->fetchObject()) {

                                                            if(strcmp($Categ, $row_Liste_Demande->Diplome_Demande) !== 0){

                                                                $Entete     =   $row_Liste_Demande->Diplome_Demande;

                                                                $Categ      =   $row_Liste_Demande->Diplome_Demande;

                                                                $Liste= $Liste."<br><br><strong>".$row_Liste_Demande->Diplome_Demande."</strong><hr>  ".$row_Liste_Demande->Filiere_Demande." ( <strong>".$row_Liste_Demande->Nombre_Affecte_Demande."</strong> )<br>";

                                                            }else{
                                                                $Liste= $Liste . $row_Liste_Demande->Filiere_Demande." ( <strong>".$row_Liste_Demande->Nombre_Affecte_Demande."</strong> )<br>";
                                                            }



                                                }

                                                if (strlen($Liste)>=8){//A cause du retour chariot
                                                  $Liste = substr($Liste,8,strlen($Liste));  
                                                }


                                              echo $Liste;
                                                ?>             

                                            </div>         


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary">Annuler</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                     
 
                </div>               
                
                
                
                
                
                
             <div class="row mt-3">
                 
                  <div class="col-md-3 form-group">
                     <div class="etiquette mt-3">Formation</div>
                    <select name="Formation_Demande" id="Formation_Demande"class="form-select form-select-lg" aria-label=".form-select-lg example" >
                            <option></option>
                            <option>Technique</option>
                            <option>Professionnelle</option>
                            <option>Qualifiante</option>
                            <option>Apprentissage</option>
                     </select>
                 </div>                
                 
                  <div class="col-md-3 form-group">
                    <div class="etiquette mt-3">Diplome</div>
                    <select name="Diplome_Demande" id="Diplome_Demande"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >                       
                        
                             
                    </select> 
                </div>
                 
                 
                <div class="col-md-4 form-group">
                    <div class="etiquette mt-3">Fili&egrave;re</div>
                    <select name="Filiere_Demande" id="Filiere_Demande" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Filiere_Demande">
                      
                        
                        
                    </select> 
                    
                
                </div>

                
                 <div class="col-md-2 form-group">
                    <div class="etiquette mt-3">Demande</div>
                    <input type="number" class="form-control" name="Nombre_Affecte_Demande" id="Nombre_Affecte_Demande" value="0">
                 </div>
                 
                 
              </div>                
                
  
                                
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
 
                 <div class="row mt-3">
                 <div class="col-md-4 form-group text-center">
                    
                        
                        <button type="button" class="btn btn-success" name="btn_aj_demande" id="btn_aj_demande">Ajouter</button>
                 </div>
                    
                 <div class="col-md-4 form-group text-center">
                        ---
                 </div >
                    
                 <div class="col-md-4 form-group text-center">
                        <button type="button" class="btn btn-danger" name="btn_supp_demande" id="btn_supp_demande">Supprimer</button>
                 </div>
                    
              </div>
                <div class="text-center">
                    <a href="enquete.php?etape=identification#debut">Suivant</a>
                </div>
                
                
            </form>                
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
            $("#etape_identification").hide();
            $("#etape_infrastructures").hide();
            $("#etape_commodites").hide();
            $("#etape_personnel").hide();
            $("#etape_vulnerabilites").hide();
            $("#etape_partenariats").hide();
            $("#etape_eleves_filiere").hide();
            $("#etape_equipements").hide();
            $("#etape_suivi").hide();
            $("#etape_demande").hide();
        
                       
            
        }
        
        
        
        		
        
        
        
            /*EAU A MASQUER*/
            $("#et-eau").hide();
            $("#Eau_Potable1").click(function(){
                $("#et-eau").show();
                $("#Nbre_Eau_Potable").prop("required", true);
            });
        
            $("#Eau_Potable2").click(function(){
                $("#et-eau").hide();
                
                $("#Nbre_Eau_Potable").val('');
                $("#Nbre_Eau_Potable").prop("required", false);               
                
            });
        
            if ( $("input[name='Eau_Potable']:checked").val() === 'Oui') { 
                $("#et-eau").show();
                $("#Nbre_Eau_Potable").prop("required", true);
            }else{
                $("#Nbre_Eau_Potable").prop("required", false);
            }        
        
        
        
            /*SPORT A MASQUER*/
            $("#et-sport").hide();
            $("#Espace_Sport1").click(function(){
                $("#et-sport").show();
                
                $("#Espace_Sport_Interieur1").prop("required", true);
                    
            });
        
            $("#Espace_Sport2").click(function(){
                $("#et-sport").hide();
                
                $("#Espace_Sport_Interieur1").prop("checked", false);
                $("#Espace_Sport_Interieur2").prop("checked", false); 
                
                $("#Espace_Sport_Interieur1").prop("required", false); 
                
            });
        
            if ( $("input[name='Espace_Sport']:checked").val() === 'Oui') { 
                $("#et-sport").show();
                $("#Espace_Sport_Interieur1").prop("required", true);
            }else{
                $("#Espace_Sport_Interieur1").prop("required", false);
            }        
        
            /*CANTINE A MASQUER*/
            $("#et-cantine").hide();
            $("#Cantine1").click(function(){
                $("#et-cantine").show();
                
                $("#Cantine_Fonctionnelle1").prop("required", true);
            });
        
              
            /*CANTINE A MASQUER*/
            $("#et-cantine").hide();
            $("#Cantine1").click(function(){
                $("#et-cantine").show();
                
                $("#Cantine_Fonctionnelle1").prop("required", true);
            });
        
            $("#Cantine2").click(function(){                
                $("#et-cantine").hide();
                
                $("#Cantine_Fonctionnelle1").prop("checked", false);
                $("#Cantine_Fonctionnelle2").prop("checked", false);
                
                $("#Cantine_Fonctionnelle1").prop("required", false);
                
                $("#et-cantine-fct").hide();
                $("#Cantine_Gest_Etabl1").prop("checked", false);
                $("#Cantine_Gest_Etabl2").prop("checked", false);
                $("#Cantine_Jour_Ouv").val('');
                
                $("#Cantine_Gest_Etabl1").prop("required", false);
                $("#Cantine_Jour_Ouv").prop("required", false);
            });
        
            if ( $("input[name='Cantine']:checked").val() === 'Oui') { 
                $("#et-cantine").show();
                $("#Cantine_Fonctionnelle1").prop("required", true);
            }else{
                $("#Cantine_Fonctionnelle1").prop("required", false);
            }
        
        
            /*CANTINE FONCTIONNELLE A MASQUER*/
            $("#et-cantine-fct").hide();
            $("#Cantine_Fonctionnelle1").click(function(){
                $("#et-cantine-fct").show();
                
                $("#Cantine_Gest_Etabl1").prop("required", true);
                $("#Cantine_Jour_Ouv").prop("required", true);                
                
            });
        
            $("#Cantine_Fonctionnelle2").click(function(){
                $("#et-cantine-fct").hide();
                
                $("#Cantine_Gest_Etabl1").prop("checked", false);
                $("#Cantine_Gest_Etabl2").prop("checked", false);
                $("#Cantine_Jour_Ouv").val('');
                
                $("#Cantine_Gest_Etabl1").prop("required", false);
                $("#Cantine_Jour_Ouv").prop("required", false);               
            }); 
        
            if ( $("input[name='Cantine_Fonctionnelle']:checked").val() === 'Oui') { 
                $("#et-cantine-fct").show();
                $("#Cantine_Gest_Etabl1").prop("required", true);
                $("#Cantine_Jour_Ouv").prop("required", true);
            }else{
                $("#Cantine_Gest_Etabl1").prop("required", false);
                $("#Cantine_Jour_Ouv").prop("required", false);
            }

        
        
        
            /*CLOTURE A MASQUER*/
            $("#et-cloture").hide();
            $("#Cloture1").click(function(){
                $("#et-cloture").show();
                $("#Etat_Cloture1").prop("required", true);
            });
        
            $("#Cloture2").click(function(){
                $("#et-cloture").hide();
                
                $("#Etat_Cloture1").prop("checked", false);
                $("#Etat_Cloture2").prop("checked", false); 
                $("#Etat_Cloture3").prop("checked", false);
                
                $("#Etat_Cloture1").prop("required", false);
            });
        
           if ( $("input[name='Cloture']:checked").val() === 'Oui') { 
                $("#et-cloture").show();
               $("#Etat_Cloture1").prop("required", true);
            }else{
               $("#Etat_Cloture1").prop("required", false); 
            }     

        
        
            /*INFIRMERIE A MASQUER*/
            $("#et-infirmerie").hide();
            $("#Infirmerie1").click(function(){
                $("#et-infirmerie").show();
                $("#Infirmerie_Fonctionnelle1").prop("required", true);
            });
        
            $("#Infirmerie2").click(function(){
                $("#et-infirmerie").hide();
                
                $("#Infirmerie_Fonctionnelle1").prop("checked", false);
                $("#Infirmerie_Fonctionnelle2").prop("checked", false);
                
                $("#Infirmerie_Fonctionnelle1").prop("required", false);
                
            });
        
           if ( $("input[name='Infirmerie']:checked").val() === 'Oui') { 
                $("#et-infirmerie").show();
                $("#Infirmerie_Fonctionnelle1").prop("required", true);    
            }else{
                
                $("#Infirmerie_Fonctionnelle1").prop("required", false); 
            }  
        
        
        
            /*SALLE DE PROF*/
            $("#et-salle-prof").hide();
            $("#Salle-Prof1").click(function(){
                $("#et-salle-prof").show();
            });
        
            $("#Salle-Prof2").click(function(){
                $("#et-salle-prof").hide();
                
            });
        
        
            /*INTERNAT A MASQUER*/
            $("#et-internat").hide();
            $("#Internat1").click(function(){
                $("#et-internat").show();
                
                $("#Internat_Ouv1").prop("required", true);
                $("#Type_Internat1").prop("required", true);
                $("#Nbre_Lits").prop("required", true);                
            });
        
            $("#Internat2").click(function(){
                $("#et-internat").hide();
                
                $("#Internat_Ouv1").prop("checked", false);
                $("#Internat_Ouv2").prop("checked", false);
                $("#Type_Internat1").prop("checked", false);
                $("#Type_Internat2").prop("checked", false); 
                $("#Type_Internat3").prop("checked", false);                
                $("#Nbre_Lits").val('');
                
                $("#Internat_Ouv1").prop("required", false);
                $("#Type_Internat1").prop("required", false);
                $("#Nbre_Lits").prop("required", false);                
                
            });  
           if ( $("input[name='Internat']:checked").val() === 'Oui') { 
                $("#et-internat").show();
                $("#Internat_Ouv1").prop("required", true);
                $("#Type_Internat1").prop("required", true);
                $("#Nbre_Lits").prop("required", true);
               
            } else{
                $("#Internat_Ouv1").prop("required", false);
                $("#Type_Internat1").prop("required", false);
                $("#Nbre_Lits").prop("required", false);                
            }
        
        
            /*LATRINES A MASQUER*/
            $("#et-latrine").hide();
            $("#Latrine1").click(function(){
                $("#et-latrine").show();
                
                $("#Latrine_Separee1").prop("required", true);
                $("#Nbre_Latrine_Garcon").prop("required", true);
                $("#Nbre_Latrine_Fille").prop("required", true);
                $("#Nbre_Latrine_Mixte").prop("required", true);
            });
        
            $("#Latrine2").click(function(){
                $("#et-latrine").hide();
                
                $("#Latrine_Separee1").prop("checked", false);
                $("#Latrine_Separee2").prop("checked", false);              
                $("#Nbre_Latrine_Garcon").val('');
                $("#Nbre_Latrine_Fille").val('');
                $("#Nbre_Latrine_Mixte").val('');
                
                $("#Latrine_Separee1").prop("required", false);
                $("#Nbre_Latrine_Garcon").prop("required", false);
                $("#Nbre_Latrine_Fille").prop("required", false);
                $("#Nbre_Latrine_Mixte").prop("required", false);                
                
            });
           if ( $("input[name='Latrine']:checked").val() === 'Oui') { 
                $("#et-latrine").show();
               
                $("#Latrine_Separee1").prop("required", true);
                $("#Nbre_Latrine_Garcon").prop("required", true);
                $("#Nbre_Latrine_Fille").prop("required", true);
                $("#Nbre_Latrine_Mixte").prop("required", true);               
               
            }else{
                $("#Latrine_Separee1").prop("required", false);
                $("#Nbre_Latrine_Garcon").prop("required", false);
                $("#Nbre_Latrine_Fille").prop("required", false);
                $("#Nbre_Latrine_Mixte").prop("required", false);                
            } 
        
        
 
            /*SALLE INFO A MASQUER*/
            $("#et-salle-info").hide();
            $("#Salle_Info1").click(function(){ 
                $("#et-salle-info").show();
                
                $("#Salle_Info_Connecte1").prop("required", true);
                $("#Nbre_Ordi").prop("required", true);
                $("#Nbre_Ordi_Fonctionnel").prop("required", true);
                $("#Salle_Access_Eleve1").prop("required", true);
                $("#Salle_Access_Hors_Cours1").prop("required", true);
                $("#Salle_Access_Prof1").prop("required", true);
            });
        
            $("#Salle_Info2").click(function(){
                $("#et-salle-info").hide();
                
                
                $("#Salle_Info_Connecte1").prop("checked", false);
                $("#Salle_Info_Connecte2").prop("checked", false);              
                $("#Nbre_Ordi").val('');
                $("#Nbre_Ordi_Fonctionnel").val('');
                $("#Salle_Access_Eleve1").prop("checked", false);
                $("#Salle_Access_Eleve2").prop("checked", false);
                $("#Salle_Access_Hors_Cours1").prop("checked", false);
                $("#Salle_Access_Hors_Cours2").prop("checked", false); 
                $("#Salle_Access_Prof1").prop("checked", false);
                $("#Salle_Access_Prof2").prop("checked", false); 
                
                $("#Salle_Info_Connecte1").prop("required", false);
                $("#Nbre_Ordi").prop("required", false);
                $("#Nbre_Ordi_Fonctionnel").prop("required", false);
                $("#Salle_Access_Eleve1").prop("required", false);
                $("#Salle_Access_Hors_Cours1").prop("required", false);
                $("#Salle_Access_Prof1").prop("required", false);
                
            });        
           if ( $("input[name='Salle_Info']:checked").val() === 'Oui') { 
                    $("#et-salle-info").show(); 
               
                    $("#Salle_Info_Connecte1").prop("required", true);
                    $("#Nbre_Ordi").prop("required", true);
                    $("#Nbre_Ordi_Fonctionnel").prop("required", true);
                    $("#Salle_Access_Eleve1").prop("required", true);
                    $("#Salle_Access_Hors_Cours1").prop("required", true);
                    $("#Salle_Access_Prof1").prop("required", true);
               
            }else{
                    $("#Salle_Info_Connecte1").prop("required", false);
                    $("#Nbre_Ordi").prop("required", false);
                    $("#Nbre_Ordi_Fonctionnel").prop("required", false);
                    $("#Salle_Access_Eleve1").prop("required", false);
                    $("#Salle_Access_Hors_Cours1").prop("required", false);
                    $("#Salle_Access_Prof1").prop("required", false);                
                
            }

        
          
        
        
            /*CONNEXION INTERNET  A MASQUER*/
            $("#et-cnx-internet").hide();
            $("#Internet1").click(function(){
                $("#et-cnx-internet").show();
                
                $("#Access_Internet_Eleve1").prop("required", true);
                $("#Access_Internet_Prof1").prop("required", true);
                $("#Access_Internet_Admn1").prop("required", true);
                $("#Internet_Illimite1").prop("required", true);
            });
        
            $("#Internet2").click(function(){
                $("#et-cnx-internet").hide();
                
                $("#Access_Internet_Eleve1").prop("checked", false);
                $("#Access_Internet_Eleve2").prop("checked", false);
                $("#Access_Internet_Prof1").prop("checked", false);
                $("#Access_Internet_Prof2").prop("checked", false); 
                $("#Access_Internet_Admn1").prop("checked", false);
                $("#Access_Internet_Admn2").prop("checked", false);
                $("#Internet_Illimite1").prop("checked", false);
                $("#Internet_Illimite2").prop("checked", false);
                
                $("#Access_Internet_Eleve1").prop("required", false);
                $("#Access_Internet_Prof1").prop("required", false);
                $("#Access_Internet_Admn1").prop("required", false);
                $("#Internet_Illimite1").prop("required", false);
 
                
                
            }); 
        
            if ( $("input[name='Internet']:checked").val() === 'Oui') { 
                       $("#et-cnx-internet").show();
                
                $("#Access_Internet_Eleve1").prop("required", true);
                $("#Access_Internet_Prof1").prop("required", true);
                $("#Access_Internet_Admn1").prop("required", true);
                $("#Internet_Illimite1").prop("required", true);                
            }else{
                $("#Access_Internet_Eleve1").prop("required", false);
                $("#Access_Internet_Prof1").prop("required", false);
                $("#Access_Internet_Admn1").prop("required", false);
                $("#Internet_Illimite1").prop("required", false);                 
                
            }
        
        
        

            /*SITE INTERNET  A MASQUER*/
            $("#et-Nom-Site").hide();
            $("#Site_Internet1").click(function(){
                $("#et-Nom-Site").show();
                
                $("#Nom_Site").prop("required", true);
            });
        
            $("#Site_Internet2").click(function(){
                $("#et-Nom-Site").hide();
                
                $("#Nom_Site").val('');
                
                $("#Nom_Site").prop("required", false);
                
            }); 
        
             if ( $("input[name='Site_Internet']:checked").val() === 'Oui') { 
                    $("#et-Nom-Site").show();
                    $("#Nom_Site").prop("required", true);
            }else{
                $("#Nom_Site").prop("required", false);
            }
          
        
        
            /*LIST TICS  A MASQUER*/
            $("#et-list-TIC").hide();
            $("#TIC1").click(function(){
                $("#et-list-TIC").show();
                
                $("#List_Activites_TIC").prop("required", true);
                $("#Eleve_Benef_Act_TIC1").prop("required", true);
            });
        
            $("#TIC2").click(function(){
                $("#et-list-TIC").hide();
                
                
                $("#List_Activites_TIC").val(''); 
                $("#Eleve_Benef_Act_TIC1").prop("checked", false);
                $("#Eleve_Benef_Act_TIC2").prop("checked", false);
                
                $("#List_Activites_TIC").prop("required", false);
                $("#Eleve_Benef_Act_TIC1").prop("required", false);
                
                
            });  
             if ( $("input[name='TIC']:checked").val() === 'Oui') { 
                       $("#et-list-TIC").show();
                 
                $("#List_Activites_TIC").prop("required", true);
                $("#Eleve_Benef_Act_TIC1").prop("required", true);                 
            }else{
                $("#List_Activites_TIC").prop("required", false);
                $("#Eleve_Benef_Act_TIC1").prop("required", false); 
            }        
        
        
        
        
        
        
            /*RELATION PROFESSIONNELLE  A MASQUER*/
            $("#et-rela-prof").hide();
            $("#Relation_Entreprise1").click(function(){
                $("#et-rela-prof").show();
                
                $("#Type_Relation_Entr1").prop("required", true);
            });
        
            $("#Relation_Entreprise2").click(function(){
                $("#et-rela-prof").hide();
                
                $("#Type_Relation_Entr1").prop("checked", false);
                $("#Type_Relation_Entr2").prop("checked", false);
                
                $("#Type_Relation_Entr1").prop("required", false);
                
            });       
             if ( $("input[name='Relation_Entreprise']:checked").val() === 'Oui') { 
                       $("#et-rela-prof").show();
                 
                $("#Type_Relation_Entr1").prop("required", true);
                
            }else{
               $("#Type_Relation_Entr1").prop("required", false); 
            }
        
            /*INSPECTION PEDAGOGIGUE  A MASQUER*/
            $("#et-insp-ped").hide();
            $("#Insp_Pedagogique1").click(function(){
                $("#et-insp-ped").show();
                
                $("#Nbre_Prof_Inspectes").prop("required", true);
                
                
            });
        
            $("#Insp_Pedagogique2").click(function(){
                $("#et-insp-ped").hide();
                
                
                $("#Nbre_Prof_Inspectes").prop("required", false);
                
                $("#Nbre_Prof_Inspectes").val('');
                
            });       
             if ( $("input[name='Insp_Pedagogique']:checked").val() === 'Oui') { 
                       $("#et-insp-ped").show();
                 
                $("#Nbre_Prof_Inspectes").prop("required", true);
                
            }else{
               $("#Nbre_Prof_Inspectes").prop("required", false); 
            }        
        
        
        
            /*QUANTUM HORAIRE  A MASQUER*/
             $("#et-quantum-horaire").hide();
            $("#Quantum_Horaire_Atteint1").click(function(){
                $("#et-quantum-horaire").show();
                
                $("#Justification_Quantum").prop("required", true);
                
                
            });
        
            $("#Quantum_Horaire_Atteint2").click(function(){
                $("#et-quantum-horaire").hide();
                
                $("#Justification_Quantum").prop("required", false);
                
                $("#Justification_Quantum").val('');
                
            });       
             if ( $("input[name='Quantum_Horaire_Atteint']:checked").val() === 'Oui') { 
                       $("#et-quantum-horaire").show();
                 
                $("#Justification_Quantum").prop("required", true);
                
            }else{
                $("#Justification_Quantum").prop("required", false);
            }       
        
        
            /*RENFORCEMENT CAPACITES  A MASQUER*/
        
               $("#et-renf-capacites").hide();
            $("#Renfo_Capacites2_1").click(function(){
                $("#et-renf-capacites").show();
                
                $("#List_Renfo_Capacites").prop("required", true);
            });
        
            $("#Renfo_Capacites2_2").click(function(){
                $("#et-renf-capacites").hide();
                
                
                $("#List_Renfo_Capacites").prop("required", false);
                
                $("#List_Renfo_Capacites").val('');
                
            });       
             if ( $("input[name='Renfo_Capacites2']:checked").val() === 'Oui') { 
                       $("#et-renf-capacites").show();
                 
                $("#List_Renfo_Capacites").prop("required", true);
                
            }else{
                $("#List_Renfo_Capacites").prop("required", false);
            }       
        
            /*FORMATION ENTREPEUNARIAT  A MASQUER*/
        
                $("#et-form-entrepeunariat").hide();
            $("#Form_Entrepeunariat_Disp1").click(function(){
                $("#et-form-entrepeunariat").show();
                
                $("#Eleve_Benef_Entrepeunariat1").prop("required", true);
            });
        
            $("#Form_Entrepeunariat_Disp2").click(function(){
                $("#et-form-entrepeunariat").hide();
                
                $("#Eleve_Benef_Entrepeunariat1").prop("checked", false);
                $("#Eleve_Benef_Entrepeunariat2").prop("checked", false);
                
                $("#Eleve_Benef_Entrepeunariat1").prop("required", false);
                
            });       
             if ( $("input[name='Form_Entrepeunariat_Disp']:checked").val() === 'Oui') { 
                       $("#et-form-entrepeunariat").show();
                 
                $("#Eleve_Benef_Entrepeunariat1").prop("required", true);
                
            }else{
                $("#Eleve_Benef_Entrepeunariat1").prop("required", false);
            }  
        
    
        
/*BOUTONS*/        /*NON ONCTIONNEL BOUTTONS 5 ET 6  A MASQUER*/
           if ( $("input[name='Situation_Etablissement']:checked").val() === 'Non Fonctionnel') { 
                    $("#bt_commodites").hide();
                    $("#bt_personnel").hide();
                    $("#bt_vulnerabilites").hide();
                    $("#bt_partenariats").hide();
                    $("#bt_eleves_filiere").hide();
               
//                    $("#bt_etape3").prop("disabled", true); 
//                    $("#bt_etape4").prop("disabled", true);
//                    $("#bt_etape5").prop("disabled", true);
//                    $("#bt_etape6").prop("disabled", true);
//                    $("#bt_etape7").prop("disabled", true);
              
            }else{
                    $("#bt_commodites").show();
                    $("#bt_personnel").show();
                    $("#bt_vulnerabilites").show();
                    $("#bt_partenariats").show();
                    $("#bt_eleves_filiere").show();
                
//                    $("#bt_etape3").prop("disabled", false);
//                    $("#bt_etape4").prop("disabled", false);
//                    $("#bt_etape5").prop("disabled", false);
//                    $("#bt_etape6").prop("disabled", false);
//                    $("#bt_etape7").prop("disabled", false); 
            }
        
        
        
        
        /*REFORME FP  A MASQUER*/
            $("#et-reforme-fp").hide();
           if ( $("input[name='Hidden_Statut']").val() === 'Public') { 
                   $("#et-reforme-fp").show();
               
                    //$("#et-fondateur").hide();
                    $("input[name='Nom_Fond']").val('METFPA');
                    $("input[name='Nom_Fond']").prop("readonly", true); 
                    $("input[name='Contact_Fond']").val('00 00 00 00 00');
                    $("input[name='Contact_Fond']").prop("readonly", true);
                    $("#et-statut-etablissement").hide();
                    $("#PSC").prop("required", false);
              
            }else{
                $("#et-reforme-fp").hide();
                    $("#Exp_Gouvernance_Etabl1").prop("checked", false);
                    $("#Exp_Gouvernance_Etabl2").prop("checked", false);
                    $("#Exp_CAP1").prop("checked", false);
                    $("#Exp_CAP2").prop("checked", false);
                    $("#Exp_Form_Apprentissage1").prop("checked", false);
                    $("#Exp_Form_Apprentissage2").prop("checked", false);
                    $("#Exp_Form_Alternance1").prop("checked", false);
                    $("#Exp_Form_Alternance2").prop("checked", false);                 
            }       
        
/*------MASQUER LES MSG D'INFORMATION --> infrastructure/mobilier/recapitulatif*/
        //$("#infrastructure1-success").hide();
        $("#infrastructure-success").hide();
        $("#infrastructure-warning").hide();
        $("#infrastructure-danger").hide();
        
        $("#mobilier-success").hide();
        $("#mobilier-warning").hide();
        $("#mobilier-danger").hide();  
        
        $("#recap-success").hide();
        $("#recap-warning").hide();
        $("#recap-danger").hide();
        
        $("#demande-success").hide();
        $("#demande-warning").hide();
        $("#demande-danger").hide();

        $("#suivi-success").hide();
        $("#suivi-warning").hide();
        $("#suivi-danger").hide(); 
        
        
//---------------LISTE DEOULANTES BOUTONS -----------//
var Filiere_Pro             =   '';
var Filiere_Tech            =   '';
var Filiere_CQP             =   '';
var Filiere_Qualifiante     =   '';
var Filiere_CAP             =   '';
var Filiere_BEP             =   '';
var Filiere_BP              =   '';
var Filiere_BT              =   '';
var Filiere_BAC             =   '';
var Filiere_Seconde         =   '';
var Filiere_Premiere        =   '';
var Filiere_Terminale       =   '';        
var Filiere_BTS             =   '';        
        
//on recupere la liste dans des vars        
$('#Filiere option').each(function() {    
    myArray = $(this).val().split("|");
    Nom_Filiere     =   myArray[0];
    Formation       =   myArray[4];
    CQP             =   myArray[5];
    Qualifiante     =   myArray[6];
    CAP             =   myArray[7];
    BEP             =   myArray[8];
    BP              =   myArray[9];
    BT              =   myArray[10];
    BAC             =   myArray[11];
    BTS             =   myArray[12];


    if (Formation==='P'){
        Filiere_Pro +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>'; 

    } 
    if(Formation ==='T'){
         Filiere_Tech +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
        
    }
    
    
if (CQP==='1'){
  Filiere_CQP   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}    
    
if (Qualifiante==='1'){
  Filiere_Qualifiante   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}
if (CQP==='1'){
  Filiere_CQP   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}    
    
if (CAP==='1'){
  Filiere_CAP   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}
if (BEP==='1'){
  Filiere_BEP   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}    
    
if (BP==='1'){
  Filiere_BP   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>'; 
}    
if (BT==='1'){
  Filiere_BT   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}
if (BAC==='1'){
  Filiere_BAC   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
    
    if (Nom_Filiere=='AB' || Nom_Filiere=='G1' || Nom_Filiere=='G2' || Nom_Filiere=='F2' || Nom_Filiere=='T1' || Nom_Filiere=='T2' || Nom_Filiere=='T3')
    { Filiere_Seconde   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;  }
    
     if (Nom_Filiere=='B' || Nom_Filiere=='G1' || Nom_Filiere=='G2' || Nom_Filiere=='E' || Nom_Filiere=='F1' || Nom_Filiere=='F2' || Nom_Filiere=='F3' || Nom_Filiere=='F4'|| Nom_Filiere=='F7')
     { Filiere_Premiere   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;  }
    
     if (Nom_Filiere=='B' || Nom_Filiere=='G1' || Nom_Filiere=='G2' || Nom_Filiere=='E' || Nom_Filiere=='F1' || Nom_Filiere=='F2' || Nom_Filiere=='F3' || Nom_Filiere=='F4'|| Nom_Filiere=='F7')
     { Filiere_Terminale   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;  }     
}    
    
if (BTS==='1'){
  Filiere_BTS   +='<option value='+ '"' +$(this).val() +'">'+ $(this).text() + '</option>' ;
}
    
 });

     
        
// on vide le contenu de la liste     
 $('#Filiere').html('<option></option>');    

        
        $("#Formation").change(function(){
            
           if ($("#Formation").val() =='Professionnelle'){
               $("#et-redoublant").hide();
           }else{
               $("#et-redoublant").show();
           } loading_formation(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);

            
        });
          $("#Diplome").change(function(){
              loading_diplome(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);  

            
        });
           $("#Annee_Etude").change(function(){
              loading_annee(Filiere_Seconde,Filiere_Premiere,Filiere_Terminale);  

            
        });       
        $("#Formation_Demande").change(function(){
            
            loading_formation_demande(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);
            
        });
        $("#Diplome_Demande").change(function(){
              loading_diplome_demande(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);  

            
        });
        
        $("#Formation_Suivi").change(function(){
            
           loading_formation_suivi(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);
            
        });
        $("#Diplome_Suivi").change(function(){
              loading_diplome_suivi(Filiere_CQP,Filiere_Qualifiante,Filiere_CAP,Filiere_BEP,Filiere_BP,Filiere_BT,Filiere_Seconde, Filiere_BTS);  

            
        });         
        
//---------------BOUTONS DES ETAPES-----------//
//---------------BOUTONS DES ETAPES-----------//
        
            CacherBouttons();
            $("#etape_identification").show();
        
        
        $("#bt_identification").click(function(){
            
            CacherBouttons();
           // Maj_Etp1();
            $("#etape_identification").show();
            
           
            
        });
        
         $("#bt_infrastructures").click(function(){

            CacherBouttons();
            $("#etape_infrastructures").show();
             
            
        });
        
        
        
          $("#bt_commodites").click(function(){

            CacherBouttons();
            $("#etape_commodites").show();
             
            
        }); 
        
        
        
         $("#bt_personnel").click(function(){
            CacherBouttons();
            $("#etape_personnel").show();
             
            
        });        
        
        
          $("#bt_vulnerabilites").click(function(){
            CacherBouttons();
            $("#etape_vulnerabilites").show();
             
            
        });        
        
        
          $("#bt_partenariats").click(function(){
            CacherBouttons();
            $("#etape_partenariats").show();
             
            
        }); 
        
           $("#bt_eleves_filiere").click(function(){
            CacherBouttons();
            $("#etape_eleves_filiere").show();
             
            
        });        
        
        
          $("#bt_equipements").click(function(){
            CacherBouttons();
            $("#etape_equipements").show();
             
            
        });       
        
           $("#bt_suivi").click(function(){
            CacherBouttons();
            $("#etape_suivi").show();
             
            
        });        
        
        
          $("#bt_demande").click(function(){
            CacherBouttons();
            $("#etape_demande").show();
             
            
        });
        

        
//-----------RECUPERER PARAMETRES URL-----------
   let searchParams = new URLSearchParams(window.location.search)
searchParams.has('etape') 
let etape = searchParams.get('etape')
//alert(etape);        
      
             if ( etape === 'identification') { 
                CacherBouttons();
                 $("#etape_identification").show();
                
            }
              if ( etape === 'infrastructures') { 
                CacherBouttons();
                 $("#etape_infrastructures").show();
                
            }       
             if ( etape === 'commodites') { 
                CacherBouttons();
                 $("#etape_commodites").show();
                
            }
              if ( etape === 'personnel') { 
                CacherBouttons();
                 $("#etape_personnel").show();
                
            }        
                if ( etape === 'vulnerabilites') { 
                CacherBouttons();
                 $("#etape_vulnerabilites").show();
                
            }
              if ( etape === 'partenariats') { 
                    CacherBouttons();
                     $("#etape_partenariats").show();

                } 
              if ( etape === 'eleves_filiere') { 
                CacherBouttons();
                 $("#etape_eleves_filiere").show();
                
            }     

               if ( etape === 'equipements') { 
                CacherBouttons();
                 $("#etape_equipements").show();
                
            }        
                if ( etape === 'suivi') { 
                CacherBouttons();
                 $("#etape_suivi").show();
                
            }
              if ( etape === 'demande') { 
                CacherBouttons();
                 $("#etape_demande").show();
                
            }         
        
  
            if ( $("input[name='Situation_Etablissement']:checked").val() === 'Non Fonctionnel' && (etape === 'commodites' || etape === 'personnel'|| etape === 'vulnerabilites'|| etape === 'partenariats'|| etape === 'eleves_filiere')) {
                CacherBouttons();
                 $("#etape_identification").show();                
            }        
//-----------BOUTONS DES MISE A JOUR-----------
        
        
        /*INFRASTRUCTURE*/
           $("#btn_cons_mobilier").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_infras").click(function(){
               //alert ('data');
               maj_etape_immobiliers_sucess();
             
            
        });        
        
            $("#btn_supp_infras").click(function(){
               
              maj_etape_immobiliers_delete();
             
            
        });
        
        
        
        
            /*MOBILIER*/
        
             $("#btn_cons_mobilier").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_mobilier").click(function(){
               
               if ($("#Nbre_Mobilier").val()>0){
                    maj_etape_mobiliers_sucess();
                   $("#Nbre_Mobilier").val('0');
                   }else{alert('Le nombre du mobilier doit être supérieur à 0');}
               
             
            
        });        
        
            $("#btn_supp_mobilier").click(function(){
               
               maj_etape_mobiliers_delete();
             
            
        });      
        
        
        
             /*RECAPITULATIF*/
        
             $("#btn_cons_recap").click(function(){
               
               //Maj_Etp7_1_sucess();
             
            
        }); 
        
           $("#btn_aj_recap").click(function(){
               alert('aj');
               if ($('#Filiere').val()==''){
                   alert('Veuillez renseigner la filière');
               } else{
                maj_etape_eleves_filiere_sucess();   
               }
               
             
            
        });        
        
            $("#btn_supp_recap").click(function(){
               alert('supp');
               maj_etape_eleves_filiere_delete();
             
            
        });        
        
        //SUIVI
        
            $("#btn_aj_suivi").click(function(){
               //alert('aj suivi');
               maj_etape_suivi_sucess();
             
            
        });        
        
              $("#btn_supp_suivi").click(function(){
               //alert('supp demande');
               maj_etape_suivi_delete();
             
            
        });      
               
        
        //DEMANDE
   
           $("#btn_aj_demande").click(function(){
               //alert('aj demande');
               maj_etape_demande_sucess();
             
            
        });        
        
              $("#btn_supp_demande").click(function(){
               //alert('supp demande');
               maj_etape_demande_delete();
             
            
        });      
        
        
        
        
        
    });
           
           
    
    </script> 

</body>

</html>