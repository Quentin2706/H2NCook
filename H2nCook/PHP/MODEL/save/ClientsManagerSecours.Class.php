<?php

class ClientsManager 
{
	public static function add(Clients $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Clients (genre,nom,prenom,DDN,adressePostale,numTel,codePostal,ville) VALUES (:genre,:nom,:prenom,:DDN,:adressePostale,:numTel,:codePostal,:ville)");
		$q->bindValue(":genre", $obj->getGenre());
		$q->bindValue(":nom", $obj->getNom());
		$q->bindValue(":prenom", $obj->getPrenom());
		$q->bindValue(":DDN", $obj->getDDN());
		$q->bindValue(":adressePostale", $obj->getAdressePostale());
		$q->bindValue(":numTel", $obj->getNumTel());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->bindValue(":ville", $obj->getVille());
		$q->execute();
	}

	public static function update(Clients $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Clients SET idUser=:idUser,genre=:genre,nom=:nom,prenom=:prenom,DDN=:DDN,adressePostale=:adressePostale,numTel=:numTel,codePostal=:codePostal,ville=:ville WHERE idUser=:idUser");
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":genre", $obj->getGenre());
		$q->bindValue(":nom", $obj->getNom());
		$q->bindValue(":prenom", $obj->getPrenom());
		$q->bindValue(":DDN", $obj->getDDN());
		$q->bindValue(":adressePostale", $obj->getAdressePostale());
		$q->bindValue(":numTel", $obj->getNumTel());
		$q->bindValue(":codePostal", $obj->getCodePostal());
		$q->bindValue(":ville", $obj->getVille());
		$q->execute();
	}
	public static function delete(Clients $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Clients WHERE idUser=" .$obj->getIdUser());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Clients WHERE idUser =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Clients($results);
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
		$q = $db->query("SELECT * FROM Clients");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Clients($donnees);
			}
		}
		return $liste;
	}
}