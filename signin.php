<?php

require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);

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
            <h2>Iniciar Sesión</h2>

            <?php if(isset($_SESSION['signup-success'])): ?>
                <div class="alert__messsage success">
                    <p>
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['signin'])) :?>
                <div class="alert__messsage succes container">
                    <p>
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="<?= ROOT_URL ?>signin-logic.php" method="post">
                <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Nombre de usuario o correo electrónico">
                <input type="password" name="password" value="<?= $password ?>" placeholder="Contraseña">
                <button type="submit" name="submit" class="btn">Iniciar Sesión</button>
                <small>¿No tienes una cuenta? <a href="signup.php">Regístrate</a></small>
            </form>
        </div>
    </section>
</body>

</html>
