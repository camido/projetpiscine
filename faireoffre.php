<?php
session_start();


$idAcheteur =$_SESSION['id_utilisateur'];
$typeutilisateur= $_SESSION['type_utilisateur'];

//identifier votre BDD
//connectez-vous de la BDD
$database = 'ebayece';
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si la BDD existe
    if ($db_found) 
    {

        if($idAcheteur)
        {
            if($typeutilisateur==='acheteur')
            {
                if($_SESSION['action']!=='autoriser')
                {
                $offre =  isset($_POST["offre"])? $_POST["offre"] : "";
                $idArticle =  isset($_POST["idArticle"])? $_POST["idArticle"] : "";
                $_SESSION['article']= $idArticle;
                $_SESSION['prixoffre']=$offre;
                }
                else {
                    $idArticle=$_SESSION['article'];
                    $offre = $_SESSION['prixoffre'];
                }
                $sql = "SELECT * FROM acheteur WHERE id_a = '$idAcheteur'";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                if(is_null($data['num_carte']))
                {
                    $_SESSION['total']=$offre;
                    $_SESSION['action']='offre';
                    header('Location: paiement.php');
                    exit();
                }
                if($data['type_de_carte']==='visa' && $offre > 1500)
                {
                    
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='mc' && $offre > 2500)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='amex' && $offre > 6500)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
                if($data['type_de_carte']==='paypal' && $offre > 750)
                {
                    $_SESSION['paiement']='non';
                    header('Location: paiementautorisation.php');
                    exit();
                }
            $sql = "SELECT * FROM meilleureoffre WHERE id_ac = '$idAcheteur' AND id_ite = '$idArticle'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) === 0 )
            {  
            $sqlInsert = "INSERT INTO meilleureoffre (proposition_a, nb_prop, id_ac, id_ite) VALUES ('$offre', '0', '$idAcheteur', '$idArticle')";    

                
            $result = mysqli_query($db_handle, $sqlInsert);
            
            $sqlInsert = "INSERT INTO affiliation (id_a, id_it) VALUES ('$idAcheteur', '$idArticle')";    

                
            $result = mysqli_query($db_handle, $sqlInsert);
            echo '<meta http-equiv="refresh" content="0;URL=offres.php">';  
            }
            else
            {
                $offre =  isset($_POST["offre"])? $_POST["offre"] : "";
                $data = mysqli_fetch_assoc($result);
                
                if($data['nb_prop'] < 6 && $data['accepter'] === '0' )
                {
                    
                    $compteur = $data['nb_prop'] + 1;
                    $sql ="UPDATE meilleureoffre SET proposition_a = $offre, proposition_v = 0, nb_prop = $compteur WHERE id_ac = $idAcheteur AND id_ite = $idArticle ";
                    $result = mysqli_query($db_handle, $sql);
                    echo '<body onLoad="alert(\'Vous avez fait une nouvelle offre.\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=offres.php">';  
                }
                
                if($data['nb_prop'] === '6' && $data['accepter'] === '0' )
                     {
                        $item2=$data['id_item'];
                        $sql3 = "DELETE FROM meilleureoffre WHERE id_ac = '$ID' AND id_ite = '$item2'";
                        $result3 = mysqli_query($db_handle, $sql3);
                    }
            }
        }
        else
        {
            
            $idOffre=isset($_POST["idOffre"])? $_POST["idOffre"] : "";
            echo $idOffre;
            if($typeutilisateur==='vendeur')
            {
                $sql = "SELECT * FROM meilleureoffre WHERE id_offre = '$idOffre'";
            }
            if($typeutilisateur==='admin')
            {  
                $sql = "SELECT * FROM meilleureoffre WHERE id_offre = '$idOffre'";
            }

            $result = mysqli_query($db_handle, $sql);

                $data = mysqli_fetch_assoc($result);
                
                if($data['nb_prop'] < 6 && $data['accepter'] === '0' )
                {
                    
                    $acheteur = $data['id_ac'];
                    $sql ="UPDATE meilleureoffre SET proposition_v = $offre, proposition_a = 0 WHERE id_offre = '$idOffre' ";
                    $result = mysqli_query($db_handle, $sql);
                    echo '<body onLoad="alert(\'Vous avez proposer une contre-offre.\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=offrevendeur.php">';  
                }
                
                if($data['nb_prop'] === '6' && $data['accepter'] === '0' )
                     {
                        $sql3 = "DELETE FROM meilleureoffre WHERE id_offre = '$idOffre'";
                        $result3 = mysqli_query($db_handle, $sql3);
                        echo '<body onLoad="alert(\'L offre est abandonnée.\')">';
                        echo '<meta http-equiv="refresh" content="0;URL=offrevendeur.php">'; 
                    }
        }
            
        }
        $_SESSION['action']='rien';

    }
    else
    {
        echo "Database not found";
    }

?>