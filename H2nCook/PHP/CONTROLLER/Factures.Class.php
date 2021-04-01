<?php

class Factures 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Factures","idFacture","libelle","cheminFacture"];
	private static $listeTypeInput = ["","","text","text"];
	private static $listeClass =["","","",""];
	private static $listeLabel = ["","","Numéro de Facture","Chemin d'accès du fichier facture"];
	private static $nbColonne= 4;

	private $_idFacture;
	private $_libelle;
	private $_cheminFacture;

	/***************** Accesseurs ***************** */


	public function getIdFacture()
	{
		return $this->_idFacture;
	}

	public function setIdFacture($idFacture)
	{
		$this->_idFacture=$idFacture;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle($libelle)
	{
		$this->_libelle=$libelle;
	}

	public function getCheminFacture()
	{
		return $this->_cheminFacture;
	}

	public function setCheminFacture($cheminFacture)
	{
		$this->_cheminFacture=$cheminFacture;
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
		return "IdFacture : ".$this->getIdFacture()."Libelle : ".$this->getLibelle()."CheminFacture : ".$this->getCheminFacture()."\n";
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