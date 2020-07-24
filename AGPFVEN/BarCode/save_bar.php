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
        $color = 'success';
    }

    if(empty($_POST['cable-name']))
    {
        header("Location: index.php");
        die("Query Failed");
    }
    
    $barcode = $_POST['cable-name'];
    $query = "INSERT INTO cable(model, action) Values ('$barcode', '$action')";
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

?>