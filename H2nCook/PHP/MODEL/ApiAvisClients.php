<?php
if(!isset($_POST["idTemoignage"]))
{
echo json_encode(TemoignagesManager::APIgetFiveLast());
}
if(isset($_POST["idTemoignage"]))
{
    $tabRetour = [];
    $tab = json_decode($_POST["idTemoignage"]);
    for ($i = 0 ; $i < count($tab); $i++)
    {
        $temoignage = TemoignagesManager::findById($tab[$i]);
        $tabRetour[] = $temoignage->getUser()->getIdentifiant();
    }
    echo json_encode($tabRetour);
}