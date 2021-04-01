/* On initialise la date */
const OPTIONS = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const DATE = new Date();
var auj = DATE.toLocaleDateString('fr-FR', OPTIONS);

/* on récupère l'année courante */
var annee = DATE.getFullYear();

var selectAnnee = document.getElementsByClassName("selectAnnee")[0];
selectAnnee.addEventListener("input", function(e){
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

/* Voici la fonction qui permettra de changer le calendrier en fonction du mois qu'on a choisit*/
function refresh(e) {
    annee = parseInt(selectAnnee.value);
    // Ici on réinitialise la class active qui permet de mettre la couleur rouge sur le mois actif
    for (let i = 0; i < selectMois.length; i++) {
        selectMois[i].classList.remove("active");
    }
    // je vérifie que le e.target c'est bien un mois 
    if(e.target.classList.contains("mois")) e.target.classList.add("active");

    var caseCalendrier = document.getElementsByClassName("case");

    for (k = 0; k < caseCalendrier.length; k++) {
        caseCalendrier[k].innerHTML = "";
        caseCalendrier[k].style.backgroundColor = "gray";

    }
    if (e.target.classList.contains("mois"))
    {
        mois = parseInt(e.target.getAttribute("nb"));
    } else {
        mois = DATE.getMonth();
    }
    var dateDemandee = new Date(annee, mois, 1);
    if ((parseInt(annee) % 4 === 0 && parseInt(annee) % 100 > 0) || (parseInt(annee) % 400 === 0)) {
        // si c'est février et que l'année est bissextile alors le mois prend 29 jours
        console.log("année bissextile");
        if (parseInt(mois) == 1) {
            jours[1] = 29;
        }
    } else {
        jours[1] = 28;
    }
    var firstDay = parseInt(dateDemandee.getDay());
    if (firstDay > 0) {
        firstDay -= 1;
    }
    var calendrier = document.getElementsByClassName("calendrier")[0];

    var compteur = 1;
    for (i = 0; i < 6; i++) {
        let ligne = calendrier.children[i];
        for (j = firstDay; j < 7; j++) {
            if (compteur <= jours[mois]) {
                caseLigne = ligne.children[j];
                caseLigne.style.backgroundColor = "white";
                caseLigne.innerHTML = compteur;
                compteur++;
            }
        }
        firstDay = 0;
    }
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
var firstDay = parseInt(DATE.getDay());
if (firstDay > 0) {
    firstDay -= 1;
}

var calendrier = document.getElementsByClassName("calendrier")[0];

var compteur = 1;
for (i = 0; i < 6; i++) {
    let ligne = calendrier.children[i];
    for (j = firstDay; j < 7; j++) {
        if (compteur <= jours[mois]) {
            caseLigne = ligne.children[j];
            caseLigne.style.backgroundColor = "white";
            caseLigne.innerHTML = compteur;
            compteur++;
        }
    }
    firstDay = 0;
}