<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
<title>EbayECE - Achat Immediat </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">
    body, html{height:100%;}
    body {
    background-image: url('images_projet/pdg.jpg');   
    background-size: cover;
    background-position: center;
    position: relative;
    text-align:center;
    min-height: 100vh;
    }


    /*--- navigation bar ---*/
    .navbar {
    background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
    }
    .navbar-expand-md {
        background-image:linear-gradient(60deg, #dbb775, rgb(205, 198, 180));
    }
    .navbar-dc {
    left : 80%;
    position: absolute;
    top : 30%;
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
    color: rgb(0,0,0);
    background-position: center;
    position:center;
    }
    #container{
        width:400px;
        margin:0 auto;
        margin-top:10%;
        margin-bottom:10%;
    }



    h2{
        color: rgb(255,255,255);
        width: 100%;
        margin: 0 auto;
        padding-top: 30px;
        font-style: oblique;
        font-weight: 200;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 50px;
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
    main
    {
        margin: 3rem 0;
    }
    footer {
      background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
      color: white;
      padding: 15px;
      bottom:0;; 
      left: 0; 
      right: 0;
      margin-top: auto;
    }
   
 
    
    form {
        width:200%;
        padding: 30px;
        border: 1px solid #f1f1f1;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    
    
</style>
<script type="text/javascript">
    $(document).ready(function(){
    $('.header').height($(window).height());
    });
</script>   
</head>
<?php

//identifier votre BDD
$database = "ebayece";

//connectez-vous de la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
$ID = $_SESSION['id_utilisateur'];
    if ($db_found) {
    //on cherche le livre
    $sql = "SELECT * FROM vendeur where id_v like '$ID'";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
  
    $target = $data['image_fond'];

    echo "</table>";}

} 
else {
echo "Database not found. <br>";
}

//fermer la connexion
mysqli_close($db_handle);
?> 
    

    <body   style="background-image: url(<?php print $target; ?>)">
   
    <nav class="navbar t">
        <a class="navbar-brand" href="accueilvendeur.php">Ebay ECE</a>
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

                <li class="nav-item"><a class="nav-link" href="vendrevendeur.php">Vendre</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Gérer mes ventes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="item_vendeur.php">Retirer items en vente</a>
                      <a class="dropdown-item" href="offrevendeur.php">Mes demandes d'offre</a>
                    </div>
                  </li>


                
            </ul>
        </div>
    </nav>

   
       

  
    <div id="container">
        <!-- zone de connexion -->
        
        <form action="admin2B.php" method="post" enctype="multipart/form-data">
            
            <h1>
                <table>
                    <tr>
                        <th>
                            Item a ajouter : 
                        </th>
                    </tr>
                </table>
            </h1>
            
            <p><label><b> Catégorie de l'item : </b></label><br>
                <input type="radio" name="categorie" value="Ferraille ou Tresor"> Ferraille ou Tresor <br>
                <input type="radio" name="categorie" value="Bon pour le Musee"> Bon pour le Musee <br>
                <input type="radio" name="categorie" value="Accessoire VIP"> Accessoire VIP <br></p>

            <label><b>Nom* :</b></label>
            <input type="text" placeholder="Entrer le nom de l'item" name="item_name" required>
            
            <label><b>Photo 1* :</b></label>
            <input type="file" name="item_photo1" id="item_photo1" required><br>

            <label><b>Photo 2 :</b></label>
            <input type="file" name="item_photo2" id="item_photo2"><br>

            <label><b>Photo 3 :</b></label>
            <input type="file" name="item_photo3" id="item_photo3"><br>

            <label><b>Description* :</b></label>
            <input type="text" placeholder="Ecrire une description" name="item_description" required size=2>

            <table>
                <tr>
                    <th>
                        <label><b> Prix* : </b></label>
                        <input type="number" placeholder="Prix(€)" name="item_prix" min='1' required>
                    </th>
                </tr>
            </table>

            <a>*: champs obligatoires</a><br>

            <input type="submit" value="Ajouter">  <br> 


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