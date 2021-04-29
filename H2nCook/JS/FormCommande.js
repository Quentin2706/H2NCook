var tableau = document.getElementsByClassName("tabLignes")[0];

var ligne = tableau.children[3].innerHTML;

var ajouterLigneVar = function (e) {
    ajouterLigne(e);
}

var modifInput = function (e) {
    modifInputFunction(e);
}

var verifIngredient = function (e) {
    verifIngredientFunction(e);
}

var firstInputLigne = tableau.children[3].children[0].children[0];
var firstInputProduitLigne = tableau.children[3].children[1].children[0];
var firstUniteDeMesureLigne = tableau.children[3].children[2].children[0];

var firstSupprLigne = tableau.children[3].children[3];

firstInputLigne.addEventListener("input", ajouterLigneVar);
firstInputLigne.addEventListener("change", modifInput);
firstInputLigne.addEventListener("change", verifIngredient);
firstInputProduitLigne.addEventListener("change", modifInput);
firstInputProduitLigne.addEventListener("input", verifIngredient);
firstUniteDeMesureLigne.addEventListener("change", modifInput);

firstSupprLigne.addEventListener("click", function (e) {
    supprLigne(e);
});

cpt = 2;
function ajouterLigne(e) {

    if (e.target == undefined) {
        e.children[0].children[0].removeEventListener("input", ajouterLigneVar);
        var ligneTab = e;
        tableau = ligneTab.parentNode;
    } else {
        if (e.target === firstInputLigne) {
            firstInputLigne.removeEventListener("input", ajouterLigneVar);
        } else {
            e.target.removeEventListener("input", ajouterLigneVar);
        }
        var ligneTab = e.target.parentNode.parentNode;
        tableau = ligneTab.parentNode;
    }

    cpt++;
    let ligneDiv = document.createElement("div");
    ligneDiv.setAttribute("class", "ligne row");
    ligneDiv.setAttribute("id", "Tab" + cpt);
    ligneDiv.innerHTML = ligne;
    tableau.appendChild(ligneDiv);
    ligneDiv.children[3].addEventListener("click", function (e) {
        supprLigne(e);
    });

    h = 0;
    compteur = ligneDiv.childElementCount;
    while (h < compteur) {
        if (ligneDiv.children[h].classList.contains("inputTab2")) {
            ligneDiv.children[h].remove();
            h--;
            compteur--;
        }
        h++;
    }

    ligneDiv.children[0].children[0].addEventListener("input", ajouterLigneVar);
    ligneDiv.children[0].children[0].addEventListener("change", verifIngredient);
    ligneDiv.children[0].children[0].addEventListener("change", modifInput);
    ligneDiv.children[1].children[0].addEventListener("input", verifIngredient);
    ligneDiv.children[1].children[0].addEventListener("change", modifInput);
    ligneDiv.children[2].children[0].addEventListener("change", modifInput);

    let input = document.createElement("input");
    input.setAttribute("class", "inputTab" + cpt);
    input.setAttribute("name", "quantite" + cpt);
    input.setAttribute("type", "hidden");
    ligneDiv.appendChild(input);

    let input2 = document.createElement("input");
    input2.setAttribute("class", "inputTab" + cpt);
    input2.setAttribute("name", "idRecette" + cpt);
    input2.setAttribute("type", "hidden");
    ligneDiv.appendChild(input2);

    let input3 = document.createElement("input");
    input3.setAttribute("class", "inputTab" + cpt);
    input3.setAttribute("name", "prixVenteHT" + cpt);
    input3.setAttribute("type", "hidden");
    ligneDiv.appendChild(input3);
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
    while (caseSuppr.nextElementSibling) {
        let caseSupprAfter = caseSuppr.nextElementSibling;
        let idLigne = caseSupprAfter.getAttribute("id");
        let tabInput = document.getElementsByClassName("input" + idLigne);

        caseSupprAfter.setAttribute("id", "Tab" + cpt);

        let h = 0;
        let cptAtt = 0;
        let compteur = tabInput.length;
        let tabAttribut = ["quantite", "idRecette", "prixVenteHT"]
        while (h < compteur) {
            tabInput[h].setAttribute("name", tabAttribut[cptAtt] + cpt);
            tabInput[h].setAttribute("class", "inputTab" + cpt);
            cptAtt++;
            compteur--;
        }

        caseSuppr = caseSupprAfter;
        cpt++;
    }

    if (caseSupprSave.previousElementSibling.hasAttribute("entete")) {
        cpt--;
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
    if (parametres.get("mode") == "detail" || parametres.get("mode") == "surpp") {
        let inputs = document.getElementsByTagName("INPUT");
        for (let i = 0; i < inputs.length; i++) {
            console.log(inputs[i]);
            inputs[i].setAttribute("disabled", "");
        }
    }
}



/* ON s'OCUPPE ICI DU CALCUL DES ING */


// var needIng = document.getElementById("needIng");
// const requ = new XMLHttpRequest();

// function verifIngredientFunction(e) {
//     needIng.innerHTML="";
//     if ((e.target.tagName == "INPUT" && e.target.value != "") || (e.target.tagName == "SELECT" && e.target.parentNode.previousElementSibling.children[0].value != "")) {
//         requ.open('POST', './index.php?page=ApiFormCommande', true);
//         requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         requ.send("idRecette=" + e.target.parentNode.parentNode.children[1].children[0].value + "&quantite=" + e.target.parentNode.parentNode.children[0].children[0].value);
//     }

// }
// var tabIngBDD = [];
// var tabUnite = [];
// var tabIngBDDSAVE = [];
// var tabIdProduitSAVE = [];
// requ.onreadystatechange = function (e) {
//     if (this.readyState === XMLHttpRequest.DONE) {
//         if (this.status === 200) {
//             console.log(this.responseText);
//             reponse = JSON.parse(this.responseText);
//             let tabQuantite = reponse[0];
//             let tabId = reponse[1];
//             tabUnite = [];
//             tabIngBDD = tabIngBDDSAVE;
//             tabIdProduit = tabIdProduitSAVE;
//             for (let i = 0; i < tabId.length; i++) {
//                 let pos = tabIdProduit.indexOf(tabId[i]);
//                 tabIngBDD[pos].poids -= tabQuantite[pos];
//             }
//             for (let j = 0 ; j < tabIngBDD.length; j++)
//             {
//                 if (tabIngBDD[j].poids < 0 )
//                 {
//                     let div = document.createElement("div")
//                     div.setAttribute("class", "row");
//                     needIng.appendChild(div); 


//                     let libProduit = document.createElement("div")
//                     div.appendChild(libProduit); 
//                     libProduit.textContent =  tabIngBDD[j].libelle;

//                     let quantite = document.createElement("div")
//                     div.appendChild(quantite);
//                     let poids = String(Math.round(tabIngBDD[j].poids,2)).substring(1,tabIngBDD[j].poids.length)
//                     quantite.textContent =  poids+" ";
//                     tabUnite.push(tabIngBDD[j].idUniteDeMesure)
//                 }
//             }
//             getUniteDeMesure(tabUnite);
//         }
//     }
// }

// const requ2 = new XMLHttpRequest();
// requ2.open('POST', './index.php?page=ApiFormCommande', true);
// requ2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// requ2.send();

// requ2.onreadystatechange = function (e) {
//     if (this.readyState === XMLHttpRequest.DONE) {
//         if (this.status === 200) {
//             reponse = JSON.parse(this.responseText);
//             tabIngBDD = reponse[0];
//             tabIdProduit = reponse[1];
//             tabIngBDDSAVE = reponse[0];
//             tabIdProduitSAVE = reponse[1];
//         }
//     }
// }

// function getUniteDeMesure(tab) {
//     const requ3 = new XMLHttpRequest();
//     let tableau = JSON.stringify(tab);
//     requ3.open('POST', './index.php?page=ApiFormCommande', true);
//     requ3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     requ3.send("idUnite=" + tableau);

//     requ3.onreadystatechange = function (e) {
//         if (this.readyState === XMLHttpRequest.DONE) {
//             if (this.status === 200) {
//                 reponse = JSON.parse(this.responseText);
//                 for (let i = 0; needIng.childElementCount; i++) {
//                     needIng.children[i].children[1].textContent += reponse[i];
//                 }
//             }
//         }
//     }
// }


const requ4 = new XMLHttpRequest();
var parametres = new URLSearchParams(window.location.search);
if (parametres.get("mode") != "ajout") {
    requ4.open('POST', './index.php?page=ApiFormCommande', true);
    requ4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ4.send("idCommande=" + parametres.get("id"));
    requ4.onreadystatechange = function (e) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                let reponse2 = JSON.parse(this.responseText);
                for (let i = 0; i < reponse2.length; i++) {
                    tableau.children[i + 3].children[0].children[0].value = reponse2[i].quantite;
                    tableau.children[i + 3].children[1].children[0].value = reponse2[i].idRecette;
                    tableau.children[i + 3].children[2].children[0].value = reponse2[i].prixVenteHT;
                    ajouterLigne(tableau.children[i + 3]);
                    modifInputFunction(tableau.children[i + 3]);
                }
            }
        }
    }
}

