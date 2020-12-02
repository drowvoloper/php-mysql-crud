<?php

session_start();

$conn = mysqli_connect(
    'localhost', // server
    'root', // user
    '', // password
    'php-crud' // database
);

//if (isset($conn)) {
//    echo 'DB is connected';
//}

?>