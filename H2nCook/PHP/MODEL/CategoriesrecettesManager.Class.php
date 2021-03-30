<?php

class CategoriesrecettesManager 
{
	public static function add(Categoriesrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Categoriesrecettes (libelle) VALUES (:libelle)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}

	public static function update(Categoriesrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Categoriesrecettes SET idCategorieRecette=:idCategorieRecette,libelle=:libelle WHERE idCategorieRecette=:idCategorieRecette");
		$q->bindValue(":idCategorieRecette", $obj->getIdCategorieRecette());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}
	public static function delete(Categoriesrecettes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Categoriesrecettes WHERE idCategorieRecette=" .$obj->getIdCategorieRecette());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Categoriesrecettes WHERE idCategorieRecette =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Categoriesrecettes($results);
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
		$q = $db->query("SELECT * FROM Categoriesrecettes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Categoriesrecettes($donnees);
			}
		}
		return $liste;
	}
}