<?php

//Test EtapesrecetteManager

echo "recherche id = 1" . "<br>";
$obj =EtapesrecetteManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Etapesrecette(["ordre" => "([value 1])", "idRecette" => "([value 2])", "idEtape" => "([value 3])"]);
var_dump(EtapesrecetteManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = EtapesrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setordre("[(Value)]");
EtapesrecetteManager::update($obj);
$objUpdated = EtapesrecetteManager::findById(1);
echo "Liste des objets" . "<br>";
$array = EtapesrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = EtapesrecetteManager::findById(1);
EtapesrecetteManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = EtapesrecetteManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>