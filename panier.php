<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Ebay ECE - Panier </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">
    body {
    background-image: url('images_projet/pdg.jpg');
    background-size: cover;
    background-position: center;
    position: relative;
    }

   
    /*--- navigation bar ---*/
    .navbar {
    background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
    }
    .nav-link, .navbar-brand {
    color: rgb(7, 7, 7);
    cursor: pointer;
    font-style: oblique;
    font-weight: 700;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 40px;
    }
    .nav-link, .navbar-center {
    color: rgb(248, 244, 244);
    cursor: pointer;
    font-style: oblique;
    font-weight: 200;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 20px;
    }
    .nav-link {
    margin-right: 1em !important;
    }
    .nav-link:hover {
    color: #000;
    }
    .navbar-collapse {
    justify-content: flex-end;
    }
    .header {
    background-image: url('pdg.jpg');
    background-size: cover;
    background-position: center;
    position: relative;
    }
    .form-check .form-check-input {
    opacity: 1;
    height: inherit;
    width: inherit;
    overflow: visible;
    }
    #container{
        width:400px;
        margin-left: 20%;
        margin-top:10%;
        margin-bottom:10%;
    }
    .navbar-dc {
    left : 80%;
    position: absolute;
    top : 30%;
    }


    /* carre blanc */
    form {
        width:200%;
        padding: 30px;
        border: 1px solid #f1f1f1;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    #container h1{
        width: 30%;
        margin: 0 auto;
        padding-bottom: 10px;
    }
    #container h2{
        width: 70%;
        margin: 0 auto;
        padding-bottom: 10px;
        text-align: center;
    }
    
    
    /* Full-width inputs */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    
    /* Set a style for all buttons */
    input[type=submit] {
        background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    footer {
      background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
      color: white;
      padding: 15px;
    }
    
    
    
</style>
<script type="text/javascript">
    $(document).ready(function(){
    $('.header').height($(window).height());
    });
</script>   
</head>

<body>
   
    <nav class="navbar t">
        <a class="navbar-brand" href="accueilacheteur.php">Ebay ECE</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-dc">
            <a href="accueil.html"> <input type="button" name="button" value="Déconnexion" class="btn btn-outline-secondary btn-lg"></a> </br>
            
        </div>
    </nav>
    <nav class="navbar navbar-expand-md">

        
        <div class="center navbar-center" id="main-navigation">
            
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="categorie.php?categorie=Ferraille ou Tresor">Férraille ou Trésor</a>
                      <a class="dropdown-item" href="categorie.php?categorie=Bon pour le Musee">Bon pour le Musée</a>
                      <a class="dropdown-item" href="categorie.php?categorie=Accessoire VIP">Accessoire VIP</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Achat
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="typevente.php?vente=Enchere">Enchère</a>
                      <a class="dropdown-item" href="typevente.php?vente=Meilleure Offre">Meilleure Offre</a>
                      <a class="dropdown-item" href="typevente.php?vente=Achat Immediat">Achat immédiat</a>
                    </div>
                  </li>
                <li class="nav-item"><a class="nav-link" href="moncompte.php">Mon compte</a></li>
                <li class="nav-item"><a class="nav-link" href="offres.php">Réponses Offres</a></li>
                <li class="nav-item"><a class="nav-link" href="panier.php"> <img style=width:20px; src="images_projet/panier.png"></a></li>


                
            </ul>
        </div>
    </nav>
    
    <div id="container">
        
    <form action="paiement.php" method="POST">
        

        <section>
            <?php
            
            $ID=$_SESSION['id_utilisateur'];
            echo "<h2>Panier</h2><br>";
    
            $database = "ebayece";
    
            //connectez-vous de la BDD
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            //si la BDD existe
            if ($db_found) {
                
    
                $sql = "SELECT * FROM item WHERE EXISTS (SELECT * FROM affiliation WHERE id_item = id_it AND id_a = '$ID')";
                
                $result = mysqli_query($db_handle, $sql);
    
                if(mysqli_num_rows($result) === 0)
                {
                    echo " <h2> Ce panier est vide </h2>";
                }
                else{
                    $total=0;
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                    
                    $photo=$data['photo_i'];
                    $id=$data['id_item'];
                    
                    echo "<table >";
                    echo "<tr>
                    <td >" . $data['type_vente'] . " </td> <td > </td><td> </td><td> </td></tr>";
                    echo "<tr><td > <a href='afficherArticle.php?id=$id'> <h3>" . $data['nom_i'] . "</h3> </a>";
                    echo " #" . $data['id_item'] . "</td> <td> <img src='$photo' width='100' height='150' /></td>"; 
                    echo "<td width=40%><h5>Description de l'item : </h5><br>" . $data['description_i'] . "</td>";
                    if($data['type_vente']==='Enchere')
                    {
                        echo "<td align='left' width=25%> En attente de la fin de l'enchère. </br> Le prix actuel : </br> <h3>" . $data['prix'] . " € </h3> <br> Date de fin de l'enchère : " . $data['date_fin'] . "</td>";
                    }
                    if($data['type_vente']==='Meilleure Offre')
                    {
                        echo "<td align='left' width=25%> En attente d'une réponse du vendeur.  </td>";
                    }
                    if($data['type_vente']==='Achat Immediat')
                    {
                        $total= $total + $data['prix'] ;
                        echo "<td align='left' width=25%> Le prix est : <h3>" . $data['prix'] . " € </h3>
                        <a href='retirerpanier.php?id=$id'><input type='button' value='Retirer du panier' name='retirer'></a>
                        </td>";
                    }  
                    if($data['type_vente']==='Meilleure Offre et Achat Immediat')
                    {
                        $item=$data['id_item'];
                        $sql2 = "SELECT * FROM meilleureoffre WHERE id_ite = '$item' AND id_ac = '$ID'";
                        $result2 = mysqli_query($db_handle, $sql2);
                        
                        if(mysqli_num_rows($result2) === 0)
                        {
                            $total= $total + $data['prix'] ;
                            echo "<td align='left' width=25%> Le prix est : <h3>". $data['prix'] . " € </h3>
                            <a href='retirerpanier.php?id=$id'> <input type='button' value='Retirer du panier' name='retirer'></a>
                            </td>";
                        }
                        else
                        {
                            echo "<td align='left' width=25%> En attente d'une réponse du vendeur.  </td>";
                        }

                    }
                    echo "</tr><tr>
                    <td height='20'> </td> <td > </td><td> </td><td> </td></tr>
                     <tr><td style='background-color:#000000' height='5'> </td> <td style='background-color:#000000' height='5'> </td><td style='background-color:#000000'> </td><td style='background-color:#000000'> </td></tr>";
                    
                    
                    }
                    $_SESSION['total']=$total;
                    $_SESSION['action']='panier';
                    echo "</table>";
                    echo " <h3> SOUS-TOTAL : $total € </h3><br> Ce total ne prend en compte que les achats immédiats. </br> Le paiement des enchères et meilleures offre sera automatique.";
                    echo "<input type='submit' id='submit' value='Procéder au Paiement' >"; 
                    
                }
                
    
    } 
            else 
            {
                echo "Database not found. <br>";
            }
                
            
    
              ?>  
                
    
            </form>
    </div>

    <footer class="container-fluid">
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <p>
        37, quai de Grenelle, 75015 Paris, France <br>
        info@webDynamique.ece.fr <br>
        +33 01 02 03 04 05 <br>
        +33 01 03 02 05 04
        </p>
        <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
      </footer>

   
</body>
</html>