<?php

//Test FournisseursManager

echo "recherche id = 1" . "<br>";
$obj =FournisseursManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Fournisseurs(["libelle" => "([value 1])", "numTel" => "([value 2])", "adressePostale" => "([value 3])", "adresseMail" => "([value 4])", "ville" => "([value 5])", "codePostal" => "([value 6])"]);
var_dump(FournisseursManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = FournisseursManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelle("[(Value)]");
FournisseursManager::update($obj);
$objUpdated = FournisseursManager::findById(1);
echo "Liste des objets" . "<br>";
$array = FournisseursManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = FournisseursManager::findById(1);
FournisseursManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = FournisseursManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>