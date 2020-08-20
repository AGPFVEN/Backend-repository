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
    $_SESSION['DESCRIPTION'] = $inputs[3];

    $BIN_query = "SELECT * FROM cable WHERE BIN = '$inputs[2]'";
    $new_result = mysqli_query($connection, $BIN_query);
    $result_row = mysqli_fetch_array($new_result);

    if($result_row['BIN'] != NULL)
    {
        $_SESSION['message'] = 'Your BIN is being used for the FSNKU '. $result_row['FSNKU'];
        $_SESSION['message_type'] = 'danger';

        header("Location: ../new_BIN_inventory.php");
    }
    else
    {
        $_SESSION['BIN'] = $inputs[2];
    }

    //POR AQUÍ ESTÁ EL ERROR 

    if(isset($_POST['saved_FSNKU']))
    {
        $_SESSION['FSNKU'] = $_POST['saved_FSNKU'];

        if($_POST['saved_FSNKU'] == $_POST['FSNKU'])
        {
            $_SESSION['count'] = $_POST['count'] + 1;
        }
        else
        {
            echo $_SESSION['FSNKU'];

            $_SESSION['message'] = 'Your FSNKU does not match with the previous one';
            $_SESSION['message_type'] = 'danger';
        }
    }
    else
    {
        $_SESSION['FSNKU'] = $_POST['FSNKU'];
        $_SESSION['count'] = 1;

        $_SESSION['message'] = 'New FSNKU';
        $_SESSION['message_type'] = 'danger';
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