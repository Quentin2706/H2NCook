<?php

class DevisManager 
{
	public static function add(Devis $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Devis (cheminDevis,idCommande) VALUES (:cheminDevis,:idCommande)");
		$q->bindValue(":cheminDevis", $obj->getCheminDevis());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}

	public static function update(Devis $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Devis SET idDevis=:idDevis,cheminDevis=:cheminDevis,idCommande=:idCommande WHERE idDevis=:idDevis");
		$q->bindValue(":idDevis", $obj->getIdDevis());
		$q->bindValue(":cheminDevis", $obj->getCheminDevis());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}
	public static function delete(Devis $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Devis WHERE idDevis=" .$obj->getIdDevis());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Devis WHERE idDevis =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Devis($results);
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
		$q = $db->query("SELECT * FROM Devis");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Devis($donnees);
			}
		}
		return $liste;
	}

	public static function findByIdCommande($id)
	{
		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Devis WHERE idCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Devis($results);
		}
		else
		{
			return false;
		}
	}
}