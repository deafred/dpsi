<?php





if (isset ($_POST['agent_etb'])){
 
 header("Location: ". 'etablissement.php' );
    
}else if (isset ($_POST['agent_dr'])){
    
     header("Location: ". 'dr.php' );
    
}else if (isset ($_POST['agent_dpsi'])){
    
    header("Location: ". 'dpsi.php' );
    
}else{
    
    header("Location: ". 'menu.php' );
}



?>