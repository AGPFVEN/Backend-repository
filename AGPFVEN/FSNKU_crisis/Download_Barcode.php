<?php
    //Includes
    include("includes/header.php");

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    include("includes/functions_personals.php");


    //Get the Asin From
    $query = "SELECT Barcode_USA FROM control_fnsku_os1 WHERE FSNKU_USA = 'X000Q79PLX'";
    $result = mysqli_query($connection, $query);
    $result_final = mysqli_fetch_array($result);

    $file = "D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result_db.txt";
    $gestor = fopen($file, "w+");
    fwrite($gestor, $result_final[0]);
    fclose($gestor);

    print($result_final[0]);

?>