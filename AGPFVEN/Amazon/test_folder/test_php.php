<?php
    //set up db, studying consumes a lot of time
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud_database'
    );

    //Get the start time
    $query = "SELECT * FROM amazon_test WHERE id = SELECT COUNT(*) FROM amazon_test";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //wait till the time finishes 
    $time_to_wait = date('H:i') - ($row['Local_time'] + $time_to_repeat);
    print($time_to_wait);

?>