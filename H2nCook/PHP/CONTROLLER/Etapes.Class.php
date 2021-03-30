<?php

class Etapes 
{

	/*****************Attributs***************** */

	private $_idEtape;
	private $_titre;
	private $_description;

	/***************** Accesseurs ***************** */


	public function getIdEtape()
	{
		return $this->_idEtape;
	}

	public function setIdEtape($idEtape)
	{
		$this->_idEtape=$idEtape;
	}

	public function getTitre()
	{
		return $this->_titre;
	}

	public function setTitre($titre)
	{
		$this->_titre=$titre;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function setDescription($description)
	{
		$this->_description=$description;
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
		return "IdEtape : ".$this->getIdEtape()."Titre : ".$this->getTitre()."Description : ".$this->getDescription()."\n";
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