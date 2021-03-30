<?php

class Etapesrecette 
{

	/*****************Attributs***************** */

	private $_idEtapeRecette;
	private $_ordre;
	private $_idRecette;
	private $_idEtape;

	/***************** Accesseurs ***************** */


	public function getIdEtapeRecette()
	{
		return $this->_idEtapeRecette;
	}

	public function setIdEtapeRecette($idEtapeRecette)
	{
		$this->_idEtapeRecette=$idEtapeRecette;
	}

	public function getOrdre()
	{
		return $this->_ordre;
	}

	public function setOrdre($ordre)
	{
		$this->_ordre=$ordre;
	}

	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
	}

	public function getIdEtape()
	{
		return $this->_idEtape;
	}

	public function setIdEtape($idEtape)
	{
		$this->_idEtape=$idEtape;
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
		return "IdEtapeRecette : ".$this->getIdEtapeRecette()."Ordre : ".$this->getOrdre()."IdRecette : ".$this->getIdRecette()."IdEtape : ".$this->getIdEtape()."\n";
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