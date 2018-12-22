<?php
    require "../Misc/user.php";
	require "../Misc/show_errors.php";
	require "../Misc/error_codes.php";
	require "../Misc/friend.php";
    
    $user = $_POST["username"];
    $user_to = $_POST["user_to"];
    $password = $_POST["password"];


    if (!strcmp_user_password($user, $password)) {
        print(E_USER_CREDENTIALS_DENIED);
        exit();
    }

    accept_friend_request($user, $user_to);
    
?>