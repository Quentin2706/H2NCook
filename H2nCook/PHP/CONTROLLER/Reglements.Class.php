<?php

class Reglements 
{

	/*****************Attributs***************** */
	private static $listeAttributs=["Reglements","idReglement","idPaiement","datePaiement","idFacture"];
	private static $listeTypeInput = ["","","select","date","select"];
	private static $listeClass =["","","Paiements","","Factures"];
	private static $listeLabel = ["","","Montant en €","Date du paiement","facture liée"];
	private static $nbColonne= 5;

	private $_idReglement;
	private $_datePaiement;
	private $_idPaiement;
	private $_idFacture;

	private $_paiement;
	private $_facture;

	/***************** Accesseurs ***************** */


	public function getIdReglement()
	{
		return $this->_idReglement;
	}

	public function setIdReglement($idReglement)
	{
		$this->_idReglement=$idReglement;
	}

	public function getDatePaiement()
	{
		return $this->_datePaiement;
	}

	public function setDatePaiement($datePaiement)
	{
		$this->_datePaiement=$datePaiement;
	}

	public function getIdPaiement()
	{
		return $this->_idPaiement;
	}

	public function setIdPaiement($idPaiement)
	{
		$this->_idPaiement=$idPaiement;
		$this->setPaiement(PaiementsManager::findById($idPaiement));
	}

	public function getIdFacture()
	{
		return $this->_idFacture;
	}

	public function setIdFacture($idFacture)
	{
		$this->_idFacture=$idFacture;
		$this->setFacture(FacturesManager::findById($idFacture));
	}

	public function getPaiement()
	{
		return $this->_paiement;
	}

	public function setPaiement($paiement)
	{
		$this->_paiement=$paiement;
	}

	public function getFacture()
	{
		return $this->_facture;
	}

	public function setFacture($facture)
	{
		$this->_facture=$facture;
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
		return "IdReglement : ".$this->getIdReglement()."DatePaiement : ".$this->getDatePaiement()."IdPaiement : ".$this->getIdPaiement()."IdFacture : ".$this->getIdFacture()."\n";
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