<?php
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/channel_func.php";

    $channel = $_POST["channel"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    if (channel_has_password($channel)) {
        print(E_CHANNEL_DOES_HAVE_PASSWORD);
        exit();
    }

    if (strcmp($password, $password_confirm)) {
        print(E_CHANNEL_PASSWORD_MISMATCH);
        exit();
    }

    channel_add_password($channel, $password);



?>