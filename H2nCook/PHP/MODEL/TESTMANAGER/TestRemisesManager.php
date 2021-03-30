<?php

//Test RemisesManager

echo "recherche id = 1" . "<br>";
$obj =RemisesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Remises(["taux" => "([value 1])"]);
var_dump(RemisesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = RemisesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->settaux("[(Value)]");
RemisesManager::update($obj);
$objUpdated = RemisesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = RemisesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = RemisesManager::findById(1);
RemisesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = RemisesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>