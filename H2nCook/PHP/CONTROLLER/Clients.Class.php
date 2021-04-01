<?php

class Clients 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Clients","idUser","genre","nom","prenom","DDN","adressePostale","ville","codePostal"];
	private static $listeTypeInput = ["","","text","text","text","date","text","text","text"];
	private static $listeClass =["","",""];
	private static $listeLabel = ["","","Genre","Nom du client","Prénom","Date de naissance","Adresse postale","ville","Code Postal"];
	private static $nbColonne= 9;

	private $_idUser;
	private $_genre;
	private $_nom;
	private $_prenom;
	private $_DDN;
	private $_adressePostale;
	private $_codePostal;
	private $_ville;

	/***************** Accesseurs ***************** */


	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
	}

	public function getGenre()
	{
		return $this->_genre;
	}

	public function setGenre($genre)
	{
		$this->_genre=$genre;
	}

	public function getNom()
	{
		return $this->_nom;
	}

	public function setNom($nom)
	{
		$this->_nom=$nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function setPrenom($prenom)
	{
		$this->_prenom=$prenom;
	}

	public function getDDN()
	{
		return $this->_DDN;
	}

	public function setDDN($DDN)
	{
		$this->_DDN=$DDN;
	}

	public function getAdressePostale()
	{
		return $this->_adressePostale;
	}

	public function setAdressePostale($adressePostale)
	{
		$this->_adressePostale=$adressePostale;
	}

	public function getCodePostal()
	{
		return $this->_codePostal;
	}

	public function setCodePostal($codePostal)
	{
		$this->_codePostal=$codePostal;
	}

	public function getVille()
	{
		return $this->_ville;
	}

	public function setVille($ville)
	{
		$this->_ville=$ville;
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
		return $this->getNom()." ".$this->getPrenom();
	}

	public function getIdClient()
	{
		return $this->getIdUser();
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
		return "IdUser : ".$this->getIdUser()."Genre : ".$this->getGenre()."Nom : ".$this->getNom()."Prenom : ".$this->getPrenom()."DDN : ".$this->getDDN()."AdressePostale : ".$this->getAdressePostale()."CodePostal : ".$this->getCodePostal()."Ville : ".$this->getVille()."\n";
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