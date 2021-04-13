<?php

class EtapesManager 
{
	public static function add(Etapes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Etapes (titre,description) VALUES (:titre,:description)");
		$q->bindValue(":titre", $obj->getTitre());
		$q->bindValue(":description", $obj->getDescription());
		$q->execute();
	}

	public static function update(Etapes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Etapes SET idEtape=:idEtape,titre=:titre,description=:description WHERE idEtape=:idEtape");
		$q->bindValue(":idEtape", $obj->getIdEtape());
		$q->bindValue(":titre", $obj->getTitre());
		$q->bindValue(":description", $obj->getDescription());
		$q->execute();
	}
	public static function delete(Etapes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Etapes WHERE idEtape=" .$obj->getIdEtape());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Etapes WHERE idEtape =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Etapes($results);
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
		$q = $db->query("SELECT * FROM Etapes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Etapes($donnees);
			}
		}
		return $liste;
	}

	public static function findLast()
	{
 		$db=DbConnect::getDb();
		$q=$db->query("SELECT * FROM `Etapes` ORDER BY `idEtape` DESC LIMIT 1");
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Etapes($results);
		}
		else
		{
			return false;
		}
	}

	public static function deleteByRecette($id)
	{
		$db=DbConnect::getDb();
		$id = (int) $id;
		$db->exec("DELETE FROM Compositions WHERE idRecette=" .$id);
	}
}