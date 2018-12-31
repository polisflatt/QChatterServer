<?php
    function hellofunction($name) {
        
        try {
            print (
                "Hello, $name"
            );
        } catch (ArgumentCountError $e) {
            print("ArgumentCountError! Too few arguments");
        }
    }

?>