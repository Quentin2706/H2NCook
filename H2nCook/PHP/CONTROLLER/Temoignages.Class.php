<?php

class Temoignages 
{

	/*****************Attributs***************** */

	private $_idTemoignage;
	private $_titre;
	private $_note;
	private $_appreciation;
	private $_datePublication;
	private $_idUser;

	/***************** Accesseurs ***************** */


	public function getIdTemoignage()
	{
		return $this->_idTemoignage;
	}

	public function setIdTemoignage($idTemoignage)
	{
		$this->_idTemoignage=$idTemoignage;
	}

	public function getTitre()
	{
		return $this->_titre;
	}

	public function setTitre($titre)
	{
		$this->_titre=$titre;
	}

	public function getNote()
	{
		return $this->_note;
	}

	public function setNote($note)
	{
		$this->_note=$note;
	}

	public function getAppreciation()
	{
		return $this->_appreciation;
	}

	public function setAppreciation($appreciation)
	{
		$this->_appreciation=$appreciation;
	}

	public function getDatePublication()
	{
		return $this->_datePublication;
	}

	public function setDatePublication($datePublication)
	{
		$this->_datePublication=$datePublication;
	}

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
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
		return "IdTemoignage : ".$this->getIdTemoignage()."Titre : ".$this->getTitre()."Note : ".$this->getNote()."Appreciation : ".$this->getAppreciation()."DatePublication : ".$this->getDatePublication()."IdUser : ".$this->getIdUser()."\n";
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