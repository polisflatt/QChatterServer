<?php
	//require "../Misc/show_errors.php"; 
	
	/* Library */

	require "../Misc/channel_func.php";
	require "../Misc/error_codes.php";
	require "../Misc/user.php";

	require "../Settings/messages.php";
	

	$channel = $_POST["channel"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$password = $_POST["password"];
	$user_password = $_POST["user_password"];


	if (!strcmp_user_password($title, $user_password)) {
		print(E_USER_PASSWORD_DENIED);
		exit();
	}

	if (!user_is_in_channel($title, $channel)) {
		print(E_USER_IS_NOT_IN_CHANNEL);
		exit();
	}


	if (channel_has_password($channel)) {
		if (!strcmp_channel_password($channel, $password)) {
			print(E_CHANNEL_PASSWORD_DENIED);
			exit();
		}
	} 
	
	if (strlen($content) > MESSAGE_CHAR_LIMIT) {
		print(E_MESSAGE_CHAR_LIMIT_EXCEEDED);
		exit();
	}

	$title_status = "";

	/* Determine status; however, this can be implemented better. */

	if (is_op_in_channel($channel, $title)) 
	{
		$title_status = (string) C_U_MASTER;
	} 
	else if (get_user_status($title) == (string) U_BOT) 
	{
		$title_status = (string) C_U_BOT;
	} 
	else 
	{
		$title_status = (string) C_U_NORMAL;
	}

	channel_put_contents($channel, $content, $title, $title_status);

	
?>
