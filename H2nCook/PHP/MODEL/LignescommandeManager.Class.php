<?php

class LignescommandeManager 
{
	public static function add(LignesCommande $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO LignesCommande (quantite,prixVenteHT,idProduit,idRecette,idCommande) VALUES (:quantite,:prixVenteHT,:idProduit,:idRecette,:idCommande)");
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixVenteHT", $obj->getPrixVenteHT());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}

	public static function update(LignesCommande $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE LignesCommande SET idLigneCommande=:idLigneCommande,quantite=:quantite,prixVenteHT=:prixVenteHT,idProduit=:idProduit,idRecette=:idRecette,idCommande=:idCommande WHERE idLigneCommande=:idLigneCommande");
		$q->bindValue(":idLigneCommande", $obj->getIdLigneCommande());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixVenteHT", $obj->getPrixVenteHT());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->execute();
	}
	public static function delete(LignesCommande $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM LignesCommande WHERE idLigneCommande=" .$obj->getIdLigneCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM LignesCommande WHERE idLigneCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new LignesCommande($results);
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
		$q = $db->query("SELECT * FROM LignesCommande");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new LignesCommande($donnees);
			}
		}
		return $liste;
	}

	public static function APIGetListByCommande($id)
	{
		$db=DbConnect::getDb();
		$liste = [];
		$id = (int) $id;
		$q = $db->query("SELECT * FROM LignesCommande WHERE idCommande=".$id);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = $donnees;
			}
		}
		return $liste;
	}

	public static function getListByCommande($id)
	{
		$db=DbConnect::getDb();
		$liste = [];
		$id = (int) $id;
		$q = $db->query("SELECT * FROM LignesCommande WHERE idCommande=".$id);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new lignesCommande($donnees);
			}
		}
		return $liste;
	}

	public static function getListByRecette($id)
	{
		$db=DbConnect::getDb();
		$liste = [];
		$id = (int) $id;
		$q = $db->query("SELECT * FROM LignesCommande WHERE idRecette=".$id);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new lignesCommande($donnees);
			}
		}
		return $liste;
	}
}