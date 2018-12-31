<?php
    require "server.php";

    /* Deprecated */

    function gen_ip_encrypted($server_key, $key) {

        $encrypted_ip = openssl_encrypt($_SERVER["REMOTE_ADDR"], "AES-256-CBC", $server_key . $key);
        return $encrypted_ip;
    }

    function decrypt_ip($ip_encrypted, $ip_key) {
        $decrypted_ip = openssl_decrypt($ip_encrypted, "AES-256-CBC", "$SERVER_KEY|$ip_key");
        return $decrypted_ip;
    }

    function register_user_ip($user) {
        $random_key = random_int(1, 65536);
        file_put_contents("../../user/$user/IP.enc", gen_ip_encrypted(get_server_encryption_key(), $random_key));
        return $random_key;
    }

?>