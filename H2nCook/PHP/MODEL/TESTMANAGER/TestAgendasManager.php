<?php

//Test AgendasManager

echo "recherche id = 1" . "<br>";
$obj =AgendasManager::findById(1);
var_dump($obj);
echo $obj->toString();

// echo "ajout de l'objet". "<br>";
// $newObj = new Agendas(["dateEvent" => "([value 1])", "horaireDebut" => "([value 2])", "horaireFin" => "([value 3])", "motif" => "([value 4])", "infoComp" => "([value 5])"]);
// var_dump(AgendasManager::add($newObj));

// echo "Liste des objets" . "<br>";
// $array = AgendasManager::getList();
// foreach ($array as $unObj)
// {
// 	echo $unObj->toString() . "<br><br>";
// }

// echo "on met à jour l'id 1" . "<br>";
// $obj->setdateEvent("[(Value)]");
// AgendasManager::update($obj);
// $objUpdated = AgendasManager::findById(1);
// echo "Liste des objets" . "<br>";
// $array = AgendasManager::getList();
// foreach ($array as $unObj)
// {
// 	echo $unObj->toString() . "<br><br>";
// }

// echo "on supprime un objet". "<br>";
// $obj = AgendasManager::findById(1);
// AgendasManager::delete($obj);
// echo "Liste des objets" . "<br>";
// $array = AgendasManager::getList();
// foreach ($array as $unObj)
// {
// 	echo $unObj->toString() . "<br><br>";
// }

?>