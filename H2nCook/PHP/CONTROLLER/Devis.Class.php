<?php

class Devis 
{

	/*****************Attributs***************** */

	private $_idDevis;
	private $_cheminDevis;
	private $_idCommande;

	/***************** Accesseurs ***************** */


	public function getIdDevis()
	{
		return $this->_idDevis;
	}

	public function setIdDevis($idDevis)
	{
		$this->_idDevis=$idDevis;
	}

	public function getCheminDevis()
	{
		return $this->_cheminDevis;
	}

	public function setCheminDevis($cheminDevis)
	{
		$this->_cheminDevis=$cheminDevis;
	}

	public function getIdCommande()
	{
		return $this->_idCommande;
	}

	public function setIdCommande($idCommande)
	{
		$this->_idCommande=$idCommande;
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
		return "IdDevis : ".$this->getIdDevis()."CheminDevis : ".$this->getCheminDevis()."IdCommande : ".$this->getIdCommande()."\n";
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