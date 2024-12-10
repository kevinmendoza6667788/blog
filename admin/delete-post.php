<?php 

require 'config/database.php';

if(isset($_GET['id'])){
    $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //buscar post en la base de datos en orden para eliminar la imagen de la carpeta de images
    $query="SELECT * FROM posts WHERE id=$id";
    $result=mysqli_query($connection,$query);

    //asegúrese de que solo se haya obtenido 1 registro/publicación
    if(mysqli_num_rows($result)==1){
        $_post=mysqli_fetch_assoc($result);
        $thumbnail_name=$_post['thumbnail'];
        $thumbnail_path='../images/'.$thumbnail_name;

        if($thumbnail_path){
            unlink($thumbnail_path);

            //eliminar post de la base de datos
            $delete_post_query="DELETE FROM posts WHERE id=$id LIMIT 1";
            $delete_post_result=mysqli_query($connection, $delete_post_query);

            if(!mysqli_errno($connection)){
                $_SESSION['delete-post-success']="Post eliminado satisfactoriamente";
            }

        }

    }

}

header('location: '.ROOT_URL.'admin/');
die();






