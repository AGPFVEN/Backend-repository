<?php

    include("db.php");

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            echo "Query Failed";
        }

        $_SESSION['message'] = 'Task Deleted Succesfully';                                    #Guarda dentro de sesion un string
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }
?>