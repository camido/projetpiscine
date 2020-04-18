<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Ebay ECE - Messagerie </title>
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
        width:700px;
        background: #FAEED8;
        margin-left: 25%;
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
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 30%;
    }
    footer {
      background-image:linear-gradient(60deg, #dbb775, rgb(255, 238, 217));
      color: white;
      padding: 15px;
    }

    table {
    margin:20px;
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
                
                <li class="nav-item"><a class="nav-link" href="#">Vendre</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Gérer mes ventes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Retirer items en vente</a>
                      <a class="dropdown-item" href="offrevendeur.php">Mes demandes d'offre</a>
                    </div>
                  </li>


                
            </ul>
        </div>
    </nav>
    
    <div id="container">
        
 
        

        <section>
            <?php
            
            $ID=$_SESSION['id_utilisateur'];
            $TYPE=$_SESSION['type_utilisateur'];
            echo "<br><h2>Votre messagerie</h2><br>";
    
            $database = "ebayece";
    
            //connectez-vous de la BDD
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            //si la BDD existe
            if ($db_found) {
                
                echo "<br>";
                if($TYPE === 'vendeur')
                {
                $sql = "SELECT * FROM meilleureoffre WHERE EXISTS (SELECT * FROM item WHERE id_ite = id_item AND '$ID' = id_v)";
                }
                if($TYPE === 'admin')
                {
                $sql = "SELECT * FROM meilleureoffre WHERE EXISTS (SELECT * FROM item WHERE id_ite = id_item AND '$ID' = id_admin)";
                }
                
                $result = mysqli_query($db_handle, $sql);
    
                if(mysqli_num_rows($result) === 0)
                {
                    echo " <h2> Vous n'avez pas encore reçu d'offres. </h2>";
                }
                else{
                    
                    $total=0;
                    while ($data2 = mysqli_fetch_assoc($result)) 
                    {
                        $item=$data2['id_ite'];
                        $sql1 = "SELECT * FROM item WHERE id_item = $item";
                
                        $result1 = mysqli_query($db_handle, $sql1);
                        $data = mysqli_fetch_assoc($result1);
                    
                    $total= $total + $data['prix'] ;
                    $photo=$data['photo_i'];
                    $id=$data['id_item'];
                    
                    echo "<table >";
                    echo "<tr >
                    <td >" . $data['type_vente'] . " </td> <td > </td><td> </td><td> </td></tr>";
                    echo "<tr><td > <a href='afficherArticle.php?id=$id'> <h3>" . $data['nom_i'] . "</h3> </a>";
                    echo " #" . $data['id_item'] . "</td> <td> <img src='$photo' width='100' height='150' /></td>"; 
                    echo "<td width=40%><h5>Description de l'item : </h5><br>" . $data['description_i'] ."</td>";
                    
                    if($data2['proposition_a']==='0')
                    {
                        echo "<td align='left' width=25%> <h2> En attente d'une réponse de l'acheteur.  <h2></td>";
                    }
                    else
                    {
                        echo "<td width=25%> <h2> L'acheteur vous propose " . $data2['proposition_a'] . " € </h2></td>";
                    }
                    
                    echo "</tr><tr>
                    <td height='20'> </td> <td > </td><td> </td><td> </td></tr>
                     <tr><td style='background-color:#000000' height='5'> </td> <td style='background-color:#000000' height='5'> </td><td style='background-color:#000000'> </td><td style='background-color:#000000'> </td></tr>";
                    
                     // FAUX

                    if($data2['proposition_a']==='0')
                    {
                        if($data2['nb_prop']<6 && $data2['nb_prop']===1)
                        {
                        $idOffre=$data2['id_offre'];
                        echo "<br><form action='faireoffre.php' method='POST'>
                        Offre numéro :  <input type='number' min='1' id='submit' name='idOffre' value='$idOffre' readonly='readonly' style='width:30px;'><br>
                        <input type='number' min='1' id='submit' name='offre' value='Accepter' placeholder='montant en euro (€)'><br> <input type='submit' id='submit' value='Proposer' > </form>";
                        }
                    }
                    else 
                    {
                        if($data2['nb_prop']<6)
                        {
                            $idOffre=$data2['id_offre'];
                            echo "<br><form action='faireoffre.php' method='POST'>
                            Offre numéro : <input type='number' min='1' id='submit' name='idOffre' value='$idOffre' readonly='readonly' style='width:40px;'><br>
                        <input type='number' min='1' id='submit' name='offre' value='Accepter' placeholder='montant en euro (€)'><br> <input type='submit' id='submit' value='Proposer' > </form>";
                        }
                        $idItem=$data['id_item'];
                        echo" <a href='accepteroffre.php?id=$idItem' > <input type='submit' id='submit2' value='Accepter'> </a>" ;
                        if($data2['nb_prop']=== '6')
                        {
                            $idOffre=$data2['id_offre'];
                            echo" <a href='refuseroffre.php?id=$idOffre' >  <input type='submit' id='submit2' value='Refuser'>  </a>"; 
                        }
                    }
                    
                    
                    
                    
                    echo "</table>";
                }
                    
                    
                }
                
    
    }
            else 
            {
                echo "Database not found. <br>";
            }
                
            
    
              ?>  
                
    
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