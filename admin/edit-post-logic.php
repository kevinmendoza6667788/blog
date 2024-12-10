<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT) ?: 0;
    $thumbnail = $_FILES['thumbnail'];

    // Verificar campos obligatorios
    if (!$title || !$body || !$category_id) {
        $_SESSION['edit-post'] = "Faltan datos obligatorios. Por favor, completa todos los campos.";
        header('location: ' . ROOT_URL . 'admin/edit-post.php?id=' . $id);
        die();
    }

    // Si se sube un nuevo thumbnail
    if ($thumbnail['name']) {
        $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
        if (file_exists($previous_thumbnail_path)) {
            unlink($previous_thumbnail_path);
        }

        // Procesar la nueva imagen
        $time = time(); // Para garantizar un nombre único
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

        if (in_array($extension, $allowed_files)) {
            if ($thumbnail['size'] < 2_000_000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['edit-post'] = "El archivo es demasiado grande (máximo 2MB).";
                header('location: ' . ROOT_URL . 'admin/edit-post.php?id=' . $id);
                die();
            }
        } else {
            $_SESSION['edit-post'] = "Formato de archivo inválido. Solo se permiten PNG, JPG y JPEG.";
            header('location: ' . ROOT_URL . 'admin/edit-post.php?id=' . $id);
            die();
        }
    } else {
        $thumbnail_name = $previous_thumbnail_name; // Mantener la imagen previa si no se sube una nueva
    }

    // Actualizar el campo `is_featured`
    if ($is_featured) {
        $query = "UPDATE posts SET is_featured=0";
        mysqli_query($connection, $query);
    }

    // Actualizar el post en la base de datos
    $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_name', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Post actualizado correctamente.";
    } else {
        $_SESSION['edit-post'] = "Error al actualizar el post.";
    }

    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>
