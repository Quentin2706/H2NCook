<?php

class Conversions 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Conversions","idConversion","idUniteDeMesure","ratio","idUniteDeMesure"];
	private static $listeTypeInput = ["","","select","text","select"];
	private static $listeClass =["","","Unitesdemesure","","Unitesdemesure"];
	private static $listeLabel = ["","","Unité utilisée pour la recette","Ratio de conversion","Unité enregistrée en base de données"];
	private static $nbColonne= 5;

	private $_idConversion;
	private $_idUniteChoisie;
	private $_ratio;
	private $_idUniteConvertie;

	private $_uniteChoisie;
	private $_uniteConvertie;

	/***************** Accesseurs ***************** */


	public function getIdConversion()
	{
		return $this->_idConversion;
	}

	public function setIdConversion($idConversion)
	{
		$this->_idConversion=$idConversion;
	}

	public function getIdUniteChoisie()
	{
		return $this->_idUniteChoisie;
	}

	public function setIdUniteChoisie($idUniteChoisie)
	{
		$this->_idUniteChoisie=$idUniteChoisie;
		$this->setUniteChoisie(UnitesdemesureManager::findById($idUniteChoisie));
	}

	public function getRatio()
	{
		return $this->_ratio;
	}

	public function setRatio($ratio)
	{
		$this->_ratio=$ratio;
	}

	public function getIdUniteConvertie()
	{
		return $this->_idUniteConvertie;
	}

	public function setIdUniteConvertie($idUniteConvertie)
	{
		$this->_idUniteConvertie=$idUniteConvertie;
		$this->setUniteConvertie(UnitesdemesureManager::findById($idUniteConvertie));
	}

	public function getUniteConvertie()
	{
		return $this->_uniteConvertie;
	}

	public function setUniteConvertie($uniteConvertie)
	{
		$this->_uniteConvertie=$uniteConvertie;
	}

	public function getUniteChoisie()
	{
		return $this->_uniteChoisie; 
	}

	public function setUniteChoisie($uniteChoisie)
	{
		$this->_uniteChoisie=$uniteChoisie;
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
		return "IdConversion : ".$this->getIdConversion()."IdUniteChoisie : ".$this->getIdUniteChoisie()."Ratio : ".$this->getRatio()."IdUniteConvertie : ".$this->getIdUniteConvertie()."\n";
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