<?php

class Remises 
{

	/*****************Attributs***************** */
	private static $listeAttributs  =["Remise","idRemise","taux"];
	private static $listeTypeInput = ["","","text"];
	private static $listeClass =["","",""];
	private static $listeLabel = ["","","Taux de remise"];
	private static $nbColonne= 3;

	private $_idRemise;
	private $_taux;

	/***************** Accesseurs ***************** */


	public function getIdRemise()
	{
		return $this->_idRemise;
	}

	public function setIdRemise($idRemise)
	{
		$this->_idRemise=$idRemise;
	}

	public function getTaux()
	{
		return $this->_taux;
	}

	public function setTaux($taux)
	{
		$this->_taux=$taux;
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

	public function getLibelle()
	{
		return $this->getTaux()." %";
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
		return "IdRemise : ".$this->getIdRemise()."Taux : ".$this->getTaux()."\n";
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