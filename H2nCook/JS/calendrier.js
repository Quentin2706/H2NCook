/* On initialise la date */
const OPTIONS = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const DATE = new Date();
var auj = DATE.toLocaleDateString('fr-FR', OPTIONS);

var reponse = [];


/* on récupère l'année courante */
var annee = DATE.getFullYear();

var selectAnnee = document.getElementsByClassName("selectAnnee")[0];
selectAnnee.addEventListener("input", function (e) {
    refresh(e);
})



/* On rend les mois clickable */
var selectMois = document.getElementsByClassName("mois");

for (let i = 0; i < selectMois.length; i++) {
    selectMois[i].addEventListener("click", function (e) {
        refresh(e);
    });
}

/* On initialise le tableau du  nombre de jours qui ne changera jamais sauf au moment dans années bissextiles */
var jours = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];


var calendrier = document.getElementsByClassName("calendrier")[0];


/* Voici la fonction qui permettra de changer le calendrier en fonction du mois qu'on a choisit*/
function refresh(e) {
    annee = parseInt(selectAnnee.value);
    // Ici on réinitialise la class active qui permet de mettre la couleur rouge sur le mois actif
    for (let i = 0; i < selectMois.length; i++) {
        selectMois[i].classList.remove("active");
    }

    var caseCalendrier = document.getElementsByClassName("case");
    /* On grise les cases qui ne seront pas utilisées et pour réinitialiser */
    for (k = 0; k < caseCalendrier.length; k++) {
        caseCalendrier[k].innerHTML = "";
        caseCalendrier[k].classList.remove("jourActif");
        caseCalendrier[k].removeEventListener("click", function (e) {
            afficherDetail(e)
        });
    }
    // Je mets en couleur le mois actif je vérifie également si ma cible est est bien les mois et pas le select année
    if (e.target.classList.contains("mois")) {
        mois = parseInt(e.target.getAttribute("nb"));
    } else {
        mois = DATE.getMonth();
    }
    /* Je fais appel a la fonction pour récuperer les données*/
    refreshAPI(annee, mois + 1);
    // je vérifie que le e.target c'est bien un mois 
    if (e.target.classList.contains("mois")) {
        e.target.classList.add("active");
    } else {
        selectMois[mois].classList.add("active");
    }
    var dateDemandee = new Date(annee, mois, 1);
    if ((parseInt(annee) % 4 === 0 && parseInt(annee) % 100 > 0) || (parseInt(annee) % 400 === 0)) {
        // si c'est février et que l'année est bissextile alors le mois prend 29 jours
        jours[1] = 29;
    } else {
        jours[1] = 28;
    }
    var firstDay = parseInt(dateDemandee.getDay());
    /* Comme les cases du calendrier commencent a 0 je fais -1*/
    if (firstDay > 0) {
        firstDay -= 1;
    }

    var compteur = 1;
    for (i = 0; i < 6; i++) {
        let ligne = calendrier.children[i];
        for (j = firstDay; j < 7; j++) {
            if (compteur <= jours[mois]) {
                caseLigne = ligne.children[j];
                caseLigne.innerHTML = compteur;
                caseLigne.classList.add("jourActif");
                caseLigne.addEventListener("click", function (e) {
                    afficherDetail(e)
                });
                compteur++;

                // trucs a faire ici
            }
        }
        firstDay = 0;
    }
}


function afficherDetail(e) {
    let informations = document.getElementsByClassName("informations")[0];
    informations.innerHTML = "";
    let divMois = document.getElementsByClassName("active")[0];
    let annee = selectAnnee.value;

    if (divMois.hasAttribute("nb")) {
        let mois = divMois.getAttribute("nb");
        var moisNB = parseInt(mois) + 1;
        if (moisNB < 10) {
            moisNB = "0" + moisNB;
        }
    }

    if (e.target.innerHTML.indexOf("<") != -1) {
        var rdv = e.target.innerHTML.substring(0, e.target.innerHTML.indexOf("<"));
    } else {
        var rdv = e.target.innerHTML;
    }

    if (rdv.length < 2) {
        rdv = "0" + rdv;
    }

    if (e.target.children[0] != undefined) {
        var tab = [];
        for (let i = 0; i < reponse.length; i++) {
            tab.push(reponse[i].idAgenda);
        }

        tabIdAgenda = JSON.stringify(tab);
        requ2.open('POST', './index.php?page=ApiReservations', true);
        requ2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        requ2.send("tabIdAgenda=" + tabIdAgenda);

        for (let i = 0; i < reponse.length; i++) {
            if (reponse[i].horaireDebut.startsWith(annee + "-" + moisNB + "-" + rdv)) {

                let divRDV = document.createElement("div")
                divRDV.setAttribute("class", "divRDV colonne");
                informations.appendChild(divRDV);
                divRDV.addEventListener("click", function () {
                    afficheFormDetail(reponse[i].idAgenda)
                });

                let divClient = document.createElement("div")
                divRDV.appendChild(divClient);

                let divDDN = document.createElement("div")
                divRDV.appendChild(divDDN);

                let divNum = document.createElement("div")
                divRDV.appendChild(divNum);

                let divAddress = document.createElement("div")
                divRDV.appendChild(divAddress);

                let divVille = document.createElement("div")
                divRDV.appendChild(divVille);

                let divCP = document.createElement("div")
                divRDV.appendChild(divCP);

                let divSep = document.createElement("div")
                divRDV.appendChild(divSep);


                let dateN = reponse[i].dateEvent.substring(0, reponse[i].dateEvent.length - 9);
                let jour = dateN.substring(8, 10);
                let mois = dateN.substring(5, 7);
                let annee = dateN.substring(0, 4);
                let dateEvent = jour + "/" + mois + "/" + annee;

                let div = document.createElement("div")
                div.innerHTML = "Date de l'évènement : " + dateEvent;
                divRDV.appendChild(div);

                let dateH1 = reponse[i].horaireDebut.substring(0, reponse[i].horaireDebut.length - 9);
                let heure1 = reponse[i].horaireDebut.substring(10);
                let jour1 = dateH1.substring(8, 10);
                let mois1 = dateH1.substring(5, 7);
                let annee1 = dateH1.substring(0, 4);
                let dateDebut = jour1 + "/" + mois1 + "/" + annee1 + " " + heure1;

                let div2 = document.createElement("div")
                div2.innerHTML = "Devrait commencer à : " + dateDebut;
                divRDV.appendChild(div2);

                let dateH2 = reponse[i].horaireFin.substring(0, reponse[i].horaireFin.length - 9);
                let heure2 = reponse[i].horaireFin.substring(10);
                let jour2 = dateH2.substring(8, 10);
                let mois2 = dateH2.substring(5, 7);
                let annee2 = dateH2.substring(0, 4);
                let dateFin = jour2 + "/" + mois2 + "/" + annee2 + " " + heure2;

                let div3 = document.createElement("div")
                div3.innerHTML = "Devrait se terminer à : " + dateFin;
                divRDV.appendChild(div3);

                let div4 = document.createElement("div")
                div4.innerHTML = "Motif du rendez-vous : " + reponse[i].motif;
                divRDV.appendChild(div4);

                if (reponse[i].infoComp != null) {
                    let div5 = document.createElement("div")
                    div5.innerHTML = "infos complémentaires : " + reponse[i].infoComp;
                    divRDV.appendChild(div5);
                }
            }
        }
    } else {
        let informations = document.getElementsByClassName("informations")[0];
        informations.innerHTML = "";
    }
    let ahref = document.createElement("a");
    ahref.setAttribute("href", "index.php?page=FormAgenda&mode=ajout&date=" + annee + "-" + moisNB + "-" + rdv)
    informations.appendChild(ahref);


    let boutonAjout = document.createElement("button");
    boutonAjout.setAttribute("class", "boutonForm");
    boutonAjout.innerHTML = "Ajouter un RDV";
    ahref.appendChild(boutonAjout);
}

function afficheFormDetail(id) {
    window.location = "index.php?page=FormAgenda&mode=modif&id=" + id;
}


var mois = DATE.getMonth();
selectMois[parseInt(mois)].classList.add("active");
if ((parseInt(annee) % 4 === 0 && parseInt(annee) % 100 > 0) || (parseInt(annee) % 400 === 0)) {
    // si c'est février et que l'année est bissextile alors le mois prend 29 jours
    if (parseInt(mois) == 1) {
        jours[1] = 29;
    } else {
        jours[1] = 28;
    }
}


const DATE2 = new Date(annee, mois, 1);
var firstDay = parseInt(DATE2.getDay());
/* Comme les cases du calendrier commencent a 0 je fais -1*/
if (firstDay > 0) {
    firstDay -= 1;
}


var caseCalendrier = document.getElementsByClassName("case");
/* On grise les cases qui ne seront pas utilisées */
for (k = 0; k < caseCalendrier.length; k++) {
    caseCalendrier[k].innerHTML = "";
    caseCalendrier[k].classList.remove("jourActif");
}


var compteur = 1;
for (i = 0; i < 6; i++) {
    let ligne = calendrier.children[i];
    for (j = firstDay; j < 7; j++) {

        if (compteur <= jours[mois]) {
            caseLigne = ligne.children[j];
            caseLigne.innerHTML = compteur;
            compteur++;
            caseLigne.classList.add("jourActif");
            caseLigne.addEventListener("click", function (e) {
                afficherDetail(e);
            });
            // Il faut ajoute plus de trucs ici
        }
    }
    firstDay = 0;
}



/* ================ API ====================== */

function refreshAPI(annee, mois) {
    if (mois < 10) {
        mois = "0" + mois;
    }

    requ1.open('POST', './index.php?page=ApiReservations', true);
    requ1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ1.send("date=" + annee + "-" + mois);
}

const requ1 = new XMLHttpRequest();
requ1.onreadystatechange = function (e) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            reponse = JSON.parse(this.responseText);

            var joursCal = document.getElementsByClassName("jourActif");
            for (let i = 0; i < reponse.length; i++) {
                if (reponse[i].horaireDebut.substring(8, reponse[i].horaireDebut.length - 9).startsWith("0")) {
                    var nbJour = parseInt(reponse[i].horaireDebut.substring(9, reponse[i].horaireDebut.length - 9));
                } else {
                    var nbJour = parseInt(reponse[i].horaireDebut.substring(8, reponse[i].horaireDebut.length - 9));
                }
                if (joursCal[nbJour - 1].children[0] === undefined) {
                    var div = document.createElement("div");
                    div.setAttribute("class", "rond");
                    joursCal[nbJour - 1].appendChild(div);
                }
            }
        }
    }
}

/* je lance la requête à L'API au chargement de la page */
refreshAPI(annee, mois + 1);


const requ2 = new XMLHttpRequest();
requ2.onreadystatechange = function (e) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            reponse2 = JSON.parse(this.responseText);
            var informations = document.getElementsByClassName("informations")[0];

            var divRDV = [];

            for (let i = 0; i < informations.childElementCount; i++) {
                if (informations.children[i].classList.contains("divRDV")) {
                    divRDV.push(informations.children[i]);
                }
            }   

            
            var reponsedivRDV = [];

                let dateN2 = divRDV[0].children[7].innerHTML.substring(divRDV[0].children[7].innerHTML.length - 10);
                let jour2 = dateN2.substring(0, 2);
                let mois2 = dateN2.substring(3, 5);
                let annee2 = dateN2.substring(6);
                let dateEvent = annee2 + "-" + mois2 + "-" + jour2;

            for (let h = 0; h < reponse.length; h++) {

                if (reponse[h].dateEvent.startsWith(dateEvent)) {
                    reponsedivRDV.push(h)
                }
            }


            for (j = 0; j < divRDV.length; j++) {
                if (reponse2[reponsedivRDV[j]].genre = "H") {
                    divRDV[j].children[0].innerHTML = " Monsieur : " + reponse2[reponsedivRDV[j]].nom + " " + reponse2[reponsedivRDV[j]].prenom;
                } else {
                    divRDV[j].children[0].innerHTML = " Madame : " + reponse2[reponsedivRDV[j]].nom + " " + reponse2[reponsedivRDV[j]].prenom;
                }

                let dateN = reponse2[reponsedivRDV[j]].DDN.substring(0, reponse2[reponsedivRDV[j]].DDN.length - 9);
                let jour = dateN.substring(8, 10);
                let mois = dateN.substring(5, 7);
                let annee = dateN.substring(0, 4);
                let dateNaissance = jour + "/" + mois + "/" + annee;

                divRDV[j].children[1].innerHTML = " Date de naissance : " + dateNaissance;
                divRDV[j].children[2].innerHTML = " Adresse Postale : " + reponse2[reponsedivRDV[j]].adressePostale;
                divRDV[j].children[3].innerHTML = " Numéro de téléphone : " + reponse2[reponsedivRDV[j]].numTel;
                divRDV[j].children[4].innerHTML = " Ville : " + reponse2[reponsedivRDV[j]].ville;
                divRDV[j].children[5].innerHTML = " Code Postal : " + reponse2[reponsedivRDV[j]].codePostal;
                divRDV[j].children[6].innerHTML = "====================";
            }
        }
    }
}
