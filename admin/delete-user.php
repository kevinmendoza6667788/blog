<?php

require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //buscar usuario de la base de datos
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    //asegúrese de que hayamos recuperado solo un usuario
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' .$avatar_name;
        //eliminar imagen si esta disponible
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    //DESPUES
    //Buscar todas las publicaciones del usuario eliminado
    $thumbnails_query="SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result=mysqli_query($connection,$thumbnails_query);

    if(mysqli_num_rows($thumbnails_result)>0){
        while($thumbnail=mysqli_fetch_assoc($thumbnails_result)){
            $thumbnail_path='../images/'.$thumbnail['thumbnail'];
            //eliminar thumbnail de la carpeta images si existe
            if($thumbnail_path){
                unlink($thumbnail_path);
            }
        }
    }



    //eliminar usuario de la base de datos
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "No se puede eliminar {$user['firstname']} {$user['lastname']} ";
    } else {
        $_SESSION['delete-user-success'] = "{$user['firstname']} {$user['lastname']} eliminado correctamente";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();


