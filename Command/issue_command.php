<?php
    require "../Misc/command.php";
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";


    try 
    {  
        $translation = parse_command_to_function($_POST["command"]);

        if (!$translation) {
            print(E_COMMAND_DOES_NOT_EXIST);
            exit();
        }

        die (
            eval($translation)
        );
    
    }
    catch (ArgumentCountError $e)
    {
        print(E_COMMAND_INCORRECT_NUMBER_OF_ARGUMENTS);
    }

?>