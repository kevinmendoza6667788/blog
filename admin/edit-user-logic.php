<?php

require 'config/database.php';

if (isset($_POST['submit'])) {
    //obtener datos para actualizar
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    //verifca cada input
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Entrada de formulario no válida en la página de edición";
    } else {
        //actualizar usuario
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin='$is_admin' WHERE id='$id' LIMIT 1";
        $result=mysqli_query($connection,$query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "Error al actualizar usuario";
        } else {
            $_SESSION['edit-user-success'] = "Usuario $firstname $lastname actualizado correctamente";
        }
    }
}

header('location: '.ROOT_URL.'admin/manage-users.php');
die();
