<?php

    include("includes/db.php");
    include("includes/functions_personals.php");

    $result = base64_encode(file_get_contents("print_test.py"));
    $query = "INSERT INTO python_table (Title, Code) VALUES ('python_code.py', '$result')";
    $result_query = mysqli_query($connection, $query);

?>