<?php

//Test CategoriesproduitsManager

echo "recherche id = 1" . "<br>";
$obj =CategoriesproduitsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Categoriesproduits(["libelle" => "([value 1])"]);
var_dump(CategoriesproduitsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CategoriesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
CategoriesproduitsManager::update($obj);
$objUpdated = CategoriesproduitsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CategoriesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CategoriesproduitsManager::findById(1);
CategoriesproduitsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CategoriesproduitsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>