<?php
    /* A REST API service used to create an account with this service */ 
    
    require "../Misc/show_errors.php";
    require "../Misc/error_codes.php";
    require "../Misc/user.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_again = $_POST["password_again"];

    if (strcmp($password, $password_again)) {
        print(E_USER_PASSWORD_CONFIRMATION_FAILURE);
        exit(true);
    }


    if (user_exists($username)) {
        print(E_USER_EXISTS_ALREADY);
        exit();
    }

    create_user($username, $password, U_NORMAL);


?>