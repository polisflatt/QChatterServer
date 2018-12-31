<?php
    /* Main library for dealing with channel relating things */

    /* 
    [WARNING: GET YOUR PUKEBAG] CODE IS DISGUSTING AND USES VARIOUS MAGIC STRINGS AND NUMBERS W/O PROPER DEFINITIONS; HOWEVER, IT WILL BE ADDED SOON.
    */


    /* Libraries & Imports */

    require_once "text_coding.php";


    /* OP Functions */

    function set_channel_op($channel, $username) {
        $fp = fopen("../../channel/$channel/ops.txt", "a");
        fwrite($fp, $username . PHP_EOL);
        fclose($fp);
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

    /* Masterpassword Functions */

    function channel_add_masterpassword($channel, $masterpassword) { /* Add a masterpassword to the channel */
        file_put_contents("../../channel/$channel/masterpassword.txt", $masterpassword);
    }

    function strcmp_channel_masterpassword($channel, $masterpassword_in) { /* Same thing as strcmp_channel_password, but with a masterpassword instead */
        $masterpassword = file_get_contents("../../channel/$channel/masterpassword.txt");

        return !strcmp($masterpassword, $masterpassword_in); /* Strcmp returns 0 if the strings are indifferent. 0 == false. invert that. 1 == True. So, if it is equal, it is 0 (false), but inverted, it is: 1 (true) */
        
        /* Basically a brainlet here. Had to explain to myself. Seldom sleeping had most likely resulted in this aberration of mine */
    
    }

    /* Channel Password Functions */

    function channel_has_password($channel) { /* Checks if the channel has an access password */
        return file_exists("../../channel/$channel/password.txt");
    }

    function channel_add_password($channel, $password) { /* Adds a password to the channel */
        file_put_contents("../../channel/$channel/password.txt", $password);
    }

    function strcmp_channel_password($channel, $password_in) { /* Does the password provided match the actual password? Returns 1 on yes and 0 on no */
        $password = file_get_contents("../../channel/$channel/password.txt");

        return !strcmp($password, $password_in);
    }

    /* MISC Channel Functions */

    function channel_get_contents($channel) { /* Obtain all contents of a channel */
        return file_get_contents("../../channel/$channel/data.txt");
    }

    

    function channel_put_contents($channel_r, $content_r, $title_r, $title_status_r) { /* Put contents into a channel */
        /* Set more direct variables instead of the temporary ones; it makes cleaner code. */
        
        $channel = $channel_r;
	    $content = $content_r;
	    $title_status = $title_status_r;
        $title = $title_r;
        $time = (string) time(); /* Time since January 1st, 1970; however, in the format of seconds. (and, yes, cast to string is necessary)*/

        /* Set JSON */ 

        $message->time = $time;
        $message->title = $title;
	    $message->content = $content;
        $message->title_status = $title_status;
        

        /* Seldom used text-coding features; however, it is server dependent as the code demonstrates here */

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
        
        $messages = 0;
        

         /* Encode our object */
        
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) { /* For every user in that channel, send them our message */
            if ($user == "" || $user == " ") { /* Lazy and facile method of countering errors */
                continue;
            }

            $messages = json_decode(file_get_contents("../../user/$user/channels/$channel_r/sent.txt"));

            if ($messages == NULL) { /* Sent.txt didn't previously exist  */
                $messages = array(); /* Declare array */
            } 

            array_push($messages, $message);
            $message_json = json_encode($messages, JSON_PRETTY_PRINT);
            


            $fp = fopen("../../user/$user/channels/$channel_r/sent.txt", "w");
            fwrite($fp, $message_json);

            /* SHITTY CODE WARNING!

            I AM USING THE \N DELIMITER. I NEED TO FIND A NEW DELIMITER TO SPLIT BY.

            */
        }
    }

    function channel_put_description($channel, $description) { /* Set description */
        file_put_contents("../../channel/$channel/description.txt", $description);
    }

    function channel_get_description($channel) { /* Get description */
        return file_get_contents("../../channel/$channel/description.txt");
    }

    function channel_delete($channel) { /* [EXPERIMENTAL] Delete channel */
        rmdir("../../channel/$channel/");
    }

    function channel_masterpassword_change($channel, $new_masterpassword) { /* [EXPERIMENTAL] Change masterpassword of channel */
        $fp = fopen("../../channel/$channel/masterpassword.txt", "w+"); /* Redundant; just use file_put_contents. Too lazy to change with experimental functions. Will do later */
        fwrite($fp, $new_masterpassword);
        fclose($fp);
    }

    function channel_password_change($channel, $new_password) { /* [EXPERIMENTAL] Change password of channel */
        $fp = fopen("../../channel/$channel/password.txt", "w+");
        fwrite($fp, $new_password);
        fclose($fp);
    }

    function channel_rename($channel, $new_name) { /* [EXPERIMENTAL] Change name of channel */
        rename("../../channel/$channel/", $new_name);
    }

    function channel_exists($channel) { /* Returns binary answer: Does the channel exist? */
        return file_exists("../../channel/$channel/");
    }


    function channel_create($channel) { /* Create a channel directory, rather. */
        mkdir("../../channel/$channel/");
    }
?>
