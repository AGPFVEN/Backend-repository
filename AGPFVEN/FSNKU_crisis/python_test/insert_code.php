<?php

    //set up db, studying consumes a lot of time
    include("../includes/db.php");

    include("../includes/functions_personals.php");

    $result = base64_encode(file_get_contents("print_test.py"));

    //Get the Asin From
    // $query = "UPDATE python_table SET Code = '$result' WHERE id = (SELECT COUNT(*) FROM amazon_test) ";
    $query = "INSERT INTO python_table (Title, Code) VALUES ('python_next_try', '$result')";
    $result_query = mysqli_query($connection, $query);

    // if($result_query === FALSE)
    // // {
    // //     print("An error has ocurred");
    // // }
    // // else
    // // {
    // //     print("Upload correctly done");
    // // }

    print($result);

?>