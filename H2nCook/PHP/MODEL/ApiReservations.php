<?php
if (isset($_POST["date"]))
{
echo utf8_decode(json_encode(AgendasManager::APIgetByDate($_POST["date"])));
}

if (isset($_POST["tabIdAgenda"]))
{
    $tab = json_decode($_POST["tabIdAgenda"]);
    $tabretour = [];
    foreach ($tab as $elt) {
        $commande = CommandesManager::APIFindUserByAgendaInCommandes($elt);

        $tabRetour[] = ClientsManager::APIfindById($commande["idUser"]);
    }
    echo utf8_decode(json_encode($tabRetour));
}
