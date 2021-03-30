<?php

class CompositionsManager 
{
	public static function add(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Compositions (quantite,idProduit,idRecette,idUniteDeMesure) VALUES (:quantite,:idProduit,:idRecette,:idUniteDeMesure)");
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idUniteDeMesure", $obj->getIdUniteDeMesure());
		$q->execute();
	}

	public static function update(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Compositions SET idComposition=:idComposition,quantite=:quantite,idProduit=:idProduit,idRecette=:idRecette,idUniteDeMesure=:idUniteDeMesure WHERE idComposition=:idComposition");
		$q->bindValue(":idComposition", $obj->getIdComposition());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":idRecette", $obj->getIdRecette());
		$q->bindValue(":idUniteDeMesure", $obj->getIdUniteDeMesure());
		$q->execute();
	}
	public static function delete(Compositions $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Compositions WHERE idComposition=" .$obj->getIdComposition());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Compositions WHERE idComposition =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Compositions($results);
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
		$q = $db->query("SELECT * FROM Compositions");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Compositions($donnees);
			}
		}
		return $liste;
	}
}