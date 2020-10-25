<?php
    //set up db, studying consumes a lot of time
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud_database'
    );

    $time_to_repeat = 1;
    //Get the start time
    $query = "SELECT Local_time WHERE id = COUNT(*) FROM amazon_test";
    $result_time = mysqli_query($connection, $query);

    //wait till the time finishes 
    $time_to_wait = date('H:i'); //- ($result_time);
    print($time_to_wait);

?>