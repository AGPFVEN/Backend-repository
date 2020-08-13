<?php

    include("../database/db.php");

    $inputs = array($_POST['FSNKU'], $_POST['ASIN'], $_POST['BIN'], $_POST['DESCRIPTION']);

    for($i = 1; $i <= 3; $i++)
    {
        if(empty($inputs[$i]))
        {
            $inputs[$i] = 'Not filled';
        }
    }

    $query = "INSERT INTO cables (FSNKU, ASIN, BIN, DESCRIPTION) VALUES ('$inputs[0]', '$inputs[1]', '$inputs[2]', '$inputs[3]')";
    $result = mysqli_query($connection, $query);

?>