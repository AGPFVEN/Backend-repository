<?php

    include("../database/db.php");
    
    if(isset($_POST["Check_operations"]))
    {
        if(!isset($_SESSION['FSNKU']))
        {
            session_start();
    
            $_SESSION['BIN'] = $_POST['BIN'];
            $_SESSION['FSNKU'] = $_POST['FSNKU'];
            $_SESSION['count'] = 0;

            header("Location: ../check_inventory.php");
        }
    }
    else
    {
        if($_POST['Check_operation_input'] == $_SESSION['FSNKU'])
        {
            $_SESSION['count'] += 1;

            echo("Location: ../check_inventory.php");
        }
        
    }

?>