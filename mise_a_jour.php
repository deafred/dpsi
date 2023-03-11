<?php require_once('maj_files/config.php'); ?>

<?php
echo "BONJOURS<br>";

//Liste de tous les établissement
    $query_Liste_Etablissement      =   "SELECT * FROM ERSYS_RECAP ";
    $Liste_Etablissement            =   $idcom->query($query_Liste_Etablissement);
    
    $totalRows_Liste_Etablissement  =   $Liste_Etablissement->rowCount();		
    $i=0;
    $var_seek='';
    while ($row_Liste_Etablissement        =   $Liste_Etablissement->fetchObject()){
        
         $var_seek = $row_Liste_Etablissement->ERSYS;
        $var_seek  = str_replace("'","''",$var_seek);
     //echo $var_seek."<br>";
        //Liste de tous les établissement
            $query_Seek_Etablissement      =   "SELECT * FROM MAPPING where ERSYS='$var_seek'  ";
            $Seek_Etablissement            =   $idcom->query($query_Seek_Etablissement);
            $totalRows_Seek_Etablissement  =   $Seek_Etablissement->rowCount();
        
            if ($totalRows_Seek_Etablissement>0){
                $row_Seek_Etablissement        =   $Seek_Etablissement->fetchObject();
                $SYSPAS = $row_Seek_Etablissement->SYSPAS;
                
                $query_update = "UPDATE  ERSYS_RECAP SET SYSPAS='$SYSPAS' WHERE ERSYS='$var_seek' ";
                
                //echo "$query_update<br>";
                $req=$idcom->exec($query_update); 

                $i++;
                
            }
            
        $var_seek='';
        $SYSPAS='';
//        $i++;
    }
$query_update = "UPDATE  ERSYS_RECAP SET FORMATION='Technique' WHERE Diplome='BAC' ";
$req=$idcom->exec($query_update);

$query_update = "UPDATE  ERSYS_RECAP SET FORMATION='Professionnelle' WHERE Diplome IN ('CAP','BEP','BT','BP','BTS') ";
$req=$idcom->exec($query_update);

$query_update = "UPDATE  ERSYS_RECAP SET FORMATION='Apprentissage' WHERE Diplome='CQP' ";
$req=$idcom->exec($query_update);

echo 'Nous avons fait le mapping de  '.$i;

?>