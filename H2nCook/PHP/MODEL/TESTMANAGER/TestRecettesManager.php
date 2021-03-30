<?php

//Test RecettesManager

echo "recherche id = 1" . "<br>";
$obj =RecettesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Recettes(["libelle" => "([value 1])", "nbPortion" => "([value 2])", "cheminImage" => "([value 3])", "descriptionClient" => "([value 4])", "idCategorieRecette" => "([value 5])"]);
var_dump(RecettesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
RecettesManager::update($obj);
$objUpdated = RecettesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = RecettesManager::findById(1);
RecettesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = RecettesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>