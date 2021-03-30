<?php

//Test CategoriesrecettesManager

echo "recherche id = 1" . "<br>";
$obj =CategoriesrecettesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Categoriesrecettes(["libelle" => "([value 1])"]);
var_dump(CategoriesrecettesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = CategoriesrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
CategoriesrecettesManager::update($obj);
$objUpdated = CategoriesrecettesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = CategoriesrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = CategoriesrecettesManager::findById(1);
CategoriesrecettesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = CategoriesrecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>