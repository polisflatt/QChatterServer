<?php
    require "../Misc/show_errors.php";
    require "../Misc/channel_func.php";
    require "../Misc/error_codes.php";

    $channel = $_GET["channel"];

    if (channel_has_password($channel)) {
        print(E_CHANNEL_DOES_HAVE_PASSWORD);
    } else {
        print(E_CHANNEL_DOES_NOT_HAVE_PASSWORD);
    }

?>