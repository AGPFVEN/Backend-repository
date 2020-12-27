<?php
    //Includes
    include("includes/header.php");

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    include("includes/functions_personals.php");


    //Get the Asin From
    $query = "SELECT Barcode_USA FROM control_fnsku_os1 WHERE FSNKU_USA = 'X000Q79PLX'";
    $result = mysqli_query($connection, $query);
    $result_db = mysqli_fetch_array($result);

    $file = "D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result_db.pdf";
    $gestor = fopen($file, "w+");
    fwrite($gestor, (base64_decode($result_db["Barcode_USA"])));
    fclose($gestor);

    // header("Content-type: application/pdf");
    // // header('Content-Disposition: inline; filename="' . $file . '"');
    // header('Content-Transfer-Encoding: binary');
    // header('Accept-Ranges: bytes');
    // readfile($file);

    print("KK");
?>

<script src="Print.js-1.5.0/src/index.js" type="module"></script>
<script type="text/javascript">

    printJS('wetransfer-686ade/Archivo comprimido/OS1 USA/X000KI1JEJ_result_db.')

</script>