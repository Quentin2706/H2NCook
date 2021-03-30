<?php

//Test UnitesdemesureManager

echo "recherche id = 1" . "<br>";
$obj =UnitesdemesureManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Unitesdemesure(["libelle" => "([value 1])"]);
var_dump(UnitesdemesureManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = UnitesdemesureManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
UnitesdemesureManager::update($obj);
$objUpdated = UnitesdemesureManager::findById(1);
echo "Liste des objets" . "<br>";
$array = UnitesdemesureManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = UnitesdemesureManager::findById(1);
UnitesdemesureManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = UnitesdemesureManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>