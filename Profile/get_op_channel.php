<?php
	/* Gives channel OP to a user, if the password is right */

	require "../Misc/show_errors.php";
	require "../Misc/channel_func.php";
	require "../Misc/user.php";

	$username = $_POST["username"];
	$password = $_POST["password"];
	$channel = $_POST["channel"];
	$masterpassword = $_POST["masterpassword"];

	if (!strcmp_user_password($username, $password)) {
		print(E_USER_PASSWORD_DENIED);
		exit();
	}

	if (!user_is_in_channel($username, $channel)) {
		print(E_USER_IS_NOT_IN_CHANNEL);
		exit();
	}

	if (!strcmp_channel_masterpassword($channel, $masterpassword)) {
		print(E_MASTERPASSWORD_STRCMP_FAILED);
		exit();
	}

	set_channel_op($channel, $username); /* Set OP */

	/* Profit? */
?>
