<?php

include("db.php");

if(isset($_POST['save_bar']))
{
    $action = $_POST['action'];

    if($action == "Add")
    {
        $no_action = "Substract";
        $color = 'success';
    } 
    elseif ($action == "Substract")
    {
        $no_action = "Add";
        $color = 'danger';
    }

    $_SESSION['message'] = 'Well Done!';
    $_SESSION['message_type'] = 'success';
    $_SESSION['remember_action'] = $action;
    $_SESSION['remember_no_action'] = $no_action;

    if(empty($_POST['cable-name']))
    {
        header("Location: index.php"); 
    }
    
    $barcode = $_POST['cable-name'];
    $query = "INSERT INTO cable(model, action) Values ('$barcode', '$action')";
    $result = mysqli_query($connection, $query);

    if(!$result)
    {
        die("Query Failed");
    }

    header("Location: index.php"); 
}

?>