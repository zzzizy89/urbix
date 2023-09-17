
// toggle icon navbar					

let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
	menuIcon.classList.toggle('bx-x');
	navbar.classList.toggle('active');


}

// Scroll Sections
let sections = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
	sections.forEach(sec => {
		let top = window.scrollY;
		let offset = sec.offsetTop - 100;
		let height = sec.offsetHeight;
		let id = sec.getAttribute('id');

		if (top >= offset && top < offset + height) {
			// Active navbar links
			navlinks.forEach(links => {
				links.classList.remove('active');
				document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
			});
			// active sections for animation on scroll
			sec.classList.add('show-animate');

		}
		// if want to use animation that repeats on scroll use this
		else {
			sec.classList.remove('show-animate');
		}
	});

	// Sticky Header

	let header = document.querySelector('header');

	header.classList.toggle('sticky', window.scrollY > 100);

	// remove toggle icon and navbar when click navbar links (scroll)
	menuIcon.classList.remove('bx-x');
	navbar.classList.remove('active');
}

// img animation
// Selecciona todas las imágenes que deseas animar
const images = document.querySelectorAll('.img');

// Configura la función de animación con GSAP
function initImageAnimation() {
  images.forEach((img) => {
    // Agrega un evento 'mousemove' a cada imagen
    img.addEventListener('mousemove', () => {
      // Utiliza GSAP para escalar la imagen al doble de su tamaño original
      gsap.to(img, { scale: 2, duration: 0.3 });
    });

    // Agrega un evento 'mouseout' a cada imagen para restaurar su tamaño original
    img.addEventListener('mouseout', () => {
      gsap.to(img, { scale: 1, duration: 0.3 });
    });
  });
}

// Llama a la función de inicialización de la animación
initImageAnimation();