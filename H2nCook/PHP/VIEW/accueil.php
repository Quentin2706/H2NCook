<?php
echo '<div>
<div></div>
<div class="main">
';
if(isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]->getIdRole() == 1)
{

} else {
    echo'user';
}
echo'
</div>
<div></div>
</div>';