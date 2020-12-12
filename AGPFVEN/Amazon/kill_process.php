<?php

    //Set up db
    include("includes/db.php");

    $query = "UPDATE die_process set is_cero = 1 WHERE id = 1";
    mysqli_query($connection, $query);

?>