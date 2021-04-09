<?php
if(isset($_SESSION["utilisateur"]))
{
$mode = $_GET["mode"];

if ($mode != "ajout") {
    $id = $_GET['id'];
    // En fonction de la surchage on fait l'action appropriée
    $agenda = AgendasManager::findById($id);
    $commande = CommandesManager::findUserByAgendaInCommandes($id);
    $idUser = $commande->getIdUser();
} else {
    $date = $_GET["date"];
}

echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';

switch ($mode) {
    case "ajout":
        {
            echo '<form action="index.php?page=ActionAgenda&mode=ajout" method="POST" class="colonne">';
            break;
        }
    case "detail":
        {
            echo '<form method="POST" class="colonne">';
            break;
        }
    case "modif":
        {
            echo '<form action="index.php?page=ActionAgenda&mode=modif&id='.$id.'" method="POST" class="colonne">';
            break;
        }
    case "suppr":
        {
            echo '<form action="index.php?page=ActionAgenda&mode=suppr&id='.$id.'" method="POST" class="colonne">';
            break;
        }

}

if ($mode != "ajout") {
    echo '<input name= "idAgenda" value="' . $agenda->getIdAgenda() . '"type= "hidden">';
}
$listeUser = ClientsManager::getList();

echo '<div class="row">

<div>
    <label for="idUser"> Client concerné : </label>
    <select name="idUser"';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}echo'>';

for ($i = 1; $i < count($listeUser);$i++) {
    $sel = "";
    if ($mode != "ajout") {
        if ($listeUser[$i]->getIdUser() == $idUser) {
            $sel = "selected";
        }
    }
    echo '<option value="' . $listeUser[$i]->getIdUser() . '" ' . $sel . ' >' . $listeUser[$i]->getNom() . " " . $listeUser[$i]->getPrenom() . ' </option>';
}

echo '</select>
</div>
<div></div>
    <a href="index.php?page=FormClient&mode=ajout&trace=R"><button id="ajoutClient" type="button" class="boutonForm centrer">Ajouter un client</button></a>
</div>';

echo '<div>
    <label for="dateEvent"> Date de l\'évènement prévu (date du séminaire par exemple) : </label>
    <input name="dateEvent" type="date"';if ($mode == "ajout") {
    echo 'value= "' . $date . '"';
}
if ($mode != "ajout") {
    echo 'value= "' . substr($agenda->getdateEvent(), 0, -9) . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}

echo '>
    </div>';

echo '<div>
    <label for="horaireDebut"> Heure du début du rendez-vous : </label>
    <input name="horaireDebut" type="time"';if ($mode != "ajout") {
    echo 'value= "' . substr($agenda->getHoraireDebut(), 11,5) . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}

echo '>
    </div>';

echo '<div>
    <label for="horaireFin"> Fin prévue du rendez-vous : </label>
    <input name="horaireFin" type="time"';if ($mode != "ajout") {
    echo 'value= "' . substr($agenda->getHoraireFin(), 11,5) . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}

echo '>
    </div>';

echo '<div>
    <label for="motif"> Motif du rendez-vous : </label>
    <input name="motif" type="text"';if ($mode != "ajout") {
    echo 'value= "' . $agenda->getMotif() . '"';
}
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}

echo '>
    </div>';

echo '<div>
    <label for="infoComp"> Informations complémentaires : </label>
    <textarea name="infoComp" type="richtext"';
if ($mode == "edit" || $mode == "suppr") {
    echo '" disabled';
}

echo '>';if ($mode != "ajout") {
    echo $agenda->getInfoComp();
}echo'</textarea>
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