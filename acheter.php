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

       }
?>