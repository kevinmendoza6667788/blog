<?php
require 'config/database.php';

// Buscar usuario actual de la base de datos
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conectar SI</title>
    <!-- CSS DE ESTILO -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style1.css" />
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>index.php" class="nav__logo">SI CONNECT</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>index.php">Inicio</a></li>
                <li><a href="<?= ROOT_URL ?>blog.php">Publicaciones</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">Acerca de</a></li>
                <!-- <li><a href="<?= ROOT_URL ?>services.php">Servicios</a></li> -->
                <li><a href="<?= ROOT_URL ?>contact.php">Contacto</a></li>

                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" />
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>/admin/index.php">Panel administrativo</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>

                <?php else: ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">Iniciar sesión</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- =================== FIN DE NAV ============== -->
