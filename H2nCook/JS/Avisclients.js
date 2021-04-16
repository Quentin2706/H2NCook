var modifier = function (e) {
    modifierFunction(e);
}

var recupNote = function (e) {
    noteModif(e);
}

var envoiModif = function (e) {
    modifConfirm(e);
}

var avisComplet = "";

function chargement() {
    const requ = new XMLHttpRequest();

    requ.open('POST', './index.php?page=ApiAvisClients', true);
    requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ.send();

    var main = document.getElementsByClassName("main")[0].children[0];
    var tabAvis = [];
    var idUser = document.getElementById("idUser").value;
    requ.onreadystatechange = function (e) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                reponse = JSON.parse(this.responseText);
                for (let i = 0; i < reponse.length; i++) {
                    tabAvis.push(reponse[i].idTemoignage);
                    let divAvis = document.createElement("div");
                    divAvis.setAttribute("class", "mgTop1");
                    main.appendChild(divAvis);

                    let divEspace = document.createElement("div");
                    divAvis.appendChild(divEspace);

                    let divInfos = document.createElement("div");
                    divInfos.setAttribute("class", "colonne fois5");
                    divAvis.appendChild(divInfos);

                    let inputID = document.createElement("input");
                    inputID.setAttribute("type", "hidden");
                    inputID.setAttribute("value", reponse[i].idTemoignage);
                    divAvis.appendChild(inputID);

                    let titre = document.createElement("h3");
                    titre.textContent = reponse[i].titre;
                    divInfos.appendChild(titre);

                    let divEtoiles = document.createElement("div");
                    divInfos.appendChild(divEtoiles);
                    let nb = parseInt(reponse[i].note);
                    for (let i = 0; i < nb; i++) {
                        let etoilesJaunes = document.createElement("div");
                        divEtoiles.appendChild(etoilesJaunes);

                        let image = document.createElement("img");
                        image.setAttribute("src", "./IMG/etoilesjaunes.png");
                        etoilesJaunes.appendChild(image);
                    }
                    for (let i = nb; i < 5; i++) {
                        let etoilesGrises = document.createElement("div");
                        divEtoiles.appendChild(etoilesGrises);

                        let image = document.createElement("img");
                        image.setAttribute("src", "./IMG/etoilesgrises.png");
                        etoilesGrises.appendChild(image);
                    }

                    let divFlex = document.createElement("div");
                    divFlex.setAttribute("class", "fois60");
                    divEtoiles.appendChild(divFlex);


                    let divAppreciation = document.createElement("div");
                    divAppreciation.setAttribute("class", "mgTop1 appreciation");
                    divAppreciation.textContent = reponse[i].appreciation;
                    divInfos.appendChild(divAppreciation);

                    let divCredit = document.createElement("div");
                    divCredit.setAttribute("class", "credit mgTop1");
                    divInfos.appendChild(divCredit);

                    let divAuteur = document.createElement("div");
                    // Aucune valeur ici, elle est rempli lors de la deuxieme requete API
                    divCredit.appendChild(divAuteur);

                    let divDatePublication = document.createElement("div");
                    divDatePublication.textContent = "le : " + reponse[i].datePublication;
                    divCredit.appendChild(divDatePublication);


                    let divEspace2 = document.createElement("div");
                    divAvis.appendChild(divEspace2);

                    if (idUser == reponse[i].idUser) {
                        let divFois5 = document.createElement("div");
                        divFois5.setAttribute("class", "fois2");
                        divCredit.appendChild(divFois5);

                        let divBouton = document.createElement("div");
                        divCredit.appendChild(divBouton);

                        let boutonModif = document.createElement("div");
                        boutonModif.setAttribute("class", "boutonForm centrer");
                        boutonModif.textContent = "Modifier";
                        divBouton.appendChild(boutonModif);
                        boutonModif.addEventListener("click", modifier);

                    } else {
                        let divFois5 = document.createElement("div");
                        divFois5.setAttribute("class", "fois5");
                        divCredit.appendChild(divFois5);
                    }
                }
                pseudo(tabAvis);
            }
        }
    }
}

function pseudo(tabAvis) {
    const requ2 = new XMLHttpRequest();

    requ2.open('POST', './index.php?page=ApiAvisClients', true);
    requ2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ2.send("idTemoignage=" + JSON.stringify(tabAvis));

    requ2.onreadystatechange = function (e) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                reponse = JSON.parse(this.responseText);
                let divCredits = document.getElementsByClassName("credit");

                for (let i = 0; i < divCredits.length; i++) {
                    divCredits[i].children[0].textContent = "Publié par : " + reponse[i]
                }
            }
        }
    }
}

chargement();



function modifierFunction(e) {
    avisComplet = e.target.parentNode.parentNode.parentNode.innerHTML;
    let idTemoignage = e.target.parentNode.parentNode.parentNode.nextElementSibling.value;
    let divAvis = e.target.parentNode.parentNode.parentNode;
    let h3Value = divAvis.children[0].textContent;
    let note = 0;
    for (let i = 0; i < divAvis.children[1].childElementCount - 1; i++) {

        let image = divAvis.children[1].children[i].children[0].getAttribute("src");
        if (image.endsWith("jaunes.png")) {
            note++;
        }
    }

    let appreciation = divAvis.children[2].textContent;

    let h = 0;
    let compteur = divAvis.childElementCount;
    while (h < compteur) {
        divAvis.children[h].remove();
        h--;
        compteur--;
        h++;
    }


    let form = document.createElement("form");
    form.setAttribute("action", "index.php?page=Action&table=Temoignages&mode=modif&id=" + idTemoignage);
    form.setAttribute("method", "POST");
    form.setAttribute("enctype", "multipart/form-data");
    form.setAttribute("class", "colonne mgTop3");
    divAvis.appendChild(form);

    let divModif = document.createElement("h2");
    divModif.textContent = "Modification de votre publication";
    form.appendChild(divModif);

    let divInput1 = document.createElement("div");
    form.appendChild(divInput1);

    let titre = document.createElement("label");
    titre.setAttribute("for", "titre");
    titre.textContent = "Titre de l'appreciation";
    divInput1.appendChild(titre);

    let inputTitre = document.createElement("input");
    inputTitre.setAttribute("name", "titre");
    inputTitre.value = h3Value;
    divInput1.appendChild(inputTitre);

    let divInput2 = document.createElement("div");
    form.appendChild(divInput2);

    let labelNote = document.createElement("label");
    labelNote.setAttribute("for", "labelNote");
    labelNote.textContent = "Note";
    divInput2.appendChild(labelNote);

    let divEtoiles = document.createElement("div");
    divEtoiles.setAttribute("class", "row");
    divInput2.appendChild(divEtoiles);

    for (let k = 0; k < note; k++) {
        let note = document.createElement("div");
        note.setAttribute("note", k + 1);
        divEtoiles.appendChild(note);

        let image = document.createElement("img");
        image.setAttribute("src", "./IMG/etoilesjaunes.png");
        note.appendChild(image);

        note.addEventListener("click", recupNote);
    }
    for (let l = note; l < 5; l++) {
        let note = document.createElement("div");
        note.setAttribute("note", l + 1);
        divEtoiles.appendChild(note);

        let image = document.createElement("img");
        image.setAttribute("src", "./IMG/etoilesgrises.png");
        note.appendChild(image);

        note.addEventListener("click", recupNote);
    }

    let divFlex = document.createElement("div");
    divFlex.setAttribute("class", "fois40");
    divEtoiles.appendChild(divFlex);

    let inputCacheNote = document.createElement("input");
    inputCacheNote.setAttribute("type", "hidden");
    inputCacheNote.setAttribute("name", "note");
    inputCacheNote.value = note;
    divEtoiles.appendChild(inputCacheNote);


    let divInput3 = document.createElement("div");
    form.appendChild(divInput3);

    let appreciationLabel = document.createElement("label");
    appreciationLabel.setAttribute("for", "appreciation");
    appreciationLabel.textContent = "Appréciation";
    divInput3.appendChild(appreciationLabel);

    let inputAppreciation = document.createElement("textarea");
    inputAppreciation.setAttribute("name", "appreciation");
    inputAppreciation.setAttribute("rows", "8");
    inputAppreciation.value = appreciation;
    divInput3.appendChild(inputAppreciation);


    let boutonConfirmer = document.createElement("div");
    boutonConfirmer.setAttribute("class", "boutonForm centrer");
    boutonConfirmer.textContent = "Modifier";
    form.appendChild(boutonConfirmer);
    boutonConfirmer.addEventListener("click", envoiModif);

    let boutonAnnuler = document.createElement("div");
    boutonAnnuler.setAttribute("class", "boutonForm centrer");
    boutonAnnuler.textContent = "Annuler";
    form.appendChild(boutonAnnuler);
    boutonAnnuler.addEventListener("click", function (e) {
        annuler(e)
    });

}

function noteModif(e) {
    if (e.target.tagName == "IMG") {
        var divNote = e.target.parentNode;
    } else {
        var divNote = e.target;
    }
    let note = parseInt(divNote.getAttribute("note"));

    let divEtoiles = divNote.parentNode;
    divEtoiles.innerHTML = "";

    for (let k = 0; k < note; k++) {
        let note = document.createElement("div");
        note.setAttribute("note", k + 1);
        divEtoiles.appendChild(note);

        let image = document.createElement("img");
        image.setAttribute("src", "./IMG/etoilesjaunes.png");
        note.appendChild(image);

        note.addEventListener("click", recupNote);
    }
    for (let l = note; l < 5; l++) {
        let note = document.createElement("div");
        note.setAttribute("note", l + 1);
        divEtoiles.appendChild(note);

        let image = document.createElement("img");
        image.setAttribute("src", "./IMG/etoilesgrises.png");
        note.appendChild(image);

        note.addEventListener("click", recupNote);
    }
    let divFlex = document.createElement("div");
    divFlex.setAttribute("class", "fois40");
    divEtoiles.appendChild(divFlex);

    let inputCacheNote = document.createElement("input");
    inputCacheNote.setAttribute("type", "hidden");
    inputCacheNote.setAttribute("name", "note");
    inputCacheNote.value = note;
    divEtoiles.appendChild(inputCacheNote);
}

function annuler(e) {
    let divAvis = e.target.parentNode.parentNode;
    divAvis.innerHTML = avisComplet;
    divAvis.children[3].children[3].children[0].addEventListener("click", modifier);
}

function modifConfirm(e) {

    const requ3 = new XMLHttpRequest();

    let form = e.target.parentNode;
    let titre = form.children[1].children[1].value;
    let note = form.children[2].children[1].children[6].value;
    let appreciation = form.children[3].children[1].value; 
    let idTemoignage = form.parentNode.parentNode.children[2].value;

    var infos = {
        "titre" : titre,
        "note" : note,
        "appreciation" : appreciation,
        "idTemoignage" : idTemoignage
    }

    var tab = JSON.stringify(infos);
    requ3.open('POST', './index.php?page=ApiFormTemoignage', true);
    requ3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ3.send("temoignage=" + tab);
    chargement();
}
