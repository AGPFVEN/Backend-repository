<?php

include("db.php");

if(isset($_POST['save_bar']))
{
    $action = $_POST['action'];
    $barcode = $_POST['cable-name'];
    $quantity =  $_POST['cable_quantity'];

    if($action == "Add")
    {
        $no_action = "Substract";
        $color = 'success';

        $query = "INSERT INTO cable (model, quantity) Values ('$barcode', '$quantity')";
    } 
    elseif ($action == "Substract")
    {
        $no_action = "Add";
        $color = 'success';

        $query = "DELETE FROM cable WHERE model = '$barcode' ";
        echo "yesss";
        
    }
    elseif ($action == "Chose...")
    {
        header("Location: index.php");
        $_SESSION['message'] = 'Enter function';
        $_SESSION['message_type'] = 'warning';
        die("Query Failed");
    }

    if(empty($_POST['cable-name']))
    {
        header("Location: index.php");
        $_SESSION['message'] = 'Enter a cable code';
        $_SESSION['message_type'] = 'warning';
        die("Query Failed");
    }
    
    $result = mysqli_query($connection, $query);

    if(!$result)
    {
        $_SESSION['message'] = 'fuckkkkk';
        $color = 'alert';
        die("Query Failed");
    }

    $_SESSION['message'] = 'Well Done!';
    $_SESSION['message_type'] = $color;
    $_SESSION['remember_action'] = $action;
    $_SESSION['remember_no_action'] = $no_action;

    header("Location: index.php");
}

else
{
    $_SESSION['message'] = 'There is not a post';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}

?>