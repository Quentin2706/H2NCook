<?php
echo '<div>
<div></div>
<div class="main">
<div>
<div></div>';

echo '<form action="index.php?page=ActionConnexion&mode=Connexion" method="POST" class="colonne">';

echo '<div>
<label for="identifiant">Pseudo : </label>
<input name="identifiant"  placeholder = "Entrez votre identifiant" required >';
echo '</div>';

echo '<div>
<label for="motDePasse">Mot de passe : </label>
<input name="motDePasse" type="password" placeholder ="Entrez votre mdp" required >';
echo '</div>';

echo '<div>
<div></div>
<div><button type="submit" class="boutonForm">Se connecter</button></div>
<div></div>
</div>

</form>
<div></div>
</div>';

echo '</div>
<div></div>
</div>';
?>