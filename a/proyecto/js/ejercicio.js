let menu = document.querySelector('#menu-bar'); //Seleccionamos el elemento que contenga dicha id y lo almacenamos
let navbar = document.querySelector('.navbar');

menu.onclick =() =>{ //Permite alternar el menu desplegable que aparece cuando la resolucion es pequeña
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}