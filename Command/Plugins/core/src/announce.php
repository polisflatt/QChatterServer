<?php
    require_once "../Misc/server.php";
    
    function core_function_announce($message, $server_password) {
        if (!strcmp_server_password($server_password)) {
            print("Server password denied!");
            return;
        }

        print("lole");
    }
?>