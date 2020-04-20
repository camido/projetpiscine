<?php
    $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";

    
    $error = "";
    if($categorie == "") { $error .= "Categorie d'achat non choisie<br />";}

    if ($error == "") {
        header('Location: admin2.html');
    }

    if ($categorie == "Enchere")
    {
        header('Location: admin2A.html');
    }

    if ($categorie == "Achat Immediat")
    {
        header('Location: Admin2B.html');
    }

    if ($categorie == "Meilleure Offre")
    {
        header('Location: admin2C.html');
    }

    if ($categorie == "Meilleure Offre et Achat Immediat")
    {
        header('Location: Admin2D.html');
    }

?>

