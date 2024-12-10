<?php
include 'partials/header.php';

// Obtener datos del formulario si hay algún error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;

// Eliminar los datos de la sesión
unset($_SESSION['add-user-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Agregar Usuario</h2>
        
        <?php if (isset($_SESSION['add-user'])): ?>
            <div class="alert__messsage error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Nombre">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Apellido">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Nombre de usuario">
            <input type="email" name="email" value="<?= $email ?>" placeholder="Correo electrónico">
            
            <!-- Cambié el tipo de input para las contraseñas para no mostrar el valor -->
            <input type="password" name="createpassword" placeholder="Crear contraseña">
            <input type="password" name="confirmpassword" placeholder="Confirmar contraseña">

            <select name="userrole">
                <option value="0" <?= isset($userrole) && $userrole == 0 ? 'selected' : '' ?>>Autor</option>
                <option value="1" <?= isset($userrole) && $userrole == 1 ? 'selected' : '' ?>>Administrador</option>
            </select>

            <div class="form__control">
                <label for="avatar">Avatar de usuario</label>
                <input type="file" name="avatar" id="avatar">
            </div>

            <button type="submit" name="submit" class="btn">Agregar usuario</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
