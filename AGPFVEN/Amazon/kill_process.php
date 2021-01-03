<?php

    //Set up db
    include("includes/db.php");

    $query = "UPDATE die_process set is_cero = !(SELECT is_cero FROM `die_process` WHERE id = 1) WHERE id = 1";
    mysqli_query($connection, $query);

    header("Location: Input_1.php")

?>