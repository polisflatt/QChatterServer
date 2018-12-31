<?php /* Deprecated */
	require "../Misc/show_errors.php";
	require "../Misc/error_codes.php";
	require "../Misc/channel_func.php";


	$channel = $_GET["channel"];
	$password = $_GET["password"]; /* Set to null */

	if (channel_has_password($channel)) {
		if (strcmp_channel_password($channel, $password)) {
			print(channel_get_contents($channel));
		} else {
			print(E_CHANNEL_PASSWORD_DENIED);
		}
	} else {
		print(channel_get_contents($channel));
	}


	
?>
