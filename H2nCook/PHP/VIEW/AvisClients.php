<?php

if (isset($_SESSION["utilisateur"]))
{


echo'
<input id="idUser" type="hidden" value="'.$_SESSION["utilisateur"]->getIdUser().'">
<input id="idRole" type="hidden" value="'.$_SESSION["utilisateur"]->getIdRole().'">
<div>
<div></div>
<div class="main">
<div class="colonne">
</div>';





echo'</div>
<div></div>
</div>';
} else {
    header("location:index.php?page=default");
}