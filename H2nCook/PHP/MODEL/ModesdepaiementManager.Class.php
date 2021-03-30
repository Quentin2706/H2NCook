<?php

class ModesdepaiementManager 
{
	public static function add(Modesdepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Modesdepaiement (libelle) VALUES (:libelle)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}

	public static function update(Modesdepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Modesdepaiement SET idModeDePaiement=:idModeDePaiement,libelle=:libelle WHERE idModeDePaiement=:idModeDePaiement");
		$q->bindValue(":idModeDePaiement", $obj->getIdModeDePaiement());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}
	public static function delete(Modesdepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Modesdepaiement WHERE idModeDePaiement=" .$obj->getIdModeDePaiement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Modesdepaiement WHERE idModeDePaiement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Modesdepaiement($results);
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
		$q = $db->query("SELECT * FROM Modesdepaiement");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Modesdepaiement($donnees);
			}
		}
		return $liste;
	}
}