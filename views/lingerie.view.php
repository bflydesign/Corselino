<div id="textfield">
    <p>Onze merken in lingerie:</p>
    <br />
    <p>
        <?php print isset($content) ? $content : ''; ?>
    </p>
    <br />
    <p>Hieronder ziet u alvast een greep uit onze collectie:</p>
</div>

<div id="lingeriebox">
    <?php
    //path to directory to scan. i have included a wildcard for a subdirectory
    $directory = "images/lingerie/";

    //get all image files with a .jpg extension.
    $images = glob("" . $directory . "*.jpg");

    $imgs = '';
    // create array
    foreach($images as $image)
    {
        $imgs[] = "$image";
    }
    //shuffle array
    shuffle($imgs);

    //select first 20 images in randomized array
    $imgs = array_slice($imgs, 0, 6);

    //display images
    foreach ($imgs as $img) {
        $thumb = str_replace("images", "images/thumbs/", $img);
        echo "<div class=\"lingerie\">\n";
        echo "<a class=\"fancybox\" rel=\"group\" href=\"".$img."\">\n";
        echo "<img src=\"".$thumb."\" class=\"imglingerie\" />\n";
        echo "</a>\n";
        echo "</div>\n";
    }
    ?>
</div>