<?php

class Agendas 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Agendas","idAgendas", "motif","dateEvent","horaireDebut","horaireFin", "infoComp"];
	private static $listeTypeInput = ["","","text","date","date","date","text"];
	private static $listeClass =["","","","",""];
	private static $listeLabel = ["","", "Motif du rendez-vous","Date du rendez-vous", "Début du rendez-vous", "Fin du rendez-vous", "Informations complémentaires"];
	private static $nbColonne= 7;

	private $_idAgenda;
	private $_dateEvent;
	private $_horaireDebut;
	private $_horaireFin;
	private $_motif;
	private $_infoComp;

	/***************** Accesseurs ***************** */


	public function getIdAgenda()
	{
		return $this->_idAgenda;
	}

	public function setIdAgenda($idAgenda)
	{
		$this->_idAgenda=$idAgenda;
	}

	public function getDateEvent()
	{
		return $this->_dateEvent;
	}

	public function setDateEvent($dateEvent)
	{
		$this->_dateEvent=$dateEvent;
	}

	public function getHoraireDebut()
	{
		return $this->_horaireDebut;
	}

	public function setHoraireDebut($horaireDebut)
	{
		$this->_horaireDebut=$horaireDebut;
	}

	public function getHoraireFin()
	{
		return $this->_horaireFin;
	}

	public function setHoraireFin($horaireFin)
	{
		$this->_horaireFin=$horaireFin;
	}

	public function getMotif()
	{
		return $this->_motif;
	}

	public function setMotif($motif)
	{
		$this->_motif=$motif;
	}

	public function getInfoComp()
	{
		return $this->_infoComp;
	}

	public function setInfoComp($infoComp)
	{
		$this->_infoComp=$infoComp;
	}


	public static function getListeAttributs()
    {
        return self::$listeAttributs;
    }

    public static function getListeTypeInput()
    {
        return self::$listeTypeInput;
    }

    public static function getListeClass()
    {
        return self::$listeClass;
    }

    public static function getListeLabel()
    {
        return self::$listeLabel;
    }
    public static function getNbColonne()
	{
		return self::$nbColonne;
	}

	public function getLibelle()
	{
		return $this->getDateEvent();
	}
	/*****************Constructeur***************** */

	public function __construct(array $options = [])
	{
 		if (!empty($options)) // empty : renvoi vrai si le tableau est vide
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
 		foreach ($data as $key => $value)
		{
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
			if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
			{
				$this->$methode($value);
			}
		}
	}

	/*****************Autres Méthodes***************** */

	/**
	* Transforme l'objet en chaine de caractères
	*
	* @return String
	*/
	public function toString()
	{
		return "IdAgenda : ".$this->getIdAgenda()."DateEvent : ".$this->getDateEvent()."HoraireDebut : ".$this->getHoraireDebut()."HoraireFin : ".$this->getHoraireFin()."Motif : ".$this->getMotif()."InfoComp : ".$this->getInfoComp()."\n";
	}


	
	/* Renvoit Vrai si lobjet en paramètre est égal 
	* à l'objet appelant
	*
	* @param [type] $obj
	* @return bool
	*/
	public function equalsTo($obj)
	{
		return;
	}


	/**
	* Compare l'objet à un autre
	* Renvoi 1 si le 1er est >
	*        0 si ils sont égaux
	*      - 1 si le 1er est <
	*
	* @param [type] $obj1
	* @param [type] $obj2
	* @return Integer
	*/
	public function compareTo($obj)
	{
		return;
	}
}