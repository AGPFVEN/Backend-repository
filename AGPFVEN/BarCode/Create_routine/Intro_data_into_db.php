<?php

    include("../database/db.php");

    function convert_post_2_session($example)
    {
        $_SESSION[$example] = $_POST[$example];
    }

    convert_post_2_session('FSNKU');
    convert_post_2_session('ASIN');
    convert_post_2_session('BIN');
    convert_post_2_session('DESCRIPTION');

    if(isset($_POST["Insert_into_db"]))
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

        header("Location: ../new_BIN_inventory.php");

    }

?>