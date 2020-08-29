<?php

    $test_string = ' holao mundo';
    $comma = strpos($test_string, 'a');
    $test_string_cut_1 = substr($test_string, $comma -1, 1);

    echo $test_string_cut_1;

?>