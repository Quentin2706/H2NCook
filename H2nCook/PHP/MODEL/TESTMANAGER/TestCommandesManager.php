<?php

//Test CommandesManager

echo "recherche id = 1" . "<br>";
$obj =CommandesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Commandes(["numero" => "([value 1])", "idUser" => "([value 2])", "idRemise" => "([value 3])", "idAgenda" => "([value 4])"]);
var_dump(CommandesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setnumero("[(Value)]");
CommandesManager::update($obj);
$objUpdated = CommandesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CommandesManager::findById(1);
CommandesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CommandesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>