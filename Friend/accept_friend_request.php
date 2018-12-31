<?php
    /* Experimental */
    
    require "../Misc/user.php";
	require "../Misc/show_errors.php";
	require "../Misc/error_codes.php";
	require "../Misc/friend.php";
    
    $user = $_POST["username"];
    $user_from = $_POST["user_from"];
    $password = $_POST["password"];


    if (!strcmp_user_password($user, $password)) {
        print(E_USER_CREDENTIALS_DENIED);
        exit();
    }

    accept_friend_request($user, $user_from);
    
?>