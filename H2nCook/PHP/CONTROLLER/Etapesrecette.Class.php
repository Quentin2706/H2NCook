<?php

class Etapesrecette 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["EtapesRecette","idEtapeRecette","ordre","idEtape","idRecette"];
	private static $listeTypeInput = ["","","text","select","select"];
	private static $listeClass =["","","","Etapes","Recettes"];
	private static $listeLabel = ["","","l'ordre de l'étape pour la recette","sélectionnez l'étape","Recette liée à cette étape"];
	private static $nbColonne= 5;

	private $_idEtapeRecette;
	private $_ordre;
	private $_idRecette;
	private $_idEtape;

	private $_recette;
	private $_etape;

	/***************** Accesseurs ***************** */


	public function getIdEtapesRecett()
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
		$this->setRecette(RecettesManager::findById($idRecette));
	}

	public function getIdEtape()
	{
		return $this->_idEtape;
	}

	public function setIdEtape($idEtape)
	{
		$this->_idEtape=$idEtape;
		$this->setEtape(EtapesManager::findById($idEtape));
	}

	public function getRecette()
	{
		return $this->_recette;
	}

	public function setRecette($recette)
	{
		$this->_recette=$recette;
	}

	public function getEtape()
	{
		return $this->_etape;
	}

	public function setEtape($etape)
	{
		$this->_etape=$etape;
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