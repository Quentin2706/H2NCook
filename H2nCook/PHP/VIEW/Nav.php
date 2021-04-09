<nav class="center">
    <a href="presentation.html">
      <div class="center boutons colonne">Présentation
        <hr>
      </div>
    </a>
    <a href="presentation.html">
      <div class="center boutons colonne">Les plats proposés
        <hr>
      </div>
    </a>
    <?php if(isset($_SESSION["utilisateur"]))
    {
    echo'<a href="index.php?page=Reservations">
      <div class="center boutons colonne">Prendre rendez-vous
        <hr>
      </div>
    </a>';
    }?>
    <a href="presentation.html">
      <div class="center boutons colonne">Les actualités
        <hr>
      </div>
    </a>
    <?php if(!isset($_SESSION["utilisateur"]))
    {
    echo'<a href="index.php?page=FormInscription">
      <div class="center boutons colonne">S\'inscrire
        <hr>
      </div>
    </a>
    <a href="index.php?page=FormConnexion">
      <div class="center boutons colonne">Se connecter
        <hr>
      </div>
    </a>
    ';
  }else {
    echo'<a href="index.php?page=ActionConnexion&mode=Deconnexion">
    <div class="center boutons colonne">Se déconnecter
      <hr>
    </div>
  </a>';
  }?>
    
  </nav>