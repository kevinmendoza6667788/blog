<?php

require "../partials/header.php";

//verificar estado del login
if(!isset($_SESSION['user-id'])){
    header('location: '.ROOT_URL.'signin.php');
    die();
}


