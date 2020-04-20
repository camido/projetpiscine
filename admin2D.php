<?php   
    session_start();
    $target_dir = "items/";
    $target_file = $target_dir . basename($_FILES["item_photo1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["button1"])) {
        $check = getimagesize($_FILES["item_photo1"]["tmp_name"]);
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
    
    if ($_FILES["item_photo1"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
        if (move_uploaded_file($_FILES["item_photo1"]["tmp_name"], $target_file)) {
           // echo "The file ". basename( $_FILES["item_photo1"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    

    
    $target_file = $target_dir . basename($_FILES["item_photo2"]["name"]);
    if(is_null($target_file))
    {
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["button1"])) {
        $check = getimagesize($_FILES["item_photo2"]["tmp_name"]);
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
    if ($_FILES["item_photo2"]["size"] > 5000000) {
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
    } */
        if (move_uploaded_file($_FILES["item_photo2"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["item_photo2"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    
}

    $target_file = $target_dir . basename($_FILES["item_photo3"]["name"]);
    if(is_null($target_file))
    {
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["button1"])) {
        $check = getimagesize($_FILES["item_photo3"]["tmp_name"]);
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
    if ($_FILES["item_photo3"]["size"] > 5000000) {
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
    } */
        if (move_uploaded_file($_FILES["item_photo3"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    
}



    //récupérer les données venant de formulaire  $titre = isset($_POST["titre"])? $_POST["titre"] : "";
    $item_name = isset($_POST["item_name"])? $_POST["item_name"] : ""; 
    $item_photo1 = "items/". basename($_FILES["item_photo1"]["name"]); 
    $item_photo2 = "items/". basename($_FILES["item_photo2"]["name"]); 
    $item_photo3 = "items/". basename($_FILES["item_photo3"]["name"]); 
    $item_description = isset($_POST["item_description"])? $_POST["item_description"] : ""; 
    $item_prix = isset($_POST["item_prix"])? $_POST["item_prix"] : "";
    $item_categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $type="Meilleure Offre et Achat Immediat";
    $ID=$_SESSION['id_utilisateur'];
    $typeutilisateur=$_SESSION['type_utilisateur'];

    //identifier votre BDD  
    $database = "ebayece"; 

 
    //connectez-vous de votre BDD  
    $db_handle = mysqli_connect('localhost', 'root', '');  
    $db_found = mysqli_select_db($db_handle, $database); 
    

    if ($db_found) 
    { 
        // POUR L'ADMINISTRATEUR
        if($typeutilisateur === 'admin')

        {
            if ($item_photo2!=="items/" && $item_photo3!=="items/")
            {
                
                $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, photo_i3, prix, categorie, type_vente, id_admin) VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_photo3' , '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2!=="items/" && $item_photo3==="items/")
            {
            $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, prix, categorie, type_vente, id_admin)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_prix', '$item_categorie', '$type','$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2!=="items/" && $item_photo3!=="items/")
            {
            $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i3, prix, categorie, type_vente, id_admin)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo3', '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2==="items/" && $item_photo3==="items/")
            {
                $sql = "INSERT INTO item (nom_i, description_i, photo_i, prix, categorie, type_vente, id_admin)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            header('Location: admin1.html');
        }
        //  POUR LE VENDEUR
        if($typeutilisateur === 'vendeur')

        {
            if ($item_photo2!=="items/" && $item_photo3!=="items/")
            {
                
                $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, photo_i3, prix, categorie, type_vente, id_v) VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_photo3' , '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2!=="items/" && $item_photo3==="items/")
            {
            $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, prix, categorie, type_vente, id_v)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_prix', '$item_categorie', '$type','$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2!=="items/" && $item_photo3!=="items/")
            {
            $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i3, prix, categorie, type_vente, id_v)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo3', '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            if ($item_photo2==="items/" && $item_photo3==="items/")
            {
                $sql = "INSERT INTO item (nom_i, description_i, photo_i, prix, categorie, type_vente, id_v)
                VALUES('$item_name', '$item_description', '$item_photo1', '$item_prix', '$item_categorie', '$type', '$ID')";
                $result = mysqli_query($db_handle, $sql);     
            }
            header('Location: accueilvendeur.php');
        }

    }else 
        {    
            echo "Database not found";   
        }  
    
    mysqli_close($db_handle);
    ?>