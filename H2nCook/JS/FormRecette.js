
var tableau = document.getElementsByClassName("tabIngredient")[0];
var ligne = tableau.children[2].innerHTML;

var ajouterLigneVar = function (e) {
    ajouterLigne(e);
}

var modifInput = function (e) {
    modifInputFunction(e);
}

var firstInputLigne = tableau.children[2].children[0].children[0];
var firstInputProduitLigne = tableau.children[2].children[1].children[0];
var firstUniteDeMesureLigne = tableau.children[2].children[2].children[0];

var firstSupprLigne = tableau.children[2].children[3];

firstInputLigne.addEventListener("input", ajouterLigneVar);

firstInputLigne.addEventListener("change", modifInput);
firstInputProduitLigne.addEventListener("change", modifInput);
firstUniteDeMesureLigne.addEventListener("change", modifInput);

firstSupprLigne.addEventListener("click", function (e) {
    supprLigne(e);
});

/* ============= TAB 2 =========== */

var tableau2 = document.getElementsByClassName("tabEtapes")[0];
var ligne2 = tableau2.children[2].innerHTML;

var firstInputLigne2 = tableau2.children[2].children[0].children[0];
var firstInputProduitLigne2 = tableau2.children[2].children[1].children[0];
var firstUniteDeMesureLigne2 = tableau2.children[2].children[2].children[0];

var firstSupprLigne2 = tableau2.children[2].children[3];

firstInputLigne2.addEventListener("input", ajouterLigneVar);

firstInputLigne2.addEventListener("change", modifInput);
firstInputProduitLigne2.addEventListener("change", modifInput);
firstUniteDeMesureLigne2.addEventListener("change", modifInput);

firstSupprLigne2.addEventListener("click", function (e) {
    supprLigne(e);
});

/* ========================================================== */



var cpt = 2;
var cpt2 = 2;

// récuperer le contenu de toutes les lignes avant envoi au formulaire
function ajouterLigne(e) {
    if (e.target == undefined) {
        e.children[0].children[0].removeEventListener("input", ajouterLigneVar);
        var ligneTab = e;
        tableau = ligneTab.parentNode;
    } else {
        if (e.target === firstInputLigne) {
            firstInputLigne.removeEventListener("input", ajouterLigneVar);
        } else if (e.target === firstInputLigne2) {
            firstInputLigne2.removeEventListener("input", ajouterLigneVar);
        } else {
            e.target.removeEventListener("input", ajouterLigneVar);
        }
        var ligneTab = e.target.parentNode.parentNode;
        tableau = ligneTab.parentNode;
    }

    if (tableau != tableau2) {
        cpt++;
        let ligneDiv = document.createElement("div");
        ligneDiv.setAttribute("class", "ligne row");
        ligneDiv.setAttribute("id", "ing" + cpt);
        ligneDiv.innerHTML = ligne;
        tableau.appendChild(ligneDiv);
        ligneDiv.children[3].addEventListener("click", function (e) {
            supprLigne(e);
        });

        h = 0;
        compteur = ligneDiv.childElementCount;
        while (h < compteur) {
            if (ligneDiv.children[h].classList.contains("inputing2")) {
                ligneDiv.children[h].remove();
                h--;
                compteur--;
            }
            h++;
        }

        ligneDiv.children[0].children[0].addEventListener("input", ajouterLigneVar);
        ligneDiv.children[0].children[0].addEventListener("change", modifInput);
        ligneDiv.children[1].children[0].addEventListener("change", modifInput);
        ligneDiv.children[2].children[0].addEventListener("change", modifInput);

        let input = document.createElement("input");
        input.setAttribute("class", "inputing" + cpt);
        input.setAttribute("name", "quantite" + cpt);
        input.setAttribute("type", "hidden");
        ligneDiv.appendChild(input);

        let input2 = document.createElement("input");
        input2.setAttribute("class", "inputing" + cpt);
        input2.setAttribute("name", "idProduit" + cpt);
        input2.setAttribute("type", "hidden");
        ligneDiv.appendChild(input2);

        let input3 = document.createElement("input");
        input3.setAttribute("class", "inputing" + cpt);
        input3.setAttribute("name", "idUniteDeMesure" + cpt);
        input3.setAttribute("type", "hidden");
        ligneDiv.appendChild(input3);
    } else {
        cpt2++;
        let ligneDiv = document.createElement("div");
        ligneDiv.setAttribute("class", "ligne row");
        ligneDiv.setAttribute("id", "etape" + cpt2);
        ligneDiv.innerHTML = ligne2;
        tableau.appendChild(ligneDiv);
        ligneDiv.children[3].addEventListener("click", function (e) {
            supprLigne(e);
        });

        h = 0;
        compteur = ligneDiv.childElementCount;
        while (h < compteur) {
            if (ligneDiv.children[h].classList.contains("inputetape2")) {
                ligneDiv.children[h].remove();
                h--;
                compteur--;
            }
            h++;
        }

        ligneDiv.children[0].children[0].addEventListener("input", ajouterLigneVar);
        ligneDiv.children[0].children[0].addEventListener("change", modifInput);
        ligneDiv.children[1].children[0].addEventListener("change", modifInput);
        ligneDiv.children[2].children[0].addEventListener("change", modifInput);

        let input = document.createElement("input");
        input.setAttribute("class", "inputetape" + cpt2);
        input.setAttribute("name", "ordre" + cpt2);
        input.setAttribute("type", "hidden");
        ligneDiv.appendChild(input);

        let input2 = document.createElement("input");
        input2.setAttribute("class", "inputetape" + cpt2);
        input2.setAttribute("name", "titre" + cpt2);
        input2.setAttribute("type", "hidden");
        ligneDiv.appendChild(input2);

        let input3 = document.createElement("input");
        input3.setAttribute("class", "inputetape" + cpt2);
        input3.setAttribute("name", "description" + cpt2);
        input3.setAttribute("type", "hidden");
        ligneDiv.appendChild(input3);
    }
}
var caseSuppr = "";
function supprLigne(e) {
    if (e.target.hasAttribute("src")) {
        caseSuppr = e.target.parentNode.parentNode;
    } else {
        caseSuppr = e.target.parentNode;
    }
    tableau = caseSuppr.parentNode;

    let idLigne = caseSuppr.getAttribute("id");
    cpt = idLigne.substring(3, idLigne.length);
    let caseSupprSave = caseSuppr;
    if (tableau != tableau2)
    {
        let idLigne = caseSuppr.getAttribute("id");
    cpt = idLigne.substring(3, idLigne.length);
    while (caseSuppr.nextElementSibling) {
        caseSupprAfter = caseSuppr.nextElementSibling;
        let idLigne = caseSupprAfter.getAttribute("id");
        let tabInput = document.getElementsByClassName("input" + idLigne);

        caseSupprAfter.setAttribute("id", "ing" + cpt);

        let h = 0;
        let cptAtt=0;
        let compteur = tabInput.length;
        let tabAttribut = ["quantite", "idProduit", "idUniteDeMesure"]
        while (h < compteur) {
                tabInput[h].setAttribute("name", tabAttribut[cptAtt]+cpt);
                tabInput[h].setAttribute("class", "inputing" + cpt);
                cptAtt++;
                compteur--;
        }

        caseSuppr = caseSupprAfter;
        cpt++;
    }
} else {
    let idLigne = caseSuppr.getAttribute("id");
    cpt2 = idLigne.substring(5, idLigne.length);
    while (caseSuppr.nextElementSibling) {
        caseSupprAfter = caseSuppr.nextElementSibling;
        let idLigne = caseSupprAfter.getAttribute("id");
        let tabInput = document.getElementsByClassName("input" + idLigne);

        caseSupprAfter.setAttribute("id", "etape" + cpt2);

        let h = 0;
        let cptAtt=0;
        let compteur = tabInput.length;
        let tabAttribut = ["ordre", "titre", "description"]
        while (h < compteur) {
                tabInput[h].setAttribute("name", tabAttribut[cptAtt]+cpt2);
                tabInput[h].setAttribute("class", "inputetape" + cpt2);
                cptAtt++;
                compteur--;
        }

        caseSuppr = caseSupprAfter;
        cpt2++;
    }
}

    if (caseSupprSave.previousElementSibling.hasAttribute("entete")) {
        if (tableau != tableau2) {
            cpt--;
        } else {
            cpt2--;
        }
        ajouterLigne(caseSupprSave);
        caseSupprSave.remove();
    } else {
        caseSupprSave.remove();
    }
}


function modifInputFunction(e) {
    if (e.target != undefined) {
        var ligneB = e.target.parentNode.parentNode;
    } else {
        var ligneB = e;
    }

    let idLigne = ligneB.getAttribute("id");

    let tabInput = document.getElementsByClassName("input" + idLigne);
    for (let i = 0; i < tabInput.length; i++) {
        tabInput[i].value = ligneB.children[i].children[0].value;
    }
}

const requ = new XMLHttpRequest();
var parametres = new URLSearchParams(window.location.search);
if (parametres.get("mode") != "ajout") {
    requ.open('POST', './index.php?page=ApiFormRecette', true);
    requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ.send("idRecette=" + parametres.get("id"));
}

requ.onreadystatechange = function (e) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            reponse = JSON.parse(this.responseText);
            console.log(reponse);
            for (let i = 0; i < reponse[0].length; i++) {
                tableau.children[i + 2].children[0].children[0].value = reponse[0][i].quantite;
                tableau.children[i + 2].children[1].children[0].value = reponse[0][i].idProduit;
                tableau.children[i + 2].children[2].children[0].value = reponse[0][i].idUniteDeMesure;
                ajouterLigneVar(tableau.children[i + 2]);

                let idLigne =  tableau.children[i + 2].getAttribute("id");

                let tabInput = document.getElementsByClassName("input" + idLigne);
                for (let j = 0; j < tabInput.length; j++) {
                    console.log(tabInput[j]);
                    tabInput[j].value =  tableau.children[i + 2].children[j].children[0].value;
                }
            }

            for (let i = 0; i < reponse[1].length; i++) {
                tableau2.children[i + 2].children[0].children[0].value = reponse[1][i].ordre;
                tableau2.children[i + 2].children[1].children[0].value = reponse[2][i].titre;
                tableau2.children[i + 2].children[2].children[0].value = reponse[2][i].description;
                ajouterLigneVar(tableau2.children[i + 2]);

                let idLigne =  tableau2.children[i + 2].getAttribute("id");

                let tabInput = document.getElementsByClassName("input" + idLigne);
                for (let j = 0; j < tabInput.length; j++) {
                    tabInput[j].value =  tableau2.children[i + 2].children[j].children[0].value;
                }
            }
        }
    }
}