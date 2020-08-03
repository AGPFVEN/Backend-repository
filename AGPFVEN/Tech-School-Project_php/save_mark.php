<?php
    include("db.php");

    $query = "SELECT * FROM cable";                                       #Seleccionar todo dentro de la base de datos
    $result_tasks = mysqli_query($connection, $query);

    
?>