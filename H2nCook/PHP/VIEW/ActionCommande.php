<?php

switch ($_GET['mode']) {
    case "ajout":
        {
            $dateAuj = new DateTime("now");
            date_timezone_set($dateAuj, new DateTimeZone('Europe/Paris'));
            $dateAuj = $dateAuj->format('Y-m-d h:i:s');

            var_dump($_POST);
            $agenda = new Agendas(["dateEvent" => $dateAuj, "horaireDebut" => $dateAuj, "horaireFin" => $dateAuj, "motif" => "réservation automatique crée lors de la creation de la commande", "infoComp" => "Création automatique de la réservation."]);
            AgendasManager::add($agenda);
            $numCommande = rand(0, 99999999);
            $idAgenda = AgendasManager::findLast();
            $commandeObj = new Commandes(["numero" => $numCommande, "idUser" => $_POST["idUser"], "idRemise" => $_POST["idRemise"], "idAgenda" => $idAgenda->getIdAgenda(), "etat" => "en cours"]);
            CommandesManager::add($commandeObj);
            $commandeLast = CommandesManager::findLast();
            $commandeLast->getIdCommande();

            $cpt = 2;
            while ($_POST["quantite" . $cpt]) {
                if ($_POST["quantite" . $cpt] != "" && $_POST["prixVenteHT" . $cpt] != "") {
                    $newObj = new Lignescommande(["quantite" => $_POST["quantite" . $cpt], "prixVenteHT" => $_POST["prixVenteHT" . $cpt], "idProduit" => null, "idRecette" => $_POST["idRecette" . $cpt], "idCommande" => $commandeLast->getIdCommande()]);
                    LignescommandeManager::add($newObj);
                }
                $cpt++;
            }

            // $user = new Users(["identifiant" => strtolower($_POST["nom"]).".".strtolower($_POST["prenom"]), "motDePasse" => ucfirst(strtolower($_POST["nom"])).strtolower($_POST["prenom"])."6458", "adresseMail" => $_POST["adresseMail"], "idRole" => 2]);
            // UsersManager::add($user);
            // $lastUser = UsersManager::findLast();
            // $pushArr=array("idUser" => $lastUser->getIdUser());
            // $tabComplet = array_merge($_POST,$pushArr);
            // $client = new Clients($tabComplet);
            // ClientsManager::add($client);
            break;
        }
    case "modif":
        {
            $commande = CommandesManager::findById($_POST["idCommande"]);
            $commande->setIdUser($_POST["idUser"]);
            $commande->setIdRemise($_POST["idRemise"]);
            CommandesManager::update($commande);

            $lignesCommande = LignesCommandeManager::getListByCommande($_POST["idCommande"]);
            foreach ($lignesCommande as $elt) {
                LignesCommandeManager::delete($elt);
            }
            $cpt = 2;
            while ($_POST["quantite" . $cpt]) {
                if ($_POST["quantite" . $cpt] != "" && $_POST["prixVenteHT" . $cpt] != "") {
                    $newObj = new Lignescommande(["quantite" => $_POST["quantite" . $cpt], "prixVenteHT" => $_POST["prixVenteHT" . $cpt], "idProduit" => null, "idRecette" => $_POST["idRecette" . $cpt], "idCommande" => $_POST["idCommande"]]);
                    LignescommandeManager::add($newObj);
                }
                $cpt++;
            }
            break;
        }
    case "suppr":
        {
            $commande = CommandesManager::findById($_POST["idCommande"]);
            $devis = DevisManager::findByIdCommande($_POST["idCommande"]);
            if ($devis != false) {
                DevisManager::delete($devis);
            }
            $lignesCommande = LignesCommandeManager::getListByCommande($_POST["idCommande"]);
            foreach ($lignesCommande as $elt) {
                LignesCommandeManager::delete($elt);
            }
            CommandesManager::delete($commande);
            break;
        }
}

header("location:index.php?page=default");
