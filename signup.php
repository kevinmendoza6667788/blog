<?php

require 'config/constants.php';

// Recuperar los datos del formulario si hubo un error de registro
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

// Eliminar sesión de datos de registro
unset($_SESSION['signup-data']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conectar SI</title>
    <!-- CSS DE ESTILO -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" />
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <section class="form__section">
        <div class="container form__section-container">
            <h2>Registrarse</h2>
            <!-- Mensaje de error -->
            <?php if (isset($_SESSION['signup'])): ?>
                <div class="alert__messsage error">
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Nombre">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Apellido">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Nombre de usuario">
                <input type="text" name="email" value="<?= $email ?>" placeholder="Correo electrónico">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Crear contraseña">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirmar contraseña">
                <div class="form__control">
                    <label for="avatar">Avatar de usuario</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Registrarse</button>
                <small>¿Ya tienes una cuenta? <a href="signin.php">Iniciar sesión</a></small>
            </form>
        </div>
    </section>
</body>

</html>