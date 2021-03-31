<?php

class Produits 
{

	/*****************Attributs***************** */
	private static $listeAttributs=["Produits","idProduit","libelle", "reference", "poids", "stock", "prixAchatHT", "idFournisseur", "idCategorieProduit", "idUniteDeMesure"];
	private static $listeTypeInput = ["","","text","text","text","text","text","select","select","select"];
	private static $listeClass =["","","","","","","","Fournisseurs","CategoriesProduits","Unitesdemesure"];
	private static $listeLabel = ["","","Libelle du produit","Référence du produit","Poids (ex : 100) pour 100 grammes", "quantité en stock (si vous avez 2 sachets de 100g c'est donc 2)", "Prix d'achat du produit unitaire)", "Fournisseur lié au produit", "Catégorie du produit", "unité de mesure (si vous avez saisis 10 oignons laissez ce champs vide)"];
	private static $nbColonne= 10;

	private $_idProduit;
	private $_libelle;
	private $_reference;
	private $_poids;
	private $_stock;
	private $_prixAchatHT;
	private $_idFournisseur;
	private $_idCategorieProduit;
	private $_idUniteDeMesure;
	private $_dateCreation;
	private $_dateModification;

	private $_fournisseur;
	private $_categorieProduit;
	private $_uniteDeMesure;

	/***************** Accesseurs ***************** */


	public function getIdProduit()
	{
		return $this->_idProduit;
	}

	public function setIdProduit($idProduit)
	{
		$this->_idProduit=$idProduit;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle($libelle)
	{
		$this->_libelle=$libelle;
	}

	public function getReference()
	{
		return $this->_reference;
	}

	public function setReference($reference)
	{
		$this->_reference=$reference;
	}

	public function getPoids()
	{
		return $this->_poids;
	}

	public function setPoids($poids)
	{
		$this->_poids=$poids;
	}

	public function getStock()
	{
		return $this->_stock;
	}

	public function setStock($stock)
	{
		$this->_stock=$stock;
	}

	public function getPrixAchatHT()
	{
		return $this->_prixAchatHT;
	}

	public function setPrixAchatHT($prixAchatHT)
	{
		$this->_prixAchatHT=$prixAchatHT;
	}

	public function getIdFournisseur()
	{
		return $this->_idFournisseur;
	}

	public function setIdFournisseur($idFournisseur)
	{
		$this->_idFournisseur=$idFournisseur;
		$this->setFournisseur(FournisseursManager::findById($idFournisseur));
	}

	public function getIdCategorieProduit()
	{
		return $this->_idCategorieProduit;
	}

	public function setIdCategorieProduit($idCategorieProduit)
	{
		$this->_idCategorieProduit=$idCategorieProduit;
		$this->setCategorieProduit(CategoriesProduitsManager::findById($idCategorieProduit));
	}

	public function getIdUniteDeMesure()
	{
		return $this->_idUniteDeMesure;
	}

	public function setIdUniteDeMesure($idUniteDeMesure)
	{
		$this->_idUniteDeMesure=$idUniteDeMesure;
		$this->setUniteDeMesure(UnitesdemesureManager::findById($idUniteDeMesure));
	}

	public function getDateCreation()
	{
		return $this->_dateCreation;
	}

	public function setDateCreation($dateCreation)
	{
		$this->_dateCreation=$dateCreation;
	}

	public function getDateModification()
	{
		return $this->_dateModification;
	}

	public function setDateModification($dateModification)
	{
		$this->_dateModification=$dateModification;
	}

	public function getFournisseur()
	{
		return $this->_Fournisseur;
	}

	public function setFournisseur($fournisseur)
	{
		$this->_fournisseur=$fournisseur;
	}

	public function setCategorieProduit($categorieProduit)
	{
		$this->_categorieProduit=$categorieProduit;
	}

	public function getCategorieProduit()
	{
		return $this->_categorieProduit;
	}

	public function setUniteDeMesure($uniteDeMesure)
	{
		$this->_uniteDeMesure=$uniteDeMesure;
	}

	public function getUniteDeMesure()
	{
		return $this->_uniteDeMesure;
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
		return "IdProduit : ".$this->getIdProduit()."Libelle : ".$this->getLibelle()."Reference : ".$this->getReference()."Poids : ".$this->getPoids()."Stock : ".$this->getStock()."PrixAchatHT : ".$this->getPrixAchatHT()."IdFournisseur : ".$this->getIdFournisseur()."IdCategorieProduit : ".$this->getIdCategorieProduit()."IdUniteDeMesure : ".$this->getIdUniteDeMesure()."DateCreation : ".$this->getDateCreation()."DateModification : ".$this->getDateModification()."\n";
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