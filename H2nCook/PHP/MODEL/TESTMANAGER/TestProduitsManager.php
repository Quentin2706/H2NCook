<?php

//Test ProduitsManager

echo "recherche id = 1" . "<br>";
$obj =ProduitsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Produits(["libelle" => "([value 1])", "reference" => "([value 2])", "poids" => "([value 3])", "stock" => "([value 4])", "prixAchatHT" => "([value 5])", "idFournisseur" => "([value 6])", "idCategorieProduit" => "([value 7])", "idUniteDeMesure" => "([value 8])", "dateCreation" => "([value 9])", "dateModification" => "([value 10])"]);
var_dump(ProduitsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = ProduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
ProduitsManager::update($obj);
$objUpdated = ProduitsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = ProduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = ProduitsManager::findById(1);
ProduitsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = ProduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>