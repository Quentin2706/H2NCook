<?php
$etapesRecettesNOAPI = etapesRecetteManager::getListByRecette($_POST["idRecette"]);
$compositions = CompositionsManager::APIgetListByRecette($_POST["idRecette"]);
$etapesRecettes = etapesRecetteManager::APIgetListByRecette($_POST["idRecette"]);
// faire un for pour avoir les etapes
foreach($etapesRecettesNOAPI as $elt)
{
    $tabEtapes[] = EtapesManager::APIfindById($elt->getIdEtape());
}

$tab = [$compositions,$etapesRecettes,$tabEtapes];

echo json_encode($tab);