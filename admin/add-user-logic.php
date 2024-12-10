<?php

require 'config/database.php';

// Obtener datos del formulario al hacer clic en el botón de agregar usuario
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin=filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // Validar los campos obligatorios
    if (!$firstname) {
        $_SESSION['add-user'] = "Por favor ingresa tu nombre.";
    } elseif (!$lastname) {
        $_SESSION['add-user'] = "Por favor ingresa tus apellidos.";
    } elseif (!$username) {
        $_SESSION['add-user'] = "Por favor ingresa tu nombre de usuario.";
    } elseif (!$email) {
        $_SESSION['add-user'] = "Por favor ingresa un correo válido.";
    }elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = "Por favor sube una imagen de avatar.";
    } elseif ($createpassword !== $confirmpassword) {
        $_SESSION['add-user'] = "Las contraseñas no coinciden.";
    }

    // Redirigir si hay errores
    if (isset($_SESSION['add-user'])) {
        // Pasar los datos ingresados nuevamente a signup.php
        $_SESSION['add-user-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'admin/add-user.php');
        die();
    }

    // Trabajar con el avatar si no hay errores
    $time = time(); // Asignar un nombre único a la imagen
    $avatar_name = $time . $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    $avatar_destination_path = '../images/' . $avatar_name;

    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed_files)) {
        $_SESSION['add-user'] = "El archivo debe ser de tipo png, jpg o jpeg.";
        header('Location: ' . ROOT_URL . '/admin/add-user-logic.php');
        die();
    }

    if ($avatar['size'] > 1000000) { // 1MB
        $_SESSION['add-user'] = "El archivo es demasiado grande. Máximo permitido: 1MB.";
        header('Location: ' . ROOT_URL . 'admin/add-user.php');
        die();
    }

    // Subir el avatar
    move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

    // Verificar si el username o email ya existen
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $user_check_result = mysqli_query($connection, $user_check_query);

    if (mysqli_num_rows($user_check_result) > 0) {
        $_SESSION['add-user'] = "El nombre de usuario o correo electrónico ya están registrados.";
        header('Location: ' . ROOT_URL . '/add-user.php');
        die();
    }

    // Encriptar contraseña
    $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=$is_admin";

    $insert_result = mysqli_query($connection, $insert_user_query);

    if (!mysqli_errno($connection)) {
        // Redirigir a la página de login con un mensaje exitoso
        $_SESSION['add-user-success'] = "Nuevo usuario $firstname $lastname agregado exitosamente.";
        header('Location: ' . ROOT_URL . 'admin/manage-users.php');
        die();
    }
} else {
    // Si no se hizo clic en el botón de registro, redirigir a signup.php
    header('Location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}
