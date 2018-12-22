<?php
    /* Join a channel! */
    
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/user.php";
    require "../Misc/channel_func.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $channel = $_POST["channel"];
    $channel_password = $_POST["channel_password"];

    if (!strcmp_user_password($username, $password)) {
        print(E_USER_PASSWORD_DENIED);
        exit();
    }

    if (user_is_in_channel($username, $channel)) {
        print(E_USER_IS_IN_CHANNEL);
        exit();
    }

    if (channel_has_password($channel)) {
        if (!strcmp_channel_password($channel, $channel_password)) {
            print(E_CHANNEL_PASSWORD_DENIED);
            exit();
        }
    }

    user_join_channel($username, $channel); /* Join channel! */


?>