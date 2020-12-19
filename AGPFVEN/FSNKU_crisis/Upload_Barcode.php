<?php
    //Includes
    include("includes/header.php");

    // $FSNKU_TXT = $_POST['for_location'];
    $file = "D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result.txt";
    $gestor = fopen($file, "r");

    // $result = iconv("iso-8859-1", "iso-8859-15", fread($gestor, filesize($file)));
    // print($result);

    //Get the Asin From
    $query = "INSERT INTO control_fnsku_os1 (Barcode_USA) VALUES ("")" ;
    $result_time = mysqli_query($connection, $query);

?>