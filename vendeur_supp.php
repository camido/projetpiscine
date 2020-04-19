<?php

$id=$_GET['id'];


$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


    if ($db_found) 
    {    
        $sql = "SELECT * FROM item";   
        if ($id != "") 
        {     
            
            $sql .= " WHERE id_item LIKE '$id'";     
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
                $sql .= " WHERE id_item = '$id'";     
                $result = mysqli_query($db_handle, $sql);     
                //echo "Delete successful. <br>"; 
                header('Location: item_vendeur.php'); 
 
            } 
        }
        else 
        {   
             //echo "Database not found";  
             header('Location: admin_suppr3.html'); 
        }  
    
    ?> 
