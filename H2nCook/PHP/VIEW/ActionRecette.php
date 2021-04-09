<?php
var_dump($_POST);
var_dump($_FILES["cheminImage"]);
$tmp_name = $_FILES["cheminImage"]["tmp_name"];
        // basename() peut empêcher les attaques "filesystem traversal";
        // une autre validation/nettoyage du nom de fichier peux être appropriée
        move_uploaded_file($tmp_name, "./IMG/RECETTES/".$_FILES["cheminImage"]["name"]);

        $cheminImage = "./IMG/RECETTES/".$_FILES["cheminImage"]["name"];
        $tab["cheminImage"] = $cheminImage;
14