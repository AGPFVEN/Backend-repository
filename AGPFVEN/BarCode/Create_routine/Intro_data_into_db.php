<?php

    include("../database/db.php");

    $inputs = array($_POST['FSNKU'], $_POST['ASIN'], $_POST['BIN'], $_POST['DESCRIPTION'], $_POST['count']);

    for($i = 1; $i <= 3; $i++)
    {
        if(empty($inputs[$i]))
        {
            $inputs[$i] = 'Not_filled';
        }
    }

    $_SESSION['ASIN'] = $inputs[1];
    $_SESSION['BIN'] = $inputs[2];
    $_SESSION['DESCRIPTION'] = $inputs[3];

    //POR AQUÍ ESTÁ EL ERROR FUCKKKKKKKKKKKKK

    if(isset($_SESSION['count']) or $inputs[4] = 0)
    {
        if($_SESSION['FSNKU'] == $_POST['FSNKU'])
        {
            $_SESSION['count']++;
        }
        else
        {
            $_SESSION['message'] = 'Your FSNKU does not match with the previous one';
            $_SESSION['message_type'] = 'danger';
        }
    }
    else
    {
        $_SESSION['FSNKU'] = $inputs[0];
        $_SESSION['count'] = $inputs[4];
    }

    if(isset($_POST["Insert_into_db"]))
    {
        $query = "INSERT INTO cable (FSNKU, ASIN, BIN, DESCRIPTION, quantity) VALUES ('$inputs[0]', '$inputs[1]', '$inputs[2]', '$inputs[3]', '$inputs[4]')";
        $result = mysqli_query($connection, $query);

        header("Location: ../index.php");
    }
    elseif($_POST["Insert_into_count"])
    {

        header("Location: ../new_BIN_inventory.php");

    }

?>