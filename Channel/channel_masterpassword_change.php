<?php
    require "../Misc/channel_func.php";
    require "../Misc/error_codes.php";
    require "../Misc/show_errors.php";

    $channel = $_POST["channel"];
    $username = $_POST["username"];
    $masterpassword = $_POST["masterpassword"];
    $new_masterpassword = $_POST["new_masterpassword"];

    if (!strcmp_channel_masterpassword($channel, $masterpassword) || is_op_in_channel($channel, $username)) {
        print(E_MASTERPASSWORD_STRCMP_FAILED);
        exit(true);
    }

    channel_masterpassword_change($channel, $new_masterpassword);
?>