INSERT INTO `roles`(`idRole`, `libelle`) VALUES (null,'Gerant');
INSERT INTO `roles`(`idRole`, `libelle`) VALUES (null,'Client');

INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"admin","admin","admin@gmail.com",1);
INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"dupont.toto","dupont.toto","dupont.toto@gmail.com",2);
INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"beauchamp.tutu","beauchamp.tutu","beauchamp.tutu@gmail.com",2);

INSERT INTO `clients`(`idUser`, `genre`, `nom`, `prenom`, `DDN`, `adressePostale`, `codePostal`, `ville`) VALUES (2,"H","dupont","toto","1987-03-25 09:34:35","11 bis rue du longchamp","65421","QuelquePart");
INSERT INTO `clients`(`idUser`, `genre`, `nom`, `prenom`, `DDN`, `adressePostale`, `codePostal`, `ville`) VALUES (3,"F","beauchamp","tutu","1975-09-14 09:34:35","24 rue de l'église","71950","auboutdumonde");


INSERT INTO `agendas` (`idAgenda`, `dateEvent`, `HoraireDebut`, `HoraireFin`, `Motif`, `infoComp`) VALUES (NULL, '2021-03-25 09:34:35', '2021-03-24 14:00:00', '2021-03-24 15:00:00', 'Prestation à domicile', "Je n'ai pas de cuisine équipée veuillez venir avec votre matériel svp.");
INSERT INTO `agendas` (`idAgenda`, `dateEvent`, `HoraireDebut`, `HoraireFin`, `Motif`, `infoComp`) VALUES (NULL, '2021-05-22 09:34:35', '2021-05-22 08:00:00', '2021-05-23 02:00:00', 'prestation pour un mariage', "Vous n'avez surement pas besoin de matériel puisque la salle des fêtes est équipée de 4 bruleurs, un frigo etc .. ");

INSERT INTO `fournisseurs`(`idFournisseur`, `libelle`, `numTel`, `adressePostale`,`adresseMail`, `ville`, `codePostal`) VALUES (null,"fourni1","0645257468", "17 rue de la cloche", "fourni1@fourni1.com", "Saint-Maurice-Pellevoisin", "54620");
INSERT INTO `fournisseurs`(`idFournisseur`, `libelle`, `numTel`, `adressePostale`,`adresseMail`, `ville`, `codePostal`) VALUES (null,"fourni2","0615457698", "84 rue nationale", "fourni2@fourni2.com", "Armentières", "20150");

INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"fruit");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"poisson");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"légume");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"viande rouge");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"viande blanche");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"épices");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"assaisonnement");
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"produit laitier");

INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"G");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"CG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"DG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"KG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"L");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"CL");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"DL");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"KL");



INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"muscade","1236451","100",1,3,1,6,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"sel","1236461","100",1,2,1,6,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"poivre","769542","100",1,2,1,6,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"potiron","7496213","1",1,2.50,1,3,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"carotte","564210","1",1,1.50,1,3,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"pomme de terre","164529","1",1,5,1,3,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"ail","548625","10",1,3,1,7,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"oignon","9756241","1",1,2.30,1,3,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"lait","76120","1",3,0.5,1,8,1,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"huile d'olive","856421","1",1,1.5,1,7,1,null,null);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`, `dateCreation`, `dateModification`) VALUES (null,"Persil","856421","100",1,0.5,1,7,1,null,null);


INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"hiver");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"été");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"automne");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"printemps");

INSERT INTO `recettes`(`idRecette`, `libelle`, `nbPortion`, `cheminImage`, `descriptionClient`, `idCategorieRecette`) VALUES (null,"Velouté de Potiron et Carottes",1,"./IMAGES/RECETTES/veloutecarotte.jpg","Une recette qui va ravir vos papilles !<br> Un velouté constitué de carotte de pomme de terre etc .. Vous allez aimé nous en sommes sur !",1);

INSERT INTO `plats`(`idPlat`, `libelle`, `idRecette`) VALUES (null,"Soupe aux potirons",1);

INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,1,1,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,1,2,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,1,3,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,250,4,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,125,5,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,0.1,6,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,0.25,7,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,0.125,8,1);
INSERT INTO `compositions`(`idComposition`, `quantite`, `uniteDeMesure`, `idProduit`, `idRecette`) VALUES (null,1,250,1,1);

INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,0);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,5);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,7);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,20);

INSERT INTO `commandes`(`idCommande`, `numero`, `idUser`, `idRemise`, `idAgenda`) VALUES (null,"02151357",2,1,1);
INSERT INTO `commandes`(`idCommande`, `numero`, `idUser`, `idRemise`, `idAgenda`) VALUES (null,"02659892",3,2,2);

INSERT INTO `lignescommande`(`idLigneCommande`, `quantite`, `prixVenteHT`, `idProduit`, `idPlat`, `idCommande`) VALUES (null,1,20,null,1,1);
INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "CB");
INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "Cheque");
INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "Espece");

INSERT INTO `paiements`(`idPaiement`, `montant`, `numCheque`, `idModeDePaiement`) VALUES (null,100,null,1);

INSERT INTO `devis`(`idDevis`, `cheminDevis`, `idCommande`) VALUES (null,"./DOCS/DEVIS/Devis1523652.pdf",1);
INSERT INTO `factures`(`idFacture`, `idPaiement`, `idCommande`) VALUES (null,1,1);

INSERT INTO `reglements`(`idReglement`, `idPaiement`, `idFacture`) VALUES (null,1,1);

INSERT INTO `temoignages`(`idTemoignage`, `titre`, `note`, `appreciation`, `datePublication`, `idUser`) VALUES (null,"Parfait !", 4, "on est bien servi !", "2021-03-25 09:34:35", 2);