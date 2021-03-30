<?php

class FacturesManager 
{
	public static function add(Factures $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Factures (libelle,cheminFacture) VALUES (:libelle,:cheminFacture)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":cheminFacture", $obj->getCheminFacture());
		$q->execute();
	}

	public static function update(Factures $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Factures SET idFacture=:idFacture,libelle=:libelle,cheminFacture=:cheminFacture WHERE idFacture=:idFacture");
		$q->bindValue(":idFacture", $obj->getIdFacture());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":cheminFacture", $obj->getCheminFacture());
		$q->execute();
	}
	public static function delete(Factures $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Factures WHERE idFacture=" .$obj->getIdFacture());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Factures WHERE idFacture =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Factures($results);
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
		$q = $db->query("SELECT * FROM Factures");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Factures($donnees);
			}
		}
		return $liste;
	}
}