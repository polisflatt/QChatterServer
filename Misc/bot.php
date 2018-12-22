<?php
    function create_bot($bot, $password) {
        mkdir("../../user/$bot/");
        mkdir("../../user/$bot/channels/");

        file_put_contents("../../user/$bot/password.txt", $password);
    }

    

?>