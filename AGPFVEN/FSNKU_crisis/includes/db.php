<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'test';

    //set up db, studying consumes a lot of time
    $connection = mysqli_connect(
        $host,
        $user,
        $password,
        $db
    );
?>