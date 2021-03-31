<?php

class Fournisseurs 
{

	/*****************Attributs***************** */
	private static $listeAttributs=["Fournisseurs","idFournisseur","libelle","numTel","adressePostale","adresseMail","ville","codePostal"];
	private static $listeTypeInput = ["","","text","text","text","text","text","text"];
	private static $listeClass =["","","",""];
	private static $listeLabel = ["","","Nom du fournisseur","Numéro de téléphone","Adresse Postale","Adresse mail","ville","Code Postal"];
	private static $nbColonne= 8;

	private $_idFournisseur;
	private $_libelle;
	private $_numTel;
	private $_adressePostale;
	private $_adresseMail;
	private $_ville;
	private $_codePostal;

	/***************** Accesseurs ***************** */


	public function getIdFournisseur()
	{
		return $this->_idFournisseur;
	}

	public function setIdFournisseur($idFournisseur)
	{
		$this->_idFournisseur=$idFournisseur;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function setLibelle($libelle)
	{
		$this->_libelle=$libelle;
	}

	public function getNumTel()
	{
		return $this->_numTel;
	}

	public function setNumTel($numTel)
	{
		$this->_numTel=$numTel;
	}

	public function getAdressePostale()
	{
		return $this->_adressePostale;
	}

	public function setAdressePostale($adressePostale)
	{
		$this->_adressePostale=$adressePostale;
	}

	public function getAdresseMail()
	{
		return $this->_adresseMail;
	}

	public function setAdresseMail($adresseMail)
	{
		$this->_adresseMail=$adresseMail;
	}

	public function getVille()
	{
		return $this->_ville;
	}

	public function setVille($ville)
	{
		$this->_ville=$ville;
	}

	public function getCodePostal()
	{
		return $this->_codePostal;
	}

	public function setCodePostal($codePostal)
	{
		$this->_codePostal=$codePostal;
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
		return "IdFournisseur : ".$this->getIdFournisseur()."Libelle : ".$this->getLibelle()."NumTel : ".$this->getNumTel()."AdressePostale : ".$this->getAdressePostale()."AdresseMail : ".$this->getAdresseMail()."Ville : ".$this->getVille()."CodePostal : ".$this->getCodePostal()."\n";
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