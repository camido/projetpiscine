<?php
session_start();
$idArticle = $_SESSION['id_item'];
$idAcheteur =$_SESSION['id_utilisateur'];
$enchere =  isset($_POST["enchere"])? $_POST["enchere"] : "";

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
                if(is_null($date['num_carte']))
                {
                    header('Location: paiement.html');
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
            
            $prixmax=0;
            $prixsecond=0;
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                echo "prix analyser $prix <br>";
                if($prix > $prixmax)
                {
                    $prixmax =$prix;
                }
                echo " prix max $prixmax <br>";

            }
            $sql = "SELECT * FROM enchere WHERE id_item= '$idArticle'";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $prix=$data['offre'];
                echo "prix analyser $prix";
                if($prix > $prixsecond && $prix !== $prixmax)
                {
                    $prixsecond =$prix; 
                }

                echo "prix second $prixsecond <br>";

            }
            $prixfinal = $prixsecond + 1;
            echo "PRIX DE L'ENCHERE $prixfinal";
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
        $sql = "SELECT * FROM item WHERE id_item LIKE '$idArticle'";
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) 
        {

        }
    }
    else
    {
        echo "Database not found";
    }
?>