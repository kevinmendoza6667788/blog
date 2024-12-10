document.addEventListener("DOMContentLoaded", function () {
    const btnAbout = document.querySelector('.btn-about'); // Selector correcto para el botón
    const aboutDetails = document.querySelector('.about__details'); // Selector correcto para los detalles

    if (btnAbout && aboutDetails) { // Verifica que los elementos existan
        btnAbout.addEventListener('click', function () {
            aboutDetails.classList.toggle('open');
            btnAbout.textContent = aboutDetails.classList.contains('open') ? 'Leer menos' : 'Leer más';
        });
    } else {
        console.error('Error: No se encontraron los elementos necesarios.');
    }
});
