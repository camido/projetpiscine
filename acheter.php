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

        $sqlInsert = "INSERT INTO affiliation (id_a, id_it) VALUES ('$idAcheteur', '$idArticle')";    
        $result = mysqli_query($db_handle, $sqlInsert); 
        $values=1;
        $sql= "UPDATE item SET achat_i='$values' WHERE id_item = $idArticle";
        $result = mysqli_query($db_handle, $sql); 
                
        
        header('Location: panier.php');
        exit();

       }
?>