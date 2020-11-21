<?php
    //set up db, studying consumes a lot of time
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud_database'
    );

    //Modify settings to be limitless (infinite)
    ini_set("max_execution_time", "0");

    //Location
    $input_location = $_POST['Location'];

    //Time to repeat (in seconds)
    $time_to_repeat = 60;

    //Get the start time
    $query = "SELECT * FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //Start date

    //wait till the time finishes 
    $time_to_wait = ($row['Local_time'] + $time_to_repeat);

    while(1)
    {
        // # set up the request parameters 
        // $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 

        // # make the http GET request to Rainforest API 
        // $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // $api_result = curl_exec($ch);

        //String Aux
        $api_result= '
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,1,"""LC to LC Fiber Patch Cable Single Mode Duplex - 3m (9.84ft) - 9/125um OS1 LSZH - Beyondtech PureOptics Cable Series""","""B00IXP05IQ""","""https://www.amazon.com/dp/B00IXP05IQ""","""https://m.media-amazon.com/images/I/81fmdyLusCL._AC_UY218_.jpg""",4.8,188,false,true,"""USD""",9.99,,"
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,2,"""LC to LC Fiber Patch Cable Multimode Duplex - 5m (16.4ft) - 50/125um OM3 10G LSZH - Beyondtech PureOptics Cable Series""","""B00IS6PTY0""","""https://www.amazon.com/dp/B00IS6PTY0""","""https://m.media-amazon.com/images/I/81toYD9onlL._AC_UY218_.jpg""",4.8,115,false,true,"""USD""",13.68,,"
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,3,"""LC to LC Fiber Patch Cable Single Mode Duplex - 3m (9.84ft) - 9/125um OS1 LSZH - Beyondtech PureOptics Cable Series""","""B00IXP05IQ""","""https://www.amazon.com/dp/B00IXP05IQ""","""https://m.media-amazon.com/images/I/81fmdyLusCL._AC_UY218_.jpg""",4.8,188,false,false,"""USD""",9.99,,"
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,4,"""Fiber Patch Cable VANDESAIL 10G Gigabit Fiber Optic Cables with LC to LC Multimode OM3 Duplex 50/125 OFNP (1M"," OM3-5Pack)""","""B01LN5XOCG""","""https://www.amazon.com/dp/B01LN5XOCG""","""https://m.media-amazon.com/images/I/511SNO1ADWL._AC_UY218_.jpg""",4.8,99,false,false,"""USD""",23.99,,"
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,5,"""LC to LC Fiber Patch Cable Multimode Duplex - 5m (16.4ft) - 50/125um OM3 10G LSZH - Beyondtech PureOptics Cable Series""","""B00IS6PTY0""","""https://www.amazon.com/dp/B00IS6PTY0""","""https://m.media-amazon.com/images/I/81toYD9onlL._AC_UY218_.jpg""",4.8,115,false,false,"""USD""",13.68,,"
        ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,6,"""LC to LC Fiber Cable Multimode Fiber (Patch) Cable AllChinaFiber Duplex Fiber Optic Cable 62.5/125 OFNR (6FT"," OM1"," Orange)""","""B087CQXK4K""","""https://www.amazon.com/dp/B087CQXK4K""","""https://m.media-amazon.com/images/I/61R792WzNPL._AC_UY218_.jpg""",4.7,7,false,false,"""USD""",12.99,,"';

        // Erase quotes
        $csv_result_erased_1_2 = str_replace('"', '', $api_result);
        $csv_result_erased_2_2 = str_replace('"', '', $csv_result_erased_1_2);

        //grups of lines
        $csvgroups = explode("\n", $csv_result_erased_2_2);

        while(strpos($csvgroups[0], '.') != 0)
        {
            $csvgroups[0] = substr_replace($csvgroups[0], '_', strpos($csvgroups[0], '.'), 1);
        }

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

            //Set UTC time
            date_default_timezone_set('UTC');
            
            //DB
            $query = "INSERT INTO amazon_test (request_parameters_type, request_parameters_amazon_domain, request_parameters_search_term, request_parameters_sort_by, request_parameters_page, search_results_position, search_results_title, search_results_asin, search_results_link, search_results_image, search_results_rating, search_results_ratings_total, search_results_is_prime, search_results_sponsored, search_results_price_currency, search_results_price_value, search_results_page, search_results_add_on_item_is_add_on_item, location) VALUES ('$csvgroups_individual[0]', '$csvgroups_individual[1]', '$csvgroups_individual[2]', '$csvgroups_individual[3]', '$csvgroups_individual[4]', '$csvgroups_individual[5]', '$csvgroups_individual[6]', '$csvgroups_individual[7]', '$csvgroups_individual[8]', '$csvgroups_individual[9]', '$csvgroups_individual[10]', '$csvgroups_individual[11]', '$csvgroups_individual[12]', '$csvgroups_individual[13]', '$csvgroups_individual[14]', '$csvgroups_individual[15]', '$csvgroups_individual[16]', '$csvgroups_individual[17]', '$input_location')";
            $result = mysqli_query($connection, $query);
        }

        //Set timer
        sleep($time_to_repeat);
    }

    //Date Adder
    def Date_adder($dates)
    {
        foreach($dates as $date)
        {
            //divide date in 2 (the last update and that moment)
            $array_dates_decomposed = explode(' ', $date);
            $array_today_decomposed = explode(' ', date('Y-m-d H:i:s'));

            //divide hour in 3 (hour, min and sec)
            
        }
    }
?>