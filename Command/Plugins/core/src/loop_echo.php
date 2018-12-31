<?php
    function core_function_loop_echo($input, $times) {
        /* Echos what is put into it and by the amount of times specificed */
        $count = 0;

        for ($i = 0; $i < $times; $i++) {
            print($input);
            $count++;
        }
    }
?>