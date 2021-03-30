<?php

//Test CompositionsManager

echo "recherche id = 1" . "<br>";
$obj =CompositionsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Compositions(["quantite" => "([value 1])", "idProduit" => "([value 2])", "idRecette" => "([value 3])", "idUniteDeMesure" => "([value 4])"]);
var_dump(CompositionsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setquantite("[(Value)]");
CompositionsManager::update($obj);
$objUpdated = CompositionsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CompositionsManager::findById(1);
CompositionsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CompositionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>