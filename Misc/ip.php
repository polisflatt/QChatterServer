<?php
    /* Deprecated function to try to get P2P working. */


    /*
    DO
    NOT
    FUCKING
    WORRY!

    THE SERVER WOULD ENCRYPT YOUR IP ADDRESS AND GIVE IT TO YOUR CLIENT (AS IT IS 100% UNAVOIDABLE TO CONCEAL IP WITH STANDARD P2P)

    */

    define("IP", $_SERVER["REMOTE_ADDR"]);


    function return_ip() {
        return IP;
    }

    
?>