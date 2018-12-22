<?php
    require "../Misc/channel_func.php";
    require "../Misc/error_codes.php";
    /* require "../Misc/show_errors.php"; */
    
    $channel = $_POST["channel"];
    $masterpassword = $_POST["masterpassword"];
    $description = $_POST["description"];
    $username = $_POST["username"];

    if (!strcmp_channel_masterpassword($channel, $masterpassword) || is_op_in_channel($channel, $username)) {
        print(E_MASTERPASSWORD_STRCMP_FAILED);
        exit();
    }

    print(channel_put_description($channel, $description));
    
?>