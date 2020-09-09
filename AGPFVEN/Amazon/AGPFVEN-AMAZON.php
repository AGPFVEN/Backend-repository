<?php

    # set up the request parameters 
    $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 

    # make the http GET request to Rainforest API 
    $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $api_result = curl_exec($ch);
    
    # print the CSV response from Rainforest API
    echo $api_result;
    echo '-------------------------------------------------------------------------------------------------------------------------------------------------------';

    // Erase quotes
    $csv_result_erased_1_2 = str_replace('"', '', $api_result);
    $csv_result_erased_2_2 = str_replace('"', '', $csv_result_erased_1_2);

    //grups of lines
    $csvgroups = explode("\n", $csv_result_erased_2_2);

    //search comma in array
    for($i = 0; $i < count($csvgroups);  $i++)
    {
        $checkpoint = 1;

        //search parentesis
        do
        {
            $current_first_parentesis_pos = strpos($csvgroups[$i], '(', $checkpoint);
            $current_second_parentesis_pos = strpos($csvgroups[$i], ')', $current_first_parentesis_pos);
            $current_comma_pos = strpos($csvgroups[$i], ',', $current_first_parentesis_pos);

            //change commas for dot comma
            while($current_comma_pos < $current_second_parentesis_pos && $current_comma_pos > $current_first_parentesis_pos && $current_first_parentesis_pos != 0)
            {
                $api_result_modifiedD = substr_replace($csvgroups[$i], '(', $current_first_parentesis_pos, 1);
                $api_result_modified = substr_replace($api_result_modifiedD, ';', $current_comma_pos, 1);
                $api_result_modifiedD = substr_replace($api_result_modified, ')', $current_second_parentesis_pos, 1);
                $last_comma_pos = $current_comma_pos;

                $csvgroups[$i] = $api_result_modified;

                $current_comma_pos = strpos($csvgroups[$i], ',', $last_comma_pos);
            }

            $checkpoint = $current_first_parentesis_pos + 1;
        } while($current_first_parentesis_pos != 0);
    }

    // $gestor = fopen('D:\xampp-Server\htdocs\Backend-repository\AGPFVEN\Amazon\AGPFVEN-AMAZON-CSV.CSV', 'w');

    // fputcsv($gestor, $csv_result);

    // fclose($gestor);
    
    echo "\n";

    //See variables
    var_dump($csvgroups);
?>