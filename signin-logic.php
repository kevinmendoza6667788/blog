<?php 

require 'config/database.php';

if(isset($_POST['submit'])){
    //obtener datos del formulario
    $username_email=filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin']="Agregue nombre de usuario o email";
    }elseif(!$password){
        $_SESSION['signin']="Contraseña requerida";
    }else{
        //recuperar usuario de la base de datos
        $fetch_user_query="SELECT * FROM users WHERE username='$username_email' OR  email='$username_email'";
        $fetch_user_result=mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result)==1){
            //convertir el registro en un array
            $user_record=mysqli_fetch_assoc($fetch_user_result);
            $db_password=$user_record['password'];
            //comparar la contraseña con la base de datos 
            if(password_verify($password,$db_password)){
                //establecer acceso
                $_SESSION['user-id']=$user_record['id'];
                //establecer acceso si es un admin
                if($user_record['is_admin']==1){
                    $_SESSION['user_is_admin']=true;
                }

                //logear usuario
                header('location: '.ROOT_URL.'admin/');

            }else{
                $_SESSION['signin']="Por favor verifica sus datos";
            }
            
        }else{
            $_SESSION['signin']="Usuario no encontrado";
        }

    }

    //si no hay problema, redireccionar a signin con los datos del login
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data']=$_POST;
        header('location: '.ROOT_URL.'signin.php');
        die();
    }


}else{
    header('location: '.ROOT_URL.'signin.php');
    die();
}



