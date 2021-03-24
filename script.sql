DROP DATABASE IF EXISTS H2N;
CREATE DATABASE H2N;
USE H2N;

CREATE TABLE Users
(
    idUser int (11) not null auto_increment PRIMARY KEY,
    identifiant varchar(50) not null,
    motDePasse varchar(50) not null,
    adresseMail varchar(100) not null,
    idRole int (11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Roles
(
    idRole int (11) not null auto_increment PRIMARY KEY,
    libelle varchar(20) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Temoignages
(
    idTemoignage int (11) not null auto_increment PRIMARY KEY,  
    titre varchar(200) not null, 
    note int(11) not null,
    appreciation text not null,
    datePublication DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idUser int(11) not null                                                                              
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Clients
(
    idUser int (11) not null PRIMARY KEY,  
    genre varchar(1) not null, 
    nom varchar(100) not null,
    prenom varchar(100) not null,
    DDN varchar(100) not null,
    adressePostale varchar(250) not null,
    codePostal varchar(5) not null, 
    ville varchar(100) not null                                                                             
)ENGINE = INNODB,
CHARSET = UTF8;



CREATE TABLE Remises
(
    idRemise int (11) not null auto_increment PRIMARY KEY,
    taux int (11) not null
)ENGINE = INNODB,
CHARSET = UTF8;



CREATE TABLE ModesDePaiement
(
    idModeDePaiement int (11) not null auto_increment PRIMARY KEY,
    libelle varchar(30) not null
)ENGINE = INNODB,
CHARSET = UTF8;



CREATE TABLE Paiements
(
    idPaiement int (11) not null auto_increment PRIMARY KEY,
    montant int(11) not null,
    numCheque varchar(11),
    idModeDePaiement int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;


CREATE TABLE Factures
(
    idFacture int(11) not null auto_increment PRIMARY KEY,
    idPaiement int(11) not null,
    idCommande int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Reglements
(
    idReglement int(11) not null auto_increment PRIMARY KEY, 
    idPaiement int(11) not null,
    idFacture int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Agendas
(
    idAgenda int(11) not null auto_increment PRIMARY KEY,
    dateEvent DATETIME NOT NULL, 
    HoraireDebut DATETIME NOT NULL, 
    HoraireFin DATETIME NOT NULL, 
    Motif varchar(100) not null,
    infoComp text
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Fournisseurs
(
    idFournisseur int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(100) not null,
    numTel varchar(15),
    adressePostale varchar(200),
    ville varchar(150),
    codePostal varchar(5)
)ENGINE = INNODB,
CHARSET = UTF8;


CREATE TABLE CategoriesProduits
(
    idCategorieProduit int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(50) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Produits
(
    idProduit int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(100) not null,
    reference varchar(20) not null,
    conditionnement varchar(10) not null,
    stock int (11) not null,
    prixAchatHT int (11) not null,
    dateCreation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateModification DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idFournisseur int(11) not null,
    idCategorieProduit int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE CategoriesRecettes
(
    idCategorieRecette int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(50) not null
)ENGINE = INNODB,
CHARSET = UTF8;


CREATE TABLE Recettes
(
    idRecette int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(100) not null,
    nbPortion  int(11) not null,
    cheminImage varchar(100),
    instruction text not null,
    descriptionClient text not null,
    idCategorieRecette int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Compositions
(
    idComposition int(11) not null auto_increment PRIMARY KEY,
    quantite int(11) not null,
    uniteDeMesure varchar(5) not null,
    idProduit int(11) not null,
    idRecette  int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Plats
(
    idPlat int(11) not null auto_increment PRIMARY KEY,
    libelle varchar(100) not null,
    idRecette int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE lignesCommande
(
    idLigneCommande int(11) not null auto_increment PRIMARY KEY,
    quantite int(11) not null,
    prixVenteHT int(11) not null,
    idProduit int(11) not null,
    idPlat int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Commandes
(
    idCommande int(11) not null auto_increment PRIMARY KEY,
    numero int(11) not null,
    idUser int (11) not null,
    idRemise int (11) not null,
    idFacture int (11) not null,
    idAgenda int (11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

CREATE TABLE Devis
(
    idDevis int(11) not null auto_increment PRIMARY KEY,
    cheminDevis varchar(50) not null,
    idCommande int(11) not null
)ENGINE = INNODB,
CHARSET = UTF8;

ALTER TABLE Users ADD CONSTRAINT FK_users_roles FOREIGN KEY (idRole) REFERENCES Roles(idRole);
ALTER TABLE Temoignages ADD CONSTRAINT FK_temoignages_clients FOREIGN KEY (idUser) REFERENCES Clients(idUser);
ALTER TABLE Commandes ADD CONSTRAINT FK_commandes_clients FOREIGN KEY (idUser) REFERENCES Clients(idUser);
ALTER TABLE Commandes ADD CONSTRAINT FK_commandes_remises FOREIGN KEY (idRemise) REFERENCES Remises(idRemise);
ALTER TABLE Paiements ADD CONSTRAINT FK_paiements_modesdepaiement FOREIGN KEY (idModeDePaiement) REFERENCES ModesDePaiement(idModeDePaiement);
ALTER TABLE Reglements ADD CONSTRAINT FK_reglements_paiements FOREIGN KEY (idPaiement) REFERENCES Paiements(idPaiement);
ALTER TABLE Reglements ADD CONSTRAINT FK_reglements_factures FOREIGN KEY (idFacture) REFERENCES Factures(idFacture);
ALTER TABLE Factures ADD CONSTRAINT FK_factures_commandes FOREIGN KEY (idCommande) REFERENCES Commandes(idCommande);
ALTER TABLE Commandes ADD CONSTRAINT FK_commandes_agendas FOREIGN KEY (idAgenda) REFERENCES Agendas(idAgenda);
ALTER TABLE Devis ADD CONSTRAINT FK_devis_commandes FOREIGN KEY (idCommande) REFERENCES Commandes(idCommande);
ALTER TABLE Produits ADD CONSTRAINT FK_produits_fournisseurs FOREIGN KEY (idFournisseur) REFERENCES Fournisseurs(idFournisseur);
ALTER TABLE Produits ADD CONSTRAINT FK_produits_categorieProduits FOREIGN KEY (idCategorieProduit) REFERENCES CategoriesProduits(idCategorieProduit);
ALTER TABLE Compositions ADD CONSTRAINT FK_compositions_produits FOREIGN KEY (idProduit) REFERENCES Produits(idProduit);
ALTER TABLE Compositions ADD CONSTRAINT FK_compositions_Recettes FOREIGN KEY (idRecette) REFERENCES Recettes(idRecette);