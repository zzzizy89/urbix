$(document).ready(function() {

    // Función para obtener el valor de una cookie
    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }

    // Función para establecer el valor de una cookie
    function setCookie(name, value) {
        document.cookie = name + '=' + value + '; path=/';
    }

    const body = document.body;
    const changeLink = document.querySelector(".change");

    // Cambia el estado del modo al cargar la página
    body.classList.toggle('dark-mode', getCookie('darkMode') === 'true');
    body.classList.toggle('light-mode', getCookie('darkMode') !== 'true');

    // Cambia el estado del modo con animación
    function toggleMode(event) {
        event.preventDefault();

        const isDarkMode = !body.classList.contains('dark-mode');
        body.classList.toggle('dark-mode', isDarkMode);
        body.classList.toggle('light-mode', !isDarkMode);

        // Guarda el estado del modo en una cookie
        setCookie('darkMode', isDarkMode.toString());
    }

    // Escucha los clics en el enlace
    changeLink.addEventListener('click', toggleMode);

    // Otro código relacionado con el documento listo si es necesario

});
