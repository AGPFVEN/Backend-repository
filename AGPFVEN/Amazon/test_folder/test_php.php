<?php

//debes buscar la manera de solucionar los gaps dentro de grupos
    $test_string_1 =
    '""search""","""amazon.com""","""lc to lc fiber patch cable""",,,1,"""LC to LC Fiber Patch Cable Single Mode Duplex - 3m (9.84ft) - 9/125um OS1 LSZH - Beyondtech PureOptics Cable Series""","""B00IXP05IQ""","""https://www.amazon.com/dp/B00IXP05IQ""","""https://m.media-amazon.com/images/I/81fmdyLusCL._AC_UY218_.jpg""",4.8,188,false,true,"""USD""",9.99,,"
    ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,2,"""LC to LC Fiber Patch Cable Multimode Duplex - 5m (16.4ft) - 50/125um OM3 10G LSZH - Beyondtech PureOptics Cable Series""","""B00IS6PTY0""","""https://www.amazon.com/dp/B00IS6PTY0""","""https://m.media-amazon.com/images/I/81toYD9onlL._AC_UY218_.jpg""",4.8,115,false,true,"""USD""",13.68,,"
    ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,3,"""LC to LC Fiber Patch Cable Single Mode Duplex - 3m (9.84ft) - 9/125um OS1 LSZH - Beyondtech PureOptics Cable Series""","""B00IXP05IQ""","""https://www.amazon.com/dp/B00IXP05IQ""","""https://m.media-amazon.com/images/I/81fmdyLusCL._AC_UY218_.jpg""",4.8,188,false,false,"""USD""",9.99,,"
    ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,4,"""Fiber Patch Cable"," VANDESAIL 10G Gigabit Fiber Optic Cables with LC to LC Multimode OM3 Duplex 50/125 OFNP (1M"," OM3-5Pack)""","""B01LN5XOCG""","""https://www.amazon.com/dp/B01LN5XOCG""","""https://m.media-amazon.com/images/I/511SNO1ADWL._AC_UY218_.jpg""",4.8,99,false,false,"""USD""",23.99,,"
    ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,5,"""LC to LC Fiber Patch Cable Multimode Duplex - 5m (16.4ft) - 50/125um OM3 10G LSZH - Beyondtech PureOptics Cable Series""","""B00IS6PTY0""","""https://www.amazon.com/dp/B00IS6PTY0""","""https://m.media-amazon.com/images/I/81toYD9onlL._AC_UY218_.jpg""",4.8,115,false,false,"""USD""",13.68,,"
    ""search""","""amazon.com""","""lc to lc fiber patch cable""",,,6,"""LC to LC Fiber Cable Multimode Fiber Patch Cable"," AllChinaFiber Duplex Fiber Optic Cable 62.5/125 OFNR (6FT"," OM1"," Orange)""","""B087CQXK4K""","""https://www.amazon.com/dp/B087CQXK4K""","""https://m.media-amazon.com/images/I/61R792WzNPL._AC_UY218_.jpg""",4.7,7,false,false,"""USD""",12.99,,"';

    $test_string_2 =
    '""search""","""amazon.com""","""lc to lc fiber patch cable""",,,4,"""Fiber Patch Cable"," VANDESAIL 10G Gigabit Fiber Optic Cables with LC to LC Multimode OM3 Duplex 50/125 OFNP (1M"," OM3-5Pack)""","""B01LN5XOCG""","""https://www.amazon.com/dp/B01LN5XOCG""","""https://m.media-amazon.com/images/I/511SNO1ADWL._AC_UY218_.jpg""",4.8,99,false,false,"""USD""",23.99,,"';

    // Erase quotes
    $csv_result_erased_1_2 = str_replace('"', '', $test_string_2);
    $csv_result_erased_2_2 = str_replace('"', '', $csv_result_erased_1_2);
    echo $csv_result_erased_2_2;

    //Erase useless  commas//////////////////////////////////////////////////////////////////////////////////////////
    $last_comma_pos = 0;
    $current_first_parentesis_pos = strpos($csv_result_erased_2_2, '(', $last_comma_pos);
    $current_second_parentesis_pos = strpos($csv_result_erased_2_2, ')', $current_first_parentesis_pos);
    $current_comma_pos = strpos($csv_result_erased_2_2, ',', $current_first_parentesis_pos); 

    while($current_comma_pos > $current_second_parentesis_pos OR $current_comma_pos < $current_first_parentesis_pos OR $current_first_parentesis_pos != FALSE)
    {
        $current_first_parentesis_pos = strpos($csv_result_erased_2_2, '(', $current_first_parentesis_pos + 1);
        $current_second_parentesis_pos = strpos($csv_result_erased_2_2, ')', $current_first_parentesis_pos);
        $current_comma_pos = strpos($csv_result_erased_2_2, ',', $current_first_parentesis_pos);
    }

    if($current_comma_pos < $current_second_parentesis_pos && $current_comma_pos > $current_first_parentesis_pos)
    {
        //solution
        $api_result_modifiedD = substr_replace($csv_result_erased_2_2, 'P', $current_first_parentesis_pos, 1);
        $api_result_modified = substr_replace($api_result_modifiedD, ';', $current_comma_pos, 1);
        $api_result_modifiedD = substr_replace($csv_result_erased_2_2, 'P', $current_second_parentesis_pos, 1);
        $last_comma_pos = $current_comma_pos;
    }

    // while()
    // {
    //     $api_result_modified = substr_replace($csv_result_erased_2_2, ';', $current_comma_pos, 1);
    //     $last_comma_pos = $current_comma_pos;


    // }

    echo $api_result_modified;
    echo strlen($api_result_modified);
    echo ' ';
    echo $current_second_parentesis_pos;

    // #CVS
    $csv_result = explode(',',  $api_result_modified);

    //Apartir del 18 se puede utilizar 

    $gestor = fopen('D:\xampp-Server\htdocs\Backend-repository\AGPFVEN\Amazon\AGPFVEN-AMAZON-TEST-CSV.CSV', 'w');

    fputcsv($gestor, $csv_result);

    fclose($gestor);

?>