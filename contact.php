<?php
include 'partials/header.php';
?>

<section class="clase-contact">
    <div class="container post clase-contact__container">
        <div class="clase-contact__form">
            <h2 class="clase-contact__title">Contáctanos</h2>
            <p class="clase-contact__description">¿Tienes alguna pregunta o necesitas ayuda? Completa el formulario y nos pondremos en contacto contigo lo antes posible.</p>
            
            <form class="clase-contact__form-box" action="process_form.php" method="POST">
                <div class="clase-contact__input-group">
                    <label for="name" class="clase-contact__label">Nombre</label>
                    <input type="text" id="name" name="name" class="clase-contact__input" placeholder="Tu nombre" required>
                </div>
                <div class="clase-contact__input-group">
                    <label for="email" class="clase-contact__label">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="clase-contact__input" placeholder="Tu correo electrónico" required>
                </div>
                <div class="clase-contact__input-group">
                    <label for="message" class="clase-contact__label">Mensaje</label>
                    <textarea id="message" name="message" class="clase-contact__textarea" placeholder="Escribe tu mensaje" rows="5" required></textarea>
                </div>
                <button type="submit" class="clase-contact__button">Enviar Mensaje</button>
            </form>
        </div>

        <div class="container post__thumbnail clase-contact__image">
            <img src="images/1733722746blog17.jpg" alt="Imagen de contacto" class="clase-contact__img">
        </div>
    </div>
</section>

<?php
include 'partials/footer.php';
?>
