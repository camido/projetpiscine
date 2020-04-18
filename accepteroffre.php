<?php
    
session_start();

$idArticle = $_GET['id'];
$typeutilisateur= $_SESSION['type_utilisateur'];
//identifier votre BDD
//connectez-vous de la BDD
$database = 'ebayece';
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
if ($db_found) 
{
    if($idArticle && $typeutilisateur)
    {
        $sql3 = "DELETE FROM item WHERE id_item = '$idArticle'";
        $result3 = mysqli_query($db_handle, $sql3);
        if($typeutilisateur==='acheteur')
        {

            echo '<body onLoad="alert(\'Vous avez achetez cette article !\')">';
            echo '<meta http-equiv="refresh" content="0;URL=offres.php">';
        }
        elseif ($typeutilisateur==='vendeur')
        {
            echo '<body onLoad="alert(\'La vente a eu lieu !\')">';
            echo '<meta http-equiv="refresh" content="0;URL=offrevendeur.php">';
        }
        elseif ($typeutilisateur==='admin')
        {
            echo '<body onLoad="alert(\'La vente a eu lieu !\')">';
            //echo '<meta http-equiv="refresh" content="0;URL=offrevendeur.php">';
        }

    }
}
?>