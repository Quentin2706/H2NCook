<?php
if (isset($_POST["date"]))
{
    $agendas = AgendasManager::APIgetByDate($_POST["date"]);
    $horaireDebut = array_column($agendas, 'horaireDebut');

    array_multisort($horaireDebut, SORT_ASC, $agendas);
    echo utf8_decode(json_encode($agendas));
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
