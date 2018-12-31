<?php
    function core_function_help($command = "help") {
        /* Prints denoted help of a command */
        if (!array_key_exists($command, $GLOBALS["commands_helps"])) {
            print("No help exists for this command (maybe a bad plugin?)");
            return;
        }

        print($GLOBALS["commands_helps"][$command]);
    }
?>