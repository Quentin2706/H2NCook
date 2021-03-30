<?php

class UnitesdemesureManager 
{
	public static function add(Unitesdemesure $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Unitesdemesure (libelle) VALUES (:libelle)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}

	public static function update(Unitesdemesure $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Unitesdemesure SET idUniteDeMesure=:idUniteDeMesure,libelle=:libelle WHERE idUniteDeMesure=:idUniteDeMesure");
		$q->bindValue(":idUniteDeMesure", $obj->getIdUniteDeMesure());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}
	public static function delete(Unitesdemesure $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Unitesdemesure WHERE idUniteDeMesure=" .$obj->getIdUniteDeMesure());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Unitesdemesure WHERE idUniteDeMesure =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Unitesdemesure($results);
		}
		else
		{
			return false;
		}
	}
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Unitesdemesure");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Unitesdemesure($donnees);
			}
		}
		return $liste;
	}
}