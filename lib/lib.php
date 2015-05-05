<?php
// -- ROUTER FUNCTION -- //
function router($page) {
    $router = array(
        "" => "index.controller.php",
        "index" => "index.controller.php",
        "lingerie" => "lingerie.controller.php",
        "badmode" => "badmode.controller.php",
        "nachtmode" => "nachtmode.controller.php",
        "heren" => "heren.controller.php",
        "contact" => "contact.controller.php"
    );

    // -- als de pagina bestaat in de router geef de juiste controller terug en anders geef de error controller terug.
    if (isset($router[$page]))
        return $router[$page];
    else
        return "error.php";
}