<?php
if ($_GET['mode'] != "suppr")
{
$_POST["nom"] = strtoupper($_POST["nom"]);
$_POST["prenom"] = ucfirst($_POST["prenom"]);
}
switch ($_GET['mode']) {
    case "ajout":
        {
            $user = new Users(["identifiant" => strtolower($_POST["nom"]).".".strtolower($_POST["prenom"]), "motDePasse" => ucfirst(strtolower($_POST["nom"])).strtolower($_POST["prenom"])."6458", "adresseMail" => $_POST["adresseMail"], "idRole" => 2]);
            UsersManager::add($user);
            $lastUser = UsersManager::findLast(); 
            $pushArr=array("idUser" => $lastUser->getIdUser());
            $tabComplet = array_merge($_POST,$pushArr);
            $client = new Clients($tabComplet); 
            ClientsManager::add($client);
            break;
        }
    case "modif":
        {   
            $client = new Clients($_POST); 
            ClientsManager::update($client);
            break;
        }
    case "suppr":
        {
            $user = UsersManager::findById($_POST["idUser"]);
            $client = ClientsManager::findById($_POST["idUser"]);
            $temoignages = TemoignagesManager::findByClient($_POST["idUser"]);
            $commandes = CommandesManager::findByClient($_POST["idUser"]);
            if (!empty($temoignages))
            {
                foreach($temoignages as $untemoignage)
                {
                    $untemoignage->setIdUser(1);
                    TemoignagesManager::update($untemoignage);
                }
            }

            if (!empty($commandes))
            {
                foreach($commandes as $uneCommande)
                {
                    $uneCommande->setIdUser(1);
                    CommandesManager::update($uneCommande);
                }
            }
            ClientsManager::delete($client);
            UsersManager::delete($user);
            break;
        }
}

header("location:index.php?page=default");