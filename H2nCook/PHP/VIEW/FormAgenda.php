<?php

$mode = $_GET["mode"];
$date = $_GET["date"];


if ($mode != "ajout") {
    $id = $_GET['id'];
    // En fonction de la surchage on fait l'action appropriée
    $agenda = AgendasManager::findById($id);
}

echo'<div>
<div></div>
<div class="main">
<div>
<div></div>';

switch ($mode){
    case "ajout" :
        {
            echo '<form action="index.php?page=ActionAgenda&mode=ajout" method="POST" class="colonne">';
            break;
        }
    case "detail" :
        {
            echo '<form method="POST" class="colonne">';
            break;
        }
    case "modif" :
        {
            echo '<form action="index.php?page=ActionAgenda&mode=modif" method="POST" class="colonne">';
        break;
        }
    case "suppr" :
        {
            echo '<form action="index.php?page=ActionAgenda&mode=suppr" method="POST" class="colonne">';
        break;
        }
    
    }

    if($mode != "ajout") echo  '<input name= "idAgenda" value="'.$agenda->getIdAgenda().'"type= "hidden">';

    echo '<div>
    <label for="dateEvent"> Date de l\'évènement prévu (date du séminaire par exemple) : </label>
    <input name="dateEvent" type="date"';if($mode == "ajout") echo 'value= "'.$date.'"'; if($mode != "ajout") echo 'value= "'.substr($choix->getdateEvent(),0,-9).'"';if($mode=="edit" || $mode=="delete") echo '" disabled'; echo'>
    </div>';

    echo '<div>
    <label for="horaireDebut"> Heure du début du rendez-vous : </label>
    <input name="horaireDebut" type="time"';if($mode != "ajout") echo 'value= "'.substr($choix->getHoraireDebut(),9).'"';if($mode=="edit" || $mode=="delete") echo '" disabled'; echo'>
    </div>';

    echo '<div>
    <label for="horaireFin"> Fin prévue du rendez-vous : </label>
    <input name="horaireFin" type="time"';if($mode != "ajout") echo 'value= "'.substr($choix->getHoraireFin(),9).'"';if($mode=="edit" || $mode=="delete") echo '" disabled'; echo'>
    </div>';

    echo '<div>
    <label for="motif"> Motif du rendez-vous : </label>
    <input name="motif" type="text"';if($mode != "ajout") echo 'value= "'.$choix->getMotif().'"';if($mode=="edit" || $mode=="delete") echo '" disabled'; echo'>
    </div>';

    echo '<div>
    <label for="infoComp"> Informations complémentaires : </label>
    <textarea name="infoComp" type="richtext"';if($mode != "ajout") echo 'value= "'.$choix->getInfoComp().'"';if($mode=="edit" || $mode=="delete") echo '" disabled'; echo'></textarea>
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
		case "delete":
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
    echo'<button class="boutonForm"><a href="index.php?page=Reservations">Annuler</a></button>
</div>';



echo '</form>
<div></div>
</div>';

echo'</div>
<div></div>
</div>';
