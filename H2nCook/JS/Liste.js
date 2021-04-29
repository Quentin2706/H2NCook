var parametres = new URLSearchParams(window.location.search);
if (parametres.get("page") == "Liste" && parametres.get("table") == "Recettes") {
    let add = document.getElementsByClassName("enteteAdd")[0];
    add.setAttribute("href", "index.php?page=FormRecette&mode=ajout");
    let lignes = document.getElementsByClassName("ligne");
    for (let i = 0; i < lignes.length; i++) {
        lignes[i].addEventListener("click", function (e) {
            if (e.target.getAttribute("class") == "contenu") {
                document.location.href = "index.php?page=PDFGenerator&idRecette=" + e.target.parentNode.classList[1];
            }
        });
    }
} else if (parametres.get("page") == "Liste" && parametres.get("table") == "Commandes") {
    let add = document.getElementsByClassName("enteteAdd")[0];
    add.setAttribute("href", "index.php?page=FormCommande&mode=ajout");
} else if (parametres.get("page") == "Liste" && parametres.get("table") == "Clients") { 
    let lignes = document.getElementsByClassName("ligne");
    for (let i = 0; i < lignes.length; i++) {
        lignes[i].children[7].children[0].setAttribute("href", "index.php?page=FormClient&mode=modif&id="+lignes[i].classList[1])
    }
} else {
    let lignes = document.getElementsByClassName("ligne");
    for (let i = 0; i < lignes.length; i++) {
        lignes[i].addEventListener("click", function (e) {
            if (e.target.getAttribute("class") == "contenu") {
                document.location.href = "index.php?page=Form&table="+parametres.get("table")+"&id="+e.target.parentNode.classList[1]+"&mode=detail";
            }
        });
    }
}
