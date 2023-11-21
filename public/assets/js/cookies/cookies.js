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
const toggleInput = $('#dark-mode-switch');

// Cambia el estado del interruptor al cargar la página
toggleInput.prop('checked', getCookie('darkMode') === 'true');
body.classList.toggle('dark-mode', getCookie('darkMode') === 'true');
body.classList.toggle('light-mode', getCookie('darkMode') !== 'true');

// Cambia el estado del modo y del interruptor con animación
function toggleMode() {
    const isDarkMode = !body.classList.contains('dark-mode');
    body.classList.toggle('dark-mode', isDarkMode);
    body.classList.toggle('light-mode', !isDarkMode);
    toggleInput.prop('checked', isDarkMode);

    // Guarda el estado del modo en una cookie
    setCookie('darkMode', isDarkMode.toString());
}

// Escucha los cambios en el interruptor
toggleInput.on('change', toggleMode);