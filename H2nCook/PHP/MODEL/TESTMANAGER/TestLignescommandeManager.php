<?php

//Test LignescommandeManager

echo "recherche id = 1" . "<br>";
$obj =LignescommandeManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Lignescommande(["quantite" => "([value 1])", "prixVenteHT" => "([value 2])", "idProduit" => "([value 3])", "idRecette" => "([value 4])", "idCommande" => "([value 5])"]);
var_dump(LignescommandeManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = LignescommandeManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setquantite("[(Value)]");
LignescommandeManager::update($obj);
$objUpdated = LignescommandeManager::findById(1);
echo "Liste des objets" . "<br>";
$array = LignescommandeManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = LignescommandeManager::findById(1);
LignescommandeManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = LignescommandeManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>