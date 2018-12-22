<?php
    /* Later to be implemented */

    require "channel_func.php";
    
    function user_check_channel_message($user_from, $user_to, $channel) {
        return file_exists("../../user/$user/channels/$channel/sent.txt");
    }

    function user_get_channel_message($user, $channel) {
        $contents = file_get_contents("../../user/$user/channels/$channel/sent.txt");
        unlink("../../user/$user/channels/$channel/sent.txt");
        return $contents;
    }

    function user_join_friend_channel($user_from, $user_to) {
        $fp = fopen("../../user/$user_from/friends/$user_to/users.txt", "a");
        fwrite($fp, "$user_from" . PHP_EOL);
        fclose($fp);
    }

    function send_friend_request($user_from, $user_to, $contents) {
        file_put_contents("../../user/$user_from/friends/requests/$user_to.request", $contents);
    }


    function gen_channel_name($user_from, $user_to) {
        
    }

    function accept_friend_request($user_from, $user_to) {
        if (!file_exists("../../user/$user_from/friends/requests/$user_to.request")) {
            return false;
        }

        mkdir("../../user/$user_from/friends/$user_to");
        mkdir("../../user/$user_to/friends/$user_from");


        
    }

    
?>