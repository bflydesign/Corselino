<?php
// -- ROUTER FUNCTION -- //
function router($page)
{
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

// -- IMAGE FUNCTION -- //
function getImages($directory)
{
    //get all image files with a .jpg extension.
    $images = glob("" . $directory . "*.jpg");

    $imgs = array();
    if (count($images) > 0) {
        // create array
        foreach ($images as $image) {
            $imgs[] = "$image";
        }
        //shuffle array
        shuffle($imgs);

        //select first 20 images in randomized array
        $imgs = array_slice($imgs, 0, 6);
    }
    return $imgs;
}
