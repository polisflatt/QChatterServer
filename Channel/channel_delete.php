<?php
    require "../Misc/error_codes.php";
    require "../Misc/channel_func.php";
    require "../Misc/show_errors.php";
    
    $channel = $_POST["channel"];
    $masterpassword = $_POST["masterpassword"];

    if (!strcmp_channel_masterpassword($channel, $masterpassword)) {
        print(E_MASTERPASSWORD_STRCMP_FAILED);
        exit(true);
    }

    channel_delete($channeL);


?>