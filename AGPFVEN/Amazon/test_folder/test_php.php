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
    $query = "SELECT * FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //wait till the time finishes
    date('Y-m-d H:i:s');
    print($row['Local_time']);
    print(date('Y-m-d H:i:s'));

?>