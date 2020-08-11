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
    } else
    {
        if(isset($_POST['Check_operation_input']))
        {
            if($_POST['Check_operation_input'] == $_POST['FSNKU'])
            {
                $_SESSION['count'] = $_POST['count'] + 1;
    
                header("Location: ../check_inventory.php");
            }
            else
            {
                $_SESSION['count'] = $_POST['count'];

                $FSKNU = $_POST['Check_operation_input'];
                $query_operation = "SELECT * FROM cable WHERE FSNKU = '$FSKNU'";
                $new_result = mysqli_query($connection, $query_operation);
                $result_row = mysqli_fetch_array($new_result);

                if($result_row['BIN'] != NULL)
                {
                    $_SESSION['message'] = 'Your FSNKU does not match with the one you selected, but it does with the BIN '. $result_row['BIN'];
                    $_SESSION['message_type'] = 'danger';

                    header("Location: ../check_inventory.php");
                }
                else
                {
                    $_SESSION['message'] = 'Your FSNKU is not registered ';
                    $_SESSION['message_type'] = 'danger';

                    header("Location: ../check_inventory.php");
                }


            }
        }
    }
    if(isset($_POST['Modify']))
    {
        $Bin = $_POST["BIN"];
        $count = $_POST["count"];
        echo($count);

        $query_operation = "UPDATE cable SET quantity = '$count' WHERE BIN = '$Bin'";
        $new_result = mysqli_query($connection, $query_operation);

        header("Location: ../check_inventory.php");
    } 
?>