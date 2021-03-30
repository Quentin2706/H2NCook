<?php

class ReglementsManager 
{
	public static function add(Reglements $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Reglements (datePaiement,idPaiement,idFacture) VALUES (:datePaiement,:idPaiement,:idFacture)");
		$q->bindValue(":datePaiement", $obj->getDatePaiement());
		$q->bindValue(":idPaiement", $obj->getIdPaiement());
		$q->bindValue(":idFacture", $obj->getIdFacture());
		$q->execute();
	}

	public static function update(Reglements $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Reglements SET idReglement=:idReglement,datePaiement=:datePaiement,idPaiement=:idPaiement,idFacture=:idFacture WHERE idReglement=:idReglement");
		$q->bindValue(":idReglement", $obj->getIdReglement());
		$q->bindValue(":datePaiement", $obj->getDatePaiement());
		$q->bindValue(":idPaiement", $obj->getIdPaiement());
		$q->bindValue(":idFacture", $obj->getIdFacture());
		$q->execute();
	}
	public static function delete(Reglements $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Reglements WHERE idReglement=" .$obj->getIdReglement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Reglements WHERE idReglement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Reglements($results);
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
		$q = $db->query("SELECT * FROM Reglements");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Reglements($donnees);
			}
		}
		return $liste;
	}
}