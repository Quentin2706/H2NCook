<?php

//Test EtapesManager

echo "recherche id = 1" . "<br>";
$obj =EtapesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Etapes(["titre" => "([value 1])", "description" => "([value 2])"]);
var_dump(EtapesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = EtapesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->settitre("[(Value)]");
EtapesManager::update($obj);
$objUpdated = EtapesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = EtapesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = EtapesManager::findById(1);
EtapesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = EtapesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>