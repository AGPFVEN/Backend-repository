<?php

    //set up db, studying consumes a lot of time
    include("includes/db.php");
    include("includes/functions_personals.php");
    include("includes/db_info.php");

    $FSNKU_FOR_PDF = explode("@", $_POST['for_location']);
    $FSNKU_FOR = $FSNKU_FOR_PDF[0];
    $FSNKU_PDF = $FSNKU_FOR_PDF[1];
    
    $FSNKU_FROM = $_POST['from_location'];

    $code = $_POST['Location'];

    //Get the Asin From
    $query = "SELECT $FSNKU_FOR FROM $table WHERE $FSNKU_FROM = '$code'" ;
    $result_time = mysqli_query($connection, $query);
    $result_array = mysqli_fetch_array($result_time);

    var_dump($result_array[0]);

    //Get pdf
    $query = "SELECT $FSNKU_PDF FROM $table WHERE $FSNKU_FROM = '$code'";
    $result = mysqli_query($connection, $query);
    $result_db = mysqli_fetch_array($result);

    $file_cointains_path = fopen("File_path.txt", "r");
    $file = fread($file_cointains_path, filesize("File_path.txt"));
    $gestor = fopen($file, "w+");
    fwrite($gestor, (base64_decode($result_db["Barcode_USA"])));
    fclose($gestor);
    fclose($file_cointains_path);

    /////////////////////////////////////////////////////////////////////////////

    // $query = "SELECT Code FROM python_table WHERE Title = 'python_executer.py'";
    // $result = mysqli_query($connection, $query);
    // $result_db = mysqli_fetch_array($result);

    // $gestor = fopen('python_executer_db.py', "w+");
    // fwrite($gestor, (base64_decode($result_db["Code"])));
    // fclose($gestor);

    // //Execute python
    // $command = escapeshellcmd('python_executer_db.py');
    // $output = shell_exec($command);

    ////////////////////////////////////////////////////////////////////////////////
    // // $query = "SELECT Code FROM python_table WHERE id = (SELECT COUNT(*) FROM python_table) AND NOT id = '1'";
    // $query = "SELECT Code FROM python_table WHERE id = 3";
    // $result = mysqli_query($connection, $query);
    // $result_db = mysqli_fetch_array($result);

    // $gestor = fopen('db_result_python.py', "w+");
    // fwrite($gestor, (base64_decode($result_db["Code"])));
    // fclose($gestor);
    // print(base64_decode($result_db["Code"]));

    // //Execute python
    // $output = shell_exec('db_result_python.py');
    // print($output)
    /////////////////////////////////////////////////////////////////////////
?>