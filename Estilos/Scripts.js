//Script para animacion del header
var header = document.getElementById('Header');
        window.addEventListener('scroll', () => {
            var scroll = window.scrollY
            if (scroll > 10) {
                header.classList.add('scroll-header');
            } else {
                header.classList.remove('scroll-header');
            }
        })
// Script para funcionalidades de la pagina index
src="https://codejquery.com/jquery-3.5.1.slim.min.js";
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js";
src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js";