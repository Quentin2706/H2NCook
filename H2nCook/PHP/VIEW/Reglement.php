<?php
if (isset($_SESSION['utilisateur'])) {
echo '

<div>
<div></div>
<div class="main">';


    $commande = CommandesManager::findById($_GET["id"]);
    $modePaiements = modesdepaiementManager::getList();
    $client = clientsManager::findById($commande->getIdUser());
    $total = $_GET["total"];


    if (is_file_exists("./COMMANDES/ACCOMPTE_".$commande.".pdf"))
    {
        $total*=0.6;
    }
    var_dump($total);


echo '</div>
<div></div>
</div>';
} else {
    header("location:index.php?page=default");
}