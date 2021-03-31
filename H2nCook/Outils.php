<?php
function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php")) {
        require "PHP/CONTROLLER/" . $classe . ".Class.php";
    }
    if (file_exists("PHP/MODEL/" . $classe . ".Class.php")) {
        require "PHP/MODEL/" . $classe . ".Class.php";
    }
}
spl_autoload_register("ChargerClasse");

function uri()
{
    $uri = $_SERVER['REQUEST_URI'];
    if (substr($uri, strlen($uri) - 1) == "/") // se termine par /
    {
        $uri .= "index.php?";
    } else if (in_array("?", str_split($uri))) // si l'uri contient deja un ?
    {
        $uri .= "&";
    } else {
        $uri .= "?";
    }
    return $uri;
}

function crypte($mot)
{
    return md5(md5($mot));
}

function texte($codeTexte)
{
    global $lang; //on appel la variable globale
    return TexteManager::findByCodes($lang, $codeTexte);
}

function afficherPage($page)
{
    $chemin = $page[0];
    $nom = $page[1];
    $titre = $page[2];

    if ($page[3] == false) {
        include 'PHP/VIEW/Head.php';
        include 'PHP/VIEW/Header.php';
        include 'PHP/VIEW/Nav.php';
        include $chemin . $nom . '.php';
        include 'PHP/VIEW/Footer.php';
    } else {
        include $chemin . $nom . '.php';
    }
}

function appelGetList($nomTable)
{
    $methode = $nomTable . "Manager::getList";
    return call_user_func($methode);
}

/**
 * Fonction qui renvoi l'objet renvoyé par l'appel de la methode formé de Get et de la chaine de caractere
 * @obj : contient l'objet sur lequel porte l'appel
 * @chaine : contient la partie de la methode apres le get
 * ex: chaine="libelle" on appele la méthode $obj->getLibelle()
 */
function appelGet($obj, $chaine)
{
    $methode = 'get' . ucfirst($chaine);
    return call_user_func(array($obj, $methode));
}

/**
 * Fonction qui renvoi l'objet renvoyé par l'appel de la methode static FindById situé dans le manager de la classe
 * @nomTable : contient le nom de la table / classe
 * @id : contient l'id recherché
 */
function appelFindById($nomTable, $id)
{
    $methode = ucfirst($nomTable) . "Manager::findById";
    // $methode = $nomTable."Manager::findById";
    return call_user_func($methode, $id);
}