<?php

class UsersManager 
{
	public static function add(Users $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Users (identifiant,motDePasse,adresseMail,idRole) VALUES (:identifiant,:motDePasse,:adresseMail,:idRole)");
		$q->bindValue(":identifiant", $obj->getIdentifiant());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":adresseMail", $obj->getAdresseMail());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}

	public static function update(Users $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Users SET idUser=:idUser,identifiant=:identifiant,motDePasse=:motDePasse,adresseMail=:adresseMail,idRole=:idRole WHERE idUser=:idUser");
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":identifiant", $obj->getIdentifiant());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":adresseMail", $obj->getAdresseMail());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}
	public static function delete(Users $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Users WHERE idUser=" .$obj->getIdUser());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Users WHERE idUser =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Users($results);
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
		$q = $db->query("SELECT * FROM Users");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Users($donnees);
			}
		}
		return $liste;
	}

	public static function findLast()
	{
 		$db=DbConnect::getDb();
		$q=$db->query("SELECT * FROM `Users` ORDER BY `idUser` DESC LIMIT 1");
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Users($results);
		}
		else
		{
			return false;
		}
	}

	public static function findByadresseMail($adresseMail)
	{
		if (!in_array(";", str_split($adresseMail))) // s'il n'y a pas de ; , je lance la requete
        {
			$db = DbConnect::getDb();
            $q = $db->query("SELECT * FROM Users WHERE adresseMail='" . $adresseMail . "'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false) {
                return new Users($results);
            } else {
                return false;
            }
        }
	}

	public static function findByPseudo($pseudo)
	{
		if (!in_array(";", str_split($pseudo))) // s'il n'y a pas de ; , je lance la requete
        {
			$db = DbConnect::getDb();
            $q = $db->query("SELECT * FROM Users WHERE identifiant='" . $pseudo . "'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false) {
                return new Users($results);
            } else {
                return false;
            }
        }
	}
}
