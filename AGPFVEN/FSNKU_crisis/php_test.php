<?php
    $file_cointains_path = fopen("File_path.txt", "r");

    $source_pdf="wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result_db.pdf";
    $output_folder="MyFolder";
    if (!file_exists($output_folder))
    { 
        mkdir($output_folder, 0777, true);
    }
    $a= passthru("pdftohtml $source_pdf $output_folder/new_file_name",$b);
    var_dump($a);
?>