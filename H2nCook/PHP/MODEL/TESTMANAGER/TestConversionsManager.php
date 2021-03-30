<?php

//Test ConversionsManager

echo "recherche id = 1" . "<br>";
$obj =ConversionsManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Conversions(["idUniteChoisie" => "([value 1])", "ratio" => "([value 2])", "idUniteConvertie" => "([value 3])"]);
var_dump(ConversionsManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = ConversionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setidUniteChoisie("[(Value)]");
ConversionsManager::update($obj);
$objUpdated = ConversionsManager::findById(1);
echo "Liste des objets" . "<br>";
$array = ConversionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = ConversionsManager::findById(1);
ConversionsManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = ConversionsManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>