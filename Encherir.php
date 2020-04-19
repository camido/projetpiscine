<?php
session_start();
$idArticle = $_SESSION['id_item'];
$idAcheteur =$_SESSION['id_utilisateur'];
if($_SESSION['action']!=='autoriser')
{
$enchere =  isset($_POST["enchere"])? $_POST["enchere"] : "";
$_SESSION['prixenchere']=$enchere;
}
else {
   
    $enchere = $_SESSION['prixenchere'];
}


//identifier votre BDD
$database = "ebayece";
//connectez-vous de la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
    if ($db_found) 
    {
        if($idArticle && $idAcheteur && $enchere)
        {
                $sql = "SELECT * FROM acheteur WHERE id_a = '$idAcheteur'";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                if(is_null($data['num_carte']))
                {
                    $_SESSION['total']=$enchere;
                    $_SESSION['action']='enchere';
                    header('Location: paiement.php');
                    exit();
                }
                if($data['type_de_carte']==='visa' && $enchere > 1500)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='mc' && $enchere > 2500)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='amex' && $enchere > 6500)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='paypal' && $enchere > 750)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }

                
            $sql = "SELECT * FROM enchere WHERE id_a = '$idAcheteur' AND id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) === 0 )
            {  
            $sqlInsert = "INSERT INTO enchere (offre, id_a, id_item) VALUES ('$enchere', '$idAcheteur', '$idArticle')";    

                
            $result = mysqli_query($db_handle, $sqlInsert);
            
            $sqlInsert = "INSERT INTO affiliation (id_a, id_it) VALUES ('$idAcheteur', '$idArticle')";    

                
            $result = mysqli_query($db_handle, $sqlInsert);
            // METTRE A JOUR L'ENCHERE SUR L'ITEM
            $sql = "SELECT * FROM enchere WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            
            $sql3 = "SELECT prix FROM item WHERE id_item= '$idArticle'";
            $result3 = mysqli_query($db_handle, $sql3);
            $data3 = mysqli_fetch_assoc($result3);

            $prixmax=0;
            $prixsecond=$data3['prix'];

            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                //echo "prix analyser $prix <br>";
                if($prix > $prixmax)
                {
                    $prixmax =$prix;
                }
                //echo " prix max $prixmax <br>";

            }
            $sql = "SELECT * FROM enchere WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                //echo "prix analyser $prix";
                if($prix > $prixsecond && $prix !== $prixmax)
                {
                    $prixsecond =$prix; 
                }

                //echo "prix second $prixsecond <br>";

            }
            $prixfinal = $prixsecond + 1;
            //echo "PRIX DE L'ENCHERE $prixfinal";
            $sql = "UPDATE item SET prix = '$prixfinal' WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);

            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';  
            }
            else
            {
                $data = mysqli_fetch_assoc($result);
                if($data['offre'] < $enchere)
                {
                    $sql ="UPDATE enchere SET offre = $enchere WHERE id_a = $idAcheteur AND id_item = $idArticle ";
                    $result = mysqli_query($db_handle, $sql);
                    $sql = "SELECT * FROM enchere WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            
            $sql3 = "SELECT prix FROM item WHERE id_item= '$idArticle'";
            $result3 = mysqli_query($db_handle, $sql3);
            $data3 = mysqli_fetch_assoc($result3);

            $prixmax=0;
            $prixsecond=$data3['prix'];

            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                //echo "prix analyser $prix <br>";
                if($prix > $prixmax)
                {
                    $prixmax =$prix;
                }
               // echo " prix max $prixmax <br>";

            }
            $sql = "SELECT * FROM enchere WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                //echo "prix analyser $prix";
                if($prix > $prixsecond && $prix !== $prixmax)
                {
                    $prixsecond =$prix; 
                }

                //echo "prix second $prixsecond <br>";

            }
            $prixfinal = $prixsecond + 1;
            //echo "PRIX DE L'ENCHERE $prixfinal";
            $sql = "UPDATE item SET prix = '$prixfinal' WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
                    echo '<body onLoad="alert(\'Votre enchère a été mise à jour.\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=panier.php">';  
                }
                else 
                {
                    echo '<body onLoad="alert(\'Vous vous êtes déjà engagé à payer. Vous ne pouvez pas descendre le prix.\')">'; 
                    echo '<meta http-equiv="refresh" content="0;URL=accueilacheteur.php">';
                }
            }
        

        }
    }
    else
    {
        echo "Database not found";
    }
?>