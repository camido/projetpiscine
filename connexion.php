<?php
    session_start();
    session_unset();

    $database = "ebayece";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    if ($db_found) 
        {

            
            date_default_timezone_set('Europe/Paris');
            $date2 = date('Y-m-d h:i:s');
            $sql="DELETE FROM item WHERE date_fin < '$date2'";
            $result = mysqli_query($db_handle, $sql);


    if($pseudo && $mdp) {
        
        
            $sql = "SELECT pseudo_admin, email_admin, id_admin  FROM administrateur";

            if ($_POST["button1"]) {
                // On crée un array de valeur. Chaque valeurs comprenant le nom du champ en BDD et la valeur de l'input
                $fields = array(
                    array('dbName' => 'pseudo_admin', 'val' => $pseudo),
                    array('dbName' => 'email_admin', 'val' => $mdp),
                );
                $search = "";

                foreach ($fields as $elem) {
                    if($elem['val'] !== "" ){
                        if($search === "") {
                            $search .= " WHERE ";
                        } else {
                            $search .= " AND ";
                        }

                        $search .= $elem['dbName'] . " LIKE '%" . $elem['val'] . "%'";
                    }
                }
                if($search){
                    $sql .= $search;
                } 
                
                $result = mysqli_query($db_handle, $sql);
                
                //regarder s'il y a de résultat
                if (mysqli_num_rows($result) === 0) {
                    $sql = "SELECT pseudo_v, email_v, id_v FROM vendeur";

                    if ($_POST["button1"]) {
                        // On crée un array de valeur. Chaque valeurs comprenant le nom du champ en BDD et la valeur de l'input
                        $fields = array(
                            array('dbName' => 'pseudo_v', 'val' => $pseudo),
                            array('dbName' => 'email_v', 'val' => $mdp),
                        );
                        $search = "";

                        foreach ($fields as $elem) {
                            if($elem['val'] !== "" ){
                                if($search === "") {
                                    $search .= " WHERE ";
                                } else {
                                    $search .= " AND ";
                                }

                                $search .= $elem['dbName'] . " LIKE '%" . $elem['val'] . "%'";
                            }
                        }
                        if($search){
                            $sql .= $search;
                        } 
                        
                        $result = mysqli_query($db_handle, $sql);
                        
                        //regarder s'il y a de résultat
                        if (mysqli_num_rows($result) === 0) {
                            $sql = "SELECT pseudo_a, email_a, id_a FROM acheteur";
                            if ($_POST["button1"]) {
                                // On crée un array de valeur. Chaque valeurs comprenant le nom du champ en BDD et la valeur de l'input
                                $fields = array(
                                    array('dbName' => 'pseudo_a', 'val' => $pseudo),
                                    array('dbName' => 'email_a', 'val' => $mdp),
                                );
                                $search = "";

                                foreach ($fields as $elem) {
                                    if($elem['val'] !== "" ){
                                        if($search === "") {
                                            $search .= " WHERE ";
                                        } else {
                                            $search .= " AND ";
                                        }

                                        $search .= $elem['dbName'] . " LIKE '%" . $elem['val'] . "%'";
                                    }
                                }
                                if($search){
                                    $sql .= $search;
                                } 
                                
                                $result = mysqli_query($db_handle, $sql);
                                
                                //regarder s'il y a de résultat
                                if (mysqli_num_rows($result) === 0) {
                                    //le compte n'existe pas renvoyer sur la page de connexion
                                    header('Location: connexion.html');
                                }
                                else {
                                    $sql= "SELECT * FROM acheteur WHERE pseudo_a LIKE '$pseudo'";
                                    $result = mysqli_query($db_handle, $sql);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $_SESSION['id_utilisateur']=$data['id_a'];
                                    }
                                    $_SESSION['type_utilisateur']= 'acheteur';
                                    header('Location: accueilacheteur.php');
                                }
                        }
                    }
                        else {
                            $sql= "SELECT * FROM vendeur WHERE pseudo_v LIKE '$pseudo'";
                                    $result = mysqli_query($db_handle, $sql);
                                    while ($data = mysqli_fetch_assoc($result)) 
                                    {
                                        $_SESSION['id_utilisateur']=$data['id_v'];
                                    }
                                    $_SESSION['type_utilisateur']= 'vendeur';
                                    header('Location: accueilvendeur.php');
                        }
                        
            
                    } 
                }
                else {
                    $sql= "SELECT * FROM administrateur WHERE pseudo_admin LIKE '$pseudo'";
                    $result = mysqli_query($db_handle, $sql);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $_SESSION['id_utilisateur']=$data['id_admin'];
                    }
                    $_SESSION['type_utilisateur']= 'admin';
                    header('Location: admin1.html');
                }
            }
        
    } 
    else 
    {
        header('Location: connexion.html');  
    } 
    }
        //fermer la connexion
        mysqli_close($db_handle);
    ?>