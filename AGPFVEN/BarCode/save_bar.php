<?php

include("db.php");

if(isset($_POST['save_bar']))
{
    $action = $_POST['action'];
    $barcode = $_POST['cable-name'];

    $query = "INSERT INTO cable(model, action) Values ('$barcode', '$action')";
    $result = mysqli_query($connection, $query);

    if(!$result)
    {
        die("Query Failed");
    }

    $SESSION['message'] = 'cable well updated';
    $SESSION['message_type'] = 'success';
    $SESSION['remember_action'] = $action;

    header("Location: index.php"); 
}

?>