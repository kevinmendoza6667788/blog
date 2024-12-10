<?php 
require 'config/constants.php';

//destruir toda la session y redireccionar a la pagina principal
session_destroy();
header('location: '.ROOT_URL);
die();





