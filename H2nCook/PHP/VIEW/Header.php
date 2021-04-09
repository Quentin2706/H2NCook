<header id="#header">
        <a href="index.php">
            <div>
                <img src="./IMG/logo.png">
            </div>
        </a>
        <div class="titre center colonne">
        <div><?php echo $titre ?></div>
        <?php if(isset($_SESSION["utilisateur"]))
        {
            echo'<div>Bonjour '.$_SESSION["utilisateur"]->getIdentifiant().' !';
        }?>
        </div>
        </div>
        <div></div>
    </header>

<body>