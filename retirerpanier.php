<?php

   session_start();
   $idArticle = $_GET['id'];
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

        $sqlInsert = "DELETE FROM affiliation WHERE id_a = $idAcheteur AND id_it = $idArticle";    
        $result = mysqli_query($db_handle, $sqlInsert); 
        $values=0;
        $sql= "UPDATE item SET achat_i='$values' WHERE id_item = $idArticle";
        $result = mysqli_query($db_handle, $sql); 
                
        
        header('Location: panier.php');
        exit();

       }
?>