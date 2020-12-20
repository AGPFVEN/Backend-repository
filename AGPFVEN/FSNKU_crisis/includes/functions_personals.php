<?php

    function strToBin3($input)
    {
        if (!is_string($input))
        {
            return false;
        }
        
        $input = unpack('H*', $input);
        $chunks = str_split($input[1], 2);
        $ret = '';

        foreach ($chunks as $chunk)
        {
            $temp = base_convert($chunk, 16, 2);
            $ret .= str_repeat("0", 8 - strlen($temp)) . $temp;
        }
        return $ret;
    }

?>