<?php

class ConversionsManager 
{
	public static function add(Conversions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Conversions (idUniteChoisie,ratio,idUniteConvertie) VALUES (:idUniteChoisie,:ratio,:idUniteConvertie)");
		$q->bindValue(":idUniteChoisie", $obj->getIdUniteChoisie());
		$q->bindValue(":ratio", $obj->getRatio());
		$q->bindValue(":idUniteConvertie", $obj->getIdUniteConvertie());
		$q->execute();
	}

	public static function update(Conversions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Conversions SET idConversion=:idConversion,idUniteChoisie=:idUniteChoisie,ratio=:ratio,idUniteConvertie=:idUniteConvertie WHERE idConversion=:idConversion");
		$q->bindValue(":idConversion", $obj->getIdConversion());
		$q->bindValue(":idUniteChoisie", $obj->getIdUniteChoisie());
		$q->bindValue(":ratio", $obj->getRatio());
		$q->bindValue(":idUniteConvertie", $obj->getIdUniteConvertie());
		$q->execute();
	}
	public static function delete(Conversions $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Conversions WHERE idConversion=" .$obj->getIdConversion());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Conversions WHERE idConversion =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Conversions($results);
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
		$q = $db->query("SELECT * FROM Conversions");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Conversions($donnees);
			}
		}
		return $liste;
	}

	public static function findByConversionUniteDeMesure($idDemande, $idBDD)
	{
		$db=DbConnect::getDb();
		$idDemande = (int) $idDemande;
		$idBDD = (int) $idBDD;
		$q = $db->query("SELECT * FROM conversions WHERE idUniteChoisie=".$idDemande." AND idUniteConvertie=".$idBDD);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Conversions($results);
		}
		else
		{
			return false;
		}
	}
}