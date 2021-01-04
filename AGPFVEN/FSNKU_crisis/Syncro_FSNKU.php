<?php

    //set up db, studying consumes a lot of time
    include("includes/db.php");

    $FSNKU_FOR = $_POST['for_location'];
    $FSNKU_FROM = $_POST['from_location'];
    $code = $_POST['Location'];

    //Get the Asin From
    $query = "SELECT $FSNKU_FOR FROM control_fnsku_os1 WHERE $FSNKU_FROM = '$code'" ;
    $result_time = mysqli_query($connection, $query);
    $result_array = mysqli_fetch_array($result_time);

    var_dump($result_array[0]);

    //Get pdf
    $query = "SELECT Barcode_USA FROM control_fnsku_os1 WHERE $FSNKU_FROM = '$code'";
    $result = mysqli_query($connection, $query);
    $result_db = mysqli_fetch_array($result);

    $file_cointains_path = fopen("File_path.txt", "r");
    $file = fread($file_cointains_path, filesize("File_path.txt"));
    $gestor = fopen($file, "w+");
    fwrite($gestor, (base64_decode($result_db["Barcode_USA"])));
    fclose($gestor);
    fclose($file_cointains_path);
?>

<script type="text/javascript" src="Promise.min.js" charset="utf-8"></script>
<script type="text/javascript" src="FunctionPromise.js" charset="utf-8"></script>
<script type="text/javascript" src="pypyjs.js" charset="utf-8"></script>
<script type="text/javascript">

    pypyjs.exec("print(\"hillaalalal\")");
    pypyjs.execfile("/Use_printer.py");

</script>