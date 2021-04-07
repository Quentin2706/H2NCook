<?php

//Test ClientsManager

echo "recherche id = 1" . "<br>";
$obj =ClientsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Clients(["genre" => "([value 1])", "nom" => "([value 2])", "prenom" => "([value 3])", "DDN" => "([value 4])", "adressePostale" => "([value 5])", "codePostal" => "([value 6])", "ville" => "([value 7])"]);
var_dump(ClientsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = ClientsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setgenre("[(Value)]");
ClientsManager::update($obj);
$objUpdated = ClientsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = ClientsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = ClientsManager::findById(1);
ClientsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = ClientsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>