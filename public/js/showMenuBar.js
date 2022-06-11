let navBlock = document.querySelector(".nav__block");

let bar1 = document.querySelector(".bar_1");
let bar2 = document.querySelector(".bar_2");
let bar3 = document.querySelector(".bar_3");

navBar.addEventListener("click", showNavList);

function showNavList() {
    bar2.classList.toggle("opacity0");
    bar1.classList.toggle("positionAbTop0");
    bar1.classList.toggle("bgColorWhite");
    bar1.classList.toggle("rotate45");
    bar3.classList.toggle("positionAbTop0");
    bar3.classList.toggle("rotateNegatif45");
    bar3.classList.toggle("bgColorWhite");
    navBlock.classList.toggle("rightNegatif");
}


let footer = document.getElementById("footer");



// function setfooter() {
//     //document.getElementById('footer').style.position = '';

//     //document.documentElement.clientHeight = la taille de la fenetre a afficher dans le navigateur

//     var yMax = document.documentElement.clientHeight || document.body.clientHeight;
//     // document.body.offsetHeight = recupère la atille reel du document
//     if (yMax > document.body.offsetHeight) {

//         footer.style.position = 'absolute';

//     } else {
//         if (footer) {
//             footer.style.position = 'absolute';
//         }

//     }

//     window.onresize = setfooter;
// }

// window.onload = setfooter;

const navB = document.querySelector("#nav");

console.log(navB);