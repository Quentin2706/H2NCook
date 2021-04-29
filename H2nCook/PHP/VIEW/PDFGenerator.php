<?php
require "./FPDF/fpdf.php";
if (isset($_GET["idRecette"])) {
    creerPDFRecette($_GET["idRecette"]);
} else if (isset($_GET['devis'])) {
    creerPDFDevis($_GET["devis"],$_GET["id"]);
}
