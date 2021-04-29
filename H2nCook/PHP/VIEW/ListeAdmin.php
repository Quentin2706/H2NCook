<?php

if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]->getIdRole() == 1) {

    echo '<div>
    <div></div>
    <div class="main">';

    echo '<div>
    <div></div>
    <div class="colonne fois2">';
    
    echo '
    <div>
    <a href="index.php?page=Liste&table=Users" class="menuAdmin"><div class="centrer">Liste utilisateurs</div></a>
    <a href="index.php?page=Liste&table=Clients" class="menuAdmin"><div class="centrer">Liste Clients</div></a>
    </div>
    <div >
    <a href="index.php?page=Liste&table=Fournisseurs"  class="menuAdmin"><div class="centrer">Liste Fournisseurs</div></a>
    <a href="" class="menuAdmin"><div class="centrer">Liste Produits</div></a>
    </div>
    <div >
    <a href="" class="menuAdmin"><div class="centrer">Liste Recettes</div></a>
    <a href="" class="menuAdmin"><div class="centrer">Liste Commandes</div></a>
    </div>
    <div >
    <a href="" class="menuAdmin"><div class="centrer">Liste Devis</div></a>
    <a href="" class="menuAdmin"><div class="centrer">Liste Factures</div></a>
    </div>
    <div >
    <a href="" class="menuAdmin"><div class="centrer">Liste Remises</div></a>
    <a href="" class="menuAdmin"><div class="centrer">Liste Paiements</div></a>
    </div>
    <div >
    <a href="" class="menuAdmin"><div class="centrer">Liste Modes de paiement</div></a>
    <a href="" class="menuAdmin"><div class="centrer">Liste unités de mesure</div></a>
    </div>
    <a href="" class="menuAdmin"><div class="centrer">Liste Paiements</div></a>';

    echo '
    </div>
    <div></div>
    </div>';

    echo '</div>
<div></div>
</div>';

} else {
    header("location:index.php?page=default");
}
