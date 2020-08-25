<?php

    // # set up the request parameters 
    // $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 
    // # make the http GET request to Rainforest API 
    // $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString)); 
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    // $api_result = curl_exec($ch); 
    // curl_close($ch); 
    // # print the CSV response from Rainforest API echo 
    // $api_result;

    # set up the request parameters 
    $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 

    # make the http GET request to Rainforest API 
    $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $api_result = curl_exec($ch);
    
    # print the CSV response from Rainforest API
    echo $api_result;
    echo '------------------------------------------------------------------------------';

    //Save in xlsx

    $csv_result_erased = str_replace('"', '', $api_result);
    echo $csv_result_erased;

    // #CVS
    $csv_result = explode(',',  $csv_result_erased);

    $gestor = fopen('D:\xampp-Server\htdocs\Backend-repository\AGPFVEN\Amazon\AGPFVEN-AMAZON-CSV.CSV', 'w');

    fputcsv($gestor, $csv_result);

    fclose($gestor);
    
    echo "\n";

    var_dump($csv_result);
?>