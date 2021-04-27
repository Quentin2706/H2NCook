
<div class="footer">
        <div></div>
        <div class="colonne center">
            <p>H2nCook</p>
            <p><a href="tel:+33646709096">06.46.70.90.96</a></p>
            <p><a href="mailto:h2ncook@gmail.com">Nous contacter</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p><a href="#">Les avis clients</a></p>
            <p><a href="#">Mentions légales</a></p>
            <p><a href="#">Politique de confidentialité</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p><a href="#">L'entreprise</a></p>
            <p><a href="#">Les plats proposés</a></p>
            <p><a href="#">Réservez dés maintenant</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p>Crée par</p>
            <p><a href="mailto:quentin.balair2706@gmail.com">Quentin BALAIR</a></p>
            <p>Stagiaire Developpeur Web</p>
        </div>
        <div></div>
    </div>
    <footer>
        <div></div>
        <div class="colonne center">
            <p>H2nCook</p>
            <p><a href="tel:+33646709096">06.46.70.90.96</a></p>
            <p><a href="mailto:h2ncook@gmail.com">Nous contacter</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p><a href="#">Les avis clients</a></p>
            <p><a href="#">Mentions légales</a></p>
            <p><a href="#">Politique de confidentialité</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p><a href="#">L'entreprise</a></p>
            <p><a href="#">Les plats proposés</a></p>
            <p><a href="#">Réservez dés maintenant</a></p>
        </div>
        <div></div>
        <div class="colonne center">
            <p>Crée par</p>
            <p><a href="mailto:quentin.balair2706@gmail.com">Quentin BALAIR</a></p>
            <p>Stagiaire Developpeur Web</p>
        </div>
        <div></div>
    </footer>
    <?php
if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case 'Reservations':
            echo '<script type="text/javascript" src="./JS/Calendrier.js"></script>';
            break;

        case 'FormRecette':
            echo '<script type="text/javascript" src="./JS/FormRecette.js"></script>';
            break;
        case 'AvisClients':
            echo '<script type="text/javascript" src="./JS/AvisClients.js"></script>';
            break;

        case 'FormCommande':
            echo '<script type="text/javascript" src="./JS/FormCommande.js"></script>';
            break;
        default:

            break;
    }
}?>
</body>

</html>