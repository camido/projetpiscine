<?php
session_start();
$id= $_SESSION['id_utilisateur'];
 
$typecard = isset($_POST["usercard"])? $_POST["usercard"] : "";
$numcarte = isset($_POST["numcarte"])? $_POST["numcarte"] : "";
$nomcarte = isset($_POST["nomcarte"])? $_POST["nomcarte"] : "";
$codecarte = isset($_POST["codecarte"])? $_POST["codecarte"] : "";
$datecarte = isset($_POST["datecarte"])? $_POST["datecarte"] : "";


        $database = "ebayece";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        
        if ($db_found) 
        { 
                
     

    
                $sql ="UPDATE acheteur SET num_carte = '$numcarte', type_de_carte = '$typecard', nom_carte = '$nomcarte',date_expi = '$datecarte',code_securite= '$codecarte' WHERE id_a = $id";
                $result = mysqli_query($db_handle, $sql);
                
                if($_SESSION['action']==='panier')
                {
                header('Location: verificationpaiement.php');
                }
                if($_SESSION['action']==='enchere')
                {
                        $_SESSION['action']='autoriser';
                        header('Location: Encherir.php');
                }
                if($_SESSION['action']==='offre')
                {
                        $_SESSION['action']='autoriser';
                        header('Location: faireoffre.php');
                }
               

            
        } 
        else{
            echo "Database not found";
        }
        //fermer la connexion
        mysqli_close($db_handle);
?>