<?php 

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
                    echo '<div class="ligne">';
                    //on vérifie si on doit faire appel à l'objet lié pour afficher le libelle au lieu de la clé secondaire
                    $listeTypeInput = $objets[0]->getListeTypeInput();
                    $listeClasse = $objets[0]->getListeClass();
                    $id = appelGet($unObjet, "id".substr($table,0,strlen($table)-1));
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
                                echo '<div class="contenu">' . appelGet($unObjet, $infos[$i]) . '</div>';
                            }
                        }
                    }
                    echo'<div class="contenuIMG">
                    <a class="modif" href="index.php?page=Form&table=' . $table . '&mode=modif&id=' . $id . '"><div><img src="./IMG/modif.png" alt="modifier"></div></a>
                    <a class="suppr" href="index.php?page=Form&table=' . $table . '&mode=delete&id=' . $id . '"><div><img src="./IMG/suppr.png" alt="supprimer"></div></a>
                </div>';
                    echo'</div>';
                }
 }

echo'
</div>
</div>
<div></div>
</div>
</div>';