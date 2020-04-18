<?php
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
$adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
$ville= isset($_POST["ville"])? $_POST["ville"] : "";
$codepostal = isset($_POST["Codepostal"])? $_POST["Codepostal"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$numtel = isset($_POST["numtel"])? $_POST["numtel"] : "";
if(<input type=checkbox onclick="document.getElementById('cacher').style.display = 'block';" />)

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
            $sql = "SELECT * FROM vendeur";
            if ($pseudo != "") {
                //on cherche le pseudo avec les paramètres
                $sql .= " WHERE pseudo_v LIKE '$pseudo'";
            }
             $result = mysqli_query($db_handle, $sql);
            
             $sql = "SELECT * FROM administrateur";
             if ($pseudo != "") {
                 //on cherche le pseudo avec les paramètres
                 $sql .= " WHERE pseudo_admin LIKE '$pseudo'";
             }
              $result1 = mysqli_query($db_handle, $sql);
 
              $sql = "SELECT * FROM acheteur";
              if ($pseudo != "") {
                  //on cherche le pseudo avec les paramètres
                  $sql .= " WHERE pseudo_a LIKE '$pseudo'";
              }
               $result2 = mysqli_query($db_handle, $sql);

            //regarder s'il y a de résultat
            if (mysqli_num_rows($result) === 0 && mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0 )
            {            
                
                $sqlInsert = "INSERT INTO acheteur (pseudo_a, email_a, nom_a, prenom_a, adresse_1, ville, code_postal, pays, numero_tel, accepter_conditions) VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$adresse1', '$ville','$codepostal','$pays','$numtel','1')";    

                $result = mysqli_query($db_handle, $sqlInsert);
                
                header('Location: inscription_reussie.html'); 
            }
            else
            {
                
                // PSEUDO DEJA PRIS
                 echo '<body onLoad="alert(\'Ce pseudo est déjà pris.\')">';
		        // puis on le redirige vers la page d'accueil
		       echo '<meta http-equiv="refresh" content="0;URL=inscriptionacheteur.html">';
                //header('Location: inscriptionVendeur.html'); 
            }
     
        } 
        else{
            echo "Database not found";
        }
        //fermer la connexion
        mysqli_close($db_handle);
?>