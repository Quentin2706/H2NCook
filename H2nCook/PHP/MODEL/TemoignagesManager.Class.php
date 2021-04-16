<?php

class TemoignagesManager 
{
	public static function add(Temoignages $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Temoignages (titre,note,appreciation,datePublication,idUser) VALUES (:titre,:note,:appreciation,:datePublication,:idUser)");
		$q->bindValue(":titre", $obj->getTitre());
		$q->bindValue(":note", $obj->getNote());
		$q->bindValue(":appreciation", $obj->getAppreciation());
		$q->bindValue(":datePublication", $obj->getDatePublication());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}

	public static function update(Temoignages $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Temoignages SET idTemoignage=:idTemoignage,titre=:titre,note=:note,appreciation=:appreciation,datePublication=:datePublication,idUser=:idUser WHERE idTemoignage=:idTemoignage");
		$q->bindValue(":idTemoignage", $obj->getIdTemoignage());
		$q->bindValue(":titre", $obj->getTitre());
		$q->bindValue(":note", $obj->getNote());
		$q->bindValue(":appreciation", $obj->getAppreciation());
		$q->bindValue(":datePublication", $obj->getDatePublication());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}
	public static function delete(Temoignages $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Temoignages WHERE idTemoignage=" .$obj->getIdTemoignage());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Temoignages WHERE idTemoignage =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Temoignages($results);
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
		$q = $db->query("SELECT * FROM Temoignages");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Temoignages($donnees);
			}
		}
		return $liste;
	}

	public static function findByClient($id)
	{
		$db=DbConnect::getDb();
		$id = (int) $id;
		$liste = [];
		$q = $db->query("SELECT * FROM Temoignages WHERE idUser=".$id);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Temoignages($donnees);
			}
		}
		return $liste;
	}

	public static function APIgetFiveLast()
	{
 		$db=DbConnect::getDb();
		$json = [];
		$q=$db->query("SELECT * FROM `Temoignages` ORDER BY `idTemoignage` DESC LIMIT 5");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$json[] = $donnees;
			}
		}
		return $json;
	}

}