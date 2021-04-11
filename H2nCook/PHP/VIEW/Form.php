<?php
if (isset($_SESSION["utilisateur"])) {

    $table = $_GET["table"];
    $mode = $_GET["mode"];

    if ($mode != "ajout") {
        $id = $_GET['id'];
        // En fonction de la surchage on fait l'action appropriée
        $objet = appelFindById($table, $id);
    }
// Pour l'ajout il faut quand même les listes d'info lié aux objets donc on récupère un objet de la table pour avoir les infos
    else {
        $objet = appelFindById($table, 1); // gestion de l'ajout
    }
    $labels = $table::getListeLabel();
    $infos = $table::getListeAttributs();
    $listeClass = $table::getListeClass();
    $input = $table::getListeTypeInput();
    echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';

    if (isset($_GET['trace'])) { // Si on vient de créé un client ou modifier pendant une vente
            echo '<form action="index.php?page=Action&table=' . $table . '&mode=' . $mode . '&trace="'.$_GET['trace'].' method="POST" class="colonne">';
    } else {
        echo '<form action="index.php?page=Action&table=' . $table . '&mode=' . $mode . '" method="POST" class="colonne">';
    }

    if (isset($_GET['tag'])) { // Si on vient de créé un client ou modifier pendant une vente
        echo '<form action="index.php?page=Action&table=' . $table . '&mode=' . $mode . '&tag=encours" method="POST" class="colonne">';
    } else {
        echo '<form action="index.php?page=Action&table=' . $table . '&mode=' . $mode . '" method="POST" class="colonne">';
    }

    if ($mode != "ajout") {
        echo '<input name="' . $infos[1] . '" type="hidden" id="' . appelGet($objet, $infos[1]) . '" value="' . appelGet($objet, $infos[1]) . '"/>';
    }
// On affiche tout les champs à renseigner
    for ($i = 2; $i < count($labels); $i++) { //on commmence à 2 car l'id est déja traité avant (index 1 des tableaux)
        echo '<div>';
        echo '<label for="' . $infos[$i] . '">' . $labels[$i] . '</label>';

        // Si le label est un select alors on utilise la fonction comboBox
        if ($input[$i] == "select") {
            if ($mode == "ajout") {
                // echo optionComboBox(null,$listeClass[$i],"",$objet,$mode);
                echo optionSelect(null, $listeClass[$i], $infos[$i], $mode);
            } else {
                echo optionSelect(appelGet($objet, $infos[$i]), $listeClass[$i], $infos[$i], $mode);
            }
        } // Input simple
        else {
            echo '<input name="' . $infos[$i] . '" type="' . $input[$i] . '" required';
            if ($mode != "ajout") {
                if ($infos[$i] != "password") {
                    echo ' value= "' . appelGet($objet, $infos[$i]) . '"';
                } else {
                    echo ' value= ""';
                }
            }
            // Insertions des données si on n'est pas dans ajout
            if ($mode == "detail" || $mode == "delete") {
                echo ' disabled';
            }
            // Désactivation des champs pour le mode détail et supprimer
            echo '/>';
        }
        echo '</div>';
    }
    switch ($mode) {
        case "ajout":echo '<div class="row spacearnd"><button class="boutonForm centrer" type="submit" >Ajouter</button>';
            break;
        case "modif":echo '<div class="row spacearnd"><button class="boutonForm centrer" type="submit">Modifier</button>';
            break;
        case "delete":echo '<div class="row spacearnd"><button class="boutonForm centrer" type="submit">Supprimer</button>';
            break;
    }

    echo '<a href="index.php?page=default"><button class="boutonForm centrer" type="submit">Annuler</button></a>
</div>

</form>
<div></div>
</div>';
    echo '</div>
<div></div>
</div>';
} else {
    header("location:index.php?page=default");
}
