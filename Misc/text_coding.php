<?php
    /* Bloated, but useful! */
    require_once "../Settings/messages.php";

    define("FONT_ITALICS_CHARACTER", "*");
    define("FONT_BOLD_CHARACTER", "~");

    function font_bold_normal_italic($text) {
        if (!$TEXT_CODING) {
            return "n";
        }

        $first_word = explode(" ", $text)[0];

        switch ($first_word) {
            case FONT_ITALICS_CHARACTER:
            return "i";
            break;

            case FONT_BOLD_CHARACTER:
            return "b";
            break;

            default:
            return "n";
            break;
        }
    }
?>