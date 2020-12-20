<?php
    //Includes
    include("includes/header.php");

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    include("includes/functions_personals.php");


    // $FSNKU_TXT = $_POST['for_location'];
    $file = "D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result.txt";
    $gestor = fopen($file, "r");

    // $result = mysqli_real_escape_string($connection, utf8_encode(fread($gestor, filesize($file))));
    $result = strToBin3(fread($gestor, filesize($file)));
    fclose($gestor);
    // print($result);

    //Get the Asin From
    $query = "UPDATE control_fnsku_os1 SET Barcode_USA = '$result' WHERE FSNKU_USA = 'X000Q79PLX'";
    $result_query = mysqli_query($connection, $query);

    if($result_query === FALSE)
    {
        print("An error has ocurred");
    }
    else
    {
        print("Upload correctly done");
    }

    print(gettype($result));

?>