<?php   

    $target_dir = "Items/";
    $target_file = $target_dir . basename($_FILES["item_photo1"]["name"]);
    $uploadOk = 1;p
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
    if ($_FILES["item_photo1"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["item_photo1"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
if ($item_photo1 != "")
{
    $target_dir = "Items/";
    $target_file = $target_dir . basename($_FILES["item_photo2"]["name"]);
    $uploadOk = 1;p
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
    if ($_FILES["item_photo2"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["item_photo2"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if ($item_photo2 !="")
{
    $target_dir = "Items/";
    $target_file = $target_dir . basename($_FILES["item_photo3"]["name"]);
    $uploadOk = 1;p
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
    if ($_FILES["item_photo3"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["item_photo3"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


    //récupérer les données venant de formulaire  $titre = isset($_POST["titre"])? $_POST["titre"] : "";
    $item_name = isset($_POST["item_name"])? $_POST["item_name"] : ""; 
    $item_photo1 = "Items/". basename($_FILES["item_photo1"]["name"]); 
    $item_photo2 = "Items/". basename($_FILES["item_photo2"]["name"]); 
    $item_photo3 = "Items/". basename($_FILES["item_photo3"]["name"]); 
    $item_description = isset($_POST["item_description"])? $_POST["item_description"] : ""; 
    $item_video = isset($_POST["item_video"])? $_POST["item_video"] : "";
    $item_prix = isset($_POST["item_prix"])? $_POST["item_prix"] : "";
    $item_categorie = isset($_POST["item_categorie"])? $_POST["item_categorie"] : "";
    $item_date = isset($_POST["item_date"])? $_POST["item_date"] : "";
 
    //identifier votre BDD  
    $database = "ebayece"; 

 
    //connectez-vous de votre BDD  
    $db_handle = mysqli_connect('localhost', 'root', '');  
    $db_found = mysqli_select_db($db_handle, $database); 
    


    if (mysqli_num_rows($result) === 0 && mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0 )
    {
    if ($item_photo2 != "" && $item_photo3!= "")
    {
      $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, photo_i3, prix, categorie, type_vente, date_fin)
        VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_photo3', '$item_prix', '$item_categorie', 'Enchere', '$item_date')";
         $result = mysqli_query($db_handle, $sql);     
    }
    if ($item_photo2 != "" && $item_photo3 == "")
    {
      $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, prix, categorie, type_vente, date_fin)
        VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo2', '$item_prix', '$item_categorie', 'Enchere', '$item_date')";
         $result = mysqli_query($db_handle, $sql);     
    }
    if ($item_photo2 == "" && $item_photo3 != "")
    {
      $sql = "INSERT INTO item (nom_i, description_i, photo_i, photo_i2, prix, categorie, type_vente, date_fin)
        VALUES('$item_name', '$item_description', '$item_photo1', '$item_photo3', '$item_prix', '$item_categorie', 'Enchere', '$item_date')";
         $result = mysqli_query($db_handle, $sql);     
    }
    if ($item_photo2 == "" && $item_photo3 == "")
    {
      $sql = "INSERT INTO item (nom_i, description_i, photo_i, prix, categorie, type_vente, date_fin)
        VALUES('$item_name', '$item_description', '$item_photo1', '$item_prix', '$item_categorie', 'Enchere', '$item_date')";
         $result = mysqli_query($db_handle, $sql);     
    }

    else 
        {    
            echo "Database not found";   
        }  
    } 
    mysqli_close($db_handle);
    ?>