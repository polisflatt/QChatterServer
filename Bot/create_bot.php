<?php
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/user.php";

    $bot_username = $_POST["bot_username"];
    $bot_password = $_POST["bot_password"];
    $bot_password_verify = $_POST["bot_password_verify"];

    if (!!strcmp($bot_password, $bot_password_verify)) {
        print(E_USER_PASSWORD_CONFIRMATION_FAILURE);
        exit();
    }

    if (user_exists($bot_username)) {
        print(E_USER_EXISTS_ALREADY);
        exit();
    }

    create_user($bot_username, $bot_password, U_BOT);

?>