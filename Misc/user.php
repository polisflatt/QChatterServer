<?php
    /*

    Codes describing the user status, as constants--and some unused.

    */


    define("U_NORMAL", 0);
    define("U_ADMIN", 1);
    define("U_BOT", 2);
    define("U_BANNED", 3);
    define("U_OTHER", 4);

    /*
    
    Codes describing a user's status in a channel

    */


    define("C_U_NORMAL", 0);
    define("C_U_MASTER", 1); /* Hope I don't trigger leftists! */
    define("C_U_BOT", 2);


    function add_user_to_typing($user, $channel) { /* [EXPERIMENTAL] Set status to typing */
        $fp = fopen("../../channel/$channel/typing.txt", "a");
        fwrite($fp, $user);
        fclose($fp);
    }

    function get_users_typing($channel) { /* See who's typing! */
        return file_get_contents("../../channel/$channel/typing.txt");
    }

    function remove_user_from_typing($user_in, $channel) { /* Remove a user from the /typinglist/ */
        $file_contents = "";
        
        /* Shitty code! */

        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/typing.txt")) as $user ) { /* For every user, loop through them, and add them; however, if we find our user, don't add him; remove him. */
            if ($user == $user_in) {
                continue;
            }

            $file_contents += $user; /* Append */
        }
    }
    
    function strcmp_user_password($user, $password) { /* Compare passwords */
        return !strcmp($password, file_get_contents("../../user/$user/password.txt"));
    }


    function user_exists($user) { /* Does the user exist? */
        return is_dir("../../user/$user/");
    }

    function get_user_status($user) { /* Return status of a user. Check the definitions above. */
        $a = json_decode(file_get_contents("../../user/$user/status.txt"));
        return $a->status;
    }

    function create_user($user, $password, $status) { /* Non-OOP Solution; could have utilized classes--and I might in the future, but I am not familar to PHP Object Oriented programming. */
        mkdir("../../user/$user/");
        mkdir("../../user/$user/channels/");
        mkdir("../../user/$user/friends/"); /* Foreshadows a feature that is minimally implemented! */
        mkdir("../../user/$user/requests/");

        $information->status = (string) $status; /* INT -> STR */

        file_put_contents("../../user/$user/password.txt", $password);
        file_put_contents("../../user/$user/status.txt", json_encode($information));
    }

    function user_is_in_channel($user_in, $channel) { /* Return boolean: Is the user in the channel? */
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) {
            if ($user_in == $user) {
                return true;
                break;
            }
        }
    }

    function remove_user_from_channel($user_in, $channel) { /* Remove user from the channel */
        $file_contents = "";

        /* Shitty code */

        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) { /* Do I need to explain? */
            if ($user_in == $user) {
                continue;
            }

            $file_contents = $file_contents . $user;
        }

        file_put_contents("../../channel/$channel/users.txt", $file_contents);
    }

    function user_join_channel($user, $channel) { /* Add user to the /receivingmessages/ list */
        $fp = fopen("../../channel/$channel/users.txt", "a");
        fwrite($fp, "$user" . PHP_EOL);
        fclose($fp);

        mkdir("../../user/$user/channels/$channel/");
    }

    function user_check_channel_message($user, $channel) { /* Does the /receivedmessages/ list exist? */
        return file_exists("../../user/$user/channels/$channel/sent.txt");
    }

    function user_get_channel_message($user, $channel) { /* Get the /receivedmessages/ list */
        $contents = file_get_contents("../../user/$user/channels/$channel/sent.txt");

        /* NORMALLY, THIS IS TERRIBLE CODE, IF WE WERE WRITING IN C LIKE SO:

        FILE* FP = FOPEN(FILE, "R");
        CHAR FIRST_LINE[SIZE];
        DELETE(FILE);
        FGETS(FIRST_LINE, SIZEOF FIRST_LINE, FP)

        */

        /* However, file_get_contents already gets everything in one nice tightly packed string! It's okay! */

        unlink("../../user/$user/channels/$channel/sent.txt"); /* Or delete() . */

        return $contents; 
    }


?>