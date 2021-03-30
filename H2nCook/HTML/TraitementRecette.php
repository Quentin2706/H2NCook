<?php
var_dump($_FILES["test"]);

$tmp_name = $_FILES["test"]["tmp_name"];
        // basename() peut empêcher les attaques "filesystem traversal";
        // une autre validation/nettoyage du nom de fichier peux être appropriée
        move_uploaded_file($tmp_name, "IMAGES/".$_FILES["test"]["name"]);