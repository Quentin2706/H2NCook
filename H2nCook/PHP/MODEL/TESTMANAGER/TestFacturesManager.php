<?php

//Test FacturesManager

echo "recherche id = 1" . "<br>";
$obj =FacturesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Factures(["libelle" => "([value 1])", "cheminFacture" => "([value 2])"]);
var_dump(FacturesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = FacturesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
FacturesManager::update($obj);
$objUpdated = FacturesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = FacturesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = FacturesManager::findById(1);
FacturesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = FacturesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>