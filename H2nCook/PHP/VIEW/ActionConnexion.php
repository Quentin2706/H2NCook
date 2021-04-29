<?php

switch ($_GET['mode']) {
    case "Inscription":
        {
            $u = UsersManager::findByadresseMail($_POST['adresseMail']);
            if ($u == false) {
                $u = new Users($_POST);
                $u->setMotDePasse(crypte($u->getMotDePasse()));
                UsersManager::add($u);
                $userBDD = UsersManager::findLast();
                $client = new Clients($_POST);
                $client->setIdUser($userBDD->getIdUser());
                ClientsManager::add($client);
                header("location:index.php?page=FormConnexion");
            } else {
                echo "Cette adresse e-mail a déja été utilisée";
                header("refresh:3;url=index.php?page=FormConnexion");
            }
            break;
        }

    case "Connexion":
        {
            $u = UsersManager::findByPseudo($_POST['identifiant']);
            if ($u != false) {
                if (crypte($_POST['motDePasse']) == $u->getMotDePasse()) {
                    echo "connexion réussie.";
                    header("location:index.php?page=default");
                    $_SESSION['utilisateur'] = $u;
                } else {
                    echo 'le mot de passe est incorrect';
                    header("refresh:3;url=index.php?page=FormConnexion");
                }
                break;
            } else {
                echo "le pseudo n'existe pas";
                header("refresh:3;url=index.php?page=FormConnexion");
            }
        }
    case "Deconnexion":
        {
            session_destroy();
            header("location:index.php?page=FormConnexion");
        }
}
