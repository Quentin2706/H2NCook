<?php

class Devis 
{

	/*****************Attributs***************** */

	private static $listeAttributs=["Devis","idDevis","idCommande","cheminDevis"];
	private static $listeTypeInput = ["","","select","text"];
	private static $listeClass =["","","Commandes",""];
	private static $listeLabel = ["","","Commande liée","Chemin du fichier du devis"];
	private static $nbColonne= 4;

	private $_idDevis;
	private $_cheminDevis;
	private $_idCommande;
	
	private $_commande;


	/***************** Accesseurs ***************** */


	public function getIdDevis()
	{
		return $this->_idDevis;
	}

	public function setIdDevis($idDevis)
	{
		$this->_idDevis=$idDevis;
	}

	public function getCheminDevis()
	{
		return $this->_cheminDevis;
	}

	public function setCheminDevis($cheminDevis)
	{
		$this->_cheminDevis=$cheminDevis;
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
		return "IdDevis : ".$this->getIdDevis()."CheminDevis : ".$this->getCheminDevis()."IdCommande : ".$this->getIdCommande()."\n";
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