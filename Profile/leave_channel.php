<?php
    /* Leave a channel */ 
    
    require "../Misc/user.php";
    require "../Misc/error_codes.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $channel = $_POST["channel"];

    if (!strcmp_user_password($username, $password)) {
        print(E_USER_PASSWORD_DENIED);
        exit();
    }

    remove_user_from_channel($username, $channel); /* Remove yourself from the channel */
?>