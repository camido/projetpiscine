<!DOCTYPE html>
<html>
<head>
<title>EbayECE - Acceuilacheteur</title>
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
    table {
    border: medium solid #000000;
    border-collapse: collapse;
    border-color: #84601F ;
    border-width: 1px 1em;;
    width: 50%;
    }
    th {
    font-family: monospace;
    width: 30%;
    padding: 5px;
    text-align: center;
    background-color: #DCB877;
    background-image: url(sky.jpg);
    }
    td {
    font-family: sans-serif;
    width: 40%;
    padding: 5px;
    text-align: left;
    background-color: #ffffff;
    }
    caption {
    font-family:sans-serif;
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
        <a class="navbar-brand" href="#">Ebay ECE</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-dc">
            <a href="accueil.html"> <button class="btn btn-outline-secondary btn-lg"> Déconnexion </button>  </a>
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
                <li class="nav-item"><a class="nav-link" href="panier.php"> <img style=width:20px; src="images_projet/panier.png"></a></li>


                
            </ul>
        </div>
    </nav>
       
        <header class="page-header container-fluid">
            <div class="overlay"></div> 

        
   
   

        <?php
        $vente=$_GET['vente'];
        echo "<div style='text-align:center'>
        <h3>  Voici tous les items disponibles en " . $vente . " ! </h3>
           </div>";
        //identifier votre BDD
        $database = "ebayece";
        //connectez-vous de la BDD
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        //si la BDD existe
            if ($db_found) {
            //on cherche le livre
            $sql = "SELECT * FROM item WHERE type_vente LIKE '$vente'";
            $result = mysqli_query($db_handle, $sql);

            
            //afficher les résultats
            while ($data = mysqli_fetch_assoc($result)) {
            echo "<br><table align='center'>";
            echo "<caption> </caption>";
            echo "<tr>";
            echo "<th> <h3>" . $data['nom_i'] . "</h3> ";
            echo " #" . $data['id_item'] . "</th>"; 
            echo "<td> Disponible en : " . $data['type_vente'] . "<br> Categorie : " . $data['categorie'] . "</td>";          
            echo "<td> </td>";
            
            echo "</tr>";
            $image = $data['photo_i'];
            echo "<tr>";
            echo "<th>" . "<img src='$image' height='140' width='100'>" ."<br><br></th>";
            echo "<td><h5>Description de l'item : </h5><br>" . $data['description_i'] . "</td>";
            if($data['type_vente']==='Enchere')
            {
                echo "<td> Le prix de départ est : " . $data['prix'] . " € <br> Date de fin de l'enchère : " . $data['date_fin'] . "</td>";
            }
            if($data['type_vente']==='Meilleure Offre')
            {
                echo "<td> Vous proposez votre prix.  </td>";

            }
            if($data['type_vente']==='Achat Immediat')
            {
                echo "<td> Le prix est : ". $data['prix'] . " € </td>";
            }  
            echo "</tr>";

            }
            echo "</table>";
            } else {
            echo "Database not found. <br>";
            }
        
            //fermer la connexion
        mysqli_close($db_handle);
        ?>  
        
   </header> 

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