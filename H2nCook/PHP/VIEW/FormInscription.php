<?php
echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';

echo '<form action="index.php?page=ActionConnexion&mode=Inscription" method="POST" class="colonne">';
echo '<div class="row">
    <div></div>
    <div>
    <label for="genre"> Genre : </label>
    <select name="genre"';if ($mode == "edit" || $mode == "suppr") {echo "disabled";}echo'>
    <option value="H">Homme</option>
    <option value="F">Femme</option>
    </select>
    </div>
    <div></div>
</div>';

echo '<div>
    <label for="nom"> Nom : </label>
    <input name="nom" type="text">
    </div>';

echo '<div>
    <label for="prenom"> Prenom : </label>
    <input name="prenom" type="text">
    </div>';

echo '<div>
    <label for="DDN"> Date de naissance : </label>
    <input name="DDN" type="date">
</div>';

echo '<div>
    <label for="adresseMail"> Adresse mail : </label>
    <input name="adresseMail" type="text">
    </div>';

echo '<div>
    <label for="NumTel"> Numéro de téléphone : </label>
    <input name="NumTel" type="text"></div>';

echo '<div>
    <label for="adressePostale"> Adresse postale : </label>
    <input name="adressePostale" type="text">
    </div>';

echo '<div>
    <label for="ville"> Ville : </label>
    <input name="ville" type="text">
    </div>';

echo '<div>
    <label for="codePostal"> Code Postal : </label>
    <input name="codePostal" type="text">
    </div>';

    echo '<div>
    <label for="identifiant"> Pseudo : </label>
    <input name="identifiant" type="text">
    </div>';

    echo '<div>
    <label for="motDePasse"> Mot de passe : </label>
    <input name="motDePasse" type="password">
    <input name="idRole" type="hidden" value="2">
    </div>';
    
    echo '<div class="row spacearnd"><button type="submit" class="boutonForm">S\'inscrire</button></div>';

echo '</form>
<div></div>
</div>';

echo '</div>
<div></div>
</div>';
?>
