<?php
	require "../Misc/show_errors.php";	
	require "../Misc/error_codes.php";
	require "../Misc/channel_func.php";

	$channel = $_POST["channel"];
	$masterpassword = $_POST["masterpassword"];
	$masterpassword_confirm = $_POST["masterpassword_confirm"];

	if (!file_exists("../../channel/$channel/")) {
		mkdir("../../channel/$channel/");
		if (!strcmp($masterpassword, $masterpassword_confirm)) {
			channel_add_masterpassword($channel, $masterpassword);
		} else {
			print(E_MASTERPASSWORD_STRCMP_FAILED);
		}
		
		print(E_CHANNEL_DOES_NOT_EXIST);
	} else {
		print(E_CHANNEL_DOES_EXIST);
	}
	
?>
