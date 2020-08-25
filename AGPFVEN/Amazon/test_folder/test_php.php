<?php

    echo ('""');

    $test_variable = "text test";

    // header("Location: test_php_2.php");

    $py_result = exec("python3 test.py '$test_variable' ");

    var_dump($py_result);

?>