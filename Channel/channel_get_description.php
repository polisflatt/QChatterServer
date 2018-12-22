<?php
    require "../Misc/channel_func.php";
    require "../Misc/error_codes.php";
    /* require "../Misc/show_errors.php"; */
    
    $channel = $_GET["channel"];
    $password = $_GET["password"];


    if (channel_has_password($channel)) {
        if (!strcmp_channel_password($channel, $password)) {
            print(E_CHANNEL_PASSWORD_DENIED);
            exit();
        }
    }


    print(channel_get_description($channel));

?>