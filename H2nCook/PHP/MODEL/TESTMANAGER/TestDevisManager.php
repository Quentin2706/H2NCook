<?php

//Test DevisManager

echo "recherche id = 1" . "<br>";
$obj =DevisManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Devis(["cheminDevis" => "([value 1])", "idCommande" => "([value 2])"]);
var_dump(DevisManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = DevisManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setcheminDevis("[(Value)]");
DevisManager::update($obj);
$objUpdated = DevisManager::findById(1);
echo "Liste des objets" . "<br>";
$array = DevisManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = DevisManager::findById(1);
DevisManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = DevisManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>