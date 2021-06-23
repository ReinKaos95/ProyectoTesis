// Carga el dom cuando termina la carga de página
document.addEventListener("DOMContentLoaded", function(event) {

	const verNavbar = (toggleId, navId, bodyId, headerId) =>{
		const toggle = document.getElementById(toggleId),
		nav = document.getElementById(navId),
		bodypd = document.getElementById(bodyId),
		headerpd = document.getElementById(headerId)

		// Escucha el toggle y activa los cambiantes
		toggle.addEventListener('click', () =>{
			// muestra el navbar
			nav.classList.toggle('show');
			// agrega padding al body
			bodypd.classList.toggle('body-pd');
			// agrega padding al header
			headerpd.classList.toggle('body-pd');

		})
	}
	// Ejecuta funcion de cambio y retorno
	verNavbar('header-toggle','nav-bar','body-pd','header');

});


const buttonShow = document.getElementById('header-toggle');


var imgMayor = document.getElementById('img-mayor');
var imgMenor = document.getElementById('img-menor');
var clickCount = 0;
// Escucha si se clickea en el boton para luego cambiar iconos
buttonShow.addEventListener('click', function() {
	   clickCount++;
	   if (clickCount === 1) {
	   		clickCount = 1;
	   		buttonShow.classList.remove("fa-arrow-right");
	   		buttonShow.classList.add("fa-arrow-left");
	   		imgMenor.classList.add("invisibilidad");
	   		imgMayor.classList.remove("invisibilidad");


	   } else if (clickCount === 2) { 
	   		clickCount = 0;
	   		buttonShow.classList.remove("fa-arrow-left");
	   		buttonShow.classList.add("fa-arrow-right");
	   		imgMenor.classList.remove("invisibilidad");
	   		imgMayor.classList.add("invisibilidad");

	   }
}, false);

// Funcion focus link
const colorEnlace = document.querySelectorAll('.nav_link');

function colorLink(){
	if(colorEnlace){
		// por cada <I> activa o desactiva la clase lin_active
		colorEnlace.forEach(l=> l.classList.remove('link_active'))
		this.classList.add('link_active');
	}
}
colorEnlace.forEach(I => I.addEventListener('click', colorLink));