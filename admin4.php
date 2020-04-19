<?php



//On enregistre les données.
$pseudo = isset($_POST["pseudo_v"])? $_POST["pseudo_v"] : "";
$mdp = isset($_POST["mail_v"])? $_POST["mail_v"] : "";
$nom = isset($_POST["nom_v"])? $_POST["nom_v"] : "";


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
                
                $sqlInsert = "INSERT INTO vendeur (pseudo_v, email_v, nom_v) VALUES ('$pseudo', '$mdp', '$nom')";

                $result = mysqli_query($db_handle, $sqlInsert);

                header('Location: admin_ajout.html'); 
            }
            else
            {
                
                // PSEUDO DEJA PRIS
                 echo '<body onLoad="alert(\'Ce pseudo est déjà pris.\')">';
		        // puis on le redirige vers la page d'accueil
		       echo '<meta http-equiv="refresh" content="0;URL=inscriptionvendeur.html">';
                header('Location: admin_ajout2.html'); 
            }
     
        } 
        else{
            echo "Database not found";
            header('Location: admin_suppr3.html');
        }
        //fermer la connexion
        mysqli_close($db_handle);
?>