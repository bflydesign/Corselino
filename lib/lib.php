<?php
use Intervention\Image\ImageManagerStatic as Image;

// -- ROUTER FUNCTION -- //
function router($page)
{
    $router = array(
        'ajax' => 'ajax.controller.php',
        '' => 'index.controller.php',
        'lingerie' => 'lingerie.controller.php',
        'badmode' => 'badmode.controller.php',
        'nachtmode' => 'nachtmode.controller.php',
        'heren' => 'heren.controller.php',
        'contact' => 'contact.controller.php',
        'login' => 'login.controller.php',
        'resetpw' => 'password.controller.php',
        'admin/dashboard' => 'dashboard.controller.php',
        'admin/upload' => 'upload.controller.php',
        'admin/brands' => 'brands.controller.php',
        'admin/fileserver' => 'fileserver.controller.php'
    );

    // -- als de pagina bestaat in de router geef de juiste controller terug en anders geef de error controller terug.
    if (isset($router[$page]))
        return $router[$page];
    else
        return "index.controller.php";
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
function resize($width, $height)
{
    /* Get original image x y*/
    list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* new file name */
    $path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
    /* read binary data from image file */
    $imgString = file_get_contents($_FILES['image']['tmp_name']);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image,
        0, 0,
        $x, 0,
        $width, $height,
        $w, $h);
    /* Save image */
    switch ($_FILES['image']['type'])
    {
        case 'image/jpeg':
            imagejpeg($tmp, $path, 100);
            break;
        case 'image/png':
            imagepng($tmp, $path, 0);
            break;
        case 'image/gif':
            imagegif($tmp, $path);
            break;
        default:
            exit;
            break;
    }
    return $path;
    /* cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
}

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

        //select first x images in randomized array
        $imgs = array_slice($imgs, 0, 6);
    }
    return $imgs;
}

function showImages($images) {
    if (!empty($images)) {
        //display images
        foreach ($images as $img) {
            $path_parts = pathinfo($img);
            // -- info oorspronkelijke afbeelding
            $imgName = $path_parts['basename'];
            $imgPath = $path_parts['dirname'].'/'; // dirname geeft path zonder laatste /
            // -- info thumbnail
            $thumbName = 'fit_' . $imgName;
            $thumbPath = $imgPath.'thumbs/';
            if (!file_exists($thumbPath))
                mkdir($thumbPath, 0777, true);
            if (!file_exists($thumbPath.$thumbName)) {
                Image::make($img)->fit(100, 150)->save($thumbPath.$thumbName);
            }
            ?>
            <div class="lingerie">
                <a class="fancybox" rel="group" href="<?php print $img; ?>">
                    <img src="<?php print $thumbPath.$thumbName; ?>" class="imglingerie"/>
                </a>
            </div>
        <?php
        }
    } else { ?>
        <h2>Er werden nog geen foto's aan dit album toegevoegd</h2>
    <?php }
}

function generatePassword($password)
{
    // Create a random salt
    $salt = generateSalt();
    // Create salted password (Careful not to over season)
    $password = hash('sha512', $password . $salt);

    return $return_values = array('salt' => $salt, 'password' => $password);
}

function generateRandomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function generateSalt()
{
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    return $random_salt;
}

function sec_session_start()
{
    // Set a custom session name
    $session_name = 'sec_session_id';
    //Set to true if using https.
    $secure = false;
    // This stops javascript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    ini_set('session.entropy_file', '/dev/urandom');
    ini_set('session.entropy_length', '512');
    ini_set('session.use_only_cookies', 1);
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams['lifetime'],
        $cookieParams['path'],
        $cookieParams['domain'],
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    // Start the php session
    session_start();
    // regenerated the session, delete the old one.
    //session_regenerate_id(true);
}