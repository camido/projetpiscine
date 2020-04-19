<?php


$mail_v = isset($_POST["mail_v"])? $_POST["mail_v"] : "";
$pseudo_v = isset($_POST["pseudo_v"])? $_POST["pseudo_v"] : "";
$nom_v = isset($_POST["nom_v"])? $_POST["nom_v"] : "";


$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


    if ($db_found) 
    {    
        $sql = "SELECT * FROM vendeur";   
        if ($mail_v != "") 
        {     
            
            $sql .= " WHERE email_v LIKE '$mail_v' AND pseudo_v LIKE '$pseudo_v' AND nom_v LIKE '$nom_v'";     
              
        }   
         $result = mysqli_query($db_handle, $sql);    
         if (mysqli_num_rows($result) == 0) 
         {     
                 
              //echo "Cannot delete. Vendeur not found. <br>"; 
              header('Location: admin_suppr2.html');   
            } 
            else 
            {     
                   
                $sql = "DELETE FROM vendeur";     
                $sql .= " WHERE email_v='$mail_v' AND pseudo_v='$pseudo_v' AND nom_v='$nom_v'";     
                $result = mysqli_query($db_handle, $sql);     
                header('Location: admin_suppr.html');
 
            } 
        }
        else 
        {   
            // echo "Database not found"; 
            header('Location: admin_suppr3.html');
        }  
    
    ?>