<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Ebay ECE - paiement</title>
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
        width: 50%;
        margin: 0 auto;
        padding-bottom: 10px;
    }
    #number {
  width: 8em;
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
        <a class="navbar-brand" href="#">Ebay ECE</a>
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
                      <a class="dropdown-item" href="#">Trésor et Féraille</a>
                      <a class="dropdown-item" href="#">Bon pour les musées</a>
                      <a class="dropdown-item" href="#">Accésoires VIP</a>
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
    <?php
    $idAcheteur =$_SESSION['id_utilisateur'];
      $total =$_SESSION['total'];
  

    //identifier votre BDD
    $database = "ebayece";
    //connectez-vous de la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si la BDD existe
        if ($db_found) 
        {
          if($total>0)
          {
            $sql = "SELECT * FROM acheteur WHERE id_a = '$idAcheteur'";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            if(is_null($data['num_carte']))
            {
                
            
                   
    
    echo "
    <div id=\"container\">
        
        <form action=\"paiement2.php\" method=\"POST\">
        

     <section>
                <h2>Informations de paiement</h2><br>
                <p>
                  <label for=\"card\">
                    <span><b>Type de carte :</b></span>
                  </label>
                  <select id=\"card\" name=\"usercard\">
                    <option value=\"visa\">Visa</option>
                    <option value=\"mc\">Mastercard</option>
                    <option value=\"amex\">American Express</option>
                    <option value=\"amex\">Paypal</option>
                  </select>
                </p>
            <table>
                <tr> 
                    <td><label><b>Numero de carte</b></label>
                        <input type=\"number\" name=\"numcarte\" min=\"100000000000000\" maxlength=\"9999999999999999\" required></td>
                    <td><label><b>Nom affiché sur la carte</b></label>
                        <input type=\"text\" placeholder=\"Nom affiché sur la carte\" name=\"nomcarte\" required>
                    </td>
                </tr>
                <tr> 
                    <td><label><b>Code de sécurité (3 ou 4 chiffres, selon la carte)</b></label>
                        <input type=\"number\" placeholder=\"Code de sécurité\" id = \"number\" name=\"codecarte\" min=\"100\" maxlength=\"9999\" required></td>
                        
                    <td ><label><b>Date d'expiration</b></label>
                        <input type=\"month\"  name=\"datecarte\" min=\"2020-05\" max=\"2025-05\" required></td>
                </tr>
            </table>
            
                
            </section> 

            
            <input type=\"submit\" id='submit' value='Valider' >


        </form>
    </div>";
            }
            else{
              echo '<meta http-equiv="refresh" content="0;URL=verificationpaiement.php">';
            }
          }
          else{
            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
          }
        }
        else {
          echo "Database not found";
        }
    ?>

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