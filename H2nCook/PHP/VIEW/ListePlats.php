<?php
echo '

<div>
<div></div>
<div class="main">';

$recettes = Recettesmanager::getListByCategorieRecette();
$cptCateg = 0;
$cpt = 0;
echo '<div class="colonne">';
echo'<h2>Catégorie ~ '.$recettes[$cptCateg]->getCategorieRecette()->getLibelle().'</h2><div>';
for ($i = 0; $i < count($recettes); $i++) {
    if ($cpt == 4)
    { 
        echo '</div><div>';
        $cpt=0;
    }
    if ($recettes[$i]->getCategorieRecette()->getLibelle() != $recettes[$cptCateg]->getCategorieRecette()->getLibelle()) {
        echo '</div></div><div class="colonne">';
        $cptCateg = $i;
        echo'<h2>Catégorie ~ '.$recettes[$cptCateg]->getCategorieRecette()->getLibelle().'</h2><div>';
    }
    echo '<div class="colonne carte">
    <div><img src="' . $recettes[$i]->getCheminImage() . '" alt="' . $recettes[$i]->getLibelle() . '"></div>
    <p class="titreCartes">' . $recettes[$i]->getLibelle() . ' - ' . $recettes[$i]->getCategorieRecette()->getLibelle() . '</p>
    </div>';
        if ($i == count($recettes)-1)
        {
            echo'</div>';
        }
    $cpt++;
 }


echo '</div></div>
<div></div>
</div>';
