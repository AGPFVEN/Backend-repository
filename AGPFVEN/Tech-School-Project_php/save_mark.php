<?php
    include("db.php");

    $username_php = $_GET['username'];
    // $password_php = $_GET['password'];


    $query = "SELECT * FROM tech_school_project_db WHERE username = '$username_php'";
    $result = mysqli_query($connection, $query);

    if ($result != NULL)
    {
        print("doing something");
        $result_row = mysqli_fetch_array($result);
        var_dump($result_row);

    }
?>