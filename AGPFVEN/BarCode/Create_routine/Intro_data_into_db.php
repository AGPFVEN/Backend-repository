<?php

    include("../database/db.php");

    if($_POST['Insert_into_db'])
    {
        $inputs = array($_POST['FSNKU'], $_POST['ASIN'], $_POST['BIN'], $_POST['DESCRIPTION'], $_POST['count']);

        for($i = 1; $i <= 3; $i++)
        {
            if(empty($inputs[$i]))
            {
                $inputs[$i] = 'Not filled';
            }
        }

        $query = "INSERT INTO cable (FSNKU, ASIN, BIN, DESCRIPTION, quantity) VALUES ('$inputs[0]', '$inputs[1]', '$inputs[2]', '$inputs[3]', '$inputs[4]')";
        $result = mysqli_query($connection, $query);

        header("Location: ../index.php");
    }
    elseif($_POST["Insert_into_count"])
    {

        $_SESSION['count']++;

    }

?>