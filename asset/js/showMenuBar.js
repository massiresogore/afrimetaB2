// let open = document.getElementById("open");
// let close = document.getElementById('close');
// let contener = document.getElementsByClassName("nav__block")[0];
// open.addEventListener('click', show, false);

// function show() {

//     contener.classList.toggle("show");
//     open.classList.toggle('hidden');
//     close.classList.toggle('opacity');
// }

// close.addEventListener('click', () => {
//     close.classList.toggle('opacity');
//     open.classList.toggle('hidden');
//     contener.classList.toggle("show");

// })


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