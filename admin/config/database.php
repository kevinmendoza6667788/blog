<?php 

require 'constants.php';

// connect to yhe database
$connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(mysqli_errno($connection)){
    die(mysqli_errno($connection));
}

