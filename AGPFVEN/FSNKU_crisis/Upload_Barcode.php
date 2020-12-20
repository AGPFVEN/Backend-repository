<?php
    //Includes
    include("includes/header.php");

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    include("includes/functions_personals.php");

    $FSNKU_from = $_POST['from_location'];
    $FSNKU = $_POST['Location'];

    $result = base64_encode(file_get_contents($_FILES['file']['tmp_name']));

    // //Get the Asin From
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

    print(($result));

?>