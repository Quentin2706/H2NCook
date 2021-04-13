<?php

if (isset($_SESSION["utilisateur"]) && ($_SESSION["utilisateur"]->getIdRole() == 1))
{

$mode = $_GET["mode"];
$listeCategRecettes = CategoriesRecettesManager::getList();
$listeProduits = ProduitsManager::getList();
$listeUnitesDeMesure = UnitesdemesureManager::getList();

if ($mode != "ajout") {
    $id = $_GET['id'];
    // En fonction de la surchage on fait l'action appropriée
    $recette = RecettesManager::findById($id);
}

echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';


switch ($mode) {
    case "ajout":
        {
            echo '<form action="index.php?page=ActionRecette&mode=ajout" method="POST" enctype="multipart/form-data" class="colonne">';
            break;
        }
    case "detail":
        {
            echo '<form method="POST" class="colonne">';
            break;
        }
    case "modif":
        {
            echo '<form action="index.php?page=ActionRecette&mode=modif&id='.$id.'" method="POST" class="colonne">';
            break;
        }
    case "suppr":
        {
            echo '<form action="index.php?page=ActionRecette&mode=suppr&id='.$id.'" method="POST" class="colonne">';
            break;
        }

}

if ($mode != "ajout") {
    echo '<input name= "idUser" value="' . $recette->getIdRecette() . '"type= "hidden">';
}



echo '<div>
    <label for="libelle"> Libelle : </label>
    <input name="libelle" type="text"';if ($mode != "ajout") {
    echo 'value= "' .$recette->getLibelle() . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}
echo'></div>';

echo '<div class="row flexend">

<div>
    <label for="idCategorieRecette"> Catégorie de la recette : </label>
    <select name="idCategorieRecette"';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}echo'>';

for ($i = 1; $i < count($listeCategRecettes);$i++) {
     $sel = "";
     if ($mode != "ajout") {
        if ($listeCategRecettes[$i]->getIdCategorieRecette() == $id) {
            $sel = "selected";
        }
    }
    echo '<option value="' . $listeCategRecettes[$i]->getIdCategorieRecette() . '" ' . $sel . ' >' . $listeCategRecettes[$i]->getLibelle() . ' </option>';
}

echo '</select>
</div>

    <a href="index.php?page=Form&table=CategoriesRecettes&mode=ajout&trace=FR"><button id="ajoutClient" type="button" class="boutonForm centrer">Ajouter une catégorie de recette</button></a>
</div>';


echo '<div>
    <label for="nbPortion"> Nombre de portions : </label>
    <input name="nbPortion" type="text"';if ($mode != "ajout") {
    echo 'value= "' .$recette->getNbPortion() . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}
echo'></div>';


echo '<div>
    <label for="cheminImage"> Insérez l\'image : </label>
    <input name="cheminImage" type="file"';if ($mode != "ajout") {
    echo 'value= "' .$recette->getCheminImage() . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}
echo'></div>';


echo'<div class="colonne tabIngredient">
    <h3>Compositions de la recette</h3>
    <div class="enteteLigne row">
        <div class="entete">Quantité</div>
        <div class="entete">Produit</div>
        <div class="entete">Unité de mesure</div>
        <div class="enteteAdd"><img src="./IMG/add.png" alt="Ajouter " class="hidden"></div>

    </div>
    <div class="ligne row" id="ing1">
        <div class="contenu">
            <input type="text">
        </div>
        <div class="contenu">
        <select ';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}echo'>';
    
    for ($i = 1; $i < count($listeProduits);$i++) {
         $sel = "";
         if ($mode != "ajout") {
            if ($listeProduits[$i]->getIdProduit() == $id) {
                $sel = "selected";
            }
        }
        echo '<option value="' . $listeProduits[$i]->getIdProduit() . '" ' . $sel . ' >' . $listeProduits[$i]->getLibelle() . ' </option>';
    }
    
    echo '</select>
        </div>
        <div class="contenu">
        <select ';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}echo'>';
    
        for ($i = 1; $i < count($listeUnitesDeMesure);$i++) {
             $sel = "";
             if ($mode != "ajout") {
                if ($listeUnitesDeMesure[$i]->getIdUniteDeMesure() == $id) {
                    $sel = "selected";
                }
            }
            echo '<option value="' . $listeUnitesDeMesure[$i]->getIdUniteDeMesure() . '" ' . $sel . ' >' . $listeUnitesDeMesure[$i]->getLibelle() . ' </option>';
        }
        
        echo '</select>
            </div>

            <div class="enteteAdd supprLigne">
                <img src="./IMG/suppr_blanc.png" alt="supprimer ">
            </div>

    </div>
    <input class="inputing1" type="hidden"  value="">
    <input class="inputing1" type="hidden" value="">
    <input class="inputing1" type="hidden" value="">
</div>';


echo'<div class="colonne tabEtapes">
        <h3>Les différentes étapes de préparation</h3>
    <div class="enteteLigne row">
        <div class="entete">Ordre</div>
        <div class="entete">Titre</div>
        <div class="entete">description de l\'étape</div>
        <div class="enteteAdd"><img  src="./IMG/add.png" alt="Ajouter " class="hidden"></div>

    </div>
    <div class="ligne row" id="etape1">
        <div class="contenu">
            <input type="text">
        </div>
        <div class="contenu">
        <input type="text">
        </div>
        <div class="contenu">
            <input type="text">

            </div>

            <div class="enteteAdd supprLigne">
                <img src="./IMG/suppr_blanc.png" alt="supprimer ">
            </div>

    </div>
    <input class="inputetape1" type="hidden"  name="ordre1" value="">
    <input class="inputetape1" type="hidden" name="titre1" value="">
    <input class="inputetape1" type="hidden" name="description1" value="">
</div>';




// en fonction du mode, on affiche les boutons utiles
switch ($mode) {
    case "ajout":
        {
            echo '<div class="row spacearnd" id="ajouterRecette"><button type="submit" class="boutonForm">Ajouter</button>';
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
echo '<a href="index.php?page=Reservations"><button type="button" class="boutonForm">Annuler</button></a>
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