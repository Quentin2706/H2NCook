<?php 
$date = "";
$mois = "";
$jour = "";
$dateFinale = "";
if(isset($_SESSION["utilisateur"]) && ($_SESSION["utilisateur"]->getIdRole() == 1))
{
$table = $_GET['table'];

$objets = appelGetList($table);

echo'<div>
<div></div>
<div class="main">';

if (empty($objets)) {
     echo 'La table est vide';
 } else {
     echo '
 <div class="tableau colonne">
 <div class="enteteLigne">';
    // le foreach affiche les noms des colonnes du tableau
    $listeLabel = $objets[0]->getListeLabel();
    $nbColonne = $table::getNbColonne();
    for ($i = 2; $i < $nbColonne; $i++) {
        if($listeLabel[$i] == "Produit/Recette" && $listeLabel[$i+1] == "Produit/Recette")
        {
            $i++;
        }
        if ($listeLabel[$i] != "password") {
            echo '<div class="entete ">' . $listeLabel[$i] . '</div>';
        }
    }
    echo '<a href="index.php?page=Form&table=' . $table . '&mode=ajout" class="enteteAdd"><div><img src="./IMG/add.png" alt="Ajouter "></div></a>';
    echo'
    </div>'; 
    
    $infos = $table::getListeAttributs();

                // On parcourt tout les objets pour afficher les differentes informations
                foreach ($objets as $unObjet) {
                        $id= appelGet($unObjet, $infos[1]);
                    echo '<div class="ligne '.$id.'">';
                    //on vérifie si on doit faire appel à l'objet lié pour afficher le libelle au lieu de la clé secondaire
                    $listeTypeInput = $objets[0]->getListeTypeInput();
                    $listeClasse = $objets[0]->getListeClass();
                    $id = appelGet($unObjet, $infos[1]);
                    // Affichage des information une par une de l'objet
                    for ($i = 2; $i < $nbColonne; $i++) {
                        if ($listeTypeInput[$i] != "password") {
                            if ($listeTypeInput[$i] == "select") {
                                $classe = $listeClasse[$i];
                                if (appelGet($unObjet, $infos[$i]) != null)
                                {
                                    $obj = appelFindById($classe, appelGet($unObjet, $infos[$i]));
                                    echo '<div class="contenu">' . $obj->getLibelle() . '</div>';
                                }
                            } else {
                                if ($table != "Agendas")
                                {
                                    if ($listeTypeInput[$i] == "date")
                                    {
                                        $date = substr(appelGet($unObjet, $infos[$i]),0,10);
                                        $annee =  substr($date,0,4);
                                        $mois =  substr($date,5,2);
                                        $jour = substr($date,8,2);
                                        $dateFinale = $jour.'/'.$mois.'/'.$annee;
                                        echo '<div class="contenu">' . $dateFinale . '</div>';
                                    } else {
                                        echo '<div class="contenu">' . appelGet($unObjet, $infos[$i]) . '</div>';
                                    }
                        
                                } else {
                                    echo '<div class="contenu">' . appelGet($unObjet, $infos[$i]) . '</div>';
                                }
                            }
                        }
                    }
                    echo'<div class="contenuIMG">';
                    if ($table == "Recettes")
                    { echo'
                    <a class="modif" href="index.php?page=FormRecette&mode=modif&id=' . $id . '"><div><img src="./IMG/modif.png" alt="modifier"></div></a>
                    <a class="suppr" href="index.php?page=ActionRecette&mode=suppr&id=' . $id . '"><div><img src="./IMG/suppr.png" alt="supprimer"></div></a>';
                    } else if ($table == "Commandes"){
                        echo'<a class="modif" href="index.php?page=FormCommande&mode=modif&id=' . $id . '"><div><img src="./IMG/modif.png" alt="modifier"></div></a>
                        <a class="suppr" href="index.php?page=FormCommande&mode=suppr&id=' . $id . '"><div><img src="./IMG/suppr.png" alt="supprimer"></div></a>';
                    }else {
                        echo'<a class="modif" href="index.php?page=Form&table=' . $table . '&mode=modif&id=' . $id . '"><div><img src="./IMG/modif.png" alt="modifier"></div></a>
                        <a class="suppr" href="index.php?page=Form&table=' . $table . '&mode=suppr&id=' . $id . '"><div><img src="./IMG/suppr.png" alt="supprimer"></div></a>';
                    }
                echo'</div>';
                    echo'</div>';
                }
 }

echo'
</div>
</div>
<div></div>
</div>
</div>';
} else {
    header("location:index.php?page=default");
}