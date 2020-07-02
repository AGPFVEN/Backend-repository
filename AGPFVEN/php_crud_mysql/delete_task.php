<?php

    include("db.php");

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        mysqli_query($connection, $query);
    }
?>