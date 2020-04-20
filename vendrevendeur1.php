<?php
    $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";
    echo "$categorie";
    
    $error = "";
    if($categorie == "") { $error .= "Categorie d'achat non choisie<br />";}

    if ($error !== "") {
        header('Location: vendrevendeur.php');
    }

    if ($categorie == "Enchere")
    {
        header('Location: vendreA.php');
    }

    if ($categorie == "Achat Immediat")
    {
        header('Location: vendreB.php');
    }

    if ($categorie == "Meilleure Offre")
    {
        header('Location: vendreC.php');
    }

    if ($categorie == "Meilleure Offre et Achat Immediat")
    {
        header('Location: vendreD.php');
    }

?>

