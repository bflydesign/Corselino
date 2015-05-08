<?php
// -- ROUTER FUNCTION -- //
function router($page)
{
    $router = array(
        '' => 'index.controller.php',
        'index' => 'index.controller.php',
        'lingerie' => 'lingerie.controller.php',
        'badmode' => 'badmode.controller.php',
        'nachtmode' => 'nachtmode.controller.php',
        'heren' => 'heren.controller.php',
        'contact' => 'contact.controller.php',
        'login' => 'login.controller.php',
        'resetpw' => 'password.controller.php',
        'admin/dashboard' => 'dashboard.controller.php',
        'admin/upload' => 'upload.controller.php',
        'admin/brands' => 'brands.controller.php'
    );

    // -- als de pagina bestaat in de router geef de juiste controller terug en anders geef de error controller terug.
    if (isset($router[$page]))
        return $router[$page];
    else
        return "error.controller.php";
}

function getMaster($page) {
    $splitList = explode('/', $page);

    if($splitList[0] == 'login')
        return 'master.login.php';
    else if($splitList[0] == 'admin')
        return 'master.admin.php';
    else
        return 'master.master.php';
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

function showImages($images) {
    if (!empty($images)) {
        //display images
        foreach ($images as $img) {
            $thumb = str_replace("images", "images/thumbs/", $img); ?>
            <div class="lingerie">
                <a class="fancybox" rel="group" href="<?php print $img; ?>">
                    <img src="<?php print $thumb; ?>" class="imglingerie"/>
                </a>
            </div>
        <?php
        }
    } else { ?>
        <h2>Er werden nog geen foto's aan dit album toegevoegd</h2>
    <?php }
}
