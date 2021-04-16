<?php


$tab = [];

        if (is_uploaded_file($_FILES["cheminImage"]["tmp_name"])) {
            $tmp_name = $_FILES["cheminImage"]["tmp_name"];
            // basename() peut empêcher les attaques "filesystem traversal";
            // une autre validation/nettoyage du nom de fichier peux être appropriée
            move_uploaded_file($tmp_name, "./IMG/RECETTES/" . $_FILES["cheminImage"]["name"]);

            $cheminImage = "./IMG/RECETTES/" . $_FILES["cheminImage"]["name"];

}


switch ($_GET['mode']) {
    case "ajout":
        {
            $recette = new Recettes($_POST);
            $recette->setCheminImage($cheminImage);
            RecettesManager::add($recette);
            $cpt = 2;
            $idRecette = RecettesManager::findLast();

            while ($_POST["quantite" . $cpt] != "" && $_POST["quantite" . $cpt]) {
                $composition = new Compositions();
                $composition->setQuantite($_POST["quantite" . $cpt]);
                $composition->setIdProduit($_POST["idProduit" . $cpt]);
                $composition->setIdUniteDeMesure($_POST["idUniteDeMesure" . $cpt]);
                $composition->setIdRecette($idRecette->getIdRecette());
                CompositionsManager::add($composition);
                $cpt++;
            }
            $cpt = 2;
            while ($_POST["titre" . $cpt] != "" && $_POST["titre" . $cpt] && ["ordre" . $cpt] != "" && $_POST["ordre" . $cpt] && ["description" . $cpt] != "" && $_POST["description" . $cpt]) {
                $etape = new Etapes();
                $etape->setTitre($_POST["titre" . $cpt]);
                $etape->setDescription($_POST["description" . $cpt]);
                EtapesManager::add($etape);
                $idEtape = EtapesManager::findLast();
                $etapeRecette = new EtapesRecette();
                $etapeRecette->setOrdre($_POST["ordre" . $cpt]);
                $etapeRecette->setIdRecette($idRecette->getIdRecette());
                $etapeRecette->setIdEtape($idEtape->getIdEtape());
                EtapesRecetteManager::add($etapeRecette);
                $cpt++;
            }
            header("location:index.php?page=PDFGenerator&idRecette=".$idRecette->getIdRecette());
            break;
        }
    case "modif":
        {
            $recette = RecettesManager::findById($_GET["id"]);
            $image = chargerImage();
            var_dump($image);
            if ($image != false) { /* suppression de l'ancienne image*/
                unlink($ancienneImage->getCheminImage());
                $recette->setCheminImage(chargerImage());
            }

            RecettesManager::update($recette);
            // $idRecette = $recette->getIdRecette();
            // RecettesManager::update($recette);
            // $cpt=2;
            // CompositionsManager::deleteByRecette($idRecette);
            // while($_POST["quantite".$cpt] != "" && $_POST["quantite".$cpt])
            // {
            //     $composition = new Compositions();
            //     $composition->setQuantite($_POST["quantite".$cpt]);
            //     $composition->setIdProduit($_POST["idProduit".$cpt]);
            //     $composition->setIdUniteDeMesure($_POST["idUniteDeMesure".$cpt]);
            //     $composition->setIdRecette($idRecette);
            //     CompositionsManager::add($composition);
            //     $cpt++;
            // }
            // $cpt=2;
            // /* A VOIR C'EST APS COMME CA Qu'IL FAUT FAIRE, IL FAUT CHERCHE LES EtazpesRECETTES PUR AVOIR LES ID DES ETAPES LIES A LA RECETTE */
            // EtapesManager::deleteByRecette($idRecette);
            // while($_POST["titre".$cpt] != "" && $_POST["titre".$cpt] && ["ordre".$cpt] != "" && $_POST["ordre".$cpt] && ["description".$cpt] != "" && $_POST["description".$cpt])
            // {
            //     $etape = new Etapes();
            //     $etape->setTitre($_POST["titre".$cpt]);
            //     $etape->setDescription($_POST["description".$cpt]);
            //     EtapesManager::update($etape);
            //     $idEtape = EtapesManager::findLast();
            //     $etapeRecette = new EtapesRecette();
            //     $etapeRecette->setOrdre($_POST["ordre".$cpt]);
            //     $etapeRecette->setIdRecette($idRecette);
            //     $etapeRecette->setIdEtape($idEtape->getIdEtape());
            //     EtapesRecetteManager::add($etapeRecette);
            //     $cpt++;
            // }
            break;
        }
    case "suppr":
        {
            $user = UsersManager::findById($_POST["idUser"]);
            $client = ClientsManager::findById($_POST["idUser"]);
            $temoignages = TemoignagesManager::findByClient($_POST["idUser"]);
            $commandes = CommandesManager::findByClient($_POST["idUser"]);
            if (!empty($temoignages)) {
                foreach ($temoignages as $untemoignage) {
                    $untemoignage->setIdUser(1);
                    TemoignagesManager::update($untemoignage);
                }
            }

            if (!empty($commandes)) {
                foreach ($commandes as $uneCommande) {
                    $uneCommande->setIdUser(1);
                    CommandesManager::update($uneCommande);
                }
            }
            ClientsManager::delete($client);
            UsersManager::delete($user);
            break;
        }
}

//header("location:index.php?page=default");
