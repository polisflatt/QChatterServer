<?php

    function get_motd() { /* Message of The Day */
        return file_get_contents("../Settings/motd.txt");
    }

    function get_server_encryption_key() { /* Deprecated */
        return file_get_contents("../Server/Key/key.DO_NOT_CHANGE");
    }

    function get_server_password() {
        return file_get_contents("../Server/server_password.txt");
    }

    function strcmp_server_password($password) {
        return !strcmp(get_server_password(), $password);
    }

?>