<?php


$item_name = isset($_POST["item_name"])? $_POST["item_name"] : "";
$item_num = isset($_POST["item_num"])? $_POST["item_num"] : "";
$item_categorie = isset($_POST["item_categorie"])? $_POST["item_categorie"] : "";


$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


    if ($db_found) 
    {    
        $sql = "SELECT * FROM item";   
        if ($item_num != "") 
        {     
            
            $sql .= " WHERE id_item LIKE '$item_num' AND categorie LIKE '$item_categorie' AND nom_i LIKE '$item_name'";     
           // if ($item_num != "") 
           // {      
           //     $sql .= " AND  LIKE '%$item_num%'";     
            //}    
        }   
         $result = mysqli_query($db_handle, $sql);    
         if (mysqli_num_rows($result) == 0) 
         {     
                 
              //echo "Cannot delete. Item not found. <br>";   
              header('Location: admin_suppr2.html'); 
            } 
            else 
            {     
                   
                $sql = "DELETE FROM item";     
                $sql .= " WHERE id_item = '$item_num' AND categorie = '$item_categorie' AND nom_i = '$item_name'";     
                $result = mysqli_query($db_handle, $sql);     
                //echo "Delete successful. <br>"; 
                header('Location: admin_suppr.html'); 
 
            } 
        }
        else 
        {   
             //echo "Database not found";  
             header('Location: admin_suppr3.html'); 
        }  
    
    ?> 
