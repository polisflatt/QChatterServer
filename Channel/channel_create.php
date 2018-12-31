<?php
	require "../Misc/show_errors.php";	
	require "../Misc/error_codes.php";
	require "../Misc/channel_func.php";

	$channel = $_POST["channel"];
	$masterpassword = $_POST["masterpassword"];
	$masterpassword_confirm = $_POST["masterpassword_confirm"];

	if (channel_exists($channel)) {
		print(E_CHANNEL_DOES_EXIST);
		exit();
	}

	
	channel_create($channel);
	
	if (!!strcmp($masterpassword, $masterpassword_confirm)) {
		print(E_MASTERPASSWORD_STRCMP_FAILED);
		exit();
	} 

	channel_add_masterpassword($channel, $masterpassword);

	
	print(E_CHANNEL_DOES_NOT_EXIST);
	
	
?>
