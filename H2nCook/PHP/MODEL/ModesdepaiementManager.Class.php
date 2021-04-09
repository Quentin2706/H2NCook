<?php

class ModesdepaiementManager 
{
	public static function add(ModesDePaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO ModesDePaiement (libelle) VALUES (:libelle)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}

	public static function update(ModesDePaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE ModesDePaiement SET idModeDePaiement=:idModeDePaiement,libelle=:libelle WHERE idModeDePaiement=:idModeDePaiement");
		$q->bindValue(":idModeDePaiement", $obj->getIdModeDePaiement());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}
	public static function delete(ModesDePaiement $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM ModesDePaiement WHERE idModeDePaiement=" .$obj->getIdModeDePaiement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM ModesDePaiement WHERE idModeDePaiement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new ModesDePaiement($results);
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
		$q = $db->query("SELECT * FROM ModesDePaiement");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new ModesDePaiement($donnees);
			}
		}
		return $liste;
	}
}