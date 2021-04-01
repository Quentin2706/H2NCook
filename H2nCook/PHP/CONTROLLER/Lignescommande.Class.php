<?php

class Lignescommande 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Lignescommande","idLigneCommande","quantite","idProduit","idRecette","prixVenteHT","idCommande"];
	private static $listeTypeInput = ["","","text","select","select","text","select"];
	private static $listeClass =["","","","Produits","Recettes","","Commandes"];
	private static $listeLabel = ["","","Quantité commandée","Produit/Recette","Produit/Recette","Prix de vente HT","Commande liée"];
	private static $nbColonne= 7;

	private $_idLigneCommande;
	private $_quantite;
	private $_prixVenteHT;
	private $_idProduit;
	private $_idRecette;
	private $_idCommande;

	private $_produit;
	private $_recette;
	private $_commande;

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
		$this->setProduit(ProduitsManager::findById($idProduit));
	}

	public function getProduit()
	{
		return $this->_produit;
	}

	public function setProduit($produit)
	{
		$this->_produit=$produit;
	}

	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
		$this->setRecette(RecettesManager::findById($idRecette));
	}

	public function getRecette()
	{
		return $this->_recette;
	}

	public function setRecette($recette)
	{
		$this->_recette=$recette;
	}

	public function getIdCommande()
	{
		return $this->_idCommande;
	}

	public function setIdCommande($idCommande)
	{
		$this->_idCommande=$idCommande;
		$this->setCommande(CommandesManager::findById($idCommande));
	}

	public function getCommande()
	{
		return $this->_commande;
	}

	public function setCommande($commande)
	{
		$this->_commande=$commande;
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