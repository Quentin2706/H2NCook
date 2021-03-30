<?php

class Lignescommande 
{

	/*****************Attributs***************** */

	private $_idLigneCommande;
	private $_quantite;
	private $_prixVenteHT;
	private $_idProduit;
	private $_idRecette;
	private $_idCommande;

	/***************** Accesseurs ***************** */


	public function getIdLigneCommande()
	{
		return $this->_idLigneCommande;
	}

	public function setIdLigneCommande($idLigneCommande)
	{
		$this->_idLigneCommande=$idLigneCommande;
	}

	public function getQuantite()
	{
		return $this->_quantite;
	}

	public function setQuantite($quantite)
	{
		$this->_quantite=$quantite;
	}

	public function getPrixVenteHT()
	{
		return $this->_prixVenteHT;
	}

	public function setPrixVenteHT($prixVenteHT)
	{
		$this->_prixVenteHT=$prixVenteHT;
	}

	public function getIdProduit()
	{
		return $this->_idProduit;
	}

	public function setIdProduit($idProduit)
	{
		$this->_idProduit=$idProduit;
	}

	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
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
		return "IdLigneCommande : ".$this->getIdLigneCommande()."Quantite : ".$this->getQuantite()."PrixVenteHT : ".$this->getPrixVenteHT()."IdProduit : ".$this->getIdProduit()."IdRecette : ".$this->getIdRecette()."IdCommande : ".$this->getIdCommande()."\n";
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