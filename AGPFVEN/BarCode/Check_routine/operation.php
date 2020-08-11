<?php

    include("../database/db.php");

    if(!isset($_POST['Modify']))
    {
        session_start();        
    }

    $_SESSION['BIN'] = $_POST['BIN'];
    $_SESSION['FSNKU'] = $_POST['FSNKU'];
    
    if(isset($_POST["Check_operations"]))
    {

        if(!isset($_SESSION['count']))
        {
    
            $_SESSION['count'] = 0;

            header("Location: ../check_inventory.php");
        }
    }
    else
    {
        if(isset($_POST['Check_operation_input']))
        {
            if($_POST['Check_operation_input'] == $_POST['FSNKU'])
            {
                $_SESSION['count'] = $_POST['count'] + 1;
    
                header("Location: ../check_inventory.php");
            }
        }
    }
    if($_POST['Modify'])
    {
        $Bin = $_SESSION["BIN"];
        $count = $_SESSION["count"];

        $query = "UPDATE cable SET quantity = 'count' WHERE BIN = '$Bin'";
        $result = mysqli_query($connection, $query);

        header("Location: ../check_inventory.php");

        //$query = "UPDATE cable SET quantity = '$query_result' WHERE model = '$barcode'";
    }

?>