<?php
    //set up db, studying consumes a lot of time
    include("includes/db.php");

    //Modify settings to be limitless (infinite)
    ini_set("max_execution_time", "0");

    //Location
    $input_location = $_POST['Location'];

    //Time to repeat (in seconds)
    $time_to_repeat = 120;

    //Get the start time
    $query = "SELECT * FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //wait till the time finishes
    echo Date_adder($row['Local_time'], $time_to_repeat).("\n\n");
    echo substarct_sec($row['Local_time'], Date_adder($row['Local_time'], $time_to_repeat).("\n\n"));
    sleep(substarct_sec($row['Local_time'], Date_adder($row['Local_time'], $time_to_repeat)));
    
    // echo date("Y-m-d H:i:s").("\n\n");
    // echo substarct_sec(Date_adder($row['Local_time'], $time_to_repeat), date("Y-m-d H:i:s"));

    while(1)
    {
        $query = "SELECT is_cero FROM `die_process` WHERE id = 1";
        if(mysqli_query($connection, $query) === 1)
        {
            die();
        }
    //     // # set up the request parameters 
    //     // $queryString = http_build_query([ 'api_key' => '757A4FBFF891445B9FEF6DE3441F190F', 'type' => 'search', 'amazon_domain' => 'amazon.com', 'search_term' => 'lc to lc fiber patch cable', 'output' => 'csv', 'customer_zipcode' => '33180', 'language' => 'en_US' ]); 

    //     // # make the http GET request to Rainforest API 
    //     // $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
    //     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //     // $api_result = curl_exec($ch);

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
    
    //rest seconds
    function substarct_sec($datefrom, $datefor) //fix year change
    {
        $numbers_datefrom = Get_numbers_of_date($datefrom);
        $numbers_datefor = Get_numbers_of_date($datefor);

        $sec_datefrom = intval($numbers_datefrom[0][0]) * 31536000 + 
            Get_sec_in_month($numbers_datefrom[0][1], $numbers_datefrom[0][0]) +
            intval($numbers_datefrom[0][2]) * 86400 +
            intval($numbers_datefrom[1][0]) * 3600 +
            intval($numbers_datefrom[1][1]) * 60 +
            intval($numbers_datefrom[1][2])
        ;
        
        $sec_datefor = intval($numbers_datefor[0][0]) * 31536000 + 
            Get_sec_in_month($numbers_datefor[0][1], $numbers_datefor[0][0]) +
            intval($numbers_datefor[0][2]) * 86400 +
            intval($numbers_datefor[1][0]) * 3600 +
            intval($numbers_datefor[1][1]) * 60 +
            intval($numbers_datefor[1][2])
        ;

        return $sec_datefor - $sec_datefrom;
    }

    //Date Adder
    function Date_adder($date, $to_repeat) // I could have done this far complex and functional but I try to code readable code
    {
        //divide date in 2 (the last update and that moment)
        $array_dates_decomposed = explode(' ', $date);

        //divide date in 3(year, month, day)
        $year_month_day = explode('-', $array_dates_decomposed[0]);

        //divide hour in 3 (hour, min and sec)
        $hour_min_sec_lastdate = explode(':', $array_dates_decomposed[1]);

        //Add sec
        $provisional_sec = intval($hour_min_sec_lastdate[2]) + $to_repeat;

        //finals just in case they are not necessary
        $final_sec = $provisional_sec;
        $final_min = intval($hour_min_sec_lastdate[1]);
        $final_hour = intval($hour_min_sec_lastdate[0]);
        $final_day = intval($year_month_day[2]);
        $final_month = intval($year_month_day[1]);
        $final_year = intval($year_month_day[0]);


        //Get final_date
        if($provisional_sec >= 60)
        {
            $final_sec = $provisional_sec % 60;
            $provisional_min = intval($hour_min_sec_lastdate[1]) + truncate_($provisional_sec / 60);

            if($provisional_min >= 60)
            {
                $final_min = $provisional_min % 60;
                $provisional_hour = intval($hour_min_sec_lastdate[0]) + truncate_($provisional_min / 60);

                if($provisional_hour >= 24)
                {
                    $final_hour = ($provisional_hour % 24);
                    $provisional_day = intval($year_month_day[2]) + truncate_($provisional_hour / 24);

                    if(cal_days_in_month(CAL_GREGORIAN, intval($year_month_day[1]), intval($year_month_day[0])) < $provisional_day)
                    {
                        $final_day = $provisional_day - cal_days_in_month(CAL_GREGORIAN, intval($year_month_day[1]), intval($year_month_day[0]));
                        $provisional_month = intval($year_month_day[1]) + 1;

                        if(12 < $provisional_month)
                        {
                            $final_month = $provisional_month - 12;
                            $final_year = intval($year_month_day[0]) + 1;
                        }
                        else
                        {
                            $final_month = $provisional_month;
                        }

                    }
                    else
                    {
                        $final_day = $provisional_day;
                    }
                }
                else
                {
                    $final_hour = $provisional_hour;
                }
            }
            else
            {
                $final_min = $provisional_min;
            }
        }
        return ($final_year. '-'. format_to_sec(truncate_($final_month)). '-'. format_to_sec(truncate_($final_day)). ' '. format_to_sec(truncate_($final_hour)). ":". format_to_sec(truncate_($final_min)). ":". format_to_sec(truncate_($final_sec)));
    }
    
    //Facilitate Calculus
    function hexdecimal_adder($sec_function, $min_function ,$adder)
    {
        $provisional = intval($sec_function) + $adder;

        if($provisional >= 60)
        {
            $final_sec = $provisional % 60;
            $add_to_mins = round($provisional / 60);
            $final_min = intval($min_function) + $add_to_mins;
        }
    }

    //Format (now is formatting just the seconds, mins and hours)
    function format_to_sec($seconds)
    {
        if($seconds < 10)
        {
            $sec = "0";
            $sec .= strval($seconds);
            return $sec;
        }
        else
        {
            return $seconds;
        }
    }

    //Truncate numbers
    function truncate_($num)
    {
        $num_parts = explode(',', $num);
        $provisional_num = intval($num_parts[0]);
        return $provisional_num;
    }

    //get date in numbers from string in UTC
    function Get_numbers_of_date($date)
    {
        //divide date in 2 (the last update and that moment)
        $array_dates_decomposed = explode(' ', $date);

        //divide date in 3(year, month, day)
        $principal_array[0] = explode('-', $array_dates_decomposed[0]);

        //divide hour in 3 (hour, min and sec)
        $principal_array[1] = explode(':', $array_dates_decomposed[1]);

        return array($principal_array[0], $principal_array[1]);
    }

    //get seconds passed in a year until a month(specific)
    function Get_sec_in_month($month, $year)
    {
        $sec = 0;

        for($i = 1; $i < intval($month); $i++)
        {
            $sec += cal_days_in_month(CAL_GREGORIAN, $i, intval($year)) * 86400;
        }

        return $sec;
    }
?>