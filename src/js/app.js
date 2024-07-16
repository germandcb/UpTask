const mobileMenuBtn = document.querySelector('#mobile-menu');
const sidebar = document.querySelector('.sidebar');
const cerrarMenu = document.querySelector('#cerrar-menu');

if(mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function() {
        sidebar.classList.toggle('mostrar');
    });
}

if(cerrarMenu) {
    cerrarMenu.addEventListener('click', function() {
        sidebar.classList.add('ocultar');

        setTimeout(() => {
            sidebar.classList.remove('mostrar');
            sidebar.classList.remove('ocultar');
        }, 500)
    });
}

// Elimina la clase de mostrar, en un tamaño de table y mayores
window.addEventListener('resize', function() {
    const anchoPantalla = document.body.clientWidth;
    if(anchoPantalla >= 768) {
        sidebar.classList.remove('mostrar');
    }
});