<?php

if ($_GET['mode'] != "suppr")
{
$_POST["horaireDebut"] = $_POST["dateEvent"]." ".$_POST["horaireDebut"];
$_POST["horaireFin"] = $_POST["dateEvent"]." ".$_POST["horaireFin"];
}

switch ($_GET['mode']) {
    case "ajout":
        {
            
            $agenda = new Agendas($_POST);      
            $numCommande = rand(0,99999999);
            AgendasManager::add($agenda);
            $idAgenda = AgendasManager::findLast();
            $commandeObj = new Commandes(["numero" => $numCommande, "idUser" => $_POST["idUser"], "idRemise" => 1, "idAgenda" => $idAgenda->getIdAgenda()]);
            CommandesManager::add($commandeObj);
            break;
        }
    case "modif":
        {   
            $agenda = new Agendas($_POST);
            $commande = CommandesManager::findByAgenda($_GET["id"]);
            if ($_POST["idUser"] != $commande->getIdUser())
            {
                $commande->setIdUser($_POST["idUser"]);
                CommandesManager::update($commande);
            }
            AgendasManager::update($agenda);
            break;
        }
    case "suppr":
        {
            $agenda = AgendasManager::findById($_GET["id"]);
            $commande = CommandesManager::findByAgenda($_GET["id"]);
            CommandesManager::delete($commande);
            AgendasManager::delete($agenda);
            break;
        }
}

header("location:index.php?page=Reservations");