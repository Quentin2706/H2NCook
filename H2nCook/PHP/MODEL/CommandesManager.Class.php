<?php

class CommandesManager 
{
	public static function add(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Commandes (numero,idUser,idRemise,idAgenda) VALUES (:numero,:idUser,:idRemise,:idAgenda)");
		$q->bindValue(":numero", $obj->getNumero());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":idRemise", $obj->getIdRemise());
		$q->bindValue(":idAgenda", $obj->getIdAgenda());
		$q->execute();
	}

	public static function update(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Commandes SET idCommande=:idCommande,numero=:numero,idUser=:idUser,idRemise=:idRemise,idAgenda=:idAgenda WHERE idCommande=:idCommande");
		$q->bindValue(":idCommande", $obj->getIdCommande());
		$q->bindValue(":numero", $obj->getNumero());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":idRemise", $obj->getIdRemise());
		$q->bindValue(":idAgenda", $obj->getIdAgenda());
		$q->execute();
	}
	public static function delete(Commandes $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Commandes WHERE idCommande=" .$obj->getIdCommande());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Commandes WHERE idCommande =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Commandes($results);
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
		$q = $db->query("SELECT * FROM Commandes");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Commandes($donnees);
			}
		}
		return $liste;
	}
}