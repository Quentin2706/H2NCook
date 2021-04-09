<?php
if(isset($_SESSION["utilisateur"]))
{

$date = new DateTime('now');
$annee = $date->format('Y');

echo'<div>
<div></div>
<div class="main">';

echo'<div>
<select name="annee" class="selectAnnee">';
for ($i = $annee; $i < $annee+11; $i++)
{
    echo'<option value="'.$i.'">'.$i.'</option>';
}

echo'</select>
<div class="titre"></div>
</div>';



echo'
<div class="ligne">';
echo'<div class="entete mois" nb="0">Jan</div>';
echo'<div class="entete mois" nb="1">Fev</div>';
echo'<div class="entete mois" nb="2">Mars</div>';
echo'<div class="entete mois" nb="3">Avril</div>';
echo'<div class="entete mois" nb="4">Mai</div>';
echo'<div class="entete mois" nb="5">Juin</div>';
echo'<div class="entete mois" nb="6">Juil</div>';
echo'<div class="entete mois" nb="7">Août</div>';
echo'<div class="entete mois" nb="8">Sep</div>';
echo'<div class="entete mois" nb="9">Oct</div>';
echo'<div class="entete mois" nb="10">Nov</div>';
echo'<div class="entete mois" nb="11">Dec</div>';
echo'</div>';

echo '<div class="ligne">
<div class="jours">Lundi</div>
<div class="jours">Mardi</div>
<div class="jours">Mercredi</div>
<div class="jours">Jeudi</div>
<div class="jours">Vendredi</div>
<div class="jours">Samedi</div>
<div class="jours">Dimanche</div>
</div>';

echo'<div class="calendrier colonne">
<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>';

echo'<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>';

echo'<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>';

echo'<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>';

echo'<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>';

echo'<div class="ligne">
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
<div class="case"></div>
</div>
</div>



<div class="informations colonne">
</div>
';

echo '</div>
<div></div>
</div>

';
} else {
    echo ' Vous devez vous connecter avant d\'accèder a cette inferface !';
    header("refresh:3;url=index.php?page=FormConnexion");
}