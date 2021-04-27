<?php
if (isset($_SESSION["utilisateur"])) {
    $mode = $_GET["mode"];

    $listeUser = ClientsManager::getList();
    $listeRemise = RemisesManager::getList();
    $listeRecettes = RecettesManager::getList();

    if ($mode != "ajout") {
        $id = $_GET['id'];
        $commande = CommandesManager::findById($id);
        $remise = RemisesManager::findById($commande->getIdRemise());
        $idAgenda = $commande->getIdAgenda();
    }

    echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';

    switch ($mode) {
        case "ajout":
            {
                echo '<form action="index.php?page=ActionCommande&mode=ajout" method="POST" class="colonne">';
                break;
            }
        case "detail":
            {
                echo '<form method="POST" class="colonne">';
                break;
            }
        case "modif":
            {
                echo '<form action="index.php?page=ActionCommande&mode=modif&id=' . $id . '" method="POST" class="colonne">';
                break;
            }
        case "suppr":
            {
                echo '<form action="index.php?page=ActionCommande&mode=suppr&id=' . $id . '" method="POST" class="colonne">';
                break;
            }

    }

    if ($mode != "ajout") {
        echo '<input name= "idCommande" value="' . $commande->getIdCommande() . '"type= "hidden">';
    }

    if ($mode == "modif") {
        echo '
    <div class="row">
    <div></div>
    <a href="index.php?page=FormAgenda&mode=modif&trace=R&id=' . $idAgenda . '><button type="button" class="boutonForm inForm centrer">Modifier le rendez-vous</button></a>
    <div></div>
    </div>';
    }
    echo '<div class="row">

<div>
    <label for="idUser"> Client concerné : </label>
    <select name="idUser"';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}
    echo '>';

    for ($i = 1; $i < count($listeUser); $i++) {
        $sel = "";
        if ($mode != "ajout") {
            var_dump($listeUser[$i]->getIdUser());
            if ($listeUser[$i]->getIdUser() == $commande->getIdUser()) {
                $sel = "selected";
            }
        }
        echo '<option value="' . $listeUser[$i]->getIdUser() . '" ' . $sel . ' >' . $listeUser[$i]->getNom() . " " . $listeUser[$i]->getPrenom() . ' </option>';
    }

    echo '</select>
</div>
<div></div>
    <a href="index.php?page=FormClient&mode=ajout&trace=R"><button type="button" class="boutonForm inForm centrer">Ajouter un client</button></a>
</div>';

    echo '<div class="row">

<div>
    <label for="idRemise"> Remise : </label>
    <select name="idRemise"';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}
    echo '>';

    for ($i = 1; $i < count($listeRemise); $i++) {
        $sel = "";
        if ($mode != "ajout") {
            if ($listeRemise[$i]->getIdRemise() == $commande->getIdRemise()) {
                $sel = "selected";
            }
        }
        echo '<option value="' . $listeRemise[$i]->getIdRemise() . '" ' . $sel . ' >' . $listeRemise[$i]->getTaux() . ' </option>';
    }

    echo '</select>
</div>
<div></div>
    <a href="index.php?page=Form&table=Remises&mode=ajout&trace=R"><button type="button" class="boutonForm inForm centrer">Ajouter une remise</button></a>
</div>';

    echo '<div class="colonne tabLignes">
    <h3>Recettes commandées</h3>
    <div class="colonne" id="needIng"></div>
    <div class="enteteLigne row" entete="oui">
        <div class="entete">Quantité</div>
        <div class="entete">Recette</div>
        <div class="entete">Prix de vente</div>
        <div class="enteteAdd"><img src="./IMG/add.png" alt="Ajouter " class="hidden"></div>

    </div>
    <div class="ligne row" id="Tab2">
        <div class="contenu">
            <input type="text">
        </div>
        <div class="contenu">
        <select ';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}
    echo '>';

    for ($i = 0; $i < count($listeRecettes); $i++) {
        $sel = "";
        if ($mode != "ajout") {
            if ($listeRecettes[$i]->getIdRecette() == $id) {
                $sel = "selected";
            }
        }
        $coutRevient = 0;
        $compositions = CompositionsManager::getListByRecette($listeRecettes[$i]->getIdRecette());
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
        echo '<option value="' . $listeRecettes[$i]->getIdRecette() . '" ' . $sel . ' >' . $listeRecettes[$i]->getLibelle() . " " . round($coutRevient, 2) . " €" . ' </option>';
    }

    echo '</select>
        </div>
        <div class="contenu">
            <input type="text">
        </div>

            <div class="enteteAdd supprLigne">
                <img src="./IMG/suppr_blanc.png" alt="supprimer ">
            </div>
    <input class="inputTab2" type="hidden" name="quantite2" value="">
    <input class="inputTab2" type="hidden" name="idRecette2" value="">
    <input class="inputTab2" type="hidden" name="prixVenteHT2" value="">
    </div>

</div>';

// en fonction du mode, on affiche les boutons utiles
    switch ($mode) {
        case "ajout":
            {
                echo '<div class="row spacearnd"><button type="submit" class="boutonForm">Ajouter</button>';
                break;
            }
        case "modif":
            {
                echo '<div class="row spacearnd"><button type="submit" class="boutonForm">Modifier</button>';
                break;
            }
        case "suppr":
            {
                echo '<div class="row spacearnd"><button type="submit" class="boutonForm">Supprimer</button>';
                break;
            }

        default:
            {
                echo '<div>';
            }
    }
// dans tous les cas, on met le bouton annuler
    echo '<a href="index.php?page=Liste&table=Commandes"><button type="button" class="boutonForm">Annuler</button></a>
</div>';

    echo '</form>
<div></div>
</div>';

    echo '</div>
<div></div>
</div>';
} else {
    header("location:index.php?page=default");
}
