<?php
    
session_start();

$idOffre = $_GET['id'];
//identifier votre BDD
//connectez-vous de la BDD
$database = 'ebayece';
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
if ($db_found) 
{
    if($idOffre)
    {
            $sql3 = "DELETE FROM meilleureoffre WHERE id_offre = $idOffre";
            $result3 = mysqli_query($db_handle, $sql3);
            echo '<body onLoad="alert(\'Vous avez refusez la vente !\')">';
            echo '<meta http-equiv="refresh" content="0;URL=offrevendeur.php">';
    

    }
}
?>