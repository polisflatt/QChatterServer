<?php
    /*

    Codes describing the user status, as constants

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
    define("C_U_MASTER", 1); /* Hope I don't trigger lefists */
    define("C_U_BOT", 2);


    function add_user_to_typing($user, $channel) {
        $fp = fopen("../../channel/$channel/typing.txt", "a");
        fwrite($fp, $user);
        fclose($fp);
    }

    function get_users_typing($channel) {
        return file_get_contents("../../channel/$channel/typing.txt");
    }

    function remove_user_from_typing($user_in, $channel) {
        $file_contents = "";
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/typing.txt")) as $user ) {
            if ($user == $user_in) {
                continue;
            }

            $file_contents += $user;
        }
    }
    
    function strcmp_user_password($user, $password) {
        return !strcmp($password, file_get_contents("../../user/$user/password.txt"));
    }


    function user_exists($user) {
        return is_dir("../../user/$user/");
    }

    function get_user_status($user) {
        $a = json_decode(file_get_contents("../../user/$user/status.txt"));
        return $a->status;
    }

    function create_user($user, $password, $status) {
        mkdir("../../user/$user/");
        mkdir("../../user/$user/channels/");
        mkdir("../../user/$user/friends/");
        mkdir("../../user/$user/friends/requests/");

        $information->status = (string) $status;

        file_put_contents("../../user/$user/password.txt", $password);
        file_put_contents("../../user/$user/status.txt", json_encode($information));
    }

    function user_is_in_channel($user_in, $channel) {
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) {
            if ($user_in == $user) {
                return true;
                break;
            }
        }
    }

    function remove_user_from_channel($user_in, $channel) {
        $file_contents = "";
        foreach (explode(PHP_EOL, file_get_contents("../../channel/$channel/users.txt")) as $user) {
            if ($user_in == $user) {
                continue;
            }

            $file_contents = $file_contents . $user;
        }

        file_put_contents("../../channel/$channel/users.txt", $file_contents);
    }

    function user_join_channel($user, $channel) {
        $fp = fopen("../../channel/$channel/users.txt", "a");
        fwrite($fp, "$user" . PHP_EOL);
        fclose($fp);

        mkdir("../../user/$user/channels/$channel/");
    }

    function user_check_channel_message($user, $channel) {
        return file_exists("../../user/$user/channels/$channel/sent.txt");
    }

    function user_get_channel_message($user, $channel) {
        $contents = file_get_contents("../../user/$user/channels/$channel/sent.txt");
        unlink("../../user/$user/channels/$channel/sent.txt");
        return $contents;
    }


?>