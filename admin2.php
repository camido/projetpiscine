<?php
    $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";

    
    $error = "";
    if($categorie == "") { $error .= "Categorie d'achat non choisie<br />";}

    if ($error == "") {
        echo "Formulaire valide";
    }
    else {
        echo "Erreur : $error";
    }

    if ($categorie == "Enchere")
    {
        header('Location: admin2A.html');
    }

    if ($categorie == "Achat immediat")
    {
        header('Location: Admin2B.html');
    }

    if ($categorie == "Meilleure offre")
    {
        header('Location: admin2C.html');
    }

    if ($categorie == "Meilleure offre et achat immediat")
    {
        header('Location: Admin2B.html');
    }

?>

