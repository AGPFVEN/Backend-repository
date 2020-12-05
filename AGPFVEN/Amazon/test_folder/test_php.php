<?php
    //set up db, studying consumes a lot of time
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud_database'
    );

    //Set time accord to UTC
    date_default_timezone_set('UTC');

    //Time to repeat in seconds
    $time_to_repeat = 3600;

    //Get the start time
    $query = "SELECT * FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //wait till the time finishes
    // print($row['Local_time']);

    $test_var = '2020-11-31 23:10:01';
    print($test_var);
    print("\r\n");
    print(Date_adder($test_var, $time_to_repeat));
    print("\r\n");
    substarct_sec($test_var, Date_adder($test_var, $time_to_repeat));

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

        echo $sec_datefor - $sec_datefrom;
    }
    
    //Date Adder
    function Date_adder($date, $to_repeat)
    {
        // [0] -> year,month,day   [1] -> hour,min,sec
        $principal_array = Get_numbers_of_date($date);

        //Add sec
        $provisional_sec = intval($principal_array[1][2]) + $to_repeat;

        //finals just in case they are not necessary
        $final_sec = $provisional_sec;
        $final_min = intval($principal_array[1][1]);
        $final_hour = intval($principal_array[1][0]);
        $final_day = intval($principal_array[0][2]);
        $final_month = intval($principal_array[0][1]);
        $final_year = intval($principal_array[0][0]);


        //Get final_date
        if($provisional_sec >= 60)
        {
            $final_sec = $provisional_sec % 60;
            $provisional_min = intval($principal_array[1][1]) + truncate_($provisional_sec / 60);

            if($provisional_min >= 60)
            {
                $final_min = $provisional_min % 60;
                $provisional_hour = intval($principal_array[1][0]) + truncate_($provisional_min / 60);

                if($provisional_hour >= 24)
                {
                    $final_hour = ($provisional_hour % 24);
                    $provisional_day = intval($principal_array[0][2]) + truncate_($provisional_hour / 24);

                    if(cal_days_in_month(CAL_GREGORIAN, intval($principal_array[0][1]), intval($principal_array[0][0])) < $provisional_day)
                    {
                        $final_day = $provisional_day - cal_days_in_month(CAL_GREGORIAN, intval($principal_array[0][1]), intval($principal_array[0][0]));
                        $provisional_month = intval($principal_array[0][1]) + 1;

                        if(12 < $provisional_month)
                        {
                            $final_month = $provisional_month - 12;
                            $final_year = intval($principal_array[0][0]) + 1;
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