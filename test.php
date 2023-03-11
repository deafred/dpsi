<?php require_once('maj_files/config.php'); ?>
<?php require_once('maj_files/mesfonctions.php'); ?>

<?php

   $query_ListeEtb = "SELECT * FROM ETABLISSEMENT WHERE Code_dspss1='NA-6J51'";
    
    $ListeEtb             =   $idcom->query($query_ListeEtb);
    $row_ListeEtb         =   $ListeEtb->fetchObject();
    $totalRows_ListeEtb  =   $ListeEtb->rowCount();


    echo $row_ListeEtb->Nom_Etablissement."<br>";
    
    $Status=0;
    $Nbre_Etape=0;
    $Etape_Restante="";

    $Resulat = recap_etapes($row_ListeEtb );
        
        echo $Resulat[2]."<br>";

$totalPages_ListeEtb=2;
$currentPage="monitoring_validation.php";
    $totalRows_ListeEtb=297;

 numerotation($totalPages_ListeEtb,$currentPage,$totalRows_ListeEtb);    




//   $query_ListeDR = "";
    
//    $ListeDR                =   $idcom->query($query_ListeDR);
//    $row_ListeDR            =   $ListeDR->fetchObject();
//    $totalRows_ListeDR      =   $ListeDR->rowCount();


$query_ListeDR                    = $idcom->prepare("SELECT * FROM etablissement WHERE Direction_Regionale='BOUAKE'");

$query_ListeDR->setFetchMode(PDO::FETCH_ASSOC);

$query_ListeDR->execute();


while($row = $query_ListeDR->fetch())
{
    echo $row['Nom_Etablissement']."<br>";
}
echo "<hr>";


while($row = $query_ListeDR->fetch())
{
    echo $row['Nom_Etablissement']."<br>";
}

echo "<hr>"; 
//print_r($row_ListeDR);

//        ListeEtablissement($ListeDR);
//        echo "<hr>";
//        ListeEtablissement($ListeDR1);


//    $i=0;
//    foreach ($row_ListeDR  as $row_ListeDRs){
//        
//        //echo $row_ListeDR->Nom_Etablissement."<br>";
//        echo $row_ListeDRs['Nom_Etablissement']."<br>";
//    }
//
//echo"<hr>";
//
//
//    foreach ($row_ListeDR1  as $row_ListeDRss){
//        
//        //echo $row_ListeDR->Nom_Etablissement."<br>";
//        echo $row_ListeDRss['Nom_Etablissement']."<br>";
//    }



?>