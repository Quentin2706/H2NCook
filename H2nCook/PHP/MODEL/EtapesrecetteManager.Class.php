<?php

class EtapesrecetteManager 
{
	public static function add(Etapesrecette $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Etapesrecette (ordre,idRecette,idEtape) VALUES (:ordre,:idRecette,:idEtape)");
		$q->bindValue(":ordre", $obj->getOrdre());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idEtape", $obj->getIdEtape());
		$q->execute();
	}

	public static function update(Etapesrecette $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Etapesrecette SET idEtapeRecette=:idEtapeRecette,ordre=:ordre,idRecette=:idRecette,idEtape=:idEtape WHERE idEtapeRecette=:idEtapeRecette");
		$q->bindValue(":idEtapeRecette", $obj->getIdEtapeRecette());
		$q->bindValue(":ordre", $obj->getOrdre());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idEtape", $obj->getIdEtape());
		$q->execute();
	}
	public static function delete(Etapesrecette $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Etapesrecette WHERE idEtapeRecette=" .$obj->getIdEtapeRecette());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Etapesrecette WHERE idEtapeRecette =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Etapesrecette($results);
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
		$q = $db->query("SELECT * FROM Etapesrecette");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Etapesrecette($donnees);
			}
		}
		return $liste;
	}
}