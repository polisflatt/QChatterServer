<?php
	require "../Misc/user.php";
	require "../Misc/show_errors.php";
	require "../Misc/error_codes.php";
	require "../Misc/friend.php";


	$username = $_POST["username"];
	$password = $_POST["password"];
	$user_to = $_POST["user_to"];
	$contents = $_POST["contents"];

	if (!strcmp_user_password($username, $password)) {
		print(E_USER_CREDENTIALS_DENIED);
		exit();
	}

	if (!user_exists($user_to)) {
		print("0");
		exit();
	}

	send_friend_request($username, $user_to, $contents);
?>
