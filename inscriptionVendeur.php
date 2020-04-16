<?php

// SOURCE https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "Vendeurs/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["button1"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
/*// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} */else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


// Après la photo on enregistre les données.
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$photo = "Vendeurs/". basename($_FILES["photo"]["name"]);
$fond = isset($_POST["choix"]) ? $_POST["choix"] : "";

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
                

                if($fond === "image1" || $fond === "image2"|| $fond === "image3" )
                {
                $sqlInsert = "INSERT INTO vendeur (pseudo_v, email_v, nom_v, photo_v, image_fond) VALUES ('$pseudo', '$mdp', '$nom', '$photo', '$fond')";

                $result = mysqli_query($db_handle, $sqlInsert);
                }
                else
                {
                $sqlInsert = "INSERT INTO vendeur (pseudo_v, email_v, nom_v, photo_v) VALUES ('$pseudo', '$mdp', '$nom', '$photo')";

                $result = mysqli_query($db_handle, $sqlInsert);
                }
                header('Location: inscription_reussie.html'); 
            }
            else
            {
                
                // PSEUDO DEJA PRIS
                 echo '<body onLoad="alert(\'Ce pseudo est déjà pris.\')">';
		        // puis on le redirige vers la page d'accueil
		       echo '<meta http-equiv="refresh" content="0;URL=inscriptionvendeur.html">';
                //header('Location: inscriptionVendeur.html'); 
            }
     
        } 
        else{
            echo "Database not found";
        }
        //fermer la connexion
        mysqli_close($db_handle);
?>