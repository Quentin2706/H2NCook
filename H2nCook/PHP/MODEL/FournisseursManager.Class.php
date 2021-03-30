<?php

class FournisseursManager 
{
	public static function add(Fournisseurs $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Fournisseurs (libelle,numTel,adressePostale,adresseMail,ville,codePostal) VALUES (:libelle,:numTel,:adressePostale,:adresseMail,:ville,:codePostal)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":numTel", $obj->getNumTel());
		$q->bindValue(":adressePostale", $obj->getAdressePostale());
		$q->bindValue(":adresseMail", $obj->getAdresseMail());
		$q->bindValue(":ville", $obj->getVille());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->execute();
	}

	public static function update(Fournisseurs $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Fournisseurs SET idFournisseur=:idFournisseur,libelle=:libelle,numTel=:numTel,adressePostale=:adressePostale,adresseMail=:adresseMail,ville=:ville,codePostal=:codePostal WHERE idFournisseur=:idFournisseur");
		$q->bindValue(":idFournisseur", $obj->getIdFournisseur());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":numTel", $obj->getNumTel());
		$q->bindValue(":adressePostale", $obj->getAdressePostale());
		$q->bindValue(":adresseMail", $obj->getAdresseMail());
		$q->bindValue(":ville", $obj->getVille());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->execute();
	}
	public static function delete(Fournisseurs $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Fournisseurs WHERE idFournisseur=" .$obj->getIdFournisseur());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Fournisseurs WHERE idFournisseur =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Fournisseurs($results);
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
		$q = $db->query("SELECT * FROM Fournisseurs");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Fournisseurs($donnees);
			}
		}
		return $liste;
	}
}