<?php
    /* Returns a code containing whether the provided credentials are correct. Unspecific on purpose (to prevent exploitation) */
    
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/user.php";

    $user = $_GET["username"];
    $password = $_GET["password"];

    if (!strcmp_user_password($user, $password)) {
        print(E_USER_CREDENTIALS_MISMATCH);
        exit();
    }

    print(E_USER_CREDENTIALS_MATCH); /* Return */
    exit();
?>