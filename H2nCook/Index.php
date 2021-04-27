<?php

    require "./Outils.php";

    Parametres::init();

    DbConnect::init();

    session_start();

/******Les langues******/
/***On récupère la langue***/
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }

/***On récupère la langue de la session/FR par défaut***/
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'FR';
/******Fin des langues******/

    $routes = [
        "default" => ["PHP/VIEW/", "Accueil", "Accueil", false],
        "TestagendasManager" => ["PHP/MODEL/TESTMANAGER/", "TestAgendasManager", "Test de agendas", false],
        "TestcategoriesproduitsManager" => ["PHP/MODEL/TESTMANAGER/", "TestcategoriesproduitsManager", "Test de categoriesproduits", false],
        "TestcategoriesrecettesManager" => ["PHP/MODEL/TESTMANAGER/", "TestcategoriesrecettesManager", "Test de categoriesrecettes", false],
        "TestclientsManager" => ["PHP/MODEL/TESTMANAGER/", "TestclientsManager", "Test de clients", false],
        "TestcommandesManager" => ["PHP/MODEL/TESTMANAGER/", "TestcommandesManager", "Test de commandes", false],
        "TestcompositionsManager" => ["PHP/MODEL/TESTMANAGER/", "TestcompositionsManager", "Test de compositions", false],
        "TestconversionsManager" => ["PHP/MODEL/TESTMANAGER/", "TestconversionsManager", "Test de conversions", false],
        "TestdevisManager" => ["PHP/MODEL/TESTMANAGER/", "TestdevisManager", "Test de devis", false],
        "TestetapesManager" => ["PHP/MODEL/TESTMANAGER/", "TestetapesManager", "Test de etapes", false],
        "TestetapesrecetteManager" => ["PHP/MODEL/TESTMANAGER/", "TestetapesrecetteManager", "Test de etapesrecette", false],
        "TestfacturesManager" => ["PHP/MODEL/TESTMANAGER/", "TestfacturesManager", "Test de factures", false],
        "TestfournisseursManager" => ["PHP/MODEL/TESTMANAGER/", "TestfournisseursManager", "Test de fournisseurs", false],
        "TestlignescommandeManager" => ["PHP/MODEL/TESTMANAGER/", "TestlignescommandeManager", "Test de lignescommande", false],
        "TestmodesdepaiementManager" => ["PHP/MODEL/TESTMANAGER/", "TestmodesdepaiementManager", "Test de modesdepaiement", false],
        "TestpaiementsManager" => ["PHP/MODEL/TESTMANAGER/", "TestpaiementsManager", "Test de paiements", false],
        "TestproduitsManager" => ["PHP/MODEL/TESTMANAGER/", "TestproduitsManager", "Test de produits", false],
        "TestrecettesManager" => ["PHP/MODEL/TESTMANAGER/", "TestrecettesManager", "Test de recettes", false],
        "TestreglementsManager" => ["PHP/MODEL/TESTMANAGER/", "TestreglementsManager", "Test de reglements", false],
        "TestremisesManager" => ["PHP/MODEL/TESTMANAGER/", "TestremisesManager", "Test de remises", false],
        "TestrolesManager" => ["PHP/MODEL/TESTMANAGER/", "TestrolesManager", "Test de roles", false],
        "TesttemoignagesManager" => ["PHP/MODEL/TESTMANAGER/", "TesttemoignagesManager", "Test de temoignages", false],
        "TestunitesdemesureManager" => ["PHP/MODEL/TESTMANAGER/", "TestunitesdemesureManager", "Test de unitesdemesure", false],
        "TestusersManager" => ["PHP/MODEL/TESTMANAGER/", "TestusersManager", "Test de users", false],

        "Liste" => ["PHP/VIEW/", "Liste", "Liste", false],
        "Form" => ["PHP/VIEW/", "Form", "Formulaire", false],
        "Action" => ["PHP/VIEW/", "Action", "", false],

        "Reservations" => ["PHP/VIEW/", "Reservations", "Reservations", false],
        "FormAgenda" => ["PHP/VIEW/", "FormAgenda", "Ajouter un rendez-vous", false],
        "ActionAgenda" => ["PHP/VIEW/", "ActionAgenda", "", false],

        "FormClient" => ["PHP/VIEW/", "FormClient", "Ajouter un client", false],
        "ActionClient" => ["PHP/VIEW/", "ActionClient", "", false],

        "FormRecette" => ["PHP/VIEW/", "FormRecette", "Ajouter une recette", false],
        "ActionRecette" => ["PHP/VIEW/", "ActionRecette", "", false],

        "FormInscription" => ["PHP/VIEW/", "FormInscription", "S'inscrire", false],
        "ActionConnexion" => ["PHP/VIEW/", "ActionConnexion", "", false],
        "FormConnexion" => ["PHP/VIEW/", "FormConnexion", "", false],

        "FormCommande" => ["PHP/VIEW/", "FormCommande", "Ajouter une commande", false],
        "ActionCommande" => ["PHP/VIEW/", "ActionCommande", "", false],


        "ApiReservations" => ["PHP/MODEL/", "ApiReservations", "api", true],
        "ApiFormRecette" => ["PHP/MODEL/", "ApiFormRecette", "api", true],
        "ApiAvisClients" => ["PHP/MODEL/", "ApiAvisClients", "api", true],
        "ApiFormTemoignage" => ["PHP/MODEL/", "ApiFormTemoignage", "api", true],
        "ApiFormCommande" => ["PHP/MODEL/", "ApiFormCommande", "api", true],

        "PDFGenerator" => ["PHP/VIEW/", "PDFGenerator", "", false],

        "AvisClients" => ["PHP/VIEW/", "AvisClients", "Avis des clients", false],

        "ListePlats"=> ["PHP/VIEW/", "ListePlats", "Avis des clients", false],
    ];

    if (isset($_GET["page"])) {

        $page = $_GET["page"];

        if (isset($routes[$page])) {
            AfficherPage($routes[$page]);
        } else {
            AfficherPage($routes["default"]);
        }
    } else {
        AfficherPage($routes["default"]);
    }

