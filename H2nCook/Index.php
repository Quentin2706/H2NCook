<?php

require("./Outils.php");

Parametres::init();

DbConnect::init();

session_start();

/******Les langues******/
/***On récupère la langue***/
if (isset($_GET['lang']))
{
	$_SESSION['lang'] = $_GET['lang'];
}

/***On récupère la langue de la session/FR par défaut***/
$lang=isset($_SESSION['lang']) ? $_SESSION['lang'] : 'FR';
/******Fin des langues******/

$routes=[
	"default"=>["PHP/VIEW/","accueil","Accueil"],
	"TestagendasManager"=>["PHP/MODEL/TESTMANAGER/","TestagendasManager","Test de agendas"],
	"TestcategoriesproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TestcategoriesproduitsManager","Test de categoriesproduits"],
	"TestcategoriesrecettesManager"=>["PHP/MODEL/TESTMANAGER/","TestcategoriesrecettesManager","Test de categoriesrecettes"],
	"TestclientsManager"=>["PHP/MODEL/TESTMANAGER/","TestclientsManager","Test de clients"],
	"TestcommandesManager"=>["PHP/MODEL/TESTMANAGER/","TestcommandesManager","Test de commandes"],
	"TestcompositionsManager"=>["PHP/MODEL/TESTMANAGER/","TestcompositionsManager","Test de compositions"],
	"TestconversionsManager"=>["PHP/MODEL/TESTMANAGER/","TestconversionsManager","Test de conversions"],
	"TestdevisManager"=>["PHP/MODEL/TESTMANAGER/","TestdevisManager","Test de devis"],
	"TestetapesManager"=>["PHP/MODEL/TESTMANAGER/","TestetapesManager","Test de etapes"],
	"TestetapesrecetteManager"=>["PHP/MODEL/TESTMANAGER/","TestetapesrecetteManager","Test de etapesrecette"],
	"TestfacturesManager"=>["PHP/MODEL/TESTMANAGER/","TestfacturesManager","Test de factures"],
	"TestfournisseursManager"=>["PHP/MODEL/TESTMANAGER/","TestfournisseursManager","Test de fournisseurs"],
	"TestlignescommandeManager"=>["PHP/MODEL/TESTMANAGER/","TestlignescommandeManager","Test de lignescommande"],
	"TestmodesdepaiementManager"=>["PHP/MODEL/TESTMANAGER/","TestmodesdepaiementManager","Test de modesdepaiement"],
	"TestpaiementsManager"=>["PHP/MODEL/TESTMANAGER/","TestpaiementsManager","Test de paiements"],
	"TestproduitsManager"=>["PHP/MODEL/TESTMANAGER/","TestproduitsManager","Test de produits"],
	"TestrecettesManager"=>["PHP/MODEL/TESTMANAGER/","TestrecettesManager","Test de recettes"],
	"TestreglementsManager"=>["PHP/MODEL/TESTMANAGER/","TestreglementsManager","Test de reglements"],
	"TestremisesManager"=>["PHP/MODEL/TESTMANAGER/","TestremisesManager","Test de remises"],
	"TestrolesManager"=>["PHP/MODEL/TESTMANAGER/","TestrolesManager","Test de roles"],
	"TesttemoignagesManager"=>["PHP/MODEL/TESTMANAGER/","TesttemoignagesManager","Test de temoignages"],
	"TestunitesdemesureManager"=>["PHP/MODEL/TESTMANAGER/","TestunitesdemesureManager","Test de unitesdemesure"],
	"TestusersManager"=>["PHP/MODEL/TESTMANAGER/","TestusersManager","Test de users"],
];

if(isset($_GET["page"]))
{

	$page=$_GET["page"];

	if(isset($routes[$page]))
	{
		AfficherPage($routes[$page]);
	}
	else
	{
		AfficherPage($routes["default"]);
	}
}
else
{
	AfficherPage($routes["default"]);
}