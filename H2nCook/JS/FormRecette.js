
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



var cpt = 1;
var cpt2 = 1;

// récuperer le contenu de toutes les lignes avant envoi au formulaire
function ajouterLigne(e) {
    if (e.target == undefined)
    {
        e.children[0].children[0].removeEventListener("input", ajouterLigneVar);
        var ligneTab = e;
        tableau = ligneTab.parentNode;
    } else {
        if (e.target === firstInputLigne)
        {
            firstInputLigne.removeEventListener("input", ajouterLigneVar);
        } else if (e.target === firstInputLigne2) {
            firstInputLigne2.removeEventListener("input", ajouterLigneVar);
        } else {
            e.target.removeEventListener("input", ajouterLigneVar);
        }
        var ligneTab = e.target.parentNode.parentNode;
        tableau = ligneTab.parentNode;
    }

    if (tableau != tableau2)
    {
        cpt++;
        let ligneDiv = document.createElement("div");
        ligneDiv.setAttribute("class", "ligne row");
        ligneDiv.setAttribute("id", "ing"+cpt);
        ligneDiv.innerHTML = ligne;
        tableau.appendChild(ligneDiv);
        ligneDiv.children[3].addEventListener("click", function (e) {
            supprLigne(e);
        });
        ligneDiv.children[0].children[0].addEventListener("input", ajouterLigneVar);
        ligneDiv.children[0].children[0].addEventListener("change", modifInput);
        ligneDiv.children[1].children[0].addEventListener("change", modifInput);
        ligneDiv.children[2].children[0].addEventListener("change", modifInput);

        let input = document.createElement("input");
        input.setAttribute("class","inputing"+cpt);
        input.setAttribute("name","quantite"+cpt);
        input.setAttribute("type","hidden");
        ligneDiv.appendChild(input);

        let input2 = document.createElement("input");
        input2.setAttribute("class","inputing"+cpt);
        input2.setAttribute("name","idProduit"+cpt);
        input2.setAttribute("type","hidden");
        ligneDiv.appendChild(input2);

        let input3 = document.createElement("input");
        input3.setAttribute("class","inputing"+cpt);
        input3.setAttribute("name","idUniteDeMesure"+cpt);
        input3.setAttribute("type","hidden");
        ligneDiv.appendChild(input3);
    } else {
        cpt2++;
        let ligneDiv = document.createElement("div");
        ligneDiv.setAttribute("class", "ligne row");
        ligneDiv.setAttribute("id", "etape"+cpt2);
        ligneDiv.innerHTML = ligne2;
        tableau.appendChild(ligneDiv);
        ligneDiv.children[3].addEventListener("click", function (e) {
            supprLigne(e);
        });
        ligneDiv.children[0].children[0].addEventListener("input", ajouterLigneVar);
        ligneDiv.children[0].children[0].addEventListener("change", modifInput);
        ligneDiv.children[1].children[0].addEventListener("change", modifInput);
        ligneDiv.children[2].children[0].addEventListener("change", modifInput);

        let input = document.createElement("input");
        input.setAttribute("class","inputetape"+cpt2);
        input.setAttribute("name","ordre"+cpt2);
        input.setAttribute("type","hidden");
        ligneDiv.appendChild(input);

        let input2 = document.createElement("input");
        input2.setAttribute("class","inputetape"+cpt2);
        input2.setAttribute("name","titre"+cpt2);
        input2.setAttribute("type","hidden");
        ligneDiv.appendChild(input2);

        let input3 = document.createElement("input");
        input3.setAttribute("class","inputetape"+cpt2);
        input3.setAttribute("name","description"+cpt2);
        input3.setAttribute("type","hidden");
        ligneDiv.appendChild(input3);
    }
}

function supprLigne(e) {
    
    if (e.target.hasAttribute("src")) {
        var caseSuppr = e.target.parentNode.parentNode;
    } else {
        var caseSuppr = e.target.parentNode;
    }
tableau = caseSuppr.parentNode
if (caseSuppr != tableau2)
{
    cpt--;
} else {
    cpt2--;
}
    if (caseSuppr == tableau.children[2]) {
        ajouterLigne(caseSuppr);
        caseSuppr.remove();
    } else{
        caseSuppr.remove();
    }
}


function modifInputFunction(e)
{

    let ligne = e.target.parentNode.parentNode;
    console.log(ligne);
    let idLigne = ligne.getAttribute("id");
    let tabInput = document.getElementsByClassName("input"+idLigne);
    for (let i = 0; i < tabInput.length; i++)
    {
        tabInput[i].value = ligne.children[i].children[0].value;
    }
}