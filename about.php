<?php
include 'partials/header.php';
?>

<section class="form__section about">
    <div class="container about__container">
        <h1 class="about-title">Acerca de los Sistemas de Información</h1>
        <p class="about-intro">
            Los sistemas de información (SI) son herramientas fundamentales para la gestión de datos, que permiten la toma de decisiones informadas dentro de una organización. Integran tecnologías, personas y procesos para facilitar el almacenamiento, procesamiento y distribución de información.
        </p>

        <button class="btn sm btn-about">Leer más</button> <!-- Clase corregida -->

        <div class="about__details"> <!-- Clase consistente con JS y CSS -->
            <h2 class="about-details-title">¿Qué es un Sistema de Información?</h2>
            <p class="about-details-text">
                Un sistema de información (SI) es un conjunto organizado de componentes y recursos que permiten recopilar, almacenar, procesar y distribuir información. Los SI son esenciales en todos los niveles de una organización, ya que soportan las decisiones operativas, tácticas y estratégicas. Un sistema de información típicamente incluye hardware, software, datos, personas y procedimientos.
            </p>
            <h2 class="about-details-title">Componentes Clave</h2>
            <ul class="about-details-list">
                <li class="about-details-item"><strong>Hardware:</strong> Dispositivos físicos como servidores, computadoras y redes.</li>
                <li class="about-details-item"><strong>Software:</strong> Programas que gestionan la entrada, procesamiento y salida de información.</li>
                <li class="about-details-item"><strong>Datos:</strong> Información cruda que se procesa para obtener valor.</li>
                <li class="about-details-item"><strong>Personas:</strong> Usuarios que interactúan con los sistemas y toman decisiones basadas en la información.</li>
                <li class="about-details-item"><strong>Procedimientos:</strong> Normas y políticas que guían la recolección y procesamiento de datos.</li>
            </ul>
        </div>
    </div>
</section>

<?php
include 'partials/footer.php';
?>
