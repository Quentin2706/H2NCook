USE h2n;

-- TRUNCATE agendas;
-- TRUNCATE categoriesproduits;
-- TRUNCATE categoriesrecettes;

-- TRUNCATE commandes;
-- TRUNCATE compositions;
-- TRUNCATE conversions;
-- TRUNCATE devis;
-- TRUNCATE etapes;
-- TRUNCATE etapesrecette;
-- TRUNCATE factures;
-- TRUNCATE fournisseurs;
-- TRUNCATE lignesCommande;
-- TRUNCATE modesdepaiement;
-- TRUNCATE paiements;
-- TRUNCATE plats;
-- TRUNCATE produits;
-- TRUNCATE recettes;
-- TRUNCATE reglements;
-- TRUNCATE remises;
-- TRUNCATE roles;
-- TRUNCATE temoignages;
-- TRUNCATE unitesdemesure;

-- TRUNCATE users;
-- TRUNCATE roles;
-- TRUNCATE etapes;
-- TRUNCATE clients;
-- TRUNCATE agendas;
-- TRUNCATE fournisseurs;
-- TRUNCATE categoriesproduits;
-- TRUNCATE unitesdemesure;
-- TRUNCATE conversions;
-- TRUNCATE produits;
-- TRUNCATE categoriesrecettes;
-- TRUNCATE recettes;
-- TRUNCATE etapesrecette
-- TRUNCATE plats;
-- TRUNCATE compositions;
-- TRUNCATE remises;
-- TRUNCATE commandes;
-- TRUNCATE lignescommande;
-- TRUNCATE modesdepaiement;
-- TRUNCATE paiements;
-- TRUNCATE devis;
-- TRUNCATE factures;
-- TRUNCATE reglements;
-- TRUNCATE temoignages;


INSERT INTO `roles`(`idRole`, `libelle`) VALUES (null,'Gerant');
INSERT INTO `roles`(`idRole`, `libelle`) VALUES (null,'Client');

INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"admin","admin","admin@gmail.com",1);
INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"dupont.toto","dupont.toto","dupont.toto@gmail.com",2);
INSERT INTO `users`(`idUser`, `identifiant`, `motDePasse`, `adresseMail`, `idRole`) VALUES (null,"beauchamp.tutu","beauchamp.tutu","beauchamp.tutu@gmail.com",2);

INSERT INTO `clients`(`idUser`, `genre`, `nom`, `prenom`, `DDN`, `adressePostale`, `codePostal`, `ville`) VALUES (2,"H","dupont","toto","1987-03-25 09:34:35","11 bis rue du longchamp","65421","QuelquePart");
INSERT INTO `clients`(`idUser`, `genre`, `nom`, `prenom`, `DDN`, `adressePostale`, `codePostal`, `ville`) VALUES (3,"F","beauchamp","tutu","1975-09-14 09:34:35","24 rue de l'église","71950","auboutdumonde");


INSERT INTO `agendas` (`idAgenda`, `dateEvent`, `horaireDebut`, `horaireFin`, `motif`, `infoComp`) VALUES (NULL, '2021-03-25 09:34:35', '2021-03-24 14:00:00', '2021-03-24 15:00:00', 'Prestation à domicile', "Je n'ai pas de cuisine équipée veuillez venir avec votre matériel svp.");
INSERT INTO `agendas` (`idAgenda`, `dateEvent`, `horaireDebut`, `horaireFin`, `motif`, `infoComp`) VALUES (NULL, '2021-05-22 09:34:35', '2021-05-22 08:00:00', '2021-05-23 02:00:00', 'prestation pour un mariage', "Vous n'avez surement pas besoin de matériel puisque la salle des fêtes est équipée de 4 bruleurs, un frigo etc .. ");

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
INSERT INTO `categoriesproduits`(`idCategorieProduit`, `libelle`) VALUES (null,"Vins");

INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"MG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"G");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"CG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"DG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"KG");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"L");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"ML");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"CL");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"DL");
INSERT INTO `unitesdemesure`(`idUniteDeMesure`, `libelle`) VALUES (null,"KL");

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,1,0.1,3);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,1,0.01,4);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,1,0.001,2);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,1,0.000001,5);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,3,10,1);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,3,0.1,4);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,3,0.01,2);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,3,0.00001,5);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,4,100,1);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,4,10,3);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,4,0.1,2);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,4,0.0001,5);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,2,1000,1);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,2,100,3);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,2,10,4);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,2,0.001,5);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,5,1000000,1);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,5,100000,3);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,5,10000,4);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,5,1000,2);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,7,0.1,8);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,7,0.01,9);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,7,0.001,6);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,7,0.000001,10);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,8,10,7);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,8,0.1,9);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,8,0.01,6);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,8,0.00001,10);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,9,100,7);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,9,10,8);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,9,0.1,6);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,9,0.0001,10);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,6,1000,7);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,6,100,8);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,6,10,9);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,6,0.001,10);

INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,10,1000000,7);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,10,1000000,8);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,10,10000,9);
INSERT INTO `conversions`(`idConversion`, `idUniteChoisie`, `ratio`, `idUniteConvertie`) VALUES (null,10,1000,6);


INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"muscade","1236451",100,1,3,1,6,2);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"sel","1236461",100,1,2,1,6,2);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"poivre","769542",100,1,2,1,6,2);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"potiron","7496213",1,1,2.50,1,3,5);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"carotte","564210",1,1,1.50,1,3,5);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"pomme de terre","164529",1,1,5,1,3,5);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"ail","548625",10,1,3,1,7,5);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"oignon","9756241",1,1,2.30,1,3,5);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"lait","76120",1,3,0.5,1,8,6);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"huile d'olive","856421",1,1,1.5,1,7,6);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"Persil","856421",100,1,0.5,1,7,2);
INSERT INTO `produits`(`idProduit`, `libelle`, `reference`, `poids`, `stock`, `prixAchatHT`, `idFournisseur`, `idCategorieProduit`, `idUniteDeMesure`) VALUES (null,"Vin","645210",1,1,10,1,9,6);


INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"hiver");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"été");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"automne");
INSERT INTO `categoriesrecettes`(`idCategorieRecette`, `libelle`) VALUES (null,"printemps");

INSERT INTO `recettes`(`idRecette`, `libelle`, `nbPortion`, `cheminImage`, `descriptionClient`, `idCategorieRecette`) VALUES (null,"Velouté de Potiron et Carottes",1,"./IMAGES/RECETTES/veloutecarotte.jpg","Une recette qui va ravir vos papilles !<br> Un velouté constitué de carotte de pomme de terre etc .. Vous allez aimé nous en sommes sur !",1);

INSERT INTO `plats`(`idPlat`, `libelle`, `idRecette`) VALUES (null,"Soupe aux potirons",1);

INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,1,1,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,1,2,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,1,3,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,250,4,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,125,5,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,1,6,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,0.25,7,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,0.125,9,1,2);
INSERT INTO `compositions`(`idComposition`, `quantite`, `idProduit`, `idRecette`, `idUniteDeMesure`) VALUES (null,5,10,1,2);

INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,0);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,5);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,7);
INSERT INTO `remises`(`idRemise`, `taux`) VALUES (null,20);

INSERT INTO `etapes`(`idEtape`, `titre`, `description`) VALUES (null,"fondre","faire fondre du beurre pendant 1 minute au micro-onde.");
INSERT INTO `etapes`(`idEtape`, `titre`, `description`) VALUES (null,"cuire","faire cuire le potiron");
INSERT INTO `etapes`(`idEtape`, `titre`, `description`) VALUES (null,"mixer","mixer le potiron avec le beurre et le lait");
INSERT INTO `etapes`(`idEtape`, `titre`, `description`) VALUES (null,"saler/poivrer","saler et poivrer la préparation");

INSERT INTO `etapesrecette`(`idEtapeRecette`, `ordre`, `idRecette`, `idEtape`) VALUES (null,1,1,1);
INSERT INTO `etapesrecette`(`idEtapeRecette`, `ordre`, `idRecette`, `idEtape`) VALUES (null,2,1,2);
INSERT INTO `etapesrecette`(`idEtapeRecette`, `ordre`, `idRecette`, `idEtape`) VALUES (null,3,1,3);
INSERT INTO `etapesrecette`(`idEtapeRecette`, `ordre`, `idRecette`, `idEtape`) VALUES (null,4,1,4);

INSERT INTO `commandes`(`idCommande`, `numero`, `idUser`, `idRemise`, `idAgenda`) VALUES (null,"02151357",2,1,1);
INSERT INTO `commandes`(`idCommande`, `numero`, `idUser`, `idRemise`, `idAgenda`) VALUES (null,"02659892",3,2,2);

INSERT INTO `lignescommande` (`idLigneCommande`, `quantite`, `prixVenteHT`, `idProduit`, `idPlat`, `idCommande`) VALUES (NULL, 1, 20, NULL, 1, 1);
INSERT INTO `lignescommande` (`idLigneCommande`, `quantite`, `prixVenteHT`, `idProduit`, `idPlat`, `idCommande`) VALUES (NULL, 1, 20, 12, NULL, 2);
INSERT INTO `lignescommande` (`idLigneCommande`, `quantite`, `prixVenteHT`, `idProduit`, `idPlat`, `idCommande`) VALUES (NULL, 1, 21.50, 12, NULL, 2);

INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "CB");
INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "Cheque");
INSERT INTO `modesdepaiement`(`idModeDePaiement`, `libelle`) VALUES (null, "Espece");

INSERT INTO `paiements`(`idPaiement`, `montant`, `numCheque`, `idModeDePaiement`) VALUES (null,20,null,1);
INSERT INTO `paiements`(`idPaiement`, `montant`, `numCheque`, `idModeDePaiement`) VALUES (null,20,null,3);
INSERT INTO `paiements`(`idPaiement`, `montant`, `numCheque`, `idModeDePaiement`) VALUES (null,21.50,null,1);

-- Le devis sera géneré par la commande, Tout comme la facture finale et la facture d'accompte
INSERT INTO `devis`(`idDevis`, `cheminDevis`, `idCommande`) VALUES (null,"./DOCS/DEVIS/Devis1523652.pdf",1);

-- La facture sera génerée par un bouton dans la commande et sera effectuée a partir de la commande
-- il faudra regarder si une facture n'existe pas déja sous ce nom pour rajouter un chiffre derriere lke numéro de facture exple Facture021513572 le "2" est rajouté puisque c'est la deuxieme facture qui va etre génerée.
INSERT INTO `factures`(`idFacture`, `libelle`, `cheminFacture`) VALUES (null,"facture finale", "./DOCS/FACTURES/Facture02151357");
INSERT INTO `factures`(`idFacture`, `libelle`, `cheminFacture`) VALUES (null,"facture finale", "./DOCS/FACTURES/Facture02659892");
INSERT INTO `factures`(`idFacture`, `libelle`, `cheminFacture`) VALUES (null,"facture finale", "./DOCS/FACTURES/Facture026598922");

INSERT INTO `reglements`(`idReglement`, `idPaiement`, `idFacture`) VALUES (null,1,1);
INSERT INTO `reglements`(`idReglement`, `idPaiement`, `idFacture`) VALUES (null,2,1);
INSERT INTO `reglements`(`idReglement`, `idPaiement`, `idFacture`) VALUES (null,3,1);

INSERT INTO `temoignages`(`idTemoignage`, `titre`, `note`, `appreciation`, `datePublication`, `idUser`) VALUES (null,"Parfait !", 4, "on est bien servi !", "2021-03-25 09:34:35", 2);
