<?php

$test_variable = "text test";

$py_result = exec("python test.py '$test_variable' ");

echo $py_result;