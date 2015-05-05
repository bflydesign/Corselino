<?php
session_start();

if ( !empty($_POST['inputcaptcha']) ) {
    if ( $_POST['inputcaptcha'] == $_SESSION['security_number'] )  {
        echo 'true';
    }
    else {
        echo 'false';
    }
}
else {
    echo 'false';
}
?>
