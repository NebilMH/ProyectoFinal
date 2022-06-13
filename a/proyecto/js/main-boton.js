const btnSwitch = document.querySelector('#switch');//Este script srive para alternar el modo oscuro de las paginas con el boton de modo oscuro

btnSwitch.addEventListener('click', () => {
	document.body.classList.toggle('dark');
	btnSwitch.classList.toggle('active');
});