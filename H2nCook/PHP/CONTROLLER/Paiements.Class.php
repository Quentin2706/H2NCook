<?php

class Paiements 
{

	/*****************Attributs***************** */
	private static $listeAttributs=["Paiements","idPaiement","montant", "idModeDePaiement", "numCheque"];
	private static $listeTypeInput = ["","","text","select","text"];
	private static $listeClass =["","","","","Modesdepaiement"];
	private static $listeLabel = ["","","Montant du paiement", "Mode de paiement", "Numéro du chèque"];
	private static $nbColonne= 5;

	private $_idPaiement;
	private $_montant;
	private $_numCheque;
	private $_idModeDePaiement;

	private $_modeDePaiement;

	/***************** Accesseurs ***************** */


	public function getIdPaiement()
	{
		return $this->_idPaiement;
	}

	public function setIdPaiement($idPaiement)
	{
		$this->_idPaiement=$idPaiement;
	}

	public function getMontant()
	{
		return $this->_montant;
	}

	public function setMontant($montant)
	{
		$this->_montant=$montant;
	}

	public function getNumCheque()
	{
		return $this->_numCheque;
	}

	public function setNumCheque($numCheque)
	{
		$this->_numCheque=$numCheque;
	}

	public function getIdModeDePaiement()
	{
		return $this->_idModeDePaiement;
	}

	public function setIdModeDePaiement($idModeDePaiement)
	{
		$this->_idModeDePaiement=$idModeDePaiement;
		$this->setModeDePaiement(ModesdepaiementManager::findById($idModeDePaiement));
	}

	public function getModeDePaiement()
	{
		return $this->_modeDePaiement;
	}

	public function setModeDePaiement($modeDePaiement)
	{
		$this->_modeDePaiement=$modeDePaiement;
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
		return $this->getMontant();
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
		return "IdPaiement : ".$this->getIdPaiement()."Montant : ".$this->getMontant()."NumCheque : ".$this->getNumCheque()."IdModeDePaiement : ".$this->getIdModeDePaiement()."\n";
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