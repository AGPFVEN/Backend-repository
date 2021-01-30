<?php

    //set up db, studying consumes a lot of time
    include("includes/db.php");
    include("includes/functions_personals.php");


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
    
    $output_folder="MyFolder";
    if (!file_exists($output_folder))
    { 
        mkdir($output_folder, 0777, true);
    }
    $a= passthru("pdftohtml -f $firstpage -l $lastpage $source_pdf $output_folder/new_html_file_name",$b);
    var_dump($a);
?>