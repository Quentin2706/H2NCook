<?php

class CategoriesproduitsManager 
{
	public static function add(Categoriesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Categoriesproduits (libelle) VALUES (:libelle)");
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}

	public static function update(Categoriesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Categoriesproduits SET idCategorieProduit=:idCategorieProduit,libelle=:libelle WHERE idCategorieProduit=:idCategorieProduit");
		$q->bindValue(":idCategorieProduit", $obj->getIdCategorieProduit());
		$q->bindValue(":libelle", $obj->getLibelle());
		$q->execute();
	}
	public static function delete(Categoriesproduits $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Categoriesproduits WHERE idCategorieProduit=" .$obj->getIdCategorieProduit());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Categoriesproduits WHERE idCategorieProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Categoriesproduits($results);
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
		$q = $db->query("SELECT * FROM Categoriesproduits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Categoriesproduits($donnees);
			}
		}
		return $liste;
	}
}