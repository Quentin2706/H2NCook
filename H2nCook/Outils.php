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
    return md5($mot);
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

    if ($page[3]) {
        include $chemin . $nom . '.php';
    } else {
        include 'PHP/VIEW/Head.php';
        include 'PHP/VIEW/Header.php';
        include 'PHP/VIEW/Nav.php';
        include $chemin . $nom . '.php';
        include 'PHP/VIEW/Footer.php';
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

/**
 * fonction qui construit un select en fonction des parametres
 * @valeur : valeur qui sera selected
 * @table : table de reference
 * @nomId : nom de l'id dans la table de reference
 * @$mode : mode ajout modif, edit ou supprime
 */
function optionSelect($valeur, $table, $nomId, $mode)
{
    // $nom = ucfirst($nom);
    // $rId = "getId".$nom;
    // $id = $obj->$rId();
    // $listeInfos = $obj->getListeInfos();
    // $rLib = "getLib".$nom;
    // $lib = $obj->$rLib();
    // $ref=["$nom"=>["id"=> $id ,"libelle"=>$lib]];
    $select = '<select id="' . $nomId . '" name="' . $nomId . '"';
    if ($mode == "detail" || $mode == "delete") {
        $select .= " disabled ";
    }
    $select .= '>';
    $liste = appelGetList($table);

    if ($valeur == null) { // si le code est null, on ne mets pas de choix par défaut avec valeur
        $select .= '<option value="" SELECTED>Choisir une valeur</option>';
    }
    foreach ($liste as $elt) {
        // var_dump($code);
        // echo $code;
        // var_dump($elt->$rId());

        if ($valeur == appelGet($elt, $nomId)) //appel de la methode stockée dans $method
        { // si le code entré en paramètre est égale à l'élément alors c'est celui qui est selectionné
            $select .= '<option value="' . appelGet($elt, $nomId) . '" SELECTED>' . appelGet($elt, "Libelle") . '</option>';
        } else {
            $select .= '<option value="' . appelGet($elt, $nomId) . '">' . appelGet($elt, "Libelle") . '</option>';
        }
    }
    $select .= "</select>";
    return $select;
}

function creerPDFRecette($idRecette)
{
    $recette = RecettesManager::findById($idRecette);
    $compositions = CompositionsManager::getListByRecette($idRecette);
    $etapesRecette = EtapesRecetteManager::getListByRecette($idRecette);
    foreach ($etapesRecette as $value) {
        $etapes[] = EtapesManager::findById($value->getIdEtape());
    }
    $pdf = new FPDF("P", "mm", "A4");
    $pdf->AddPage();
    $pdf->SetFont("Helvetica", "B", 20);

    $pdf->Write(6, utf8_decode($recette->getLibelle()));
    $pdf->Image($recette->getCheminImage(), 135, 4, 70, 50);

    $pdf->Ln(8);
    $coutRevient = 0;
    $pdf->SetFont("Helvetica", "B", 11);
    foreach ($compositions as $elt) {

        $idDemande = $elt->getUniteDeMesure()->getIdUniteDeMesure();
        $produit = ProduitsManager::findById($elt->getProduit()->getIdProduit());


        $idBDD = $produit->getUniteDeMesure()->getIdUniteDeMesure();

        if ($idDemande != $idBDD) {
            $conversion = ConversionsManager::findByConversionUniteDeMesure($idDemande, $idBDD);
            $ratio = $conversion->getRatio();
        } else {
            $ratio = 1;
        }

        $UniteBDDConvertie = $elt->getQuantite() * $ratio;
        $fin = $UniteBDDConvertie / $produit->getPoids();

        $coutRevient += $elt->getProduit()->getPrixAchatHT() * $fin;

    }

    $pdf->Write(6, "Cout de revient de la recette : " . round($coutRevient,2) . " " . chr(128) . " HT");
    $pdf->Ln(6);
    $ligne = 40;

    $pdf->SetFont("Helvetica", "B", 15);
    $pdf->Text(10, $ligne - 4, "Composition de la recette");
    $pdf->SetFont("Helvetica", "B", 11);
    $pdf->Text(20, $ligne + 6, "Produit");
    $pdf->Text(54, $ligne + 6, utf8_decode("quantité"));

    $pdf->rect(10, $ligne, 70, 10);
    $cpt = 0;

    foreach ($compositions as $uneComposition) {
        $cpt += 10;
        $ligne += 10;
        $pdf->rect(10, $ligne, 70, 10);
        $pdf->Text(12, $ligne + 6, utf8_decode($uneComposition->getProduit()->getLibelle()));
        $pdf->Text(58, $ligne + 6, utf8_decode($uneComposition->getQuantite()) . " " . $uneComposition->getUniteDeMesure()->getLibelle());
    }
    $pdf->Ln($ligne);
    $ligne = 30;

    $pdf->rect(10, $ligne + 10, 35, $cpt + 10);
    $pdf->rect(45, $ligne + 10, 35, $cpt + 10);
    $pdf->SetFont("Helvetica", "B", 15);
    $pdf->write(10, "Etapes de la recette");
    $pdf->SetFont("Helvetica", "B", 11);
    $pdf->Ln(10);
    for ($i = 0; $i < count($etapesRecette); $i++) {
        $string = utf8_decode($etapesRecette[$i]->getOrdre()) . " - " . utf8_decode($etapes[$i]->getTitre()) . " : " . utf8_decode($etapes[$i]->getDescription());

        if (strlen($string) > 100) {
            $string1 = substr($string, 0, 101);

            if ($string1[100] == " ") {
                $string2 = substr($string, 100);
            } else {
                $pos = strrpos($string1, " ");
                $string1 = substr($string, 0, $pos);
                $string2 = substr($string, $pos + 1);
            }
            $pdf->Cell(null, 10, $string1, "LTR");
            $pdf->Ln();
            $pdf->Cell(null, 10, $string2, "LBR");
        } else {
            $pdf->Cell(null, 10, utf8_decode($etapesRecette[$i]->getOrdre()) . " - " . utf8_decode($etapes[$i]->getTitre()) . " : " . utf8_decode($etapes[$i]->getDescription()), 1);
        }
        $pdf->Ln();
    }
    $pdf->Output("F", "./RECETTES/" . str_replace(" ","_",$recette->getLibelle()) . "_" . $idRecette . ".pdf");
    $route = './RECETTES/' . str_replace(" ","_",$recette->getLibelle()) . "_" . $idRecette . '.pdf';
    header("location:".$route);
}
