<?php

class LignescommandeManager 
{
	public static function add(Lignescommande $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Lignescommande (quantite,prixVenteHT,idProduit,idRecette,idCommande) VALUES (:quantite,:prixVenteHT,:idProduit,:idRecette,:idCommande)");
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixVenteHT", $obj->getPrixVenteHT());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}

	public static function update(Lignescommande $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Lignescommande SET idLigneCommande=:idLigneCommande,quantite=:quantite,prixVenteHT=:prixVenteHT,idProduit=:idProduit,idRecette=:idRecette,idCommande=:idCommande WHERE idLigneCommande=:idLigneCommande");
		$q->bindValue(":idLigneCommande", $obj->getIdLigneCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixVenteHT", $obj->getPrixVenteHT());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}
	public static function delete(Lignescommande $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Lignescommande WHERE idLigneCommande=" .$obj->getIdLigneCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Lignescommande WHERE idLigneCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Lignescommande($results);
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
		$q = $db->query("SELECT * FROM Lignescommande");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Lignescommande($donnees);
			}
		}
		return $liste;
	}
}