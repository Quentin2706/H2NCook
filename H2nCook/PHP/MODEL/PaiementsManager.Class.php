<?php

class PaiementsManager 
{
	public static function add(Paiements $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Paiements (montant,numCheque,idModeDePaiement) VALUES (:montant,:numCheque,:idModeDePaiement)");
		$q->bindValue(":montant", $obj->getMontant());
		$q->bindValue(":numCheque", $obj->getNumCheque());
		$q->bindValue(":idModeDePaiement", $obj->getIdModeDePaiement());
		$q->execute();
	}

	public static function update(Paiements $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Paiements SET idPaiement=:idPaiement,montant=:montant,numCheque=:numCheque,idModeDePaiement=:idModeDePaiement WHERE idPaiement=:idPaiement");
		$q->bindValue(":idPaiement", $obj->getIdPaiement());
		$q->bindValue(":montant", $obj->getMontant());
		$q->bindValue(":numCheque", $obj->getNumCheque());
		$q->bindValue(":idModeDePaiement", $obj->getIdModeDePaiement());
		$q->execute();
	}
	public static function delete(Paiements $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Paiements WHERE idPaiement=" .$obj->getIdPaiement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Paiements WHERE idPaiement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Paiements($results);
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
		$q = $db->query("SELECT * FROM Paiements");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Paiements($donnees);
			}
		}
		return $liste;
	}
}