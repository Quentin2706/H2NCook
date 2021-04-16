<?php
$infos = json_decode($_POST["temoignage"]);
$temoignage = TemoignagesManager::findById($infos->idTemoignage);
$temoignage->setTitre($infos->titre);
$temoignage->setNote($infos->note);
$temoignage->setAppreciation($infos->appreciation);

TemoignagesManager::update($temoignage);

