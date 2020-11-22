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
    $time_to_repeat = 61;

    //Get the start time
    $query = "SELECT * FROM amazon_test WHERE id = (SELECT COUNT(*) FROM amazon_test)";
    $result_time = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result_time);

    //wait till the time finishes
    print($row['Local_time']);
    print("\r\n");
    Date_adder($row['Local_time'], $time_to_repeat);

    //Date Adder
    function Date_adder($date, $to_repeat) // I could have done this far complex and functional but I try to code readable code
    {
        //divide date in 2 (the last update and that moment)
        $array_dates_decomposed = explode(' ', $date);

        //divide hour in 3 (hour, min and sec)
        $hour_min_sec_lastdate = explode(':', $array_dates_decomposed[1]);

        //Add sec
        $provisional_sec = intval($hour_min_sec_lastdate[2]) + $to_repeat;

        //Get final date
        if($provisional_sec >= 60)
        {
            $final_sec = $provisional_sec % 60;
            $provisional_min = intval($hour_min_sec_lastdate[1]) + round($provisional_sec / 60);
            
            if($provisional_min >= 60)
            {
                $final_min = $provisional_min % 60;
                $final_hour = intval($hour_min_sec_lastdate[0]) + round($provisional_min / 60);
            }
            else
            {
                $final_min = $provisional_min;
                $final_hour = intval($hour_min_sec_lastdate[0]);
            }
        }
        echo format_to_sec($final_hour), ":", format_to_sec($final_min), ":", format_to_sec($final_sec);
    }
    
    //Facilitate Calculus
    function hexdecimal_adder($sec_function, $min_function ,$adder)
    {
        $provisional = intval($sec_function) + $adder;

        if($provisional >= 60)
        {
            $final_sec = $provisional % 60;
            $add_to_mins = $round($provisional / 60);
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

    //
    function truncate_($num)
    {
        $provisional_num = intval(substr(strval($num), 0, 1));
        return $provisional_num;
    }

?>