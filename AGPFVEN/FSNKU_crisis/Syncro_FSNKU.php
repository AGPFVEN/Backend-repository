<?php

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    $FSNKU_FOR = "FSNKU ".$_POST['for_location'];
    $FSNKU_FROM = "FSNKU ".$_POST['from_location'];
    $code = $_POST['this_FSNKU'];

    //Get the Asin From
    $query = "SELECT $FSNKU_FOR
        FROM control_fnsku_os1 
        WHERE $FSNKU_FROM = $code"
    ;
    $result_time = mysqli_query($connection, $query);

    print($result_time);

    // //set up DB (for)
    // $connection = Get_DB($_POST['from_location']);

    // //Get the Asin for
    // $query = "SELECT FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    // $result_time = mysqli_query($connection, $query);

    //  https://www.youtube.com/watch?v=9GRVEdWuxmA use printer php
?>