<?php
    require_once "text_coding.php";


    function set_channel_op($channel, $username) {
        $fp = fopen("../../channel/$channel/ops.txt", "a");
        fwrite($fp, $username . PHP_EOL);
        fclose($fp);
    }

    function channel_has_password($channel) { /* Checks if the channel has an access password */
        if (file_exists("../../channel/$channel/password.txt")) {
            return true;
        } else {
            return false;
        }
    }

    function channel_add_password($channel, $password) { /* Adds a password to the channel */
        file_put_contents("../../channel/$channel/password.txt", $password);
    }

    function strcmp_channel_password($channel, $password_in) { /* Does the password provided match the actual password? Returns 1 on yes and 0 on no */
        $password = file_get_contents("../../channel/$channel/password.txt");

        if (!strcmp($password, $password_in)) {
            return true;
        } else {
            return false;
        }
    }

    function channel_add_masterpassword($channel, $masterpassword) { /* Add a masterpassword to the channel */
        file_put_contents("../../channel/$channel/masterpassword.txt", $masterpassword);
    }

    function strcmp_channel_masterpassword($channel, $masterpassword_in) { /* Same thing as strcmp_channel_password, but with a masterpassword instead */
        $masterpassword = file_get_contents("../../channel/$channel/masterpassword.txt");

        if (!strcmp($masterpassword, $masterpassword_in)) {
            return true;
        } else {
            return false;
        }
    }

    function channel_get_contents($channel) { /* Obtain all contents of a channel */
        return file_get_contents("../../channel/$channel/data.txt");
    }

    function channel_get_ops($channel) {
	    return file_get_contents("../../channel/$channel/ops.txt");
    }

    function is_op_in_channel($channel, $user) {
	    foreach (explode(PHP_EOL, channel_get_ops($channel)) as $op) {
		    if ($op == "" || $op == " ") {
			    continue;
		    }

		    if (!strcmp($op, $user)) {
			    return true;
		    }
	    }
    }

    function channel_put_contents($channel_r, $content_r, $title_r, $title_status_r) { /* Put contents into a channel */
        $channel = $channel_r;
	    $content = $content_r;
	    $title_status = $title_status_r;
        $title = $title_r;
        $time = (string) time();

        $message->time = $time;
        $message->title = $title;
	    $message->content = $content;
        $message->title_status = $title_status;
        


        switch(font_bold_normal_italic($content_r)) {
            case "i":
            $message->font_type = "i";
            break;

            case "b":
            $message->font_type = "b";
            break;

            case "n":
            $message->font_type = "n";
            break;
        }


        $message_json = json_encode($message);
        
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) {
            if ($user == "" || $user == " ") {
                continue;
            }

            $fp = fopen("../../user/$user/channels/$channel_r/sent.txt", "a");
            fwrite($fp, "$message_json\n");
        }
    }

    function channel_put_description($channel, $description) {
        file_put_contents("../../channel/$channel/description.txt", $description);
    }

    function channel_get_description($channel) {
        return file_get_contents("../../channel/$channel/description.txt");
    }

    function channel_delete($channel) {
        rmdir("../../channel/$channel/");
    }

    function channel_masterpassword_change($channel, $new_masterpassword) {
        $fp = fopen("../../channel/$channel/masterpassword.txt", "w+");
        fwrite($fp, $new_masterpassword);
        fclose($fp);
    }

    function channel_password_change($channel, $new_password) {
        $fp = fopen("../../channel/$channel/password.txt", "w+");
        fwrite($fp, $new_password);
        fclose($fp);
    }

    function channel_rename($channel, $new_name) {
        rename("../../channel/$channel/", $new_name);
    }

    function channel_exists($channel) {
        return file_exists("../../channel/$channel/");
    }


    function channel_create($channel) {
        mkdir("../../channel/$channel/");
    }
?>
