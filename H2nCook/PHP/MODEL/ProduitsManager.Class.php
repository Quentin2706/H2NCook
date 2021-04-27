<?php

class ProduitsManager 
{
	public static function add(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Produits (libelle,reference,poids,stock,prixAchatHT,idFournisseur,idCategorieProduit,idUniteDeMesure,dateCreation,dateModification) VALUES (:libelle,:reference,:poids,:stock,:prixAchatHT,:idFournisseur,:idCategorieProduit,:idUniteDeMesure,:dateCreation,:dateModification)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":reference", $obj->getReference());
		$q->bindValue(":poids", $obj->getPoids());
		$q->bindValue(":stock", $obj->getStock());
		$q->bindValue(":prixAchatHT", $obj->getPrixAchatHT());
		$q->bindValue(":idFournisseur", $obj->getIdFournisseur());
		$q->bindValue(":idCategorieProduit", $obj->getIdCategorieProduit());
		$q->bindValue(":idUniteDeMesure", $obj->getIdUniteDeMesure());
		$q->bindValue(":dateCreation", $obj->getDateCreation());
		$q->bindValue(":dateModification", $obj->getDateModification());
		$q->execute();
	}

	public static function update(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Produits SET idProduit=:idProduit,libelle=:libelle,reference=:reference,poids=:poids,stock=:stock,prixAchatHT=:prixAchatHT,idFournisseur=:idFournisseur,idCategorieProduit=:idCategorieProduit,idUniteDeMesure=:idUniteDeMesure,dateCreation=:dateCreation,dateModification=:dateModification WHERE idProduit=:idProduit");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":reference", $obj->getReference());
		$q->bindValue(":poids", $obj->getPoids());
		$q->bindValue(":stock", $obj->getStock());
		$q->bindValue(":prixAchatHT", $obj->getPrixAchatHT());
		$q->bindValue(":idFournisseur", $obj->getIdFournisseur());
		$q->bindValue(":idCategorieProduit", $obj->getIdCategorieProduit());
		$q->bindValue(":idUniteDeMesure", $obj->getIdUniteDeMesure());
		$q->bindValue(":dateCreation", $obj->getDateCreation());
		$q->bindValue(":dateModification", $obj->getDateModification());
		$q->execute();
	}
	public static function delete(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Produits WHERE idProduit=" .$obj->getIdProduit());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Produits WHERE idProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Produits($results);
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
		$q = $db->query("SELECT * FROM Produits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Produits($donnees);
			}
		}
		return $liste;
	}

	public static function APIgetList()
	{
 		$db=DbConnect::getDb();
		$json = [];
		$q = $db->query("SELECT * FROM Produits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$json[] = $donnees;
				$idListe[] = $donnees["idProduit"];
			}
		}
		return [$json, $idListe];
	}


	public static function APIFindById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Produits WHERE idProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return $results;
		}
		else
		{
			return false;
		}
	}

}