<?php
if (isset($_POST['idRecette']) && isset($_POST['quantite'])) {
    $recette = RecettesManager::findById($_POST['idRecette']);

    $quantite = $_POST['quantite'];

    $compositions = CompositionsManager::getListByRecette($_POST['idRecette']);
    $reserve = true;
    $tabId = [];
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

        $UniteBDDConvertie = $elt->getQuantite() * $ratio * (int) $_POST['quantite'];
        $tab[] = round($UniteBDDConvertie, 2);
        $tabId[] = $elt->getProduit()->getIdProduit();

    }

    $tabFin = [$tab, $tabId];
    echo json_encode($tabFin);
} else if (isset($_POST['idUnite'])) {
    $tab = [];
    $tabUnite = json_decode($_POST["idUnite"]);
    foreach ($tabUnite as $unite) {
        $uniteLibelle = UnitesDeMesureManager::findById($unite);
        $tab[] = $uniteLibelle->getLibelle();
    }
    echo json_encode($tab);
} else if(isset($_POST["all"])){

    $tabProduits = ProduitsManager::APIgetList();
    echo json_encode($tabProduits);
}

if (isset($_POST["idCommande"])) 
{
    echo json_encode(LignesCommandeManager::APIGetListByCommande($_POST["idCommande"]));
}
