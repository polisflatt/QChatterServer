<?php
    /* Gets new channel messages from a channel on a user and deletes them afterwards */

    
    //require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/user.php";
    require "../Misc/channel_func.php";

    $channel_password = $_GET["channel_password"];
    $channel = $_GET["channel"];
    $password = $_GET["password"];
    $username = $_GET["username"];

    if (!strcmp_user_password($username, $password)) {
        print(E_USER_PASSWORD_DENIED);
        exit();
    }

    if (!user_check_channel_message($username, $channel)) {
        print(E_USER_CHANNEL_DATA_DOES_NOT_EXIST);
        exit();
    }

    if (channel_has_password($channel)) {
        if (!strcmp_channel_password($channel, $channel_password)) {
            print(E_CHANNEL_PASSWORD_DENIED);
            exit();
        }
    }

    print(user_get_channel_message($username, $channel)); /* Get channel messages as JSON */ 
    exit();

?>