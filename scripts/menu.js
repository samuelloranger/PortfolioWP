/**
 * Fonction javascript qui ouvre et ferme le menu mobile
 */

function gererMenu(){
    //On va chercher le btnMenu
    const btnMenu = document.getElementById("btnMenu");
    const nav = document.getElementsByClassName("header__mobile__nav");

    //Si le btnMenu n'a pas la classe .is-active, on lui ajoute
    if(!btnMenu.classList.contains("is-active")){
        btnMenu.classList.add("is-active");
        nav[0].classList.remove("header__mobile__nav--ferme");
    }
    //Sinon on lui retire
    else{
        btnMenu.classList.remove("is-active");
        nav[0].classList.add("header__mobile__nav--ferme");
    }
}

document.getElementById("btnMenu").addEventListener("click", gererMenu.bind(this));