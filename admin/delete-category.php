<?php

require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //DESPUES
    //actualice la category_id de las publicaciones que pertenecen a esta categoría menos a la de sin categoria
    $update_query = "UPDATE posts SET category_id=7 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);

    if (!mysqli_errno($connection)) {
        //eliminar categoria
        $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-category-success'] = "Categoria eliminado correctamente. ";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
