<?php

class RecettesManager 
{
	public static function add(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Recettes (libelle,nbPortion,cheminImage,descriptionClient,idCategorieRecette) VALUES (:libelle,:nbPortion,:cheminImage,:descriptionClient,:idCategorieRecette)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":nbPortion", $obj->getNbPortion());
		$q->bindValue(":cheminImage", $obj->getCheminImage());
		$q->bindValue(":descriptionClient", $obj->getDescriptionClient());
		$q->bindValue(":idCategorieRecette", $obj->getIdCategorieRecette());
		$q->execute();
	}

	public static function update(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Recettes SET idRecette=:idRecette,libelle=:libelle,nbPortion=:nbPortion,cheminImage=:cheminImage,descriptionClient=:descriptionClient,idCategorieRecette=:idCategorieRecette WHERE idRecette=:idRecette");
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->bindValue(":nbPortion", $obj->getNbPortion());
		$q->bindValue(":cheminImage", $obj->getCheminImage());
		$q->bindValue(":descriptionClient", $obj->getDescriptionClient());
		$q->bindValue(":idCategorieRecette", $obj->getIdCategorieRecette());
		$q->execute();
	}
	public static function delete(Recettes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Recettes WHERE idRecette=" .$obj->getIdRecette());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Recettes WHERE idRecette =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Recettes($results);
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
		$q = $db->query("SELECT * FROM Recettes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Recettes($donnees);
			}
		}
		return $liste;
	}

	public static function findLast()
	{
 		$db=DbConnect::getDb();
		$q=$db->query("SELECT * FROM `Recettes` ORDER BY `idRecette` DESC LIMIT 1");
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Recettes($results);
		}
		else
		{
			return false;
		}
	}
}