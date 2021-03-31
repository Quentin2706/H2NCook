<?php

class Recettes 
{

	/*****************Attributs***************** */
	private static $listeAttributs=["Recettes","idRecette","libelle","nbPortion","cheminImage","descriptionClient","idCategorieRecette"];
	private static $listeTypeInput = ["","","text","text","text","text","select"];
	private static $listeClass =["","","","","","","Categoriesrecettes"];
	private static $listeLabel = ["","","Titre de la recette","Nombre de portion","chemin d'accès à l'image","Description de la recette pour le client","Catégorie de la recette"];
	private static $nbColonne= 7;

	private $_idRecette;
	private $_libelle;
	private $_nbPortion;
	private $_cheminImage;
	private $_descriptionClient;
	private $_idCategorieRecette;

	private $_categorieRecette;

	/***************** Accesseurs ***************** */


	public function getIdRecette()
	{
		return $this->_idRecette;
	}

	public function setIdRecette($idRecette)
	{
		$this->_idRecette=$idRecette;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle($libelle)
	{
		$this->_libelle=$libelle;
	}

	public function getNbPortion()
	{
		return $this->_nbPortion;
	}

	public function setNbPortion($nbPortion)
	{
		$this->_nbPortion=$nbPortion;
	}

	public function getCheminImage()
	{
		return $this->_cheminImage;
	}

	public function setCheminImage($cheminImage)
	{
		$this->_cheminImage=$cheminImage;
	}

	public function getDescriptionClient()
	{
		return $this->_descriptionClient;
	}

	public function setDescriptionClient($descriptionClient)
	{
		$this->_descriptionClient=$descriptionClient;
	}

	public function getIdCategorieRecette()
	{
		return $this->_idCategorieRecette;
	}

	public function setIdCategorieRecette($idCategorieRecette)
	{
		$this->_idCategorieRecette=$idCategorieRecette;
		$this->setCategorieRecette(CategoriesrecettesManager::findById($idCategorieRecette));
	}

	public function getCategorieRecette()
	{
		return $this->_categorieRecette;
	}

	public function setCategorieRecette($categorieRecette)
	{
		$this->_categorieRecette=$categorieRecette;
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
		return "IdRecette : ".$this->getIdRecette()."Libelle : ".$this->getLibelle()."NbPortion : ".$this->getNbPortion()."CheminImage : ".$this->getCheminImage()."DescriptionClient : ".$this->getDescriptionClient()."IdCategorieRecette : ".$this->getIdCategorieRecette()."\n";
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