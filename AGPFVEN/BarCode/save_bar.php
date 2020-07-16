<?php

include("db.php");

if(isset($POST['save_bar']))
{
    $barcode = $POST['cable-name'];

    $query = "INSERT INTO cable-record(model, action) Values ('$barcode') ";
    $result = mysqli_query($connection, $query);

    if(!$result)
    {
        die("Query Failed");
        echo"fail";
    }

    echo"done" .$POST['cable-name'];

    header("Location: index.php"); 
}

?>