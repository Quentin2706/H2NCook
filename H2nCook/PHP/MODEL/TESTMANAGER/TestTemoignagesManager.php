<?php

//Test TemoignagesManager

echo "recherche id = 1" . "<br>";
$obj =TemoignagesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Temoignages(["titre" => "([value 1])", "note" => "([value 2])", "appreciation" => "([value 3])", "datePublication" => "([value 4])", "idUser" => "([value 5])"]);
var_dump(TemoignagesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = TemoignagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->settitre("[(Value)]");
TemoignagesManager::update($obj);
$objUpdated = TemoignagesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = TemoignagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = TemoignagesManager::findById(1);
TemoignagesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = TemoignagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>