<!DOCTYPE html>
<html>
<head>
 <title>TP4: Caroussel</title>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">

 <link href="caroussel.css" rel="stylesheet" type="text/css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script type="text/javascript">



$(document).ready(function () {
var $carrousel = $('#carrousel'); // on cible le bloc du carrousel
$img = $('#carrousel img'); // on cible les images contenues dans le carrousel
indexImg = $img.length - 1; // on définit l'index du dernier élément
i = 0; // on initialise un compteur
$currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
$img.css('display', 'none'); // on cache les images
$currentImg.css('display', 'block'); // on affiche seulement l'image courante
//si on clique sur le bouton "Suivant"
$('.next').click(function () { // image suivante
i++; // on incrémente le compteur
if (i <= indexImg) {
$img.css('display', 'none'); // on cache les images
$currentImg = $img.eq(i); // on définit la nouvelle image
$currentImg.css('display', 'block'); // puis on l'affiche
} else {
i = indexImg;
}
});
//si on clique sur le bouton "Précédent"
$('.prev').click(function () { // image précédente
i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
if (i >= 0) {
$img.css('display', 'none');
$currentImg = $img.eq(i);
$currentImg.css('display', 'block');
} else {
i = 0;
}
});
function slideImg() {
setTimeout(function () { // on utilise une fonction anonyme
if (i < indexImg) { // si le compteur est inférieur au dernier index
i++; // on l'incrémente
} else { // sinon, on le remet à 0 (première image)
i = 0;
}
$img.css('display', 'none');
$currentImg = $img.eq(i);
$currentImg.css('display', 'block');
slideImg(); // on oublie pas de relancer la fonction à la fin
}, 400000); // on définit l'intervalle à 4000 millisecondes (4s)
}
slideImg(); // enfin, on lance la fonction une première fois
});

$(document).ready(function(){
   $('.header').height($(window).height());
   });
</script>
 <style type="text/css">

body, html{height:100%;}
    body {
    background-image: url('images_projet/pdg.jpg');   
    background-size: cover;
    position: relative;
    text-align:left;
    min-height: 100vh;
    }
     /*--- navigation bar background-color: rgb(252, 242, 230);  ---*/
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
    }
    #container{
        width:400px;
        margin:0 auto;
        margin-top:10%;
        margin-bottom:10%;
    }

 #nava{line-height: 30px;
 height: 700px;
 width: 450px;
 float: left;
 padding: 5px;

 }
 #section{
 width:auto;
 padding: 5px;
 height: 700px;
 }
 #footer{
    background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
      color: white;
      padding: 15px;
      bottom:0;; 
      left: 0; 
      right: 0;
      margin-top: auto;
 }
 #carrousel {
    position: relative;
    top:50px;
    height: 300px;
    width: 400px;
    margin: 30px;
   }
   #carrousel ul li {
    position: absolute;
    top: 0;
    left: 0;
    list-style: none;
   }
   .next {
    position: relative;
    top: 230px; 
    left: 235px;
    background-color: #FFFFFF;
    font-size: 20px;
    border-radius: 6px;
   }
   .prev {
    position: relative;
    top: 230px;
    left: 30px;
    background-color: #FFFFFF;
    font-size: 20px;
    border-radius: 6px;
   }
    table.table1 {
    margin: 30px;
    border: medium solid #000000;
    border-collapse: collapse;
    border-color: #84601F ;
    border-width: 1px;
    position:relative;
    top:50px;
    }

    table.table1 td {
    font-family: sans-serif;
    width: 30%;
    padding: 30px;
    text-align: left;
    background-color: #fff5e8;
    }
    h3{
        color: rgb(0,0,0);
        width: 100%;
        margin: 0 auto;
        padding-top: 20px;
        font-style: oblique;
        font-weight: 200;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 50px;
    }
    h5{
        color: rgb(0,0,0);
        width: 100%;
        margin: 0 auto;
        padding-top: 20px;
        font-style: oblique;
        font-weight: 100;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
    }
 </style>
 </head>
 <body>

<nav class="navbar t">
        <a class="navbar-brand" href="#">Ebay ECE</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-dc">
            <button class="btn btn-outline-secondary btn-lg">Deconnexion</button>
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
                      <a class="dropdown-item" href="#">Enchère</a>
                      <a class="dropdown-item" href="#">Meilleure Offre</a>
                      <a class="dropdown-item" href="#">Achat immédiat</a>
                    </div>
                  </li>
                <li class="nav-item"><a class="nav-link" href="#">Mon compte</a></li>
                <li class="nav-item"><a class="nav-link" href="#"> <img style=width:20px; src="images_projet/panier.png"></a></li>


                
            </ul>
        </div>
    </nav>

 <div id="nava">
 <?php
  $idArticle = $_GET['id'];
//identifier votre BDD
$database = "ebayece";
//connectez-vous de la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
    if ($db_found) {
    //on cherche le livre
    $sql = "SELECT * FROM item WHERE id_item LIKE '$idArticle'";
    $result = mysqli_query($db_handle, $sql);
   $i=0; 
    while ($data = mysqli_fetch_assoc($result)) {
        $photo=$data['photo_i'];
        $i=$i + 1;
        if(!is_null($data['photo_i2']))
            {$photo2=$data['photo_i2'];
                $i=$i + 1;
            }
        if(!is_null($data['photo_i3']))
            {$photo3=$data['photo_i3'];
                $i=$i + 1;
            }
        if($i===1)
        {
            echo "<div id='carrousel'>";
            echo "<img src='$photo' width='400' height='500' />
            </div>";
        } 
        if($i===2)
        {
            echo "<div id='carrousel'>";
            echo "<ul>";
            echo "<img src='$photo' width='400' height='500' />";
            echo "<li><img src='$photo2' width='400' height='500' /></li>
            </ul>
            </div>
            <input type='button' value='Précédent' class='prev'>
            <input type='button' value='Suivant' class='next'>";
        }  
        if($i===3)
         {
            echo "<div id='carrousel'>";
            echo "<ul>";
            echo "<li><img src='$photo' width='400' height='500' /></li>";
            echo "<li><img src='$photo2' width='400' height='500' /></li>";
            echo "<li><img src='$photo3' width='400' height='500' /></li>
            </ul>
            </div>
            <input type='button' value='Précédent' class='prev'>
            <input type='button' value='Suivant' class='next'>";
        } 

    }
    

    }
else{
    echo "Database not found";
}

    
    //fermer la connexion
mysqli_close($db_handle);
?>  
 </div>
 
 <div id="section">
 <?php
  $idArticle = $_GET['id'];
//identifier votre BDD
$database = "ebayece";
//connectez-vous de la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
    if ($db_found) {
    //on cherche le livre
    $sql = "SELECT * FROM item WHERE id_item LIKE '$idArticle'";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
       
    echo "<table class='table1'>";
    echo "<tr>";
    echo "<td> <h3>" . $data['nom_i'] . "</h3>";
    echo " #" . $data['id_item'] . "<br>Disponible en : " . $data['type_vente'] . "<br> Categorie : " . $data['categorie'] . "</td>"; 
    if($data['type_vente']==='Enchere')
    {
        echo "<td> Le prix actuel d'enchère est: <h3>" . $data['prix'] . " € </h3> <br> Date de fin de l'enchère : " . $data['date_fin'] . "</td>";
    }
    if($data['type_vente']==='Meilleure Offre')
    {
        echo "<td> Vous proposez votre prix.  </td>";

    }
    if($data['type_vente']==='Achat Immediat')
    {
        echo "<td> Le prix est : <h3>". $data['prix'] . " € </h3></td>";
    }  
    
    echo "</tr>";
    $image = $data['photo_i'];
    echo "<tr>";
    echo "<td><h5>Description de l'item : </h5><br>" . $data['description_i'] . "</td>";
    if($data['type_vente']==='Enchere')
    {
    echo "<td> <a href='#'> <input type='button' value='Enchérir'> </a></td>";
    }
    if($data['type_vente']==='Meilleure Offre')
    {
    echo "<td> <a href='#'> <input type='button' value='Proposer une offre'></a></td>";
    }
    if($data['type_vente']==='Achat Immediat')
    {
        echo "<td> <a href='#'> <input type='button' value='Achetez-le maintenant'></a></td>";
    }  
    echo "</tr><tr><td></td><td></td></tr>";
    
    echo "</table>";
    }
    

    }
else{
    echo "Database not found";
}
?>
 </div>
 <div id="footer">
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <p>
        37, quai de Grenelle, 75015 Paris, France <br>
        info@webDynamique.ece.fr <br>
        +33 01 02 03 04 05 <br>
        +33 01 03 02 05 04
        </p>
        <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>

 </div>
 </body>
</html>