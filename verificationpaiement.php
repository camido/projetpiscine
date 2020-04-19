<?php
session_start();
$idAcheteur =$_SESSION['id_utilisateur'];
$total =$_SESSION['total'];
$action =$_SESSION['action'];

    
    //identifier votre BDD
    $database = "ebayece";
    //connectez-vous de la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si la BDD existe
        if ($db_found) 
        {
            $sql="SELECT * FROM acheteur WHERE id_a = $idAcheteur";
            $result= mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            if($data['type_de_carte']==='visa')
            {
                if($action==='panier')
                {
                if($total > 1500)
                {
                    $_SESSION['paiement']='refuse';
                    header('Location: paiementautorisation.php');

                }
                else {
                    $_SESSION['paiement']='autorise';
                    header('Location: paiementautorisation.php');
                }

            }
            if($data['type_de_carte']==='mc')
            {
                if($total > 2500)
                {
                    $_SESSION['paiement']='refuse';
                    header('Location: paiementautorisation.php');

                }
                else {
                    $_SESSION['paiement']='autorise';
                    header('Location: paiementautorisation.php');
                }
            }
            if($data['type_de_carte']==='amex')
            {
                if($total > 6500)
                {
                    $_SESSION['paiement']='refuse';
                    header('Location: paiementautorisation.php');

                }
                else {
                    $_SESSION['paiement']='autorise';
                    header('Location: paiementautorisation.php');
                }
            }

            if($data['type_de_carte']==='paypal')
            {
                if($total > 750)
                {
                    $_SESSION['paiement']='refuse';
                    header('Location: paiementautorisation.php');

                }
                else {
                    $_SESSION['paiement']='autorise';
                    header('Location: paiementautorisation.php');
                }
            }
        }
        
        }
?>