<?php
    require "main_commands.php";
    require "../Misc/show_errors.php";

    define("separator", " ");


    /* Initalize commands */

    $GLOBALS["commands_avaliable"] = array (
        "hello" => "hellofunction"
    );

    $GLOBALS["commands_helps"] = array (
        "hello" => "Prints hello"
    );

    $plugins = "../Command/Plugins";

    foreach (glob("$plugins/*", GLOB_ONLYDIR) as $plugin_directory) { /* O(n^3) */
        if ($plugin_directory == "..") {
            continue;
        }

        $functions_file = "$plugin_directory/functions.json";
        $functions_code_file = "$plugin_directory/functions.php";
        $functions_help_file = "$plugin_directory/help.json";

        require "$functions_code_file";

        $json_of_help_file = json_decode (
            file_get_contents($functions_help_file)
        );

        foreach ($json_of_help_file as $helps) {
            $function_alias = $helps->alias;
            $function_help = $helps->help;

            $GLOBALS["commands_helps"][$function_alias] = $function_help;
        }

        $json_of_functions_file = json_decode (
            file_get_contents($functions_file)
        );

        foreach ($json_of_functions_file as $function_definition) {
            /* print_r($function_definition); */

            $function_alias = $function_definition->alias;
            $function_function = $function_definition->function;

            $GLOBALS["commands_avaliable"][$function_alias] = $function_function;
        }
    }


    /* Parse command */

    function parse_command_to_function($command) {
        $command_split = str_getcsv($command, " "); /* Split by spaces, but get spaces inside quotes */
        $command_split_command = $command_split[0];

        if (!array_key_exists($command_split_command, $GLOBALS["commands_avaliable"])) {
            return false;
        }

        $function_name = $GLOBALS["commands_avaliable"][$command_split_command];

        $exec_command = "";
        
        $exec_command = $exec_command . "$function_name(";
        
        $i = 1;

        $args = array_slice($command_split, 1);

        foreach ($args as $parameter) {
            $exec_command = $exec_command . '"' . $parameter . '"';

            if ($i == count($args)) {
                break;
            }

            if (!(count($args) <= 1)) {
                $exec_command = $exec_command . ",";
            }    
            
            $i++;

        }

        $exec_command = $exec_command . ");";

        return $exec_command;

        
    }

?>