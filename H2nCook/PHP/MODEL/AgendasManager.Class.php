<?php

class AgendasManager 
{
	public static function add(Agendas $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Agendas (dateEvent,horaireDebut,horaireFin,motif,infoComp) VALUES (:dateEvent,:horaireDebut,:horaireFin,:motif,:infoComp)");
		$q->bindValue(":dateEvent", $obj->getDateEvent());
		$q->bindValue(":horaireDebut", $obj->getHoraireDebut());
		$q->bindValue(":horaireFin", $obj->getHoraireFin());
		$q->bindValue(":motif", $obj->getMotif());
		$q->bindValue(":infoComp", $obj->getInfoComp());
		$q->execute();
	}

	public static function update(Agendas $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Agendas SET idAgenda=:idAgenda,dateEvent=:dateEvent,horaireDebut=:horaireDebut,horaireFin=:horaireFin,motif=:motif,infoComp=:infoComp WHERE idAgenda=:idAgenda");
		$q->bindValue(":idAgenda", $obj->getIdAgenda());
		$q->bindValue(":dateEvent", $obj->getDateEvent());
		$q->bindValue(":horaireDebut", $obj->getHoraireDebut());
		$q->bindValue(":horaireFin", $obj->getHoraireFin());
		$q->bindValue(":motif", $obj->getMotif());
		$q->bindValue(":infoComp", $obj->getInfoComp());
		$q->execute();
	}
	public static function delete(Agendas $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Agendas WHERE idAgenda=" .$obj->getIdAgenda());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Agendas WHERE idAgenda =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Agendas($results);
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
		$q = $db->query("SELECT * FROM Agendas");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Agendas($donnees);
			}
		}
		return $liste;
	}

	public static function APIgetByDate($date)
	{
 		$db=DbConnect::getDb();
		$json = [];
		$q = $db->query('SELECT * FROM agendas WHERE horaireDebut LIKE "%'.$date.'%" AND horaireFin LIKE "%'.$date.'%"');
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$json[] = $donnees;
			}
		}
		return $json;
	}
}