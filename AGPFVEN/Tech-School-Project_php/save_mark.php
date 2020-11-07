<?php
    include("db.php");

    $username_php = $_GET['username'];

    $query = "SELECT * FROM tech_school_project_db WHERE username = '$username_php'";
    $result = mysqli_query($connection, $query);

    if ($result != false)
    {
        print("doing something");
        $result_row = mysqli_fetch_array($result);
        var_dump($result_row);
    }
    else
    {
        print("doing well");
    }
?>