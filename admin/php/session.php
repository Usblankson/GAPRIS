<?php

function ErrorMessage() {
    if (isset($_SESSION["ErrorMessage"])) {
        $message = htmlentities($_SESSION["ErrorMessage"]);
        $_SESSION["ErrorMessage"] = null;

        return "<div style=\"background-color: red; color: white; padding: 10px; border: 1px solid #f00;\">$message</div>";
    }
}

function SuccessMessage() {
    if (isset($_SESSION["SuccessMessage"])) {
        $message = htmlentities($_SESSION["SuccessMessage"]);
        $_SESSION["SuccessMessage"] = null;

        return "<div style=\"background-color: green; color: white; padding: 10px; border: 1px solid #0f0;\">$message</div>";
    }
}

?>
