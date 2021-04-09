<?php
if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']->getIdRole() == 1) { //S'il est connecté on récupère la table
        $table = $_GET["table"];
        $manager = $table . 'Manager';
        $p = new $table($_POST);
        switch ($_GET['mode']) {
            case "ajout":
                {
                    $manager::add($p);        
                    break;
                }
            case "modif":
                {
                    $manager::update($p); 
                    break;
                }
            case "delete":
                {

                    $manager::delete($p); 
                    break;
                    
                }
        }

    }
header("location:index.php?page=Liste&table=" . $_GET["table"]);