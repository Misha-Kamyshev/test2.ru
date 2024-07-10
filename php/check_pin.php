<?php
    $pin_user = $_POST["pin"];

    $pin_original = $_COOKIE["pin"];

    if ($pin_user == base64_decode($pin_original)) {
        
    }
?>
