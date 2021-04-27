<?php
if (isset($_POST["temoignage"]))
{
$infos = json_decode($_POST["temoignage"]);
$temoignage = TemoignagesManager::findById($infos->idTemoignage);
$temoignage->setTitre($infos->titre);
$temoignage->setNote($infos->note);
$temoignage->setAppreciation($infos->appreciation);

TemoignagesManager::update($temoignage);
}
if (isset($_POST["idTemoignage"]))
{
    TemoignagesManager::delete(TemoignagesManager::findById($_POST["idTemoignage"]));
}

if (isset($_POST["ajoutTemoignage"]))
{

    $dateAuj=new DateTime("now");
    date_timezone_set ($dateAuj, new DateTimeZone('Europe/Paris'));
    $dateAuj=$dateAuj->format('Y-m-d h:i:s');


    $infos = json_decode($_POST["ajoutTemoignage"]);
    var_dump($infos);
    $temoignage  = new Temoignages(["titre" => $infos->titre, "note" => $infos->note, "appreciation" => $infos->appreciation, "idUser" => $infos->idUser, "datePublication" => $dateAuj]);
    var_dump($temoignage);
    TemoignagesManager::add($temoignage);
}
