<?php
    function get_motd() {
        return file_get_contents("../Settings/motd.txt");
    }

    function get_server_encryption_key() {
        return file_get_contents("../Server/Key/key.DO_NOT_CHANGE");
    }


?>