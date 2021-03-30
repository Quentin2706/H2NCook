<?php

class RemisesManager 
{
	public static function add(Remises $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Remises (taux) VALUES (:taux)");
		$q->bindValue(":taux", $obj->getTaux());
		$q->execute();
	}

	public static function update(Remises $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Remises SET idRemise=:idRemise,taux=:taux WHERE idRemise=:idRemise");
		$q->bindValue(":idRemise", $obj->getIdRemise());
		$q->bindValue(":taux", $obj->getTaux());
		$q->execute();
	}
	public static function delete(Remises $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Remises WHERE idRemise=" .$obj->getIdRemise());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Remises WHERE idRemise =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Remises($results);
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
		$q = $db->query("SELECT * FROM Remises");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Remises($donnees);
			}
		}
		return $liste;
	}
}