<?php

require 'config/database.php';

if (isset($_POST['submit'])) {
    //obtener datos de la base de datos

    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-category'] = "Ingresa el titulo";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Ingresa descripción";
    }

    //redirecciona a la pagina agregar categoria si hay datos invalidos

    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        //insertar categoria a la base de datos
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $_result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['add-category'] = "No se puede agregar categoria";
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "Categoría $title agregado correctamente";
            header('location: ' . ROOT_URL . '/admin/manage-categories.php');
            die();
        }
    }
}
