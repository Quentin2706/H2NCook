<?php
if (isset($_SESSION["utilisateur"]) && ($_SESSION["utilisateur"]->getIdRole() == 1)) {

    $mode = $_GET["mode"];

    if ($mode != "ajout") {
        $id = $_GET['id'];
        // En fonction de la surchage on fait l'action appropriée
        $client = ClientsManager::findById($id);
        $user = UsersManager::findById($id);
    }

    echo '<div>
<div></div>
<div class="main">
<div class="colonne">';
    if ($mode == "ajout") {
        echo 'Suite a cet enregistrement de client un identifiant et un mot de passe lui seront crée<br>
L\'identifiant sera le nom.prenom<br>
Le mot de passe sera Nomprenom6458';
    }
    echo '</div>
<div>
<div></div>';

    switch ($mode) {
        case "ajout":
            {
                echo '<form action="index.php?page=ActionClient&mode=ajout" method="POST" class="colonne">';
                break;
            }
        case "detail":
            {
                echo '<form method="POST" class="colonne">';
                break;
            }
        case "modif":
            {
                echo '<form action="index.php?page=ActionClient&mode=modif&id=' . $id . '" method="POST" class="colonne">';
                break;
            }
        case "suppr":
            {
                echo '<form action="index.php?page=ActionClient&mode=suppr&id=' . $id . '" method="POST" class="colonne">';
                break;
            }

    }

    if ($mode != "ajout") {
        echo '<input name= "idUser" value="' . $client->getIdUser() . '"type= "hidden">';
    }

    echo '<div class="row">
    <div></div>
    <div>
    <label for="genre"> Genre : </label>
    <select name="genre"';if ($mode == "detail" || $mode == "suppr") {echo "disabled";}
    echo '>';
    if ($mode != "ajout" && $client->getGenre() == "H") {
        echo '<option value="H" selected>Homme</option>';
        echo '<option value="F">Femme</option>';
    } else if ($mode != "ajout" && $client->getGenre() == "F") {
        echo '<option value="H">Homme</option>';
        echo '<option value="F" selected>Femme</option>';
    } else {
        echo '<option value="H">Homme</option>';
        echo '<option value="F">Femme</option>';
    }
    echo '</select>
    </div>
    <div></div>
</div>';

    echo '<div>
    <label for="nom"> Nom : </label>
    <input name="nom" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getNom() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="prenom"> Prenom : </label>
    <input name="prenom" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getPrenom() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="DDN"> Date de naissance : </label>
    <input name="DDN" type="date"';if ($mode != "ajout") {
        echo 'value= "' . substr($client->getDDN(), 0, 10) . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="adresseMail"> Adresse mail : </label>
    <input name="adresseMail" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $user->getAdresseMail() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="NumTel"> Numéro de téléphone : </label>
    <input name="NumTel" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getNumTel() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="adressePostale"> Adresse postale : </label>
    <input name="adressePostale" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getAdressePostale() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="ville"> Ville : </label>
    <input name="ville" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getVille() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

    echo '<div>
    <label for="codePostal"> Code Postal : </label>
    <input name="codePostal" type="text"';if ($mode != "ajout") {
        echo 'value= "' . $client->getCodePostal() . '"';
    }
    if ($mode == "detail" || $mode == "suppr") {
        echo '" disabled';
    }
    echo '></div>';

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
    echo '<a href="index.php?page=Liste&table=Clients"><button type="button" class="boutonForm">Annuler</button></a>
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
