<nav class="center">
    <a href="presentation.html">
      <div class="center boutons colonne">Présentation
        <hr>
      </div>
    </a>
    <a href="index.php?page=ListePlats">
      <div class="center boutons colonne">Les plats proposés
        <hr>
      </div>
    </a>
    <?php if(isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]->getIdRole() ==1)
    {
    echo'<a href="index.php?page=Reservations">
      <div class="center boutons colonne">Prendre rendez-vous
        <hr>
      </div>
    </a>';
    }?>
    <a href="index.php?page=AvisClients">
      <div class="center boutons colonne">Donnez votre avis !
        <hr>
      </div>
    </a>
    <?php if(isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]->getIdRole() ==1)
    {
    echo'<a href="index.php?page=ListeAdmin">
      <div class="center boutons colonne">Les listes
        <hr>
      </div>
    </a>';
    }?>

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