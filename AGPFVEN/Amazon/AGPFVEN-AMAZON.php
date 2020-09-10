<?php
    //set up db
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud_database'
    );

    # set up the request parameters 
    $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 

    # make the http GET request to Rainforest API 
    $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $api_result = curl_exec($ch);
    
    # print the CSV response from Rainforest API
    // echo $api_result;
    // echo '-------------------------------------------------------------------------------------------------------------------------------------------------------';

    // Erase quotes
    $csv_result_erased_1_2 = str_replace('"', '', $api_result);
    $csv_result_erased_2_2 = str_replace('"', '', $csv_result_erased_1_2);

    // echo $csv_result_erased_2_2;

    //grups of lines
    $csvgroups = explode("\n", $csv_result_erased_2_2);

    while(strpos($csvgroups[0], '.') != 0)
    {
        $csvgroups[0] = substr_replace($csvgroups[0], '_', strpos($csvgroups[0], '.'), 1);
    }

    echo $csvgroups[0];


    //search comma in array
    for($i = 1; $i < count($csvgroups); $i++)
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

        //Separete in words
        $csvgroups_individual = explode(',', $csvgroups[$i]);

        var_dump($csvgroups_individual);

        $query = "INSERT INTO amazon_test (request_parameters_type, request_parameters_amazon_domain, request_parameters_search_term, request_parameters_sort_by, request_parameters_page, search_results_position, search_results_title, search_results_asin, search_results_link, search_results_image, search_results_rating, search_results_ratings_total, search_results_is_prime, search_results_sponsored, search_results_price_currency, search_results_price_value, search_results_page, search_results_add_on_item_is_add_on_item) VALUES ('$csvgroups_individual[0]', '$csvgroups_individual[1]', '$csvgroups_individual[2]', '$csvgroups_individual[3]', '$csvgroups_individual[4]', '$csvgroups_individual[5]', '$csvgroups_individual[6]', '$csvgroups_individual[7]', '$csvgroups_individual[8]', '$csvgroups_individual[9]', '$csvgroups_individual[10]', '$csvgroups_individual[11]', '$csvgroups_individual[12]', '$csvgroups_individual[13]', '$csvgroups_individual[14]', '$csvgroups_individual[15]', '$csvgroups_individual[16]', '$csvgroups_individual[17]'";
        $result = mysqli_query($connection, $query);
    }

//     // $gestor = fopen('D:\xampp-Server\htdocs\Backend-repository\AGPFVEN\Amazon\AGPFVEN-AMAZON-CSV.CSV', 'w');

//     // fputcsv($gestor, $csv_result);

//     // fclose($gestor);
    
//     // echo "\n";

//     //See variables
//     // var_dump($csvgroups);
// ?>